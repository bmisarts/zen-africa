@extends('layouts.app')

@section('content')

<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="text-center">
            <div class="text-center pb-5">
                <h2>Veuillez scanner le code pour éditer la fiche</h2>
            </div>
            <div class="card-body">
                {!! QrCode::size(300)->generate($url) !!}
            </div>
        </div>
    </div>
</div>