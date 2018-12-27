<div class="brands-area d-flex align-items-center justify-content-between">
    <!-- Brand Logo -->
    <?php $brands = \DB::table('brands')->get();?>
    @foreach($brands as $brand)
    <div class="single-brands-logo">
        <img src="{{asset('/'.$brand->image)}}" alt="">
    </div>
    @endforeach
</div>