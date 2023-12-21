@extends('admin.master')
@section('title','Manage Product Page')
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All Product Info</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Order id</th>
                                <th class="border-bottom-0">Order Total</th>
                                <th class="border-bottom-0">Order date</th>
                                <th class="border-bottom-0">Order Status</th>
                                <th class="border-bottom-0"> Customer Info</th>
                                <th class="border-bottom-0">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->order_total}}</td>
                                    <td>{{$order->order_date}}</td>
                                    <td>{{$order->order_status}}</td>
                                    <td>{{ isset($order->customer->name)||isset($order->customer->mobile) ? $order->customer->name.'('.$order->customer->mobile.')':''}}</td>

                                    <td class="d-flex">
                                        <a href="{{route('order.show',$order->id)}}" class="btn btn-info btn-sm float-start m-1" title="View Order detail">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="" class="btn btn-success btn-sm float-start m-1" title="Order Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="" class="btn btn-primary btn-sm float-start m-1" title="View Order invoice">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="" class="btn btn-warning btn-sm float-start m-1" title="download Order invoice">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        <form action="" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm float-start m-1"
                                                    onclick="return confirm('Are you want to delete this !!!')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
