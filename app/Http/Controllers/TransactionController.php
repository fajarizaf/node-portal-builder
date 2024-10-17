<?php

namespace App\Http\Controllers;

use App\Models\User_invoices_transaction;
use App\Models\User_orders;
use App\Models\User_verifications;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Users;
use ProdukHelper;
use SiteHelper;

class TransactionController extends Controller
{

    public function list(Request $request) {

        $site = SiteHelper::My_Site();
        $active_site_first = SiteHelper::Site_active_first();
        
        if(!empty($request->site)) {
            $site_active = $request->site;
        } else {
            if($active_site_first) {
                $site_active = $active_site_first->id;
            } else {
                $site_active = 0;
            }
        }

        $transaction = User_orders::latest();
        $transaction->where('user_order.seller_id', auth()->user()->id);
        $transaction->join('user_order_item', 'user_order_item.order_id', '=', 'user_order.id');
        $transaction->join('product_plan', 'product_plan.id', '=', 'user_order_item.product_id');
        $transaction->join('product_asigned', 'product_asigned.product_id', '=', 'product_plan.id');
        $transaction->join('user_invoices_item', 'user_invoices_item.order_id', '=', 'user_order.id');
        $transaction->join('user_invoices', 'user_invoices.id', '=', 'user_invoices_item.invoices_id');
        $transaction->join('user_invoices_transaction', 'user_invoices_transaction.invoices_id', '=', 'user_invoices.id');
        $transaction->join('site_payment_method', 'site_payment_method.channel_id', '=', 'user_invoices_transaction.channel');
        $transaction->join('site_status', 'site_status.status_code', '=', 'user_invoices.status_id');
        
        $transaction->orderBy('user_invoices_transaction.created_at', 'desc');
        $transaction->where('product_asigned.site_id', $site_active);
        $transaction->select('user_invoices_transaction.id',
            'user_invoices.id as invoices_id',
            'site_payment_method.payment_method_name',
            'site_payment_method.payment_method_group',
            'user_invoices_transaction.txnid',
            'user_invoices_transaction.amount_in',
            'user_invoices_transaction.payment_status',
            'user_invoices_transaction.created_at',
        );

        return view('pages/manage/transaction',[
                'transaction' => $transaction->paginate(10)->withQueryString(),
                'sites' => $site,
                'site_active' => $site_active
        ]);

    }


}
