<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CategoriesExportFinishEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    /*public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    } то что было изначально, далее добавила из страницы pusher
    */
    public $message;

  public function __construct($message)
  {
      $this->message = $message;
  }

  public function broadcastOn()//это название канала
  {
      return ['general'];// было my-channel - это канал для всех пользователей
  }

  //public function broadcastAs()// это название события
  //{
  //    return 'categories-export-finish';//было my-event, указываем событие по названию
  //} не обязательный метод, можно не указывать и слать все  на канал

}
