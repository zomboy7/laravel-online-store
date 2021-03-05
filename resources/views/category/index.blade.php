@extends('_layouts.base')

@section('content')
        <div class="shop_grid">
            <div class="shop_sidebar_area">
                <a id="shop_sidebar_btn" href="#">
                    <span class="material-icons">filter_alt</span>
                    <p>Filter</p>
                </a>
                <div id="shop_sidebar_wrapper">
                    @if($category->childs->isNotEmpty())
                        <div class="widget catagory mb-50">
                            <h6 class="widget-title mb-30">Catagories</h6>

                            <div class="catagories-menu">
                                <ul>
                                    <li class="active">
                                        <a href="#">All</a>
                                    </li>
                                    <li>
                                        <a href="#">Beds</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    @endif
                    <!-- ##### Single Widget ##### -->
                    <div class="widget brands mb-50">
                        <!-- Widget Title -->
                        <h6 class="widget-title mb-30">Brands</h6>

                        <div class="widget-desc">
                            <!-- Single Form Check -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="amado">
                                <label class="form-check-label" for="amado">Amado</label>
                            </div>
                            <!-- Single Form Check -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="ikea">
                                <label class="form-check-label" for="ikea">Ikea</label>
                            </div>
                            <!-- Single Form Check -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="furniture">
                                <label class="form-check-label" for="furniture">Furniture Inc</label>
                            </div>
                            <!-- Single Form Check -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="factory">
                                <label class="form-check-label" for="factory">The factory</label>
                            </div>
                            <!-- Single Form Check -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="artdeco">
                                <label class="form-check-label" for="artdeco">Artdeco</label>
                            </div>
                        </div>
                    </div>

                    <!-- ##### Single Widget ##### -->
                    <div class="widget color mb-50">
                        <!-- Widget Title -->
                        <h6 class="widget-title mb-30">Color</h6>

                        <div class="widget-desc">
                            <ul class="d-flex">
                                <li><a href="#" class="color1"></a></li>
                                <li><a href="#" class="color2"></a></li>
                                <li><a href="#" class="color3"></a></li>
                                <li><a href="#" class="color4"></a></li>
                                <li><a href="#" class="color5"></a></li>
                                <li><a href="#" class="color6"></a></li>
                                <li><a href="#" class="color7"></a></li>
                                <li><a href="#" class="color8"></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- ##### Single Widget ##### -->
                    <div class="widget price mb-50">
                        <!-- Widget Title -->
                        <h6 class="widget-title mb-30">Price</h6>

                        <div class="widget-desc">
                            <div class="slider-range">
                                <div data-min="10"
                                     data-max="1000"
                                     data-unit="$"
                                     class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                                     data-value-min="10"
                                     data-value-max="1000"
                                     data-label-result="">
                                    <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                </div>
                                <div class="range-price">$10 - $1000</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                <!-- Total Products -->
                <div class="total-products">
                    <p>Showing 1-8 0f 25</p>
                    <div class="view d-flex">
                        <a href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                    </div>
                </div>
                <!-- Sorting -->
                <div class="product-sorting d-flex">
                    <div class="sort-by-date d-flex align-items-center mr-15">
                        <p>Sort by</p>
                        <form action="#" method="get">
                            <select name="select" id="sortBydate">
                                <option value="value">Date</option>
                                <option value="value">Newest</option>
                                <option value="value">Popular</option>
                            </select>
                        </form>
                    </div>
                    <div class="view-product d-flex align-items-center">
                        <p>View</p>
                        <form action="#" method="get">
                            <select name="select" id="viewProduct">
                                <option value="value">12</option>
                                <option value="value">24</option>
                                <option value="value">48</option>
                                <option value="value">96</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
            <div class="amado_product_area">
                <div class="row">
                    @foreach($products as $item)
                        @include('category.catalog-product-block', ['item' => $item])
                    @endforeach
                </div>

                <div class="row">
                    <div class="col-12">
                        <!-- Pagination -->
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
@endsection
