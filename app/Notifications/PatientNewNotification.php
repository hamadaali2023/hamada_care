<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Patient;
class PatientNewNotification extends Notification
{
    use Queueable;

    private $post;
    public function __construct(Patient $post)
    {
        $this->post= $post;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase()
    {
        return[
            'id'=>    $this->post->id,
            'title'=> $this->post->first_name_en,
            'data'=>  $this->post->last_name_en
        ];
    }   
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
