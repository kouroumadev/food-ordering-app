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

            <link href="{{ asset('menu1/assets/css/main.css') }}" rel="stylesheet">
        </head>
        <body>
            <!-- ======= Menu Section ======= -->
            <section id="menu" class="menu">
                <div class="container" data-aos="fade-up">

                <div class="section-header">
                    {{-- <h2>Our Menu</h2> --}}
                    <p>Verifier <span>Notre Menu Delicieux</span></p>
                </div>

                <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

                    <li class="nav-item">
                    <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters">
                        <h4>Entrée</h4>
                    </a>
                    </li><!-- End tab nav item -->

                    <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast">
                        <h4>Petit Déjeuner</h4>
                    </a><!-- End tab nav item -->

                    <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-lunch">
                        <h4>Déjeuner</h4>
                    </a>
                    </li><!-- End tab nav item -->

                    <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-dinner">
                        <h4>Dinner</h4>
                    </a>
                    </li><!-- End tab nav item -->

                </ul>

                <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

                    <div class="tab-pane fade active show" id="menu-starters">

                    <div class="tab-header text-center">
                        <p>Menu</p>
                        <h3>Entrée</h3>
                    </div>

                    <div class="row gy-5">
                        @foreach ($m1 as $m)
                        <div class="col-lg-4 menu-item">
                            <a href="{{ asset('storage/productImages/'.$m->product->prod_img) }}" class="glightbox"><img src="{{ asset('storage/productImages/'.$m->product->prod_img) }}" class="menu-img img-fluid" alt="" style="height: 100px;"></a>
                            <h4>{{ $m->product->prod_name }}</h4>
                            <p class="ingredients">
                                {{ $m->product->prod_desc }}
                            </p>
                            <p class="price">
                                {{ $m->price }} fg
                            </p>
                        </div>
                        @endforeach

                    </div>
                    </div><!-- End Starter Menu Content -->

                    <div class="tab-pane fade" id="menu-breakfast">

                    <div class="tab-header text-center">
                        <p>Menu</p>
                        <h3>Petit Déjeuner</h3>
                    </div>

                    <div class="row gy-5">

                        @foreach ($m2 as $m)
                        <div class="col-lg-4 menu-item">
                            <a href="{{ asset('storage/productImages/'.$m->product->prod_img) }}" class="glightbox"><img src="{{ asset('storage/productImages/'.$m->product->prod_img) }}" class="menu-img img-fluid" alt=""></a>
                            <h4>{{ $m->product->prod_name }}</h4>
                            <p class="ingredients">
                                {{ $m->product->prod_desc }}
                            </p>
                            <p class="price">
                                {{ $m->price }} fg
                            </p>
                        </div>
                        @endforeach

                    </div>
                    </div><!-- End Breakfast Menu Content -->

                    <div class="tab-pane fade" id="menu-lunch">

                    <div class="tab-header text-center">
                        <p>Menu</p>
                        <h3>Déjeuner</h3>
                    </div>

                    <div class="row gy-5">

                        @foreach ($m3 as $m)
                        <div class="col-lg-4 menu-item">
                            <a href="{{ asset('storage/productImages/'.$m->product->prod_img) }}" class="glightbox"><img src="{{ asset('storage/productImages/'.$m->product->prod_img) }}" class="menu-img img-fluid" alt=""></a>
                            <h4>{{ $m->product->prod_name }}</h4>
                            <p class="ingredients">
                                {{ $m->product->prod_desc }}
                            </p>
                            <p class="price">
                                {{ $m->price }} fg
                            </p>
                        </div>
                        @endforeach

                    </div>
                    </div><!-- End Lunch Menu Content -->

                    <div class="tab-pane fade" id="menu-dinner">

                    <div class="tab-header text-center">
                        <p>Menu</p>
                        <h3>Dinner</h3>
                    </div>

                    <div class="row gy-5">

                        @foreach ($m4 as $m)
                        <div class="col-lg-4 menu-item">
                            <a href="{{ asset('storage/productImages/'.$m->product->prod_img) }}" class="glightbox"><img src="{{ asset('storage/productImages/'.$m->product->prod_img) }}" class="menu-img img-fluid" alt=""></a>
                            <h4>{{ $m->product->prod_name }}</h4>
                            <p class="ingredients">
                                {{ $m->product->prod_desc }}
                            </p>
                            <p class="price">
                                {{ $m->price }} fg
                            </p>
                        </div>
                        @endforeach

                    </div>
                    </div><!-- End Dinner Menu Content -->

                </div>

                </div>
            </section><!-- End Menu Section -->

            <script src="{{ asset('menu1/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('menu1/assets/js/main.js') }}"></script>


        </body>
        </html>

    </div>
</div>


@endsection
