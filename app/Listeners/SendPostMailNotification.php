<?php

namespace App\Listeners;

use App\Events\SendPostMail;
use App\Mail\SendPostNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendPostMailNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SendPostMail  $event
     * @return void
     */
    public function handle(SendPostMail $event)
    {
        Mail::to($event->email)->send(new SendPostNotification([
            "title" => $event->title,
            "name" => $event->name
        ]));
    }
}
