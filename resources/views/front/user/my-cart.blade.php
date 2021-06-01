@extends('front.layout.layout')
@section('content')
    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <li><a href="#">Fresh Meat</a></li>
                            <li><a href="#">Vegetables</a></li>
                            <li><a href="#">Fruit & Nut Gifts</a></li>
                            <li><a href="#">Fresh Berries</a></li>
                            <li><a href="#">Ocean Foods</a></li>
                            <li><a href="#">Butter & Eggs</a></li>
                            <li><a href="#">Fastfood</a></li>
                            <li><a href="#">Fresh Onion</a></li>
                            <li><a href="#">Papayaya & Crisps</a></li>
                            <li><a href="#">Oatmeal</a></li>
                            <li><a href="#">Fresh Bananas</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($carts) && count($carts) > 0)
                                @foreach($carts as $cart)
                            <tr id="item-product-{{$cart->product->id}}" class="tab_content">
                                <td class="shoping__cart__item">
                                    <img height="150px" width="150px" src="{{asset('assets/images/admin/products/'.\App\Models\ProductImage::where('product_id' , $cart->product->id)->latest()->first()->image_name)}}" alt="">
                                    <h5>{{$cart->product->name}}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    ${{$cart->product->price}}
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="{{$cart->quantity}}" class="count-quat-{{$cart->product->id}} jsQuantity">

                                        </div>
                                    </div>
                                </td>
                                <td class="shoping__cart__total">
                                    ${{$cart->finalPrice()}}
                                </td>
                                <td class="shoping__cart__item__close">
                                    <form action="{{route('front.delete.product.from.cart',$cart->product->id)}}" method="post">
                                        @csrf
                                        <button type="submit"><span class="icon_close"></span></button>
                                    </form>
                                </td>
                            </tr>
                                @endforeach

                            @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="{{route('front.coupon_discount')}}" method="post">
                                @csrf
                                <input type="text" name="coupon_discount" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Total <span>${{$total}}</span></li>
                        </ul>
                        <a href="{{route('front.checkout' , $total)}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->


@endsection

@section('script')
    <script>

        $(function(){
            $(".inc").click(function(){
                var id = $(this).closest('.tab_content').attr('id').replace('item-product-','');
                var i = parseInt(id);
                var quantity = $(this).parent().find('.jsQuantity').val();
                newQuantity = quantity * 1 + 1;
                $(this).parent().find('.jsQuantity').val( newQuantity ).change();
                $.ajax({
                    type : 'post',
                    enctype : 'multipart/form-data',
                    url :'{{route('front.add.cart.ajax')}}',
                    data : {
                        '_token' : "{{csrf_token()}}",
                        'id' : i,
                        'qty' : newQuantity
                    },
                    success:function (data) {

                        if (data.status == true){
                            alert(data.msg)
                            location.reload(true);
                            // $('#succes-msg').show();

                        }else{

                        }

                    }, error:function (reject) {

                    }
                });

            });
            $(".dec").click(function(){
                var id = $(this).closest('.tab_content').attr('id').replace('item-product-','');
                var i = parseInt(id);
                var quantity = $(this).parent().find('.jsQuantity').val();
                newQuantity = quantity * 1 - 1;
                $(this).parent().find('.jsQuantity').val( newQuantity ).change();
                $.ajax({
                    type : 'post',
                    enctype : 'multipart/form-data',
                    url :'{{route('front.delete.cart.ajax')}}',
                    data : {
                        '_token' : "{{csrf_token()}}",
                        'id' : i,
                        'qty' : newQuantity
                    },
                    success:function (data) {

                        if (data.status == true){
                            alert(data.msg)
                            location.reload(true);
                            // $('#succes-msg').show();

                        }else{

                        }

                    }, error:function (reject) {

                    }
                });

            });
        });




    </script>

@endsection
