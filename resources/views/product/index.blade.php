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
                    <li class="active">Produits</li>
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
                <button type="button" class="btn btn-primary rounded" data-toggle="modal" data-target="#mediumModalProd">
                    Ajouter un Produit <i class="fa fa-plus" aria-hidden="true"></i>
                </button>
                <hr>
                <div class="modal fade" id="mediumModalProd" tabindex="-1" role="dialog" aria-labelledby="mediumModalProdLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalProdLabel">Nouveau Produit</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="card">
                                        <div class="card-header bg-primary">
                                            <strong class="text-white">Ajouter un Produit</strong>
                                        </div>
                                        <div class="card-body card-block">
                                            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                @csrf

                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Status du produt</label></div>
                                                    <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch>
                                                </div>

                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Categorie</label></div>
                                                    <div class="col-12 col-md-9">
                                                        <select name="category_id" id="select" class="form-control">
                                                            <option value="">Please select</option>
                                                            @foreach ($cats as $cat)
                                                            <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nom du Produit</label></div>
                                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="prod_name" placeholder="Text" class="form-control"><small class="form-text text-danger">*</small></div>
                                                </div>



                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Details du Produit</label></div>
                                                    <div class="col-12 col-md-9"><textarea name="prod_desc" id="textarea-input" rows="5" placeholder="Content..." class="form-control"></textarea></div>
                                                </div>

                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Image du Produit</label></div>
                                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="prod_img" class="form-control-file" onchange="readURL(this)"></div>
                                                </div>

                                                <img src="" alt="No Image" id="img" style='height:150px;'>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <strong class="card-title text-white">La liste de mes Produits</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead class="bg-primary">
                                <tr>
                                    <th class="text-center text-white">#</th>
                                    <th class="text-center text-white">Categorie</th>
                                    <th class="text-center text-white">Produit</th>
                                    <th class="text-center text-white">Description</th>
                                    <th class="text-center text-white">Status</th>
                                    <th class="text-center text-white">Image</th>
                                    <th class="text-center text-white">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prods as $prod)
                                    <tr>

                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $prod->cat->cat_name }}</td>
                                        <td>{{ $prod->prod_name }}</td>
                                        <td>{{ $prod->prod_desc }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-sm text-white rounded @if($prod->status == '1') btn-primary @else btn-secondary @endif" data-toggle="modal" data-target="#staticModalProdStatus{{ $prod->id }}">
                                                @if ($prod->status == '1')
                                                    Actif
                                                @else
                                                    Inactif
                                                @endif
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary btn-sm rounded" data-toggle="modal" data-target="#mediumModalProd{{ $prod->id }}">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-danger btn-sm rounded" data-toggle="modal" data-target="#staticModalProd{{ $prod->id }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <a class="btn btn-primary btn-sm rounded" href="{{ route('product.edit', $prod->id) }}">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>


                                                    <div class="modal fade" id="staticModalProdStatus{{ $prod->id }}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
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
                                                                        Voulez-vous changer le status de ce produit ? cliquer sur "Confirmer", ou "Annuler" pour annuler.
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>

                                                                    <button type="submit" href="{{ route('product.edit.status',$prod->id ) }}" class="btn btn-primary"
                                                                        onclick="event.preventDefault();
                                                                        document.getElementById('prodStatus-form.{{ $prod->id }}').submit(); ">
                                                                        Confirmer
                                                                    </button>
                                                                    <form id="prodStatus-form.{{ $prod->id }}" action="{{ route('product.edit.status',$prod->id ) }}" method="POST" class="d-none">
                                                                        @csrf
                                                                        {{-- @method('delete') --}}
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="modal fade" id="mediumModalProd{{ $prod->id }}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                                                        <div class="modal-dialog modal-md" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="staticModalLabel">{{ $prod->cat->cat_name }} / {{ $prod->prod_name }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <img class="rounded" src="{{ asset('storage/productImages/'.$prod->prod_img) }}" style="min-width:100%;" alt="img">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="modal fade" id="staticModalProd{{ $prod->id }}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
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
                                                                Voulez-vous vraiment supprimer ce Produit? cliquer sur "Confirmer", ou "Annuler" pour annuler.
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                            <button type="submit" href="{{ route('product.destroy',$prod->id) }}" class="btn btn-primary"
                                                                onclick="event.preventDefault();
                                                                document.getElementById('prod-form.{{ $prod->id }}').submit(); ">
                                                                Confirmer
                                                            </button>
                                                            <form id="prod-form.{{ $prod->id }}" action="{{ route('product.destroy',$prod->id ) }}" method="POST" class="d-none">
                                                                @csrf
                                                                @method('delete')
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






@endsection

