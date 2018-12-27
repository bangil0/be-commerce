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
                            <h2>Your Order Has Been Received.</h2>
                            <h4>Thank you for your purchase!</h4>
                            <br><br>
                            Your Order # is <br>
                            <p>{{$order->order_no}}</p>
                            Date : <br>
                            <p>{{date('d M Y',strtotime($order->order_date))}}</p>
                            Jumlah yang harus dibayar : <br>
                            <p>Rp. {{$order->grand_total}}</p>
                            Payment Method :
                            <p>{{$order->payment}}</p>
                            Silahkan, Transfer pembayaran ke nomor rekening : <br>
                            <p><img src="https://ecs7.tokopedia.net/img/toppay/thanks/bca.png" style="height: 40px;margin-right: 20px;margin-top: -5px"> 
                            <b style="font-size: 25px"> 123 456 7890</b> <br> a/n PT. Nama Perusahaan Di Sini </p>
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