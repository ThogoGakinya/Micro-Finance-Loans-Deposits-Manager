<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\HtmlString;

class PaymentEmailNoficationToTreasurer extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return $this->getMessage();
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    /**
     * @return MailMessage
     */
    public function getMessage()
    {
        $lastRecord = DB::table('payments')->orderBy('id', 'DESC')->first();
        $account = DB::table('accounts')->where('id', '=', $lastRecord->account_id)->first();
        // $date = strtotime($lastRecord->created_at)->format('jS M-Y H:i:s');
        $date = date('jS M, Y', strtotime($lastRecord->created_at));
        $time = date('H:i:s', strtotime($lastRecord->created_at));
        return (new MailMessage)
            ->subject(config('app.name') . ': New Payment of Ksh ' . number_format($lastRecord->amount) . ' for ' . $account->account_name) //Custom way
            ->greeting('Dear Treasurer,')
            ->line(new HtmlString('We would like to inform you that a new Payment of ' . '<b>' . 'Ksh ' . number_format($lastRecord->amount)
                . '</b>' . ' for <b>' . $account->account_name . '</b>' . ' has been made on ' . '<b>' . $date . '</b>' . ' at ' . '<b>' . $time . '</b> <hr/>'))
            ->line('Please log in to see more information.')
        ->action(config('app.name'), config('app.url') . '/admin/payments/' . $lastRecord->id)
        ->line('Thank you')
        ->line(new HtmlString('Regards, <br/> MUCU Accounts Team. <br/><br/>'))
        ->salutation(new HtmlString('<font color="#888888" size="2"> Note: This is an automated email, please do not reply to it.</font>'));
    }
}
