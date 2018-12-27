<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
  <!-- Your html goes here -->
  	<div class="row">
	  	<div class="col-md-5">
	  		<div class="panel" style="padding: 10px">
		  		<i class="fa fa-dashboard"></i> Overview This Year
		  		<table class="table">
		  			<tr>
		  				<td>Total Order</td>
		  				<td> 
		  				<b>Rp. {{number_format($order_total_this_year,2,',','.')}}</b>
						</td>
		  			</tr>
		  			<tr>
		  				<td>Total Sales</td>
		  				<td><b>Rp. {{number_format($sales_total_this_year,2,',','.')}}</b></td>
		  			</tr>
		  			<tr>
		  				<td>Jumlah Order</td>
		  				<td><b>{{$jumlah_order_this_year}}</b></td>
		  			</tr>
		  			<tr>
		  				<td>Total Products</td>
		  				<td><b>{{$total_product_this_year}}</b></td>
		  			</tr>
		  			<tr>
		  				<td>Total Customer</td>
		  				<td><b>{{$total_customer_this_year}}</b></td>
		  			</tr>
		  			<tr>
		  				<td>Customer Waiting Approval</td>
		  				<td><b>{{$waiting_approve_this_year}}</b></td>
		  			</tr>
		  		</table>
		  	</div>
		</div>
		<div class="col-md-7">
	  		<div class="panel" style="padding: 10px">
		  		<form action="{{url('admin')}}" method="get">
		  			<i class="fa fa-money"></i> Statistic
			  		<button class="btn btn-sm btn-default pull-right" style="margin-left: 5px;"> Filter </button>
			  		<select name="filter" class="pull-right" style="height: 30px;">
			  			<option value="This Year">This Year</option>
			  			<option value="This Month">This Month</option>
			  			<option value="This Week">This Week</option>
			  		</select>
				</form>
					<p id="yC">Total Order : <b>Rp. {{number_format($order_total_this_year,2,',','.')}}</b></p>
					<div id="yChart" style="height: 250px;">
					</div>
				@if($_GET['filter'] == 'This Month')
					<p id="mC"><b>Total Order : Rp. {{number_format($order_total_this_month,2,',','.')}}</b></p>
					<div id="mChart" style="height: 250px;"></div>
				@endif
				@if($_GET['filter'] == 'This Week')
					<div id="wChart" style="height: 250px;"></div>
				@endif
		  	</div>
		</div>
	</div>

  	<div class="row">
  		<div class="col-md-6">
	  		<div class="panel" style="padding: 10px">
		  		<i class="fa fa-money"></i> Latest 10 Orders
		  		<a class="pull-right" href="{{url('/admin/orders')}}" style="color: black">All Orders</a>
		  		<br>
		  		<table class="table table-hover">
		  			<thead>
				  		<th>Order ID</th>
				  		<th>Customer Name</th>
				  		<th>Status</th>
				  		<th>Total</th>
				  		<th>Action</th>
			  		</thead>
			  		<tbody>
			  			@foreach($table_orders as $table_order)
			  				<tr>
			  					<td> {{$table_order->order_no}} </td>
			  					<td> {{$table_order->customers_name}} </td>
			  					<td> {{$table_order->order_status}} </td>
			  					<td> {{$table_order->grand_total}} </td>
			  					<td> <a href="{{url('/admin/orders/edit').'/'.$table_order->id}}"><i class="fa fa-pencil"></i> Edit</a></td>
			  				</tr>
			  			@endforeach
			  		</tbody>
		  		</table>
	  		</div>
	  	</div>
  	
	  	<div class="col-md-6">
	  		<div class="panel" style="padding: 10px">
		  		<i class="fa fa-money"></i> Latest 10 Customers
		  		<a class="pull-right" href="{{url('/admin/customers')}}" style="color: black">All Customers</a>
		  		<br>
		  		<table class="table table-hover">
		  			<thead>
				  		<th>Customer Name</th>
				  		<th>Email</th>
				  		<th>Action</th>
			  		</thead>
			  		<tbody>
				  		@foreach($table_customers as $table_customer)
				  			<tr>
				  				<td> {{$table_customer->name}} </td>
				  				<td> {{$table_customer->email}} </td>
				  				<td> <a href="{{url('/admin/customers/edit').'/'.$table_customer->id}}"><i class="fa fa-pencil"></i> Edit</a></td></td>
				  			</tr>
				  		@endforeach
			  		</tbody>
		  		</table>
	  		</div>
	  	</div>
	</div>
	<!-- Script in here-->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
		<script>
			new Morris.Bar({
			// ID of the element in which to draw the chart.
			element: 'yChart',
			// Chart data records -- each entry in this array corresponds to a point on
			// the chart.
			data: [
				@for($x=1;$x<=12;$x++)
					<?php 
						$m = str_pad($x,2,0,STR_PAD_LEFT);
						$y = date('Y');
					?>
					{ year: "{{$y.'-'.$m}}", value: {{$grafik_year[$y.'-'.$m]}} },
				@endfor
			],
			// The name of the data record attribute that contains x-values.
			xkey: 'year',
			// A list of names of data record attributes that contain y-values.
			ykeys: ['value'],
			// Labels for the ykeys -- will be displayed when you hover over the
			// chart.
			labels: ['Value']
			});
		</script>
	@if($_GET['filter'] == 'This Month')
		<script>
			$( document ).ready(function() {
			    document.getElementById("yChart").remove();
			    document.getElementById("yC").remove();
			    document.getElementById("wChart").remove();
			})
			new Morris.Bar({
			  // ID of the element in which to draw the chart.
			  element: 'mChart',
			  // Chart data records -- each entry in this array corresponds to a point on
			  // the chart.
			  data: [
			  	<?php 
			  		$lastday = date("t", strtotime("today"));
					$y = date('Y');
					$m = date('m');
				?> 
			  	@for($x=1;$x<=$lastday;$x++)
				  	<?php $d = str_pad($x,2,0,STR_PAD_LEFT);?>
				    { month: "{{$y.'-'.$m.'-'.$d}}", value: {{(int)$grafik_month[$y.'-'.$m.'-'.$d]}} },
				@endfor
			  ],
			  // The name of the data record attribute that contains x-values.
			  xkey: 'month',
			  // A list of names of data record attributes that contain y-values.
			  ykeys: ['value'],
			  // Labels for the ykeys -- will be displayed when you hover over the
			  // chart.
			  labels: ['Value']
			});
		</script>
	@elseif($_GET['filter'] == 'This Week')
		<script>
			$( document ).ready(function() {
			    document.getElementById("yChart").remove();
			    document.getElementById("yC").remove();
			    document.getElementById("mChart").remove();
			    document.getElementById("mC").remove();
			})
			new Morris.Bar({
			  // ID of the element in which to draw the chart.
			  element: 'wChart',
			  // Chart data records -- each entry in this array corresponds to a point on
			  // the chart.
			  data: [
			  	@if(!empty($grafik_weeks))
			  		@foreach($grafik_weeks as $i => $grafik_week)
				    	{ month: "{{$i}}", value: {{$grafik_week}} },
					@endforeach	
			  	@else
			  			{ month: "", value: 0 },
			  	@endif
			  ],
			  // The name of the data record attribute that contains x-values.
			  xkey: 'month',
			  // A list of names of data record attributes that contain y-values.
			  ykeys: ['value'],
			  // Labels for the ykeys -- will be displayed when you hover over the
			  // chart.
			  labels: ['Value']
			});
		</script>
	@endif
@endsection