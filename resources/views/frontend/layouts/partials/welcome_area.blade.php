<?php $banner = \DB::table('banner')->where('status','on')->first();?>
<section class="welcome_area bg-img background-overlay" style="background-image: url( {{asset('/'.$banner->image)}}">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="hero-content">
                    <h6> {{$banner->description}} </h6>
                    <h2> {{$banner->title}} </h2>
                    <a href="{{ $banner->link_button }}" class="btn essence-btn"> {{ $banner->text_button }} </a>
                </div>
            </div>
        </div>
    </div>
</section>