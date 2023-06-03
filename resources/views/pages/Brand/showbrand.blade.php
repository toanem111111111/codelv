@extends('layout')
@section('content')
    <div class="features_items"><!--features_items-->

{{--        @foreach($brand as $key => $name)--}}

{{--            <h2 class="title text-center">{{$name->brand_name}}</h2>--}}

{{--        @endforeach--}}
        @foreach($product as $key => $pro)
            <a href="{{URL::to('/chi-tiet-san-pham/'.$pro->id_product)}}">
                <div class="col-sm-4">
                    <div class="product-image-wrapper">

                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{URL::to('public/uploads/product/'.$pro->image_product)}}" alt="" />
                                <h2>{{number_format($pro->price_product).' '.'VNĐ'}}</h2>
                                <p>{{$pro->name_product}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                            </div>

                        </div>

                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                                <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                            </ul>
                        </div>

                    </div>

                </div>
            </a>
        @endforeach
    </div><!--features_items-->
    {{ $product->links()}}
    <!--/recommended_items-->
@endsection
