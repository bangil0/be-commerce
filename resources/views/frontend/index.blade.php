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

    <!-- ##### Welcome Area Start ##### -->
    @include('frontend.layouts.partials.welcome_area')
    <!-- ##### Welcome Area End ##### -->

    <!-- ##### Top Catagory Area Start ##### -->
    @include('frontend.layouts.partials.top_category')
    <!-- ##### Top Catagory Area End ##### -->

    <!-- ##### CTA Area Start ##### -->
    @include('frontend.layouts.partials.cta')
    <!-- ##### CTA Area End ##### -->

    <!-- ##### New Arrivals Area Start ##### -->
    @include('frontend.layouts.partials.new_arrival')
    <!-- ##### New Arrivals Area End ##### -->

    <!-- ##### Brands Area Start ##### -->
    @include('frontend.layouts.partials.brands')
    <!-- ##### Brands Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    @include('frontend.layouts.partials.footer')
    <!-- ##### Footer Area End ##### -->

    @include('frontend.layouts.partials.script')
    
</body>

</html>