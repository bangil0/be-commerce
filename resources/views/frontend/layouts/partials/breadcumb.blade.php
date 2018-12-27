<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url({{asset('essence')}}/img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    @if(!empty(Request::segment(2)))
                    <h2>{{Request::segment(2)}}</h2>
					@else
                    <h2>
                        @if(Request::segment(1) == 'checkout-coupons')
                            CHECKOUT
                        @else
                        {{Request::segment(1)}}
                        @endif
                    </h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->