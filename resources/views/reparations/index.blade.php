@extends('layouts.dashboard')

@section('title', 'Liste des réparations')

@section('content')
<div class="p-8 bg-white rounded-xl shadow-md">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-700">Réparations</h2>

        <a href="{{ route('reparations.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg">
            Nouvelle réparation
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm border">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="p-3">#</th>
                    <th class="p-3">Référence</th>
                    <th class="p-3">Date_entree</th>
                    <th class="p-3">Date_Sortie</th>
                    <th class="p-3">Type_reparation</th>
                    <th class="p-3">Emplatre</th>
                    <th class="p-3">Gomme</th>
                    <th class="p-3">verre_dissolut</th>
                    <th class="p-3">duree_reparation</th>
                </tr>
            </thead>

            <tbody>
                 @foreach($reparations as $rep)
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-3">{{ $loop->iteration }}</td>
                    <td class="p-3">{{ $rep->reference }}</td>
                    <td class="p-3">{{ $rep->date_entree }}</td>
                    <td class="p-3">{{ $rep->date_sortie }}</td>
                    <td class="p-3">{{ $rep->type_reparation }}</td>
                    <td class="p-3">{{ $rep->emplatre_rad }}</td>
                    <td class="p-3">{{ $rep->gomme_mtr }}</td>
                    <td class="p-3">{{ $rep->verre_dissolut }}</td>
                    <td class="p-3">{{ $rep->duree_reparation }}</td>

                    <!-- ACTIONS -->
                    <td class="p-3 flex justify-center gap-2">

                        <!-- SUPPRIMER -->
                        <form action="{{ route('reparations.destroy', $rep->id) }}"
                              method="POST"
                              onsubmit="return confirm('Confirmer la suppression ?')">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                Supprimer
                            </button>
                            <br>
                            <br>
                            <a href="{{ route('reparations.print', $rep->id) }}"
                              class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700">
                                      IMPRIMER 
                                    </a>

                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection