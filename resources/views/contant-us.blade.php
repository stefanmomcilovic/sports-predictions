@extends('layouts.main-layout')

@section('title')
    Kontaktiraj nas - {{ config('app.name') }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 my-5">
                <h1 class="text-center">Kontaktiraj nas</h1>
                <p class="text-center my-5">
                    Za sve poslovne ponude i tehničku pomoć možete nas kontaktirati putem ovog mail-a: <br> 
                    <a href="mailto:reachwebsite@hotmail.com">reachwebsite@hotmail.com</a>
                </p>
            </div>
        </div>
    </div>
@endsection