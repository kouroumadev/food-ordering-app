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
                    <li class="active">Gerants</li>
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
                @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
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
            <a href="{{ route('gerant.create') }}" class="btn btn-primary rounded">
                Ajouter un Gerant
            </a>




        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <strong class="card-title text-white">La liste de mes Gerant</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead class="bg-primary">
                                <tr>
                                    <th class="text-center text-white">Nom</th>
                                    <th class="text-center text-white">Email</th>
                                    <th class="text-center text-white">Mot de pass</th>
                                    <th class="text-center text-white">Telephone</th>
                                    <th class="text-center text-white">Adresse</th>
                                    <th class="text-center text-white">Status</th>
                                    <th class="text-center text-white">photo</th>
                                    <th class="text-center text-white">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gerants as $gerant)
                                    <tr>

                                        <td>{{ $gerant->name }}</td>
                                        <td>{{ $gerant->email }}</td>
                                        <td>{{ $gerant->pass }}</td>
                                        <td>{{ $gerant->tel }}</td>
                                        <td>{{ $gerant->location }}</td>
                                        <td class="text-center">
                                            @if ($gerant->status == '1')
                                                <span class="badge p-2 badge-primary rounded">Actif</span>
                                            @else
                                                <span class="badge badge-secondary rounded">Non actif</span>
                                            @endif
                                        </td>
                                        <td  class="text-center">
                                            <button type="button" class="btn btn-primary btn-sm rounded" data-toggle="modal" data-target="#mediumModalGerant{{ $gerant->id }}">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <div class="modal fade" id="mediumModalGerant{{ $gerant->id }}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                                                <div class="modal-dialog modal-md" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticModalLabel">Photo de {{ $gerant->gerant_fname }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img class="rounded" src="{{ asset('storage/gerantImages/'.$gerant->photo) }}" style="min-width:100%;" alt="img">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-primary btn-sm rounded" href="{{ route('gerant.edit', $gerant->id) }}">
                                                <i class="fa fa-pencil"></i>
                                            </a>


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

<script>

</script>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>



@endsection
