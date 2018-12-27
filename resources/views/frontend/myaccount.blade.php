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
                            <h2>My Account</h2>
                            <div id="tabs">
                                <ul>
                                    <li><a href="#tabs-1">Information</a></li>
                                    <li><a href="#tabs-2">My Orders</a></li>
                                </ul>
                                <div id="tabs-1">
                                    <?php 
                                        $customers = \DB::table('customers')->where('id','=',session("id"))->first(); 
                                        $provinces = \DB::table('provinces')->where('id','=',$customers->province_id)->first(); 
                                        $cities = \DB::table('cities')->where('id','=',$customers->cities_id)->first(); 
                                    ?>
                                    <a href="{{url('/edit-account')}}" class="pull-right"><i class="fa fa-pencil"></i> Edit Account</a>
                                    <table class="table">
                                        <tr>
                                            <td width="150px;"><b>Customer ID</b></td>
                                            <td>: {{$customers->id}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Nama Lengkap</b></td>
                                            <td>: {{$customers->name}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Email</b></td>
                                            <td>: {{$customers->email}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Provinsi</b></td>
                                            <td>: {{$provinces->province}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Kota</b></td>
                                            <td>: {{$cities->city_name}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Alamat</b></td>
                                            <td>: {{$customers->alamat}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Kode Pos</b></td>
                                            <td>: {{$customers->kode_pos}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Tanggal Register</b></td>
                                            <td>: {{date('d F Y',strtotime($customers->created_at))}}</td>
                                        </tr>
                                    </table>  
                                </div>
                                <div id="tabs-2" style="overflow-x:auto;">
                                    <?php 
                                        $orders = \DB::table('orders')->where('id_customers',$customers->id)->orderBy('order_date', 'DESC')->paginate(10); 
                                    ?>
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>Order No</th>
                                            <th>Order Date</th>
                                            @if(!empty($orders[0]->kurir))
                                            <th>Kurir</th>
                                            @endif
                                            <th>Grand Total</th>
                                            <th>Order Status</th>
                                            <th>Payment Method</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $i => $order)
                                                <tr>
                                                    <td >{{$order->order_no}}</td>
                                                    <td >{{date('d M Y',strtotime($order->order_date))}}</td>
                                                    @if(!empty($order->kurir))
                                                    <td>
                                                        {{$order->kurir}}
                                                    </td>
                                                    @endif
                                                    <td width="120px">Rp. {{number_format($order->grand_total,2,',','.')}}</td>
                                                    <td>
                                                        <?php $order_status = \DB::table('order_statuses')->where('id',$order->id_order_statuses)->get() ?>
                                                        <label>
                                                            <b>{{$order_status[0]->name}}</b>
                                                        </label>
                                                    </td>
                                                    <td >{{$order->payment}}</td>
                                                    <td><a href=" {{url('/invoices'.'/'.$order->order_no)}} "><i class="fa fa-print"></i> Print</a></td>
                                                </tr>        
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{$orders->links()}}
                                </div>
                            </div>  
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
    <script>
        $( function() {
            $( "#tabs" ).tabs();
        } );
    </script>

</body>

</html>