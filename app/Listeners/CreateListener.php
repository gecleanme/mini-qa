<?php

namespace App\Listeners;

use App\Events\IssueCreated;
use App\Mail\CreatedEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateListener
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
    public function handle(IssueCreated $event): void
    {
        $data = $event->data;
        \Mail::to($data['email'])->send(new CreatedEmail($data));

    }
}
