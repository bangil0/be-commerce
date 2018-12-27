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

    <!-- ##### Blog Wrapper Area Start ##### -->
    <div class="blog-wrapper section-padding-80">
        <div class="container">
            <div class="row">
               
                <!-- Single Blog Area -->
                @foreach($blogs as $blog)
                <div class="col-12 col-lg-6">
                    <div class="single-blog-area mb-50">
                        <img src="{{asset('essence')}}/img/bg-img/blog1.jpg" alt="">
                        <!-- Post Title -->
                        <div class="post-title">
                            <a href=" blog/{{$blog->slug}} "> {{$blog->title}} </a>
                        </div>
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <!-- Post Title -->
                            <div class="hover-post-title">
                                <a href=" blog/{{$blog->slug}} ">{{$blog->title}}</a>
                            </div>
                            <p>{!!$blog->content!!}</p>
                            <a href=" blog/{{$blog->slug}} ">Continue reading <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            
            </div>
        </div>
    </div>
    <!-- ##### Blog Wrapper Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    @include('frontend.layouts.partials.footer')
    <!-- ##### Footer Area End ##### -->
    
    @include('frontend.layouts.partials.script')
    
</body>

</html>