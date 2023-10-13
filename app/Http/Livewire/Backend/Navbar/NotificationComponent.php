<?php

namespace App\Http\Livewire\Backend\Navbar;

use Livewire\Component;

class NotificationComponent extends Component
{
    public $unreadNotificationsCount='';
    public $unreadNotifications;

    public function getListeners() :array
    {
        $user_id = auth()->user()->id;
        // $user_id = 1;
        return [
            "echo:notification:App.Models.User.{$user_id},notification"=>'mount',
        ];
    }
    public function mount(){
        $this->unreadNotificationsCount = auth()->user()->unreadNotifications->count();
        $this->unreadNotifications = auth()->user()->unreadNotifications()->get();
    }
    public function markAsRead($id){
       $user = auth()->user();
        //  $user->unreadNotifications()->find($id)->markAsRead();
        $notification = $user->unreadNotifications()->whereId($id)->first();
        $notification->markAsRead();
        return redirect()->to($notification->data['user_url']);
    }
    public function render()
    {
        return view('livewire.backend.navbar.notification-component');
    }
}
