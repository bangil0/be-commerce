<div class="cta-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php $promo = \DB::table('promo')->where('status','on')->first();?>
                <div class="cta-content bg-img background-overlay" style="background-image: url( {{asset('/'.$promo->image)}}"> 
                    <div class="h-100 d-flex align-items-center justify-content-end">
                        <div class="cta--text">
                            <h6>{{$promo->percent}}</h6>
                            <h2>{{$promo->title}}</h2>
                            <a href="{{$promo->link}}" class="btn essence-btn">{{$promo->button_text}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>