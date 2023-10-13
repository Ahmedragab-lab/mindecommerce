<?php

namespace App\Notifications\Backend;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUser extends Notification implements ShouldQueue
{
    use Queueable;
    public $user;

    public function __construct($user){
        $this->user = $user;
    }
    public function via($notifiable){
        return ['database','broadcast'];
    }
    public function toDatabase($notifiable){
        return [
            'user' => $this->user->full_name,
            'message' => 'New user has been registered',
            'user_url' => route('admin.users.show',$this->user->id),
            'created_at' => $this->user->created_at->diffForHumans(),
        ];
    }
    public function toBroadcast($notifiable){
        return new BroadcastMessage([
            'data' => [
                'message'  => $this->user->firstname . ' ' . $this->user->lastname . ' has registered.',
                'user' => $this->user->full_name,
                'user_url' => route('admin.users.show',$this->user->id),
                'created_at' => $this->user->created_at->diffForHumans(),
            ],
        ]);
    }
    // public function toMail($notifiable){
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }
}
