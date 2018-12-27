<div class="widget catagory mb-50">
    <!-- Widget Title -->
    <h6 class="widget-title mb-30">Catagories</h6>

    <!--  Catagories  -->
    <div class="catagories-menu">
        <ul id="menu-content2" class="menu-content collapse show">
            <!-- Single Item -->
            <li data-toggle="collapse" data-target="#clothing">
                <a href="{{route('shop')}}">All</a>
            </li>
            @foreach($categorys as $i => $category)
            <li data-toggle="collapse" data-target="#clothing">
                <a href="{{url('products-category')}}/{{$category->name}}">{{$category->name}}</a>
                <!-- <ul class="sub-menu collapse show" id="clothing">
                    <li><a href="#">All</a></li>
                    <li><a href="#">Bodysuits</a></li>
                    <li><a href="#">Dresses</a></li>
                    <li><a href="#">Hoodies &amp; Sweats</a></li>
                    <li><a href="#">Jackets &amp; Coats</a></li>
                    <li><a href="#">Jeans</a></li>
                    <li><a href="#">Pants &amp; Leggings</a></li>
                    <li><a href="#">Rompers &amp; Jumpsuits</a></li>
                    <li><a href="#">Shirts &amp; Blouses</a></li>
                    <li><a href="#">Shirts</a></li>
                    <li><a href="#">Sweaters &amp; Knits</a></li>
                </ul> -->
            </li>
            @endforeach
            <!-- Single Item -->
        </ul>
    </div>
</div>