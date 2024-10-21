<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class template_emails extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('template_emails')->insert([
            'template_name' => 'Link Produk Download',
            'template_desc' => 'Template email  terkait link produk untuk di download untuk pelanggan',
            'template_group' => 'Membership',
            'template_subject' => 'landingi.id - Link Download Produk',
            'template_body' => '<p><br></p><p>Hi Pelanggan,</p><p>Terimakasih sebelumnya, pembayaran anda telah kami terima. Dan berikut kami informasikan <b>link download produk digital</b> yang dapat anda download dengan mengklik button di bawah ini :<br><br/><p><a href="https://app.nodebuilder.id/customer/download/{{hash}}" rel="noopener noreferrer" target="_blank" style="background-color:#000;padding:15px; color:#fff;text-decoration:none;border-radius:5px"><strong>Link Download Product</strong></a></p><br/><br/>',
        ]);

        DB::table('template_emails')->insert([
            'template_name' => 'Link Informasi Pesanan',
            'template_desc' => 'Terkait informasi pesanan pelanggan yang dikirim setelah checkout',
            'template_group' => 'Membership',
            'template_subject' => 'landingi.id - Informasi Pesanan Pelanggan',
            'template_body' => '<p><br></p><p>Hi Pelanggan,</p><p>Terimakasih sebelumnya telah melakukan pemesanan di toko kami dengan rincian pesanan sebagai berikut :<br><table><tr><td>Nomor Pemesanan</td><td>:</td><td>ODR-{{order_id}}</td></tr><tr><td>Taggal Pesanan</td><td>:</td><td>{{order_date}}</td></tr><tr><td>Nominal Pemesanan</td><td>:</td><td>IDR. {{order_amount}}</td></tr></table><br/><p>Yuk segera lakukan pembayaran terkait pesanan anda, untuk pilihan metode pembayaran yang tersedia anda dapat mengklik tombol dibawah ini<br><br/><p><a href="https://app.nodebuilder.id/order/payment/{{hash}}" rel="noopener noreferrer" target="_blank" style="background-color:#000;padding:15px; color:#fff;text-decoration:none;border-radius:5px"><strong>Pilih Metode Pembayaran</strong></a></p><br/><br/>',
        ]);

        DB::table('template_emails')->insert([
            'template_name' => 'Link Konfirmasi Pembayaran',
            'template_desc' => 'Terkait informasi pembayaran yang harus di selesaikan oleh pelanggan',
            'template_group' => 'Membership',
            'template_subject' => 'landingi.id - Konfirmasi Pembayaran',
            'template_body' => '<p><br></p><p>Hi Pelanggan,</p><p>Selangkah lagi kamu memiliki produk ini, yuk selesaikan tagihan pembayaran kamu sekarang juga :<br><table><tr><td>Nomor Tagihan</td><td>:</td><td>INV-{{invoices_id}}</td></tr><tr><td>Terbit Tagihan</td><td>:</td><td>{{invoices_date}}</td></tr><tr><td>Nominal tagihan</td><td>:</td><td>IDR. {{invoices_amount}}</td></tr></table><br/><p>Untuk menyelesaikan pembayaran, klik tombol di bawah ini<br><br/><p><a href="https://app.nodebuilder.id/order/payment/{{hash}}" rel="noopener noreferrer" target="_blank" style="background-color:#000;padding:15px; color:#fff;text-decoration:none;border-radius:5px"><strong>Payment Link</strong></a></p><br/><br/>',
        ]);
    }
}
