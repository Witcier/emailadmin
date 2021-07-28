<?php

namespace App\Jobs;

use App\Models\Work;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DispatchSendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $work;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Work $work)
    {
        $this->work = $work;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->work->is_test ? $this->test() : $this->dispatchJob();
    }

    protected function dispatchJob()
    {
        // 读取接收者文件
        $file = json_encode(Storage::disk('public')->get($this->work->receiver_file));
        // 转换数组
        $receivers = explode(",", trim(Str::of($file)->replace('\r\n', ','), '"'));
        // 更新数据邮件任务队列数量
        $workCount = ceil(count($receivers) / Work::EVERY_QUEUE_WORK);
        $this->work->update([
            'work_count' => $workCount,
        ]);

        // 计算延迟派发时间
        $delayTimestamp = 0;
        if ($this->work->send_time) {
            $delayTimestamp = (strtotime($this->work->send_time) - time()) > 0 ? (strtotime($this->work->send_time) - time()) : 0;
        }
        // 分发邮件任务
        for ($i = 0, $start = 0; $i < $workCount; $i++, $start += Work::EVERY_QUEUE_WORK) {
            $queueReceivers = array_slice($receivers, $start, Work::EVERY_QUEUE_WORK, false);
            dispatch(new SendEmail($this->work, $queueReceivers))->delay($delayTimestamp);
        }
    }

    protected function test()
    {
        // 更新数据邮件任务队列数量
        $this->work->update([
            'work_count' => 1,
        ]);

        // 获取测试邮箱
        if (!$this->work->test_email) {
            return;
        }
        $queueReceivers = Str::contains($this->work->test_email, '|') ? explode('|', $this->work->test_email) : [trim($this->work->test_email)];

        // 计算延迟派发时间
        $delayTimestamp = 0;
        if ($this->work->send_time) {
            $delayTimestamp = (strtotime($this->work->send_time) - time()) > 0 ? (strtotime($this->work->send_time) - time()) : 0;
        }

        dispatch(new SendEmail($this->work, $queueReceivers))->delay($delayTimestamp);
    }
}
