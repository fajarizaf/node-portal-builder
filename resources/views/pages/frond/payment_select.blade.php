@extends('layout-payment')
@section('container')

<style type="text/css">
    .step-item:after,
    .step-item:before {
        background: #503bac;
    }

    .btn-primary {
        background: #503bac;
    }

    .avatar-xs {
        width: 100px;
        height: 50px;
    }

    @media (max-width:500px) {
        .btn-trial {
            position: fixed;
            bottom: 0px;
            margin: 0px;
            padding-top: 15px;
            padding-bottom: 15px;
            left: 0;
            border-radius: 0px;
        }

        .cart-trial {
            margin-bottom: 70px;
        }
    }

</style>


<div class="card-body">
    <div class="accordion" id="accordion-example">
        <div class="accordion-item" style="background:#f4f7fc">
            <h2 class="accordion-header" id="heading-1">
                <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="true">
                    Ringkasan Tagihan

                </button>
            </h2>
            <div id="collapse-1" class="accordion-collapse collapse show" data-bs-parent="#accordion-example">
                <div class="">


                    <table class="table table-transparent table-responsive">
                        <thead>
                            <tr>
                                <th style="width:70%;border:none">Item</th>
                                <th style="border:none">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @forelse($invoices_item as $item)
                            <tr>
                                <td style="border:none">{{$item->item_name}}</td>
                                <td style="border:none">
                                    @php
                                    $sub = $item->amount * $item->qty;
                                    $total = $total + $sub;
                                    @endphp
                                    IDR. {{number_format($sub)}}

                                </td>
                            </tr>
                            @empty

                            @endforelse

                            <tr>
                                <td style="border:none">Sub Total</td>
                                <td style="border:none">IDR. {{number_format($total)}}</td>
                            </tr>
                            <tr>
                                <td style="border:none">Discount</td>
                                <td style="border:none">-</td>
                            </tr>
                            <tr>
                                <td style="border:none">Biaya Transaksi</td>
                                <td style="border:none">-</td>
                            </tr>
                            <tr>
                                <td style="border:none;border-top:1px solid #ccc;"><b>Total harus dibayar</b></td>
                                <td style="border:none;border-top:1px solid #ccc;">
                                    <h3>IDR. {{number_format($total)}}</h3>

                                </td>

                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<br />
<br />
<br />





<script>
    $('document').ready(function() {


    })

</script>

@endsection
