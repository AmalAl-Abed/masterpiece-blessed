@extends('layouts.master')

@section('content')





<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Dashboard</h1>
					<ol class="breadcrumb">
						<li><a href="/">Home</a></li>
						<li class="active">my account</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="user-dashboard page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="list-inline dashboard-menu text-center">

					<li><a class="active" href="/user/orders">Orders</a></li>
					<li><a href="/user/profile">Profile Details</a></li>
				</ul>
				<div class="dashboard-wrapper user-dashboard">
					<div class="table-responsive">
						<table class="table">
							<thead>

								<tr>
									<th>Order ID</th>
									<th>Date</th>
									<th>Items Quantity</th>
									<th>Total Price</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>


                                @foreach($orders as $order)
								<tr>
									<td>{{$order->product_id}}</td>
									<td>{{$order->created_at}}</td>
									<td>{{$order->product_quantity}}</td>
									<td>{{$order->order_total_price}}</td>
									<td><span class="label label-primary">{{$order->order_status}}</span></td>
									<td><a href="order.html" class="btn btn-default">View</a></td>
								</tr>
                                @endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>






@endsection
