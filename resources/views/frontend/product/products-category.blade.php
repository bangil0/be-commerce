<!DOCTYPE html>
<html lang="en">

@include('frontend.layouts.partials.head')

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            @include('frontend.layouts.partials.navbar')

            <!-- Header Meta Data -->
            @include('frontend.layouts.partials.header_meta')
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Right Side Cart Area ##### -->
    @include('frontend.layouts.partials.cart')
    <!-- ##### Right Side Cart End ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
    @include('frontend.layouts.partials.breadcumb')
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">

                        <!-- ##### Single Widget ##### -->
                        @include('frontend.layouts.widget.category')

                        <!-- ##### Single Widget ##### -->
                        @include('frontend.layouts.widget.filter-price')
                        
                        
                        <!-- ##### Single Widget ##### -->
                        <!-- @include('frontend.layouts.widget.filter-color') -->

                        <!-- ##### Single Widget ##### -->
                        <!-- @include('frontend.layouts.widget.brands') -->
                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
                                    <div class="total-products">
                                        <p><span>{{$cp->count()}}</span> products found</p>
                                    </div>
                                    <!-- Sorting -->
                                    <!-- <div class="product-sorting d-flex">
                                        <p>Sort by:</p>
                                        <form action="#" method="get">
                                            <select name="select" id="sortByselect">
                                                <option value="value">Highest Rated</option>
                                                <option value="value">Newest</option>
                                                <option value="value">Price: $$ - $</option>
                                                <option value="value">Price: $ - $$</option>
                                            </select>
                                            <input type="submit" class="d-none" value="">
                                        </form>
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Single Product -->
                            @foreach($products as $i => $product) 
                            <div class="col-12 col-sm-6 col-lg-4">
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
                                            Qty : {{$product->qty}}
                                        </a>
                                        <p class="product-price"><!-- <span class="old-price">$75.00</span> --> Rp. {{number_format($product->price,2,',','.')}}</p>

                                        <!-- Hover Content -->
                                        <div class="hover-content">
                                            <!-- Add to Cart -->
                                            <div class="add-to-cart-btn">
                                                <form action="{{route('cart.submit')}}" method="post">
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
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Pagination -->
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    @include('frontend.layouts.partials.footer')
    <!-- ##### Footer Area End ##### -->

    @include('frontend.layouts.partials.script')
    <script>
    $(function(){
        setInterval(function(){
            $('.nice-select').remove();
        },500)
        document.getElementById("category").style.display = ''
    })
    </script>

</body>

</html>