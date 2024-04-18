@extends('welcome')

@section('content')


<div class="row justify-content-center">
    <div class="col-md-10 text-center">
        <a href="{{ route('menu.index') }}" class="btn btn-primary rounded text-white"><i class="fa fa-arrow-circle-left"> Retourner sur les Menus</i></a>
    </div>
</div>

<div class="row justify-content-center">

    <div class="col-md-10 shadow-lg p-3 mt-3 mb-5 bg-white rounded">


        <!DOCTYPE html>
        <html lang="en">
        <head>
            <link rel="stylesheet" href="{{ asset('menu4/css/animate.css') }}" href="css/style.css">
            <link rel="stylesheet" href="{{ asset('menu4/css/owl.carousel.min.css') }}" href="css/style.css">
            <link rel="stylesheet" href="{{ asset('menu4/css/owl.theme.default.min.css') }}" href="css/style.css">
            <link rel="stylesheet" href="{{ asset('menu4/css/magnific-popup.css') }}" href="css/style.css">
            <link rel="stylesheet" href="{{ asset('menu4/css/flaticon.css') }}" href="css/style.css">
            <link rel="stylesheet" href="{{ asset('menu4/css/style.css') }}" href="css/style.css">
        </head>
        <body>
            <!-- ======= Menu Section ======= -->

            <section class="ftco-section">
                <div class="container">
                    <div class="row justify-content-center mb-5 pb-2">
                        <div class="col-md-7 text-center heading-section ftco-animate">
                            <span class="subheading">Specialtiés</span>
                            <h2 class="mb-4">Notre Menu</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="menu-wrap">
                                <div class="heading-menu text-center ftco-animate">
                                    <h3>Petit Déjeuner</h3>
                                </div>
                                @foreach ($m1 as $m)
                                <div class="menus d-flex ftco-animate">
                                    <div class="menu-img img" style="background-image: url({{ asset('storage/productImages/'.$m->product->prod_img) }});"></div>
                                    <div class="text">
                                        <div class="d-flex">
                                            <div class="one-half">
                                                <h3>{{ $m->product->prod_name }}</h3>
                                            </div>
                                            <div class="one-forth">
                                                <span class="price">{{ $m->price }} GNF</span>
                                            </div>
                                        </div>
                                        <p><span style="font-size: 12px;">{{ $m->product->prod_desc }}</span></p>
                                    </div>
                                </div>
                                @endforeach

                                {{-- <div class="menus d-flex ftco-animate">
                                    <div class="menu-img img" style="background-image: url({{ asset('menu4/images/breakfast-2.jpg') }});"></div>
                                    <div class="text">
                                        <div class="d-flex">
                                            <div class="one-half">
                                                <h3>Beef Roast Source</h3>
                                            </div>
                                            <div class="one-forth">
                                                <span class="price">$29</span>
                                            </div>
                                        </div>
                                        <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                                    </div>
                                </div> --}}

                                {{-- <span class="flat flaticon-bread" style="left: 0;"></span>
                                <span class="flat flaticon-breakfast" style="right: 0;"></span> --}}
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="menu-wrap">
                                <div class="heading-menu text-center ftco-animate">
                                    <h3>Déjeuner</h3>
                                </div>
                                @foreach ($m2 as $m)
                                <div class="menus d-flex ftco-animate">
                                    <div class="menu-img img" style="background-image: url({{ asset('storage/productImages/'.$m->product->prod_img) }});"></div>
                                    <div class="text">
                                        <div class="d-flex">
                                            <div class="one-half">
                                                <h3>{{ $m->product->prod_name }}</h3>
                                            </div>
                                            <div class="one-forth">
                                                <span class="price">{{ $m->price }} GNF</span>
                                            </div>
                                        </div>
                                        <p><span style="font-size: 12px;">{{ $m->product->prod_desc }}</span></p>
                                    </div>
                                </div>
                                @endforeach
                                {{-- <div class="menus d-flex ftco-animate">
                                    <div class="menu-img img" style="background-image: url({{ asset('menu4/images/lunch-2.jpg') }});"></div>
                                    <div class="text">
                                        <div class="d-flex">
                                            <div class="one-half">
                                                <h3>Beef Roast Source</h3>
                                            </div>
                                            <div class="one-forth">
                                                <span class="price">$29</span>
                                            </div>
                                        </div>
                                        <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                                    </div>
                                </div> --}}
                                {{-- <span class="flat flaticon-pizza" style="left: 0;"></span>
                                <span class="flat flaticon-chicken" style="right: 0;"></span> --}}
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="menu-wrap">
                                <div class="heading-menu text-center ftco-animate">
                                    <h3>Dîner</h3>
                                </div>
                                @foreach ($m3 as $m)
                                <div class="menus d-flex ftco-animate">
                                    <div class="menu-img img" style="background-image: url({{ asset('storage/productImages/'.$m->product->prod_img) }});"></div>
                                    <div class="text">
                                        <div class="d-flex">
                                            <div class="one-half">
                                                <h3>{{ $m->product->prod_name }}</h3>
                                            </div>
                                            <div class="one-forth">
                                                <span class="price">{{ $m->price }} GNF</span>
                                            </div>
                                        </div>
                                        <p><span style="font-size: 12px;">{{ $m->product->prod_desc }}</span></p>
                                    </div>
                                </div>
                                @endforeach
                                {{-- <div class="menus d-flex ftco-animate">
                                    <div class="menu-img img" style="background-image: url({{ asset('menu4/images/dinner-2.jpg') }});"></div>
                                    <div class="text">
                                        <div class="d-flex">
                                            <div class="one-half">
                                                <h3>Beef Roast Source</h3>
                                            </div>
                                            <div class="one-forth">
                                                <span class="price">$29</span>
                                            </div>
                                        </div>
                                        <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                                    </div>
                                </div> --}}
                                {{-- <span class="flat flaticon-omelette" style="left: 0;"></span>
                                <span class="flat flaticon-burger" style="right: 0;"></span> --}}
                            </div>
                        </div>

                        <!--  -->
                        <div class="col-md-6 col-lg-4">
                            <div class="menu-wrap">
                                <div class="heading-menu text-center ftco-animate">
                                    <h3>Dessert</h3>
                                </div>
                                @foreach ($m4 as $m)
                                <div class="menus d-flex ftco-animate">
                                    <div class="menu-img img" style="background-image: url({{ asset('storage/productImages/'.$m->product->prod_img) }});"></div>
                                    <div class="text">
                                        <div class="d-flex">
                                            <div class="one-half">
                                                <h3>{{ $m->product->prod_name }}</h3>
                                            </div>
                                            <div class="one-forth">
                                                <span class="price">{{ $m->price }} GNF</span>
                                            </div>
                                        </div>
                                        <p><span style="font-size: 12px;">{{ $m->product->prod_desc }}</span></p>
                                    </div>
                                </div>
                                @endforeach
                                {{-- <div class="menus d-flex ftco-animate">
                                    <div class="menu-img img" style="background-image: url({{ asset('menu4/images/dessert-2.jpg') }});"></div>
                                    <div class="text">
                                        <div class="d-flex">
                                            <div class="one-half">
                                                <h3>Beef Roast Source</h3>
                                            </div>
                                            <div class="one-forth">
                                                <span class="price">$29</span>
                                            </div>
                                        </div>
                                        <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                                    </div>
                                </div> --}}

                                {{-- <span class="flat flaticon-cupcake" style="left: 0;"></span>
                                <span class="flat flaticon-ice-cream" style="right: 0;"></span> --}}
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="menu-wrap">
                                <div class="heading-menu text-center ftco-animate">
                                    <h3>Boisson Alcoolisée</h3>
                                </div>
                                @foreach ($m5 as $m)
                                <div class="menus d-flex ftco-animate">
                                    <div class="menu-img img" style="background-image: url({{ asset('storage/productImages/'.$m->product->prod_img) }});"></div>
                                    <div class="text">
                                        <div class="d-flex">
                                            <div class="one-half">
                                                <h3>{{ $m->product->prod_name }}</h3>
                                            </div>
                                            <div class="one-forth">
                                                <span class="price">{{ $m->price }} GNF</span>
                                            </div>
                                        </div>
                                        <p><span style="font-size: 12px;">{{ $m->product->prod_desc }}</span></p>
                                    </div>
                                </div>
                                @endforeach
                                {{-- </div> --}}
                                {{-- <div class="menus d-flex ftco-animate">
                                    <div class="menu-img img" style="background-image: url({{ asset('menu4/images/wine-2.jpg') }});"></div>
                                    <div class="text">
                                        <div class="d-flex">
                                            <div class="one-half">
                                                <h3>Beef Roast Source</h3>
                                            </div>
                                            <div class="one-forth">
                                                <span class="price">$29</span>
                                            </div>
                                        </div>
                                        <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                                    </div>
                                </div> --}}

                                {{-- <span class="flat flaticon-wine" style="left: 0;"></span>
                                <span class="flat flaticon-wine-1" style="right: 0;"></span> --}}
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="menu-wrap">
                                <div class="heading-menu text-center ftco-animate">
                                    <h3>Boisson Simple</h3>
                                </div>
                                @foreach ($m6 as $m)
                                <div class="menus d-flex ftco-animate">
                                    <div class="menu-img img" style="background-image: url({{ asset('storage/productImages/'.$m->product->prod_img) }});"></div>
                                    <div class="text">
                                        <div class="d-flex">
                                            <div class="one-half">
                                                <h3>{{ $m->product->prod_name }}</h3>
                                            </div>
                                            <div class="one-forth">
                                                <span class="price">{{ $m->price }} GNF</span>
                                            </div>
                                        </div>
                                        <p><span style="font-size: 12px;">{{ $m->product->prod_desc }}</span></p>
                                    </div>
                                </div>
                                @endforeach
                                {{-- <div class="menus d-flex ftco-animate">
                                    <div class="menu-img img" style="background-image: url({{ asset('menu4/images/drink-2.jpg') }});"></div>
                                    <div class="text">
                                        <div class="d-flex">
                                            <div class="one-half">
                                                <h3>Beef Roast Source</h3>
                                            </div>
                                            <div class="one-forth">
                                                <span class="price">$29</span>
                                            </div>
                                        </div>
                                        <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                                    </div>
                                </div> --}}

                                {{-- <span class="flat flaticon-wine" style="left: 0;"></span>
                                <span class="flat flaticon-wine-1" style="right: 0;"></span> --}}
                            </div>
                        </div>
                    </div>
                </div>
	        </section>



        <script src="{{ asset('menu4/js/jquery.min.js') }}"></script>
		<script src="{{ asset('menu4/js/jquery-migrate-3.0.1.min.js') }}"></script>
		<script src="{{ asset('menu4/js/popper.min.js') }}"></script>
		<script src="{{ asset('menu4/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('menu4/js/jquery.easing.1.3.js') }}"></script>
		<script src="{{ asset('menu4/js/jquery.waypoints.min.js') }}"></script>
		<script src="{{ asset('menu4/js/jquery.stellar.min.js') }}"></script>
		<script src="{{ asset('menu4/js/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('menu4/js/jquery.magnific-popup.min.js') }}"></script>
		<script src="{{ asset('menu4/js/jquery.animateNumber.min.js') }}"></script>
		<script src="{{ asset('menu4/js/bootstrap-datepicker.js') }}"></script>
		<script src="{{ asset('menu4/js/jquery.timepicker.min.js') }}"></script>
		<script src="{{ asset('menu4/js/scrollax.min.js') }}"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
		<script src="{{ asset('menu4/js/google-map.js') }}"></script>
		<script src="{{ asset('menu4/js/main.js') }}"></script>



        </body>
        </html>

    </div>
</div>


@endsection
