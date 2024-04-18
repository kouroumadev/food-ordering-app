@extends('welcome')

@section('content')


<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Menu</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Menu 1</a></li>
                    <li class="active">Modifier le Menu 1</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('success'))
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>


            <a href="{{ route('menu.menu1.final') }}" class="btn btn-primary rounded text-center">Voir le menu</a>





            <form method="POST" action="{{ route('menu.menu1.store') }}" id="">
                @csrf
                <hr>
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Restaurant</label>
                            <select name="resto_id" id="resto_id" class="form-control" required >
                                <option>Choisir un Restaurant </option>
                                @foreach ($restos as $resto)
                                <option value="{{ $resto->id }}">{{ $resto->resto_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Type de Produit</label>
                            <select name="type_id" id="type_id" class="form-control" required >
                                <option>Choisir un Type </option>
                                <option value="Entrée">Entrée</option>
                                <option value="Petit Déjeuner">Petit Déjeuner</option>
                                <option value="Déjeuner">Déjeuner</option>
                                <option value="Dinner">Dinner</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Produit</label>
                            <select name="prod_id" id="prod_1_1" class="form-control" required onchange="getImg('prod_1_1','img_1_1')">
                                <option>Choisir un Produit </option>
                                {{-- <option selected value="{{ $resto->gerant_id  }}">{{ $gerant[0]->name }}</option> --}}
                                @foreach ($products as $prod)
                                <option value="{{ $prod->id }}">{{ $prod->prod_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <img src="" alt="No Image" class="rounded" id="img_1_1" style="height: 80px;" >
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Prix</label>
                            <input name="price" id="prix_1_1" type="text" class="form-control" placeholder="Prix net">
                        </div>
                    </div>

                </div>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary rounded">Ajouter</button>
                    </div>
                </div>

            </form>

            <hr>
            <div class="row justify-content-center">
                <div class="col-md-12 justify-content-center">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <strong class="card-title text-white">Mes Entrees</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-center text-white">Restaurant</th>
                                        <th class="text-center text-white">Produit</th>
                                        <th class="text-center text-white">Type</th>
                                        <th class="text-center text-white">Price</th>
                                        <th class="text-center text-white">Status</th>
                                        <th class="text-center text-white">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menus as $menu)
                                    <tr>
                                        <td>{{ $menu->resto->resto_name }}</td>
                                        <td>{{ $menu->product->prod_name }}</td>
                                        <td>{{ $menu->type }}</td>
                                        <td>{{ $menu->price }} fg</td>
                                        @if ($menu->price)
                                        <td class="text-center">
                                            <button class="btn btn-primary rounded">
                                                Actif
                                            </button>
                                        </td>
                                        @else
                                        <td class="text-center">
                                            <button class="btn btn-secondary rounded">
                                                Inactif
                                            </button>
                                        </td>
                                        @endif
                                        <td class="text-center">
                                            <button class="btn btn-primary rounded"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>







    </div>
</div>


<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script> --}}

{{-- <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script> --}}
 {{-- <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script> --}}

{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> --}}
<script src="https://unpkg.com/bs-stepper/dist/js/bs-stepper.min.js"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
<script>
    $(document).ready(function(){

        // $("#form_1").submit(function(e) {
        //     e.preventDefault();

        //     var resto_id = $("#resto_id").val();
        //     var prod_id = $("#prod_1_1").val();
        //     var type_id = $("#type_id").val();
        //     var price = $("#prix_1_1").val();

        //      $.ajaxSetup({
        //          headers: ({
        //              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //          })
        //      })

        //      $.ajax({
        //          method:'POST',
        //
        //          data:{'resto_id':resto_id,'prod_id':prod_id,'price':price,'type_id':type_id},
        //          success: function(data){
        //              console.log("DATA "+data);
        //             //  $('#resto_img').attr("src","http://localhost:8000/storage/logos/"+data.resto_logo);
        //             //  $('#resto_name').text(data.resto_name);
        //             //  $('#resto_com').text(data.resto_com);
        //             //  $('#resto_location').text(data.resto_location);
        //             //  $('#resto_info').show();

        //          }
        //      });


        // });



        //load all table
        // getTablesData();

    });
</script>
<script>

        var stepper = new Stepper(document.querySelector('#stepper1'));


</script>

<script>



</script>



<script>
    function getImg(id,img) {
        var prod_id = $("#"+id).val();

             $.ajaxSetup({
                 headers: ({
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 })
             })

             $.ajax({
                 method:'POST',
                 url: "{{ route('menu.prod') }}",
                 data:{'prod_id':prod_id},
                 success: function(data){
                     console.log("DATA ",data);
                     $('#'+img).attr("src","http://localhost:8000/storage/productImages/"+data.prod_img);

                 }
             });
    }
</script>


<script>
     function readURL(input,type) {
       if (input.files && input.files[0]) {

         var reader = new FileReader();
         reader.onload = function (e) {
           document.querySelector("#"+type).setAttribute("src",e.target.result);
         };

         reader.readAsDataURL(input.files[0]);
       }
     }
</script>



@endsection
