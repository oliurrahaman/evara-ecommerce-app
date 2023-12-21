@extends('admin.master')

@section('title', 'Order Detail')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Order Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Order</a></li>
                <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Order Detail Information</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Order ID</th>
                            <td>{{$order->id}}</td>
                        </tr>
                        <tr>
                            <th>Order date</th>
                            <td>{{$order->order_date}}</td>
                        </tr>
                        <tr>
                            <th>Order total</th>
                            <td>{{$order->order_total}}</td>
                        </tr>
                        <tr>
                            <th>Tax total </th>
                            <td>{{$order->tax_total}}</td>
                        </tr>
                        <tr>
                            <th>shipping Total</th>
                            <td>{{$order->shipping_total}}</td>
                        </tr>
                        <tr>
                            <th>customer Info</th>
                            <td>{{$order->customer_info}}</td>


                        </tr>
                        <tr>
                            <th>Order Status</th>
                            <td>{{$order->order_status}}</td>
                        </tr>
                        <tr>
                            <th>Delivery Address</th>
                            <td>{{$order->delivery_address}}</td>
                        </tr>
                        <tr>
                            <th>Delivery status</th>
                            <td>{{$order->delivery_status}}</td>
                        </tr>
                        <tr>
                            <th>Payment Method</th>
                            <td>{{$order->payment_method}}</td>
                        </tr>
                        <tr>
                            <th>Payment Status</th>
                            <td>{{$order->payment_status}}</td>
                        </tr>
                        <tr>
                            <th>Payment Amount </th>
                            <td>{{$order->payment_amount}}</td>
                        </tr>
                        <tr>
                            <th>Payment Date</th>
                            <td>{{$order->payment_date}}</td>
                        </tr>
                        <tr>
                            <th>Currency</th>
                            <td>{{$order->currency}}</td>
                        </tr>
                        <tr>
                            <th>Transaction Id</th>
                            <td>{{$order->transaction_id}}</td>
                        </tr>
                        <h4>Order Product Information</h4>
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Quantity</th>
                                <th>Product Total</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->orderDetails as $orderDetail)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$orderDetail->product_name}}</td>
                                <td>{{$orderDetail->product_price}}</td>
                                <td>{{$orderDetail->product_qty}}</td>
                                <td>{{$orderDetail->product_price * $orderDetail->product_qty}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
