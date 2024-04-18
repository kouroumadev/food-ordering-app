@extends('welcome')

@section('content')

{{-- MENU 1 --}}
<div class="row justify-content-center mb-1">
    <div class="col-md-8 text-center">
        <a href="{{ route('menu.menu1') }}" class="btn btn-primary rounded text-white"><i class="fa fa-eye"> Voir le template</i></a>
        <a href="{{ route('menu.edit.menu1') }}" class="btn btn-primary rounded text-white"><i class="fa fa-edit"> Modifier le Menu</i></a>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-8 shadow-lg p-0 bg-white rounded">
        <img src="{{ asset('images/menu1.png') }}" />
    </div>
</div>

{{-- MENU 2 --}}
<div class="row justify-content-center mt-5 mb-1">
    <div class="col-md-8 text-center">
        <a href="{{ route('menu.menu2') }}" class="btn btn-primary rounded text-white"><i class="fa fa-eye"> Voir le template</i></a>
        <a href="{{ route('menu.edit.menu2') }}" class="btn btn-primary rounded text-white"><i class="fa fa-edit"> Modifier le Menu</i></a>
    </div>
</div>
<div class="row justify-content-center mb-2">
    <div class="col-md-8 shadow-lg p-0 bg-white rounded">
        <img src="{{ asset('images/menu2.png') }}" />
    </div>
</div>

{{-- MENU 3 --}}
<div class="row justify-content-center mt-5 mb-1">
    <div class="col-md-8 text-center">
        <a href="{{ route('menu.menu3') }}" class="btn btn-primary rounded text-white"><i class="fa fa-eye"> Voir le template</i></a>
        <a href="{{ route('menu.edit.menu3') }}" class="btn btn-primary rounded text-white"><i class="fa fa-edit"> Modifier le Menu</i></a>
    </div>
</div>
<div class="row justify-content-center mb-2">
    <div class="col-md-8 shadow-lg p-0 bg-white rounded">
        <img src="{{ asset('images/menu3.png') }}" />
    </div>
</div>

{{-- MENU 4 --}}
<div class="row justify-content-center mt-5 mb-1">
    <div class="col-md-8 text-center">
        <a href="{{ route('menu.menu4') }}" class="btn btn-primary rounded text-white"><i class="fa fa-eye"> Voir le template</i></a>
        <a href="{{ route('menu.edit.menu4') }}" class="btn btn-primary rounded text-white"><i class="fa fa-edit"> Modifier le Menu</i></a>
    </div>
</div>
<div class="row justify-content-center mb-2">
    <div class="col-md-8 shadow-lg p-0 bg-white rounded">
        <img src="{{ asset('images/menu4.png') }}" />
    </div>
</div>






@endsection
