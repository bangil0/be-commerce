<div class="cart-bg-overlay"></div>

<div class="right-side-cart-area">
    <?php $carts = 
        \DB::table('carts')
        ->select(DB::raw('carts.id as cartid'),'products.*')
        ->join('products','products.id','carts.id_products')
        ->where('id_customers',session('id'))->get();
    ?>
    <!-- Cart Button -->
    <div class="cart-button">
        <a href="#" id="rightSideCart"><img src="{{asset('essence')}}/img/core-img/bag.svg" alt=""> <span>{{$carts->count()}}</span></a>
    </div>

    <div class="cart-content d-flex">

        <!-- Cart List Area -->
        <div class="cart-list">
            @foreach($carts as $i => $cart)
            <!-- Single Cart Item -->
            <div class="single-cart-item">
                <span class="product-image">
                    <img src="{!!$cart->cover!!}" class="cart-thumb" alt="">
                    <!-- Cart Item Desc -->
                    <div class="cart-item-desc">
                        <form action="{{route('cart.delete')}}" method="post">
                            {{csrf_field()}}
                            <button type="submit" class="product-remove btn-sm btn-danger" style="color: white"><i class="fa fa-close" aria-hidden="true"></i></button>
                            <input type="hidden" name="id" value="{{$cart->cartid}}">
                            <input type="hidden" name="url" value="{{url()->full()}}">
                        </form>
                        <span class="badge">
                            <?php $cpc = \DB::table('products_category')->where('id',$cart->id_products_category)->first(); ?>
                            {{$cpc->name}}
                        </span>
                        <h6>{{$cart->name}}</h6>
                        <!-- 
                        <p class="size">Size: S</p>
                        <p class="color">Color: Red</p> 
                        --> 
                        <br>
                        <p class="price">Rp. {{number_format($cart->price,2,',','.')}}</p>
                    </div>
                </span>
            </div>
            @endforeach
        </div>

        <!-- Cart Summary -->
        <div class="cart-amount-summary">

            <h2>Summary</h2>
            <ul class="summary-table">
                <li> <span>Total : </span> Rp. <span>{{number_format($carts->sum('price'),2,',','.')}} </span></li>
            </ul>
            @if(!empty($carts[0]))
            <div class="checkout-btn mt-100">
                <a href="{{url('/checkout')}}" class="btn essence-btn">check out</a>
            </div>
            @endif
        </div>
    </div>
</div>