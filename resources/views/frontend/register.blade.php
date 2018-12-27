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
                <div class="col-6">
                    <div class="regular-page-content-wrapper section-padding-80">
                        <div class="regular-page-text">
                            <form action="{{route('login.storeregister')}}" method="post">
                                <h2> Register </h2>
                                @if($errors->any())
                                <label type="label" class="btn btn-sm" style="background-color:red;color: white">
                                    {{$errors->first()}}
                                </label><br>
                                @endif
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required><br>
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" required><br>
                                <input required type="radio" name="gender" value="Laki-Laki"> Laki-Laki 
                                <input required type="radio" name="gender" value="Perempuan" style="margin-left: 20px;"> Perempuan
                                <br><br>
                                <label> Password </label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required><br>
                                <label> Konfirmasi Password </label>
                                <input type="password" class="form-control" placeholder="Password" required><br>
                                {{csrf_field()}}
                                <button type="submit" class="essence-btn">Daftar</button>
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