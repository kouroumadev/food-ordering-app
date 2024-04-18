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
                    <li class="active">Modifier Un Produit</li>
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
                    <div class="card-header">
                        <h5 class="modal-title" id="mediumModalLabel">Modifier un Produit</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            @method('patch')

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Categorie</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="category_id" id="select" class="form-control">
                                        <option value="">Please select</option>
                                        <option selected value="{{ $product->cat->id }}">{{ $product->cat->cat_name }}</option>
                                        @foreach ($cats as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                             <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nom du Produit</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="prod_name" class="form-control" value={{ $product->prod_name }}><small class="form-text text-danger">*</small></div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Details du Produit</label></div>
                                <div class="col-12 col-md-9"><textarea name="prod_desc" id="textarea-input" rows="5" placeholder="Content..." class="form-control">{{ $product->prod_desc }}</textarea></div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Image du Produit</label></div>
                                <div class="col-12 col-md-9"><input type="file" id="file-input" name="prod_img" class="form-control-file" onchange="readURL(this)"></div>
                                <input type="hidden" name="image" value={{ $product->prod_img }}>
                            </div>

                            <img src="{{ asset('storage/productImages/'.$product->prod_img) }}" alt="No Image" id="img" style='height:150px;'>

                            <div class="modal-footer">
                                <a href="{{ route('product.index') }}" type="button" class="btn btn-secondary text-white" data-dismiss="modal">Annuler</a>
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
