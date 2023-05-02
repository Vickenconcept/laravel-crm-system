<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\NewClient;
use App\Events\ClientCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendClientCreatedNotifications implements ShouldQueue
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
    public function handle(ClientCreated $event): void
    {
        foreach (User::where('id', $event->client->user_id)->cursor() as $user) {
            $user->notify(new NewClient($event->client));
        }

        // $user = User::find($event->client->user_id);
        // if ($user) {
        //     $user->notify(new NewClient($event->client));
        // }
    }
}
