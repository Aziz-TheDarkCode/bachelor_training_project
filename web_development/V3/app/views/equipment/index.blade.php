
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-semibold text-gray-800 mb-4">Liste des Équipements</h1>
    <a href="{{ url('/equipment/create') }}" class="bg-emerald-600 text-white px-4 py-2 rounded-md mb-6 inline-block hover:bg-emerald-700 transition">Ajouter un équipement</a>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($equipment as $item)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-emerald-200">
            <div class="p-4">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $item->getName() }}</h2>
                <p class="text-sm text-gray-600 mb-2">État: <span class="font-medium">{{ $item->getCondition() }}</span></p>
                <p class="text-sm text-gray-600 mb-4">Disponibilité: 
                    <span class="font-medium {{ $item->getAvailable() ? 'text-emerald-600' : 'text-red-600' }}">
                        {{ $item->getAvailable() ? 'Disponible' : 'Non disponible' }}
                    </span>
                </p>
                <div class="flex justify-between items-center">
                    <a href="{{ url('/equipment/'.$item->getId().'/edit') }}" class="bg-gray-700 text-white px-3 py-1 rounded-md text-xs hover:bg-gray-900 transition">Modifier</a>
                    <form action="{{ url('/equipment/'.$item->getId()) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-md text-xs hover:bg-red-700 transition" onclick="return confirm('Êtes-vous sûr?')">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

