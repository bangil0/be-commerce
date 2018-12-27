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
    

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">
                        <?php 
                            $customers = \DB::table('customers')->where('email','=',session("email"))->first(); 
                            $provinces = \DB::table('provinces')->where('id','=',$customers->province_id)->first(); 
                            $cities = \DB::table('cities')->where('id','=',$customers->cities_id)->first(); 
                        ?>

                        <div class="cart-page-heading mb-30">
                            <h5>Billing Address</h5>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first_name">Nama Lengkap <span>*</span></label>
                                <input type="text" class="form-control" id="first_name" value=" {{$customers->name}} " readonly>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="alamat">Alamat <span>*</span></label>
                                <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="3" readonly>{{$customers->alamat}}</textarea>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="postcode">Postcode <span>*</span></label>
                                <input type="text" class="form-control" id="postcode" value="{{$customers->kode_pos}}" readonly>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="city">Town/City <span>*</span></label>
                                <input type="text" class="form-control" id="city" value="{{$cities->city_name}}" readonly>
                                <input type="hidden" class="form-control" id="id_city" value="{{$cities->cities_id}}" readonly>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="state">Province <span>*</span></label>
                                <input type="text" class="form-control" id="state" value="{{$provinces->province}}" readonly>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="phone_number">Phone No <span>*</span></label>
                                <input type="number" class="form-control" id="phone_number" min="0" value="{{$customers->nomor_hp}}" readonly>
                            </div>
                            <div class="col-12 mb-4">
                                <label for="email_address">Email Address <span>*</span></label>
                                <input type="email" class="form-control" id="email_address" value="{{$customers->email}}" readonly>
                            </div>
                            <div class="col-12 mb-4">
                                @if($errors->any())
                                <h6>Metode Pengiriman Belum di Tentukan</h6>
                                @endif
                                <label>Kurir <span>*</span></label> <br>
                                <select name="kurir" id="kurir" class="form-control">
                                    <option value="">Pilih Kurir</option>
                                    <option value="jne">Jalur Nugraha Ekakurir (JNE)</option>
                                    <option value="tiki">Titipan Kilat (TIKI)</option>
                                    <option value="pos">PT. POS Indonesia (POS)</option>
                                </select>
                            </div>
                            <div class="col-12 mb-4" id="createPilihan"></div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Your Order</h5>
                            <p>The Details</p>
                        </div>
            
                        <ul class="order-details-form mb-4">
                        <form action="{{route('checkout.order')}}" method="post">
                            <li><span>Product</span> <span>QTY</span> <span>Total</span></li>
                            @foreach($carts as $i => $cart)
                            <li>
                                <span>{{$cart->name}}</span>
                                <span><input type="number" id="qty_{{$i}}" name="qty[]" class="form-control" style="width:70px" value="1"></span>
                                <span id="price_{{$i}}">{{$cart->price}}</span>
                                <input type="hidden" name="id_products[]" value="{{$cart->id_products}}">
                            </li>
                            @endforeach
                            <li><span>Subtotal</span> 
                            <span><input type="text" name="subtotal" id="subtotal" value="0" class="form-control" readonly></span>
                            <li><span>Discount</span> 
                                <span>
                                    <input type="text" id="discount" name="amount_discount" class="form-control" value="0" readonly>
                                </span>
                            </li>
                            <li><span>Shipping</span> <span><input type="text" id="shipping" name="shipping" class="form-control" value="" required readonly></span></li>
                            <li>
                                <span>Total</span> 
                                <span>
                                    <input type="text" id="grand_total" name="grand_total" value="0" class="form-control" readonly>
                                </span>
                            </li>
                            <br>
                            <div>
                                <label for="">Metode Pembayaran</label> <br>
                                <input type="radio" class="radio" name="payment" value="Direct Bank Transfer" required> Direct Bank Transfer
                            </div>
                            <br>
                            <!-- input hidden -->
                            {{csrf_field()}}
                            <input type="hidden" id="ship_by" name="ship_by" class="form-control" value="">
                            <input type="hidden" id="costSelect" name="costSelect" class="form-control" value="0">
                            <input type="hidden" id="code_coupon" name="code_coupon" class="form-control" value="0">
                            <button type="submit" class="btn essence-btn" style="margin-top: 20px;">Place Order</button>
                        </form>
                        </ul>
                        <label for="">Coupons</label>
                        <form action="{{route('checkout.coupons')}}" method="get">
                        @if(!empty($coupons))
                            <input type="hidden" name="category" value="{{$carts[0]->id_products_category}}">
                            <span><input type="text" name="code" id="code" style="height: 30px;width: 250px" value="{{$coupons->code}}"></span>
                            <span><button class="btn btn-sm btn-info">Redeem</button></span>
                            <br>
                            Anda Mendapat Potongan {{$coupons->amount}}%
                            <input type="hidden" id="potongan_coupon" value="{{$coupons->amount}}">
                        @else
                            <input type="hidden" name="category" value="{{$carts[0]->id_products_category}}">
                            <span><input type="text" name="code" id="code" style="height: 30px;width: 250px" value=""></span>
                            <span><button class="btn btn-sm btn-info">Redeem</button></span>
                            <br>
                            @if($errors->any())
                                {{$errors->first()}}
                            @endif
                            <input type="hidden" id="potongan_coupon" value="0">
                        @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    @include('frontend.layouts.partials.footer')
    <!-- ##### Footer Area End ##### -->
    
    @include('frontend.layouts.partials.script')
    <script>
        $(document).ready(function(){
            setInterval(function(){
                $('.nice-select').remove();
            },500)
            document.getElementById("kurir").style.display = ''

            $("#kurir").change(function(){
                
                var id_kota = $("#id_city").val()
                var kurir = $("#kurir").val()
                $.getJSON("{{url('shipping-cost')}}", {
                    id_kota:id_kota,
                    kurir:kurir
                })
                .done(function(res){
                    createPilihan(res)
                })
                .fail(function(xhr){
                    alert("Gagal")
                })
            })
        })

        function createPilihan(res){
            $(document).ready(function(){
                $("#deleteLabelCost").remove();
                $("#costSelect").remove();
                $("#createPilihan").append("<label id='deleteLabelCost'>Costs</label>");
                $("#createPilihan").append("<select id='costSelect' class='form-control' required></select>");
                var l = res.response[0].costs.length
                var $responses = res.response[0]
                console.log($responses)
                for (i = 0; i < l; i++) { 
                    $('#costSelect').append($("<option/>", {
                        service: $("#kurir").val()+"-"+$responses.costs[i].service,
                        value: $responses.costs[i].cost[0].value,
                        text: $responses.costs[i].service +" (Rp. "+$responses.costs[i].cost[0].value+")"
                    }));
                }
            })
        }
    </script>
    <script>
        $(function(){
            $code = $("#code").val();
            $("#code_coupon").val($code);

            
            setInterval(function(){
                $val_shipping = $("#costSelect").val();

                $ship_by = $("#kurir").val();
                $("#shipping").val($val_shipping);
                $("#ship_by").value = $("#costSelect option:selected").attr("service")
                
                var $total_product = 0;
                var $subtotal = 0;
                var $potongan = 0;
                var $grand_total = 0;
                for($i=0;$i<{{$carts->count()}};$i++){
                    $qty = document.getElementById("qty_"+$i).value
                    $price = document.getElementById("price_"+$i).innerHTML
                    $total_product+=parseFloat($price)*parseInt($qty)
                    $total_product+=$total_product;
                }
                $("#subtotal").val($total_product);
                
                $potongan = $("#potongan_coupon").val();
                if($potongan != 0){
                    $("#discount").val($total_product*$potongan/100)
                    $shipping = $("#shipping").val()
                    $grand_total = $total_product-($total_product*$potongan/100)+parseInt($shipping)
                }else{
                    $shipping = $("#shipping").val()
                    $grand_total = $total_product+parseInt($shipping)
                }
                $("#grand_total").val($grand_total)
            },1000)
        })
    </script>
</body>
</html>