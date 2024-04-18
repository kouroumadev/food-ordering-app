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

                <!-- Customized Bootstrap Stylesheet -->
                <link href="{{ asset('menu3/css/bootstrap.min.css') }}" rel="stylesheet">

                <!-- Icon Font Stylesheet -->
                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

                <link href="{{ asset('menu3/css/style.css') }}" rel="stylesheet">
                {{-- <link href="{{ asset('menu1/assets/css/main.css') }}" rel="stylesheet"> --}}
            </head>

            <body>
                <!-- Menu Start -->
                <div class="container-xxl py-5">
                    <div class="container">
                        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
                            <h1 class="mb-5">Most Popular Items</h1>
                        </div>
                        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                            <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                                <li class="nav-item">
                                    <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                                        <i class="fa fa-coffee fa-2x text-primary"></i>
                                        <div class="ps-3">
                                            <small class="text-body">Popular</small>
                                            <h6 class="mt-n1 mb-0">Breakfast</h6>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                                        <i class="fa fa-hamburger fa-2x text-primary"></i>
                                        <div class="ps-3">
                                            <small class="text-body">Special</small>
                                            <h6 class="mt-n1 mb-0">Launch</h6>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                                        <i class="fa fa-utensils fa-2x text-primary"></i>
                                        <div class="ps-3">
                                            <small class="text-body">Lovely</small>
                                            <h6 class="mt-n1 mb-0">Dinner</h6>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane fade show p-0 active">
                                    <div class="row g-4">

                                        @foreach ($m1 as $m)
                                            <div class="col-lg-6">
                                                <div class="d-flex align-items-center">
                                                    <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('storage/productImages/'.$m->product->prod_img) }}" alt="" style="width: 80px;">
                                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                            <span>{{ $m->product->prod_name }}</span>
                                                            <span class="text-primary">{{ $m->price }} GNF</span>
                                                        </h5>
                                                        <small class="fst-italic">{{ $m->product->prod_desc }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div id="tab-2" class="tab-pane fade show p-0">
                                    <div class="row g-4">

                                        @foreach ($m2 as $m)
                                        <div class="col-lg-6">
                                            <div class="d-flex align-items-center">
                                                <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('storage/productImages/'.$m->product->prod_img) }}" alt="" style="width: 80px;">
                                                <div class="w-100 d-flex flex-column text-start ps-4">
                                                    <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                        <span>{{ $m->product->prod_name }}</span>
                                                        <span class="text-primary">{{ $m->price }} GNF</span>
                                                    </h5>
                                                    <small class="fst-italic">{{ $m->product->prod_desc }}</small>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div id="tab-3" class="tab-pane fade show p-0">
                                    <div class="row g-4">

                                        @foreach ($m3 as $m)
                                        <div class="col-lg-6">
                                            <div class="d-flex align-items-center">
                                                <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('storage/productImages/'.$m->product->prod_img) }}" alt="" style="width: 80px;">
                                                <div class="w-100 d-flex flex-column text-start ps-4">
                                                    <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                        <span>{{ $m->product->prod_name }}</span>
                                                        <span class="text-primary">{{ $m->price }} GNF</span>
                                                    </h5>
                                                    <small class="fst-italic">{{ $m->product->prod_desc }}</small>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Menu End -->

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
                <!-- Template Javascript -->
                <script src="{{ asset('menu3/js/main.js') }}"></script>

            </body>
        </html>

    </div>

</div>




@endsection
