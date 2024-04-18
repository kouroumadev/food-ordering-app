@extends('welcome')

@section('content')


<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Tableau de bord</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Tableau de bord</a></li>
                    <li class="active">Categorie</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
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

            <div id="stepper1" class="bs-stepper">
                <div class="bs-stepper-header">
                  <div class="step" data-target="#test-l-1">
                    <button type="button" class="btn step-trigger">
                      <span class="bs-stepper-circle">1</span>
                      <span class="bs-stepper-label">Informations Personnelles</span>
                    </button>
                  </div>
                  <div class="line" style="width: 566px;"></div>
                  <div class="step" data-target="#test-l-2">
                    <button type="button" class="btn step-trigger">
                      <span class="bs-stepper-circle">2</span>
                      <span class="bs-stepper-label">Informations d'autentifications</span>
                    </button>
                  </div>
                </div>
                <div class="bs-stepper-content">

                  <div class="card">
                    {{-- <div class="card-header">
                        <h5 class="modal-title" id="mediumModalLabel">Modifier un Produit</h5>
                    </div> --}}
                    <div class="card-body">
                        <form action="{{ route('gerant.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">

                            @csrf

                            <div id="test-l-1" class="content">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Status du Gerant</label></div>
                                    <div class="col-12 col-md-9"><input type="checkbox" checked id="myCheckboxId" name="status" class="">
                                        <small id="isActifText" class="form-text text-primary">actif</small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Restaurant</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="resto_id" id="select" class="form-control" required>
                                            <option value="">Choisir un Restaurant </option>
                                            {{-- <option selected value="{{ $resto->gerant_id  }}">{{ $gerant[0]->name }}</option> --}}
                                            @foreach ($restos as $resto)
                                            <option value="{{ $resto->id }}">{{ $resto->resto_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nom du Gerant</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="gerant_fname" class="form-control"><small class="form-text text-danger">*</small></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Prenom du Gerant</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="gerant_lname" class="form-control"><small class="form-text text-danger">*</small></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Mobile du Gerant</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="tel" class="form-control"><small class="form-text text-danger">*</small></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">L'adresses du Gerant</label></div>
                                    <div class="col-12 col-md-9"><textarea name="location" id="textarea-input" rows="5" placeholder="Content..." class="form-control"></textarea></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Photo du Gerant</label></div>
                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="photo" class="form-control-file" onchange="readURL(this)"></div>
                                </div>
                                <img src="" alt="No Image" id="img" style='height:150px;'> <br>

                                <a class="btn btn-primary text-white mt-3" onclick="stepper1.next()">Suivant <i class="fa fa-chevron-right"></i></a>

                            </div>

                            <div id="test-l-2" class="content">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">L'email du Gerant</label></div>
                                    <div class="col-12 col-md-9"><input type="email" id="text-input" name="gerant_email" class="form-control"><small class="form-text text-danger">*</small></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Mot de passe du Gerant(temporaire)</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="password" class="form-control"><small class="form-text text-danger">*</small></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Comfirmer le Mot de passe</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="confirm_password" class="form-control"><small class="form-text text-danger">*</small></div>
                                </div>

                                <a class="btn btn-primary text-white" onclick="stepper1.previous()"><i class="fa fa-chevron-left"></i> Precedent</a>
                                <button type="submit" class="btn btn-primary float-right" >Enregistrer</button>
                                <a class="btn btn-secondary float-right mr-2" href="{{ route('gerant.index') }}">Annuler</a>

                            </div>


                        </form>
                    </div>
                </div>
                </div>
            </div>



        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
<script>
    var stepper1Node = document.querySelector('#stepper1')
      var stepper1 = new Stepper(document.querySelector('#stepper1'))

      stepper1Node.addEventListener('show.bs-stepper', function (event) {
        console.warn('show.bs-stepper', event)
      })
      stepper1Node.addEventListener('shown.bs-stepper', function (event) {
        console.warn('shown.bs-stepper', event)
      })

      var stepper2 = new Stepper(document.querySelector('#stepper2'), {
        linear: false,
        animation: true
      })


</script>

<script>
     function readURL(input) {
       if (input.files && input.files[0]) {

         var reader = new FileReader();
         reader.onload = function (e) {
           document.querySelector("#img").setAttribute("src",e.target.result);
         };

         reader.readAsDataURL(input.files[0]);
       }
     }
</script>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('change', '#myCheckboxId', function() {
            if ($(this).is(':checked')) {
                $("#isActifText").text("Actif");
            } else {
                $("#isActifText").text("Inactif");
            }
        });
    });

</script>



@endsection
