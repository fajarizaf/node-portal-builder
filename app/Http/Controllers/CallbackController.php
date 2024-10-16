<?php

namespace App\Http\Controllers;

use App\Models\User_invoices;
use Carbon\Carbon;
use DB;
use Royryando\Duitku\Http\Controllers\DuitkuBaseController;

class CallbackController extends DuitkuBaseController
{

    /**
     * Step 4:
     * Get the success payment callback by overriding this function and update the status in database
     */
    protected function onPaymentSuccess(string $orderId, string $productDetail, int $amount, string $paymentCode, ?string $shopeeUserHash, string $reference, ?string $additionalParam): void
    {
        $invoice = User_invoices::where('id', $orderId)->first();
        if (!$invoice) return;

        try {

            DB::beginTransaction();

            DB::table('user_invoices')->where('id', $orderId)->update(['status_id' => '1004']);

            DB::table('user_invoices_transaction')->insertGetId([
                'invoices_id' => $orderId,
                'gateway' => 'DUITKU',
                'channel' => $paymentCode,
                'txnid' => $reference,
                'amount_in' => $amount,
                'payment_status' => 'success',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::commit();

        } catch (\Throwable $th) {
            //throw $th;
        }

    }

    /**
     * Step 5:
     * Setup on failed function too by overriding this function
     */
    protected function onPaymentFailed(string $orderId, string $productDetail, int $amount, string $paymentCode, ?string $shopeeUserHash, string $reference, ?string $additionalParam): void
    {
        $invoice = User_invoices::where('id', $orderId)->first();
        if (!$invoice) return;
        
        try {

            DB::beginTransaction();

            DB::table('user_invoices_transaction')->insertGetId([
                    'invoices_id' => $orderId,
                    'gateway' => 'DUITKU',
                    'channel' => $paymentCode,
                    'txnid' => $reference,
                    'amount_in' => $amount,
                    'payment_status' => 'failed',
            ]);

            DB::commit();

        } catch (\Throwable $th) {
            //throw $th;
        }
        
    }

    /**
     * Step 6:
     * Create your own return callback function
     */
    public function myReturnCallback() {
        return 'You can close this page';
    }

}