@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-semibold text-gray-800 mb-4">Modifier l'Équipement</h1>
    
    <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-emerald-200">
        <div class="p-6">
            <form action="{{ url('/equipment/'.$equipment->getId()) }}" method="POST">
                @method('PUT')
                @csrf
                
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Nom</label>
                    <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500" value="{{ $equipment->getName() }}" required>
                </div>
                
                <div class="mb-4">
                    <label for="condition" class="block text-gray-700 font-medium mb-2">État</label>
                    <select name="condition" id="condition" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
                        <option value="Neuf" {{ $equipment->getCondition() == 'Neuf' ? 'selected' : '' }}>Neuf</option>
                        <option value="Bon" {{ $equipment->getCondition() == 'Bon' ? 'selected' : '' }}>Bon</option>
                        <option value="Moyen" {{ $equipment->getCondition() == 'Moyen' ? 'selected' : '' }}>Moyen</option>
                        <option value="Mauvais" {{ $equipment->getCondition() == 'Mauvais' ? 'selected' : '' }}>Mauvais</option>
                    </select>
                </div>
                
                <div class="mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="available" id="available" class="form-checkbox text-emerald-500" {{ $equipment->getAvailable() ? 'checked' : '' }}>
                        <label for="available" class="ml-2 text-gray-700">Disponible</label>
                    </div>
                </div>
                
                <button type="submit" class="w-full bg-emerald-600 text-white px-4 py-2 rounded-md hover:bg-emerald-700 transition duration-200">Mettre à jour</button>
            </form>
        </div>
    </div>
</div>
@endsection

