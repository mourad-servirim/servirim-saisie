@extends('layouts.dashboard')

@section('title', 'Liste des pointages')

@section('content')
<div class="flex justify-center py-10 bg-gray-50 min-h-screen">
    <div class="bg-white rounded-2xl shadow-xl p-6 w-full max-w-4xl animate__animated animate__fadeIn">

        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 flex items-center mb-4 sm:mb-0">
                <i class="bx bx-list-check text-blue-600 mr-2 text-3xl"></i> Liste des pointages
            </h2>
            <a href="{{ route('pointage.create') }}" 
               class="bg-blue-600 text-white px-5 py-2.5 rounded-lg shadow hover:bg-blue-700 transition flex items-center">
                <i class="bx bx-plus mr-1 text-lg"></i> Nouveau pointage
            </a>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
            <table class="w-full text-sm text-gray-700">
                <thead class="bg-blue-100 text-gray-700 uppercase text-xs font-semibold">
                    <tr>
                        <th class="px-4 py-3 text-left">#</th>
                        <th class="px-4 py-3 text-left">Technicien</th>
                        <th class="px-4 py-3 text-left">Tâche</th>
                        <th class="px-4 py-3 text-left">Date</th>
                        <th class="px-4 py-3 text-left">Heure</th>
                        <th class="px-4 py-3 text-left">Présence</th>
                        <th class="px-4 py-3 text-left">Pneus réparés</th>
                        <th class="px-4 py-3 text-left">Observation</th>
                        <th class="px-4 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($pointages as $pointage)
                    <tr class="hover:bg-blue-50 transition duration-150">
                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3 font-medium text-gray-800">{{ $pointage->technicien }}</td>
                        <td class="px-4 py-3">{{ $pointage->tache }}</td>
                        <td class="px-4 py-3">{{ $pointage->date_pointage }}</td>
                        <td class="px-4 py-3">{{ $pointage->heure_pointage }}</td>
                        <td class="px-4 py-3">
                            @if($pointage->present)
                                <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">Présent</span>
                            @else
                                <span class="px-2 py-1 bg-red-100 text-red-700 rounded-full text-xs font-semibold">Absent</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">{{ $pointage->nb_pneus_repares ?? '-' }}</td>
                        <td class="px-4 py-3 max-w-xs truncate">{{ $pointage->observation }}</td>
                        <td class="px-4 py-3 text-center flex justify-center space-x-3">
                            <a href="{{ route('pointage.edit', $pointage->id) }}" 
                               class="text-blue-600 hover:text-blue-800" title="Modifier">
                                <i class="bx bx-edit text-xl"></i>
                            </a>
                            <form action="{{ route('pointage.destroy', $pointage->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Supprimer ce pointage ?')" 
                                        class="text-red-600 hover:text-red-800" title="Supprimer">
                                    <i class="bx bx-trash text-xl"></i>
                                </button>
                               <br>
                               <br>
                               <br>
                                <a href="{{ route('pointage.print', $pointage->id) }}" 
                          class="text-green-600 hover:text-green-800" title="Imprimer PDF">
                                <i class="bx bx-printer text-xl"></i>
                                </a>

                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center py-6 text-gray-500 italic">
                            Aucun pointage enregistré.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
