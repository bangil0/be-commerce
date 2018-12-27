<section class="new_arrivals_area section-padding-80 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>New Arrival Products</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">

                    <!-- Single Product -->
                    @foreach($products as $i => $product) 
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="{{asset($product->cover)}}" alt="">
                            <!-- Hover Thumb -->
                            <?php $pis = \DB::table('products_image')->where('id_products',$product->id)->get() ?>
                            @foreach($pis as $j => $pi)
                                <img class="hover-img" src="{{asset($pi->src)}}" alt="">
                            @endforeach

                            <!-- Product Badge -->
                            <!-- <div class="product-badge offer-badge">
                                <span>-30%</span>
                            </div> -->

                            <!-- Favourite -->
                            <!-- <div class="product-favourite">
                                <a href="#" class="favme fa fa-heart"></a>
                            </div> -->
                        </div>

                        <!-- Product Description -->
                        <div class="product-description">
                            <span>{{$slug}}</span>
                            <a href="{{url('/products').'/'.$product->slug}}">
                                <h6>{{$product->name}}</h6>
                            </a>
                            <p class="product-price"><!-- <span class="old-price">$75.00</span> --> Rp. {{number_format($product->price,2,',','.')}}</p>

                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                    <form action="{{url('/cart')}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="url" value="{{ URL::current() }}">
                                        <input type="hidden" name="id_products" value="{{$product->id}}">
                                        <input type="hidden" name="id_customers" value="{{session('id')}}">
                                        <button type="submit" class="btn essence-btn btn-primary">Add to Cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>