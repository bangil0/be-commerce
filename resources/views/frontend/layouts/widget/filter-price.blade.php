<form action="{{route('shop.filter')}}" method="get">
<div class="widget price mb-50">
    <h6 class="widget-title mb-30">Filter by Price</h6>
        <select name="category" id="category" class="form-control" style="margin-bottom: 10px;height: 30px;"> 
            <option value="all">All</option>
        @foreach($categorys as $i => $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
        </select>
        <input type="text" name="product_name" class="form-control" placeholder="Product Name" style="margin-bottom: 10px;height: 30px">
        <input type="number" name="min" class="form-control" placeholder="Min Price" style="margin-bottom: 10px;height: 30px">
        <input type="number" name="max" class="form-control" placeholder="Max Price" style="margin-bottom: 10px;height: 30px">
        <button type="submit" class="btn btn-info btn-sm">Tampilkan</button>
    <!-- <div class="widget-desc">
        <div class="slider-range">
            <div data-min="49" data-max="360" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="49" data-value-max="360" data-label-result="Range:">
                <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
            </div>
            <div class="range-price">Range: $49.00 - $360.00</div>
        </div>
    </div> -->
</div>
</form>