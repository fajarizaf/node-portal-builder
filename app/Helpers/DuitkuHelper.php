<?php

namespace App\Helpers;
use App\Models\Site_payment_method;
use App\Models\User_invoices_payment;
use Carbon\Carbon;
use DB;
use Royryando\Duitku\Facades\Duitku;

class DuitkuHelper
{
    public static function Create($invoices_id, $payment_method) {

        $site_payment = DB::table('site_payment_method')->where('id', $payment_method)->first();

        $tagihan = OrderHelper::Data_invoices($invoices_id);
        $pelanggan = OrderHelper::Data_pelanggan($invoices_id);
                    
        $DUITKU = Duitku::createInvoice(
            $invoices_id, 
            $tagihan['invoices']->total, 
            $site_payment->channel_id, 
            $tagihan['invoices_item'][0]->item_name, 
            $pelanggan['customer']->name,
            $pelanggan['customer']->email,
            420
        );

        if($DUITKU['success'] = true) {

            $CREATE_PAYMENT = DB::table('user_invoices_payment')->insert([
                'invoices_id' => $invoices_id,
                'payment_method' => $payment_method,
                'payment_expired' => Carbon::now()->addMinutes(420),
                'payment_references' => $DUITKU['reference'],
                'payment_virtualaccount' => $DUITKU['va_number'],
                'payment_amount' => $DUITKU['amount']
            ]);

        } 

        return [
            'response' => $DUITKU,
        ];

    }


    public static function Refresh($invoices_id, $payment_method) {
        
        $site_payment = Site_payment_method::where('id', $payment_method)->first();

        $tagihan = OrderHelper::Data_invoices($invoices_id);
        $pelanggan = OrderHelper::Data_pelanggan($invoices_id);
                    
        $DUITKU = Duitku::createInvoice(
            $invoices_id, 
            $tagihan['invoices']->total, 
            $site_payment->channel_id, 
            $tagihan['invoices_item'][0]->item_name, 
            $pelanggan['customer']->name,
            $pelanggan['customer']->email,
            420
        );

        if($DUITKU['success'] = true) {

            $CREATE_PAYMENT = User_invoices_payment::where('invoices_id', $invoices_id)->update([
                'payment_expired' => Carbon::now()->addMinutes(420),
                'payment_references' => $DUITKU['reference'],
                'payment_virtualaccount' => $DUITKU['va_number'],
                'payment_amount' => $DUITKU['amount']
            ]);

        } 

        return [
            'response' => $DUITKU,
        ];

    }


}

