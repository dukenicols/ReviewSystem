<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mailers\AppMailer;

class SendRegistrationEmail implements ShouldQueue
{
    public $mailer;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(AppMailer $mailer)
    {
      $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $this->mailer->sendEmailConfirmationTo($event->user);
    }
}
