<?php

namespace App\Listeners;

use App\Events\StudentRegistered;
use App\Mail\WelcomeStudent;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
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
        Mail::to($event->student)->send(new WelcomeStudent());
    }
}
