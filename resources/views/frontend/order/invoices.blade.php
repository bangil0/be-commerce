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
                        <?php $settings = \DB::table('cms_settings')->get(); ?>
                        <page size="A4" style="padding: 30px" id="areaPrint">
                            <a class="nav-brand" href="/"><img src="{{asset($settings[11]->content)}}" style="height:30px"></a>
                            <input type="button" class="btn btn-sm btn-primary pull-right" onclick="printDiv('areaPrint')" value="Print" />
                            <br>
                            <br>
                            <br>
                            <b style="font-size: 20px;">Invoices</b>
                            <br>
                            <br>
                            <table>
                                <tr>
                                    <td width="100px">Atas Nama </td>
                                    <td width="350px">: <b>{{$settings[9]->content}}</b> </td>
                                    <td>Pembayaran </td>
                                    <td>: <b>{{$order[0]->payment}}</b></td>
                                </tr>
                                <tr>
                                    <td>Nomor</td>
                                    <td>: <b>{{$order[0]->order_no}}</b></td>
                                    <td>Status</td>
                                    <?php $status = \DB::table('order_statuses')->where('id',$order[0]->id_order_statuses)->first(); ?>
                                    <td>: {{$status->name}} </td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>: <b>{{date('d F Y',strtotime($order[0]->order_date))}}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>
                            <table style="margin-top: 20px" class="table table-striped">
                                <tr>
                                    <td width="200px"><b>Nama Produk</b></td>
                                    <td width="200px"><b>QTY</b></td>
                                    <td width="200px"><b>Harga Barang</b></td>
                                    <td width="200px"><b>Subtotal</b></td>
                                </tr>
                                @foreach($order as $i => $ord)
                                <tr>
                                    <td> {{$ord->product_name}} </td>
                                    <td> {{$ord->qty}} </td>
                                    <td> Rp. {{$ord->price}} </td>
                                    <td> Rp. {{$ord->subtotal}} </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td><b>Subtotal : </b></td>
                                    <td></td>
                                    <td></td>
                                    <td><b>Rp. {{$order[0]->total_products}}</b></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td><b>Discounts :</b></td>
                                    <td><b>{{$order[0]->discounts}}</b></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td><b>Shipping :</b></td>
                                    <td><b>Rp. {{$order[0]->shipping}} <br> ({{$order[0]->kurir}}) </b></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Grand Total :</td>
                                    <td><b>Rp. {{$order[0]->grand_total}}</b></td>
                                </tr>
                            </table>
                            <hr>
                            <br>
                            <b style="font-size: 16px;">Tujuan Pengiriman</b>
                            <br>
                            <br>
                            <div class="col-md-6">
                                <b>{{$customer->name}}</b><br>
                                {{$customer->alamat}} <br>
                                {{$customer->city_name}}, {{$customer->kode_pos}} <br>
                                {{$customer->province_name}} <br>
                                {{$customer->nomor_hp}}
                            </div>
                        </page>
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
    <script>
        function printDiv(areaPrint) {
         var printContents = document.getElementById(areaPrint).innerHTML;
         var originalContents = document.body.innerHTML;

         document.body.innerHTML = printContents;

         window.print();

         document.body.innerHTML = originalContents;
    }
    </script>

</body>

</html>