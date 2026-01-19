@extends('layouts.dashboard')

@section('title', 'Bulletin de salaire')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-xl">

    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-2 mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('bulletins.generate') }}">
        @csrf

        <div class="mb-4">
            <label>NNI de l’employé</label>
            <input type="text" name="nni" class="w-full border p-2" required>
        </div>

        <div class="mb-4">
            <label>Période du</label>
            <input type="date" name="date_debut" class="w-full border p-2" required>
        </div>

        <div class="mb-4">
            <label>au</label>
            <input type="date" name="date_fin" class="w-full border p-2" required>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Générer le bulletin
        </button>
    </form>
</div>
@endsection

