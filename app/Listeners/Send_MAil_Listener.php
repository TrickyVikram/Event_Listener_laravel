<?php

namespace App\Listeners;

use App\Events\Send_MAil_Event;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use Mail;
class Send_MAil_Listener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Send_MAil_Event $event): void
    {
        $Send_Mail=User::find($event->userId)->toArray();

        Mail::send('eventMail',$Send_Mail,function($message) use($Send_Mail){
            $message->to($Send_Mail['email']);
            $message->subject("Event Testing");
        });
       
    }
}
