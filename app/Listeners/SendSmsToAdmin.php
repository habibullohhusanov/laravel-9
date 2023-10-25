<?php

namespace App\Listeners;

use App\Events\PostCreate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendSmsToAdmin
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
     * @param  \App\Events\PostCreate  $event
     * @return void
     */
    public function handle(PostCreate $event)
    {
        Log::alert("Qo'shildi " . $event->post->image);
    }
}
