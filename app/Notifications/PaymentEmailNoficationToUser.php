<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\HtmlString;

class PaymentEmailNoficationToUser extends Notification
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
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return $this->getMessage();
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    /**
     * @return MailMessage to send to a users for a specific Account
     */
    public function getMessage()
    {
        $lastRecord = DB::table('payments')->orderBy('id', 'DESC')->first();
        $account = DB::table('accounts')->where('id', '=', $lastRecord->account_id)->first();
        // $date = strtotime($lastRecord->created_at)->format('jS M-Y H:i:s');
        $date = date('jS M, Y', strtotime($lastRecord->created_at));
        $time = date('H:i:s', strtotime($lastRecord->created_at));
        return (new MailMessage)
            ->subject(config('app.name') . ': Successful Credit of Ksh ' . number_format($lastRecord->amount) . ' to ' . $account->account_name) //Custom way
            ->greeting('Hello,')
            ->line(new HtmlString('<p>We would like to inform you that a credit of '
                . '<b>' . 'Ksh ' . number_format($lastRecord->amount). '</b>'
                .' paid via MPESA Transaction ID:'
                . '<b>' .$lastRecord->transaction_id.' </b>'
                . '- on <b>' . $date . '</b>'
                . ' at ' . '<b>' . $time . '- </b>'
                . '</b>' . ' to your account, <b>'
                . $account->account_name . ',</b>'
                . ' was successful '))
            ->line('You can login to see more information.')
            ->action(config('app.name'), config('app.url') . '/admin/accounts/' . $lastRecord->account_id)
            ->line('Thank you')
            ->line(new HtmlString('Regards, <br/> MUCU Accounts Team. <br/><br/>'))
            ->salutation(new HtmlString('<font color="#888888" size="2"> Note: This is an automated email, please do not reply to it.</font>'));
    }
}
