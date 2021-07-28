<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('任务名称');
            $table->string('title')->comment('邮件标题');
            $table->text('content')->comment('邮件内容');
            $table->string('from')->default(\App\Models\Work::FROM_EYOU)->comment('邮件发送者');
            $table->string('receiver_file')->nullable()->comment('邮件接收者的文件路径');
            $table->unsignedInteger('work_count')->default(0)->comment('发送邮件队列数量');
            $table->unsignedInteger('work_completed')->default(0)->comment('已完成的邮件队列数量');
            $table->boolean('is_test')->default()->comment('是否测试任务');
            $table->string('test_email')->nullable()->comment('测试邮件发送接收邮箱');
            $table->dateTime('send_time')->nullable()->comment('邮件的发送时间');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
}
