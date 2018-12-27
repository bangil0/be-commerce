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
                            <?php 
                                $pval = \DB::table('provinces')->where('id','=',$customer->province_id)->first(); 
                                $cval = \DB::table('cities')->where('id','=',$customer->cities_id)->first();  
                            ?>
                            <h2> Edit Account </h2>
                            <form action="{{route('login.edit')}}" method="post">
                                <table class="table">
                                    <tr>
                                        <td width="150px;"><b>Customer ID</b></td>
                                        <td><input type="text" class="form-control" value="{{$customer->id}}" readonly></td>
                                    </tr>
                                    <tr>
                                        <td><b>Nama Lengkap</b></td>
                                        <td><input type="text" name="nama_lengkap" class="form-control" value="{{$customer->name}}"></td>
                                    </tr>
                                    <tr>
                                        <td><b>Email</b></td>
                                        <td><input type="text" name="email" class="form-control" value="{{$customer->email}}"></td>
                                    </tr>
                                    <tr>
                                        <td><b>No. HP</b></td>
                                        <td><input type="text" name="nomor_hp" class="form-control" value="{{$customer->nomor_hp}}"></td>
                                    </tr>
                                    <tr>
                                        <td><b>Gender</b></td>
                                        <td>
                                            @if($customer->gender = 'Laki-laki')
                                            <input required type="radio" name="gender" value="Laki-Laki" checked> Laki-Laki 
                                            <input required type="radio" name="gender" value="Perempuan" style="margin-left: 20px;"> Perempuan
                                            @else
                                            <input required type="radio" name="gender" value="Laki-Laki"> Laki-Laki 
                                            <input required type="radio" name="gender" value="Perempuan" style="margin-left: 20px;" checked> Perempuan
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Provinsi</b></td>
                                        <td>
                                        <select name="province" id="option1" class="form-control">
                                                <option value="{{$customer->province_id}}">{{$pval->province}}</option>
                                            @foreach($provinces as $province)
                                                <option value="{{$province->id}}">{{$province->province}}</option>
                                            @endforeach
                                        </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Kota</b></td>
                                        <td>
                                        <select name="city" id="option2" class="form-control">
                                            <option value="{{$customer->cities_id}}">{{$cval->city_name}}</option>
                                                @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{$city->city_name}}</option>
                                            @endforeach
                                        </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Alamat</b></td>
                                        <td><textarea name="alamat" id="" cols="30" rows="3" class="form-control">{{$customer->alamat}}</textarea></td>
                                    </tr>
                                    <tr>
                                        <td><b>Kode Pos</b></td>
                                        <td><input type="text" name="kode_pos" class="form-control" value="{{$customer->kode_pos}}"></td>
                                    </tr>
                                </table> 
                                {{csrf_field()}}
                                <button type="submit" class="btn essence-btn">Submit</button>
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
    <script>
         $(document).ready(function(){
            setInterval(function(){
                $('.nice-select').remove();
            },500)
            document.getElementById("option1").style.display = ''
            document.getElementById("option2").style.display = ''
        })

        $(document).ready(function(){
        var $provinsi = $("#option1");
            $provinsi.change(function(){
                var id_provinsi = $(this).val();
                fetchAmbilKota(id_provinsi);
            });
        })

        function fetchAmbilKota(id_provinsi){
            $.getJSON("{{url('admin/api/city')}}", {
                id_provinsi:id_provinsi
            })
            .done(function(res){
                var kota = res.respon_kota;
                updateOpsiKota(kota);
            })
            .fail(function(xhr){
                alert("Gagal")
            })
        }

        function updateOpsiKota(kota){
            var $selectKota = $("#option2");
            $selectKota.find("option").remove();

            for (i in kota){
                var kota_satuan = kota[i];
                var option = " <option value='"+kota_satuan.cities_id+"'>"+kota_satuan.city_name+"</option>";
                $selectKota.append(option);
            }
        }
    </script>

</body>

</html>