@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Order:#{{ $order->id }}</h1>
							</div>
							<div class="col-sm-6 text-right">
                                <a href="{{ route('orders.index') }}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<div class="row">
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-header pt-3">
                                        <div class="row invoice-info">
                                            <div class="col-sm-4 invoice-col">
                                            <h1 class="h5 mb-3">Shipping Address</h1>
                                            <address>
                                                <strong>{{ $order->first_name ?? '' }} {{ $order->last_name ?? '' }}</strong><br>
                                                {{ $order->address }}<br>
                                                {{ $order->city }}<br>
                                                {{ $order->mobile }}<br>
                                               {{ $order->email }}
                                            </address>
                                            </div>
                                            
                                            
                                            
                                            <div class="col-sm-4 invoice-col">
                                                {{-- <b>Invoice #007612</b><br> --}}
                                                <br>
                                                <b>Order ID:</b>{{ $order->id }}<br>
                                                <b>Total:</b> {{ number_format($order->grand_total, 2) }} جنيه<br>
                                                <b>Status:</b>  @if($order->status == 'ordered')
                                     <span class="badge badge-info">ordered</span>
                               @elseif($order->status == 'delivered')
                              <span class="badge badge-success">Delivered</span>
                                 @else
                            <span class="badge badge-secondary">{{ $order->status }}</span>
                                 @endif
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body table-responsive p-3">								
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th width="100">Price</th>
                                                    <th width="100">Qty</th>                                        
                                                    <th width="100">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders_items as $item)
                                                    
                                                
                                                <tr>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->price }}</td>                                        
                                                    <td>{{ $item->qty }}</td>
                                                    <td>{{ $item->total }}</td>
                                                </tr>
                                                @endforeach
                                                {{-- <tr>
                                                    <th colspan="3" class="text-right">Subtotal:</th>
                                                    <td>{{ number_format($item->total, 2) }} جنيه</td>
                                                </tr> --}}
                                                
                                                <tr>
                                                    <th colspan="3" class="text-right">Shipping:</th>
                                                    <td>00</td>
                                                </tr>
                                                <tr>
                                                    <th colspan="3" class="text-right">Grand Total:</th>
                                                    <td class="fw-bold">{{ number_format($order->grand_total, 2) }} جنيه</td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>								
                                    </div>                            
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="h4 mb-3">Order Status</h2>
                                        <form action="{{route('orders.status')}}" method="POST">
                                            @csrf
                                         @method("PUT")
                                        <input type="hidden" name="order_id" value="{{ $order->id }}" />
                                        <div class="mb-3">
                                            <select name="order_status" id="order_status" class="form-control">
                                                <option value="ordered" {{ $order->status == "ordered" ? "selected" : "" }}>Ordered</option>
                                                 <option value="delivered" {{ $order->status == "delivered" ? "selected" : "" }}>Delivered</option>
                                                <option value="canceled" {{ $order->status == "canceled" ? "selected" : "" }}>Cancelled</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <button  type = 'submit'class="btn btn-primary">Update</button>
                                           @if(Session::has('status'))
                                           <div id="status-alert" class="alert alert-success">
                                            {{ Session::get('status') }}
                                               </div>
                                           @endif
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="h4 mb-3">Send Inovice Email</h2>
                                        <div class="mb-3">
                                            <select name="status" id="status" class="form-control">
                                                <option value="">Customer</option>                                                
                                                <option value="">Admin</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
			</div>
@endsection
@section('customer')
<script>
    
    setTimeout(function() {
        let alert = document.getElementById('status-alert');
        if (alert) {
            alert.style.display = 'none';
        }
    }, 3000); 
</script>

@endsection