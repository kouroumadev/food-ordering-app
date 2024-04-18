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
                    <li class="active">Restaurants</li>
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
                <button type="button" class="btn btn-primary rounded" data-toggle="modal" data-target="#mediumModal">
                    Ajouter un restaurant
                </button>
                <hr>
                <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Nouveau Restaurant</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="card">
                                        <div class="card-header bg-primary">
                                            <strong class="text-white">Ajouter un restaurant</strong>
                                        </div>
                                        <div class="card-body card-block">
                                            <form action="{{ route('resto.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                @csrf

                                                {{-- <div class="row form-group">
                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Gerant</label></div>
                                                    <div class="col-12 col-md-9">
                                                        <select name="gerant_id" id="select" class="form-control" required>
                                                            <option value="">Choisir un gerant </option>
                                                            @foreach ($gerants as $gerant)
                                                            <option value="{{ $gerant->id }}">{{ $gerant->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div> --}}

                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nom du restaurant</label></div>
                                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="resto_name" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
                                                </div>

                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Commune</label></div>
                                                    <div class="col-12 col-md-9">
                                                        <select name="resto_com" id="select" class="form-control" required>
                                                            <option value="">Selectionner Une Commune</option>
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
                                                    <div class="col-12 col-md-9"><textarea name="resto_location" id="textarea-input" rows="5" placeholder="Entrez l'addresse complete du restaurant" class="form-control"></textarea></div>
                                                </div>

                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Logo restaurant</label></div>
                                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="resto_logo" class="form-control-file" onchange="readURL(this)"></div>
                                                </div>

                                                <img src="" alt="No Image" id="img" style='height:150px;'>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">Annuler</button>
                                                    <button type="submit" class="btn btn-primary rounded">Enregistrer</button>
                                                </div>

                                            </form>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            @if (isset($restos) && $restos->count() >0)
                @foreach ($restos as $resto)
                <div class="col-md-4">
                    <div class="card shadow-lg bg-white rounded">
                        <div class="card-header @if ($resto->status == '1') bg-primary @else bg-secondary @endif py-4">
                            <a href="{{ route('menu.menu1.view') }}"></a>
                        </div>
                        <div class="card-body">
                            <div class="mx-auto d-block">
                                <img style="height: 200px; width: 200px;" class="rounded-circle mx-auto d-block" src="{{ asset('storage/logos/'.$resto->resto_logo) }}" alt="Card image cap">
                                <h5 class="text-sm-center mt-2 mb-1">{{ $resto->resto_name }}</h5>
                                <div class="location text-sm-center"><i class="fa fa-map-marker"></i> <span class="font-weight-bold">{{ $resto->resto_com }}</span> | <span class="font-italic">{{ $resto->resto_location }}</span></div>
                            </div>
                            <hr>
                            <div class="card-text text-sm-center">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="#" type="button" class="btn btn-primary text-white rounded"><i class="fa fa-eye text-white"></i></a>
                                        <a href="{{ route('resto.edit',$resto->id) }}" type="button" class="btn btn-primary text-white rounded"><i class="fa fa-pencil text-white"></i></a>
                                        <button type="button" class="btn btn-danger rounded" data-toggle="modal" data-target="#staticModal{{ $resto->resto_com }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <div class="modal fade" id="staticModal{{ $resto->resto_com }}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h5 class="modal-title text-white" id="staticModalLabel">Confirmation</h5>
                                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                                Voulez-vous vraiment supprimer ce restaurant? cliquer sur "Confirmer", ou "Annuler" pour annuler.
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                            <button type="submit" href={{ route('resto.destroy',$resto->id) }} class="btn btn-primary"
                                                onclick="event.preventDefault();
                                                document.getElementById('resto-form.{{ $resto->id }}').submit(); ">
                                                Confirmer
                                            </button>
                                            <form id="resto-form.{{ $resto->id }}" action="{{ route('resto.destroy',$resto->id ) }}" method="POST" class="d-none">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
            <div class="col-md-12">
                <p class="text-center">Pas de restaurant !</p>
            </div>
            @endif

        </div>
    </div><!-- .animated -->
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
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>



@endsection

