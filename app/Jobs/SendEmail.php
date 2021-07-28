<?php

namespace App\Jobs;

use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $work;
    protected $queueReceivers;

    public $tries = 3;
    public $timeout = 3600;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Work $work, $queueReceivers)
    {
        $this->work = $work;
        $this->queueReceivers = $queueReceivers;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->work->send_time && Carbon::now()->lt($this->work->send_time)) {
            return;
        }

        foreach ($this->queueReceivers as $receiver) {
            if (empty(trim($receiver))) {
                break;
            }
            $email = new \SendGrid\Mail\Mail();
            $email->setFrom(Work::$fromEmailMap[$this->work->from], Work::$fromNameMap[$this->work->from]);
            $email->setSubject($this->work->title);
            $email->addTo("$receiver", 'Dear player');
            $email->addContent("text/plain", $this->work->content);
            $email->addContent(
                "text/html", $this->work->content
            );
            $sendgrid = new \SendGrid(env('SENDGRID_API_KEY'));
            $sendgrid->send($email);
            Log::info("receiver:".$receiver);
        }

        $this->work->increment('work_completed');
    }
}
