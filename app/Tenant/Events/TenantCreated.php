<?php

namespace App\Tenant\Events;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TenantCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user)//Vamos receber um Objeto de User
    {
        //Preparar para receber o Usuário $user
        $this->user = $user;
    }

    /**
     * Return user created
     */
    public function user(): User
    {
        return $this->user;
    }

    /**
     * Get Tenant
     */
    public function tenant(): Tenant
    {
        return $this->user->tenant;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
