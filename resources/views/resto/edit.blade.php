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
                    <li class="active">Modifier Restaurant</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row justify-content-center">
            <div class="col-md-8 col-12">
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

                <div class="card">
                    <div class="card-header bg-primary">
                        <h5 class="modal-title text-white" id="mediumModalLabel">Modifier un Restaurant</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('resto.update', $resto->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            @method('patch')
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Activer/Desactiver</label></div>
                                <label class="switch switch-text switch-primary switch-pill border border-primary">
                                    <input type="checkbox" name="status" class="switch-input" @if($resto->status == '1') checked="true" @endif >
                                    <span data-on="On" data-off="Off" class="switch-label"></span> <span class="switch-handle"></span>
                                </label>
                            </div>
                            {{-- <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Gerant</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="gerant_id" id="select" class="form-control" required>
                                        <option value="">Choisir un gerant </option>
                                        <option selected value="{{ $resto->gerant_id  }}">{{ $gerant[0]->name }}</option>
                                        @foreach ($gerants as $gerant)
                                        <option value="{{ $gerant->id }}">{{ $gerant->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nom du restaurant</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="resto_name" value="{{ $resto->resto_name }}" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Commune</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="resto_com" id="select" class="form-control" required>
                                        <option value="">Selectionner Une Commune</option>
                                        <option selected value="{{ $resto->resto_com }}">{{ $resto->resto_com }}</option>
                                        <option value="Ratoma">Ratoma</option>
                                        <option value="Matam">Matam</option>
                                        <option value="Dixinn">Dixinn</option>
                                        <option value="Kaloum">Kaloum</option>
                                        <option value="Matoto">Matoto</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">L'adresse du restaurant</label></div>
                                <div class="col-12 col-md-9"><textarea name="resto_location" id="textarea-input" rows="5" placeholder="Content..." class="form-control">{{ $resto->resto_location }}</textarea></div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Logo restaurant</label></div>
                                <div class="col-12 col-md-9"><input type="file" id="file-input" name="resto_logo" class="form-control-file" onchange="readURL(this)"></div>
                                <input type="hidden" name="logo" value="{{ $resto->resto_logo }}">
                            </div>

                            <img src="{{ asset('storage/logos/'.$resto->resto_logo) }}" alt="No Image" id="img" style='height:150px;'>

                            <div class="modal-footer">
                                <a href="{{ route('resto.index') }}" type="button" class="btn btn-secondary text-white" data-dismiss="modal">Annuler</a>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


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







@endsection
