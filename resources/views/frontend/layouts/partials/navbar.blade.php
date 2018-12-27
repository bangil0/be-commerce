<nav class="classy-navbar" id="essenceNav">
    <!-- Logo -->
    <?php $settings = \DB::table('cms_settings')->get(); ?>
    <a class="nav-brand" href="{{ route('home') }}"><img src="{{asset($settings[11]->content)}}" alt=""></a>
    <!-- Navbar Toggler -->
    <div class="classy-navbar-toggler">
        <span class="navbarToggler"><span></span><span></span><span></span></span>
    </div>
    <!-- Menu -->
    <div class="classy-menu">
        <!-- close btn -->
        <div class="classycloseIcon">
            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
        </div>
        <!-- Nav Start -->
        <div class="classynav">
            <ul>
                <!-- <li><a href="#">Shop</a>
                    <div class="megamenu">
                        <ul class="single-mega cn-col-4">
                            <li class="title">Women's Collection</li>
                            <li><a href="shop">Dresses</a></li>
                            <li><a href="shop">Blouses &amp; Shirts</a></li>
                            <li><a href="shop">T-shirts</a></li>
                            <li><a href="shop">Rompers</a></li>
                            <li><a href="shop">Bras &amp; Panties</a></li>
                        </ul>
                        <ul class="single-mega cn-col-4">
                            <li class="title">Men's Collection</li>
                            <li><a href="shop">T-Shirts</a></li>
                            <li><a href="shop">Polo</a></li>
                            <li><a href="shop">Shirts</a></li>
                            <li><a href="shop">Jackets</a></li>
                            <li><a href="shop">Trench</a></li>
                        </ul>
                        <ul class="single-mega cn-col-4">
                            <li class="title">Kid's Collection</li>
                            <li><a href="shop">Dresses</a></li>
                            <li><a href="shop">Shirts</a></li>
                            <li><a href="shop">T-shirts</a></li>
                            <li><a href="shop">Jackets</a></li>
                            <li><a href="shop">Trench</a></li>
                        </ul>
                        <div class="single-mega cn-col-4">
                            <img src="{{asset('essence')}}/img/bg-img/bg-6.jpg" alt="">
                        </div>
                    </div>
                </li> -->
                <li><a href=" {{route('shop')}} ">Shop</a></li>
                <li><a href="#">Products</a>
                    <ul class="dropdown">
                        <?php $nav_pcs = \DB::table('products_category')->get(); ?>
                        @foreach($nav_pcs as $nav_pc)                        
                            <li><a href="{{url('/products-category/'.$nav_pc->name)}}"> {{$nav_pc->name}} </a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{route('blog.index')}}">Blog</a></li>
                <li><a href="{{route('contact')}}">Contact</a></li>
            </ul>
        </div>
        <!-- Nav End -->
    </div>
</nav>