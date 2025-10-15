<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class UserNotify extends Notification
{
    use Queueable;

    public array $content = [];
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(array $content, $user)
    {
        $this->content  = $content;
        $this->user     = $user;
    }

    public function handle()
    {
        $data =
            [
                'subject' => $this->content['subject'],
                'content' => [
                    'user' => [
                        'name'  => $this->user->name,
                    ],
                    'message' => $this->content['message'],
                ],
            ];
      
        $sender = (object) [
            'name' => env('APP_NAME'),
            'email' => $this->user->email,
        ];
      
      
        $send = app('App\Services\SendGridService')->send($data, $sender, 'blank');
      
      
    }

    public function tags()
    {
        return ['Notify\User'];
    }
}
