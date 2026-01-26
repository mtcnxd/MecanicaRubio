<?php

namespace App\Traits;

use App\Http\Controllers\Notifications\Telegram;

trait Notificator
{
    public function notify(string $message) : void
    {
        Telegram::send($message);
    }
}