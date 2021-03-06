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

    <!-- ##### Blog Wrapper Area Start ##### -->
    <div class="single-blog-wrapper">

        <!-- Single Blog Post Thumb -->
        <div class="single-blog-post-thumb">
            <img src="{{asset('essence')}}/img/bg-img/bg-8.jpg" alt="">
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="regular-page-content-wrapper section-padding-80">
                        <div class="regular-page-text">
                            <form action="{{url('/authuser')}}" method="post">
                                <h2>Login</h2>
                                @if($errors->any())
                                <label type="label" class="btn btn-sm" style="background-color:red;color: white">
                                    {{$errors->first()}}
                                </label>
                                <br>
                                <br>
                                @endif
                                <label> <i class="fa fa-users"></i> Username</label>
                                <input class="form-control" type="email" placeholder="Email" name="email">
                                <br>
                                <label> <i class="fa fa-shield" ></i>Password</label>
                                <input class="form-control" type="password" placeholder="Password" name="password">
                                <br>
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-success"> Login </button>
                            </form>
                        </div>
                    </div>
                </div>
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