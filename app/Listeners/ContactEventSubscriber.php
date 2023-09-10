<?php

namespace App\Listeners;

use App\Events\ContactRequestEvent;
use App\Mail\PropertyContactMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Events\Dispatcher;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;

class ContactEventSubscriber
{
    public function __construct(private Mailer $mailer){
        //
    }

    public function sendForContact(ContactRequestEvent $event)
    {
        $this->mailer->send(new PropertyContactMail($event->property, $event->data));
    }

    public function subscribe(Dispatcher $dispatcher)
    {
        return [
            [ContactRequestEvent::class, 'sendForContact']
        ];
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        //
    }
}
