<div class="header-meta d-flex clearfix justify-content-end">
    <!-- Search Area -->
    <div class="search-area">
        <form action="{{url('/search-product')}}" method="get">
            <input type="search" name="search" id="headerSearch" placeholder="Type for search">
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
    </div>
    <!-- Favourite Area -->
    <div class="favourite-area">
        <!-- <a href="#"><img src="{{asset('essence')}}/img/core-img/heart.svg" alt=""></a> -->
    </div>
    <!-- User Login Info -->
    @if(!empty(session('id')))
        <div class="user-login-info">
            <a href=" {{url('/my-account')}} "><img src="{{asset('essence')}}/img/core-img/user.svg" alt=""></a>
        </div>
        <div class="user-login-info">
            <a href=" {{url('/logout')}} "><img src="{{asset('essence')}}/img/core-img/exit.png" alt=""></a>
        </div>
    @else
    <div class="user-login-info">
        <a href=" {{url('/my-account')}} ">Login </a>
    </div>
    <div class="user-login-info">
        <a href=" {{url('/register')}} ">Sign Up </a>
    </div>
    @endif
    <!-- Cart Area -->
    <div class="cart-area">
        <?php $carts = 
            \DB::table('carts')
            ->join('products','products.id','carts.id_products')
            ->where('id_customers',session('id'))->get();
        ?>
        <a href="#" id="essenceCartBtn"><img src="{{asset('essence')}}/img/core-img/bag.svg" alt=""> <span>{{$carts->count()}}</span></a>
    </div>
</div>