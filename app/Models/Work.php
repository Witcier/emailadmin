<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory, HasDateTimeFormatter;

    protected $fillable = [
        'title', 'content', 'from', 'receiver_file', 'work_count', 'work_completed', 'send_time', 'is_test', 'test_email'
    ];

    protected $dates = [
        'send_time',
    ];

    const FROM_EYOU = 'EYOUGAME';
    const FROM_VIETNAM = '1618play';

    const EVERY_QUEUE_WORK = 1000;

    public static $fromNameMap = [
        self::FROM_EYOU => 'EYOUGAME',
        self::FROM_VIETNAM => '1618play',
    ];

    public static $fromEmailMap = [
        self::FROM_EYOU => 'newgame@eyou.io',
        self::FROM_VIETNAM => 'hotro@1618play.com',
    ];

    protected static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            if ($model->work_completed) {
                $model->work_completed = 0;
            }
        });
    }
}
