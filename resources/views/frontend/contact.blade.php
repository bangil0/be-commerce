<!DOCTYPE html>
<html lang="en">

@include('frontend.layouts.partials.head')
<?php $settings = DB::table('cms_settings')->get(); ?>
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


    <div class="contact-area d-flex align-items-center">

        <div class="google-map">
            <!-- <div id="googleMap"></div> -->
            <div>
                {!!$settings[23]->content!!}
            </div>
        </div>

        <div class="contact-info">
            <h2>How to Find Us</h2>
            <p>{!!$settings[16]->content!!}</p>

            <div class="contact-address mt-50">
                <p><span>email:</span> <a href="mailto:{{$settings[23]->content}}">{{$settings[17]->content}}</a></p>
                <p><span>telephone:</span> {{$settings[18]->content}}</p>
                <p>{{$settings[9]->content}}</p>
            </div>
        </div>
    </div>

    <!-- ##### Footer Area Start ##### -->
    @include('frontend.layouts.partials.footer')
    <!-- ##### Footer Area End ##### -->

    @include('frontend.layouts.partials.script')

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwuyLRa1uKNtbgx6xAJVmWy-zADgegA2s"></script>
    <script src="{{asset('essence')}}/js/map-active.js"></script>

</body>

</html>