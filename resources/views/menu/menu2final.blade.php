@extends('welcome')

@section('content')


<div class="row justify-content-center">
    <div class="col-md-10 text-center">
        <a href="{{ route('menu.index') }}" class="btn btn-primary rounded text-white"><i class="fa fa-arrow-circle-left"> Retourner sur les Menus</i></a>
    </div>
</div>


<div class="row justify-content-center">


    <div class="col-md-10 shadow-lg p-3 bg-white rounded">
        <!DOCTYPE html>
        <html lang="en">
        <head>
            {{-- <link href="{{ asset('menu1/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> --}}

            <link href="{{ asset('menu2/assets/css/style.css') }}" rel="stylesheet">
        </head>
        <body>
            <!-- ======= Menu Section ======= -->
            <section id="menu" class="menu section-bg">
                <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Menu</h2>
                    <p>Verifier notre Menu delicieux</p>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="menu-flters">
                        <li data-filter="*" class="filter-active">Tout</li>
                        <li data-filter=".filter-first" >Entrée</li>
                        <li data-filter=".filter-second">Petit Déjeuner</li>
                        <li data-filter=".filter-third">Déjeuner</li>
                        <li data-filter=".filter-four">Dinner</li>
                    </ul>
                    </div>
                </div>

                <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

                    @foreach ($m1 as $m)
                        <div class="col-lg-6 menu-item filter-first">
                            <img src="{{ asset('storage/productImages/'.$m->product->prod_img) }}" style="min-height:100%;height: 65px;" class="menu-img" alt="">

                            <div class="menu-content">
                                <a href="#">{{ $m->product->prod_name }}</a><span>{{ $m->price }} fg</span>
                            </div>
                            <div class="menu-ingredients">
                                {{ $m->product->prod_desc }}
                            </div>
                        </div>
                    @endforeach

                    @foreach ($m2 as $m)
                        <div class="col-lg-6 menu-item filter-second">
                            <img src="{{ asset('storage/productImages/'.$m->product->prod_img) }}" style="min-height:100%;height: 65px;" class="menu-img" alt="">
                            <div class="menu-content">
                                <a href="#">{{ $m->product->prod_name }}</a><span>{{ $m->price }} fg</span>
                            </div>
                            <div class="menu-ingredients">
                                {{ $m->product->prod_desc }}
                            </div>
                        </div>
                    @endforeach

                    @foreach ($m3 as $m)
                        <div class="col-lg-6 menu-item filter-third">
                            <img src="{{ asset('storage/productImages/'.$m->product->prod_img) }}" style="min-height:100%;height: 65px;" class="menu-img" alt="">
                            <div class="menu-content">
                                <a href="#">{{ $m->product->prod_name }}</a><span>{{ $m->price }} fg</span>
                            </div>
                            <div class="menu-ingredients">
                                {{ $m->product->prod_desc }}
                            </div>
                        </div>
                    @endforeach

                    @foreach ($m4 as $m)
                        <div class="col-lg-6 menu-item filter-four">
                            <img src="{{ asset('storage/productImages/'.$m->product->prod_img) }}" style="min-height:100%;height: 65px;" class="menu-img" alt="">
                            <div class="menu-content">
                                <a href="#">{{ $m->product->prod_name }}</a><span>{{ $m->price }} fg</span>
                            </div>
                            <div class="menu-ingredients">
                                {{ $m->product->prod_desc }}
                            </div>
                        </div>
                    @endforeach

                </div>

                </div>
            </section><!-- End Menu Section -->

            <script src="{{ asset('menu2/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('menu2/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

            <script src="{{ asset('menu2/assets/js/main.js') }}"></script>


        </body>
        </html>
    </div>
</div>




@endsection
