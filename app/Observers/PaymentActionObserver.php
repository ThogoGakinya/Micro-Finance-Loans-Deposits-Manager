<?php

namespace App\Observers;

use App\Models\Payment;
use App\Notifications\PaymentEmailNoficationToTreasurer;
use Illuminate\Support\Facades\Notification;

class PaymentActionObserver
{
    /**
     * Handle the Payment "created" event.
     *
     * @param  \App\Models\Payment  $payment
     * @return void
     */
    public function created(Payment $payment)
    {
        $data  = ['action' => 'created', 'model_name' => 'Payment'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title','Admin');
        })->get();
        Notification::send($users, new PaymentEmailNoficationToTreasurer($data));
    }

    /**
     * Handle the Payment "updated" event.
     *
     * @param  \App\Models\Payment  $payment
     * @return void
     */
    public function updated(Payment $payment)
    {
        //
    }

    /**
     * Handle the Payment "deleted" event.
     *
     * @param  \App\Models\Payment  $payment
     * @return void
     */
    public function deleted(Payment $payment)
    {
        //
    }

    /**
     * Handle the Payment "restored" event.
     *
     * @param  \App\Models\Payment  $payment
     * @return void
     */
    public function restored(Payment $payment)
    {
        //
    }

    /**
     * Handle the Payment "force deleted" event.
     *
     * @param  \App\Models\Payment  $payment
     * @return void
     */
    public function forceDeleted(Payment $payment)
    {
        //
    }
}
