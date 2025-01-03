@extends('layouts.app')

@section('content')
<div class="container">
<h1>Liste des Animaux</h1>
<a href="{{ url('/animals/create') }}" class="btn btn-primary mb-3">Ajouter un animal</a>

<table class="table">
<thead>
<tr>
<th>Type</th>
<th>Age</th>
<th>Santé</th>
<th>Équipement</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
@foreach($animals as $animal)
<tr>
<td>{{ $animal->getType() }}</td>
<td>{{ $animal->getAge() }}</td>
<td>{{ $animal->getHealth() }}</td>
<td>{{ $animal->getEquipment() ? $animal->getEquipment()->getName() : 'Aucun' }}</td>
<td>
<a href="{{ url('/animals/'.$animal->getId().'/edit') }}" class="btn btn-sm btn-warning">Modifier</a>
<form action="{{ url('/animals/'.$animal->getId()) }}" method="POST" style="display: inline;">
@method('DELETE')
@csrf
<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr?')">Supprimer</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
