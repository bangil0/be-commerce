@if(Request::segment(3) == 'add')
<div class="col-md-12">
	<button type="button" onclick="tambah()" class="btn btn-success">Tambah</button>
	<button type="button" onclick="deletes()" class="btn btn-danger">Hapus</button>
</div> 
<div class="col-md-12" id="tambah"></div>
@else
	<?php 
	$id = Request::segment(4); 
	$products_images = \DB::table('products_image')->where('id_products',$id)->get();
	?>
	@foreach($products_images as $i => $products_image)
		<div class="col-md-2">
			<img src="{{url('/')}}{{$products_image->src}}" path="{{$products_image->id}}" height="100px" id="img-{!!$i!!}">
			<button type="button" class="btn btn-danger btn-sm" onclick="deleteEdit({!!$i!!})" id="btn-{!!$i!!}"> <i class="fa fa-ban"></i> Delete</button>
		</div>
	@endforeach
	<div class="col-md-12" style="margin-top: 20px;">
		<button type="button" onclick="tambah()" class="btn btn-success"> Tambah</button>
		<button type="button" onclick="deletes()" class="btn btn-danger"> Hapus</button>
	</div> 
	<div class="col-md-12" id="tambah"></div>
@endif