@extends('layouts.app')

@section('content')
<form action="{{ route('f1.store') }}" method="POST" class="py-5" enctype="multipart/form-data">
    @csrf 
    <div class="text-center"> 
        <h1>Création d'une fiche de type F1</h1>
        <img id="sh_photo" src="{{ '/assets/images/user.png' }}" alt="Photo" width="150px">
    </div>
    <div class="container col-md-6 text-start">
        <div class="form-group row pt-3">
            <label for="nom" class="col-sm-2 col-form-label">Nom:</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="nom" value="{{old('nom')}}" placeholder="Entrez le nom">
                @error('nom')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row form-group pt-3">
            <label for="age" class="col-sm-2 col-form-label">Âge:</label>
            <div class="col-sm-10">
                <input class="form-control" type="number" name="age" value="{{old('age')}}" placeholder="Entrez l'âge">
                @error('age')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row form-group pt-3">
            <label for="tel" class="col-sm-2 col-form-label">Tel:</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="tel" value="{{old('tel')}}" placeholder="Entrez le numero de téléphone">
                @error('tel')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row form-group pt-3">
            <label for="csp_id" class="col-sm-2 col-form-label">CSP:</label>
            <div class="col-sm-10">
                <select name="csp_id" class="form-select form-control" aria-label="Default select example">
                    <option selected>Veuillez sélectionner un csp</option>
                    @foreach($csps as $csp)
                        <option value='{{$csp->id}}'{{ (old('csp_id') == $csp->id) ? 'selected' : ''}}>{{$csp->nom}}</option>
                    @endforeach
                </select>
                @error('csp_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row form-group py-3">
            <label for="image" class="col-sm-2 col-form-label">Photo:</label>
            <div class="col-sm-10">
                <input class="form-control" id="up_photo" type="file" placeholder=".png, .jpg, .jpeg, .jif" name="photo" accept=".png, .jpg, .jpeg, .jif">
            </div>
        </div>
        <button type="submit" class="btn btn-primary float-end">Enregistrer</button>
    </div>
</form>