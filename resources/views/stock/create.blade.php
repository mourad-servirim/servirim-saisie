@extends('layouts.dashboard')

@section('title', 'Ajouter un article')

@section('content')

<div class="flex justify-center">

<div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-3xl">

<h2 class="text-2xl font-bold text-center text-gray-700 mb-6">
➕ Ajouter un nouvel article
</h2>

<form action="{{ route('stock.store') }}" method="POST">

@csrf

@include('stock.form', ['buttonText' => 'Ajouter'])

</form>

</div>

</div>

@endsection
