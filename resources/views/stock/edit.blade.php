@extends('layouts.dashboard')

@section('title', 'Modifier l\'article')

@section('content')
<h2>Modifier l'article</h2>

<form action="{{ route('stock.update', $stock->id) }}" method="POST">
    @csrf
    @method('PUT')
    @include('stock.form', ['buttonText' => 'Mettre à jour'])
</form>
@endsection
