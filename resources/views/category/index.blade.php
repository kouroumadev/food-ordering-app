@extends('welcome')

@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Tableau de bord</a></li>
                    <li class="active">Categories</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row justify-content-center">
            <div class="col-md-6">
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
                <div class="card-body card-block">
                    <form action=" @isset($category) {{ route('category.update',$category->id) }} @else {{ route('category.store') }} @endisset " method="post" class="form-horizontal">

                        @csrf
                        @isset($category)
                        @method('patch')
                        @endisset

                        <div class="row form-group">
                            <div class="col col-md-12">
                                <div class="input-group">
                                    <input type="text" id="input2-group2" name="cat_name" placeholder="Entrez le nom de la categorie" class="form-control" @isset($category)
                                     value="{{ $category->cat_name }}"
                                    @endisset>
                                    <div type="submit" class="input-group-btn"><button class="btn btn-primary">
                                        @isset($category)
                                        Modifier
                                        @else
                                        Ajouter
                                        @endisset
                                        </button></div>

                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>

        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary">
                        <strong class="card-title text-white">Mes Categories</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead class="bg-primary">
                                <tr>
                                    <th class="text-center text-white">Nom de la categorie</th>
                                    <th class="text-center text-white">Etat categorie</th>
                                    <th class="text-center text-white">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cats as $cat)
                                    <tr>

                                        <td>{{ $cat->cat_name }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-sm text-white rounded @if($cat->status == '1') btn-primary @else btn-secondary @endif" data-toggle="modal" data-target="#staticModalCatStatus{{ $cat->id }}">
                                                @if ($cat->status == '1')
                                                    Active
                                                @else
                                                    Inactive
                                                @endif
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <a type="button" class="btn btn-primary btn-sm text-white" href="#"> <i class="fa fa-eye"></i></a> --}}
                                                    <a type="button" class="btn btn-primary btn-sm text-white rounded" href="{{ route('category.edit', $cat->id) }}"> <i class="fa fa-pencil"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm rounded" data-toggle="modal" data-target="#staticModalCat{{ $cat->id }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="staticModalCat{{ $cat->id }}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-warning">
                                                            <h5 class="modal-title text-danger" id="staticModalLabel">Attention</h5>
                                                            <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                Voulez-vous vraiment supprimer cette categorie ?, <span class="text-danger"> si oui cette action supprimera tous les produits liés a cette catégorie </span>, cliquer sur "Confirmer", ou "Annuler" pour annuler.
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                            <button type="submit" href="{{ route('category.destroy',$cat->id) }}" class="btn btn-primary"
                                                                onclick="event.preventDefault();
                                                                document.getElementById('cat-form.{{ $cat->id }}').submit(); ">
                                                                Confirmer
                                                            </button>
                                                            <form id="cat-form.{{ $cat->id }}" action="{{ route('category.destroy',$cat->id ) }}" method="POST" class="d-none">
                                                                @csrf
                                                                @method('delete')
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="staticModalCatStatus{{ $cat->id }}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <h5 class="modal-title text-white" id="staticModalLabel">Changement de Status</h5>
                                                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                Voulez-vous changer le status de cette catégorie ? cliquer sur "Confirmer", ou "Annuler" pour annuler.
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>

                                                            <button type="submit" href="{{ route('category.edit.status',$cat->id ) }}" class="btn btn-primary"
                                                                onclick="event.preventDefault();
                                                                document.getElementById('catStatus-form.{{ $cat->id }}').submit(); ">
                                                                Confirmer
                                                            </button>
                                                            <form id="catStatus-form.{{ $cat->id }}" action="{{ route('category.edit.status',$cat->id ) }}" method="POST" class="d-none">
                                                                @csrf
                                                                {{-- @method('delete') --}}
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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


@endsection

