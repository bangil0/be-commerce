<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
  <!-- Your html goes here -->
  	<div class="panel panel-default" style="padding: 20px;">
  		<table id="order_statuses" class="table table-hover table-striped table-bordered">
  			<thead>
  				<tr class="active">
  					<th width="auto"> Name </th>
  					<th width="auto"> Color </th>
  					<!-- <th width="auto"> Action </th> -->
  				</tr>
  			</thead>
  			<tbody>
  			@foreach($os as $i => $order_status)
	  			<tr>
	  				<td>{{$order_status->name}}</td>
	  				<td>
	  					<button class="btn" style="background-color: {{$order_status->color}}"><i class="fa fa-check" style="color: #ffffff"></i></button>
	  				</td>
	  				<!-- <td>
	  					<a class="btn btn-xs btn-success btn-edit" title="Edit Data" href="{{url('/')}}/admin/order_statuses/edit/{{$order_status->id}}"><i class="fa fa-pencil"></i></a>
	  					<a class="btn btn-xs btn-warning btn-delete" title="Delete" href="javascript:;" onclick="swal({   
						title:'Are you sure ?',   
						text:'You will not be able to recover this record data!',   
						type:'warning',   
						showCancelButton: true,   
						confirmButtonColor:'#ff0000',   
						confirmButtonText:'Yes!',  
						cancelButtonText:'No',  
						closeOnConfirm: false }, 
						function(){  
							location.href='{{url('/')}}/admin/order_statuses/delete/{{$order_status->id}}' 
						});">
						<i class="fa fa-trash"></i></a>
	  				</td> -->
	  			</tr>
  			@endforeach
  			</tbody>
  			<tfoot>
  				<tr class="active">
  					<th width="auto"> Name </th>
  					<th width="auto"> Color </th>
  					<!-- <th width="auto"> Action </th> -->
  				</tr>
  			</tfoot>
  		</table>
  		{{ $os->links() }}
	</div>

@endsection