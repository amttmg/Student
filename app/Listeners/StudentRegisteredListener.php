<?php

namespace App\Listeners;

use App\Events\StudentRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class StudentRegisteredListener
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
     * @param  StudentRegistered $event
     * @return void
     */
    public function handle(StudentRegistered $event)
    {
//Send Email when new student registered.
    }
}
