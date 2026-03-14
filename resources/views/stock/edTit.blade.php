@extends('layouts.dashboard')

@section('title', 'Modifier un article')

@section('content')

<div class="flex justify-center">

<div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-3xl">

<h2 class="text-2xl font-bold text-center text-gray-700 mb-6">
✏️ Modifier l'article
</h2>

<form action="{{ route('stock.update', $stock->id) }}" method="POST">

@csrf
@method('PUT')

@include('stock.form', ['buttonText' => 'Mettre à jour'])

</form>

</div>

</div>

@endsection
