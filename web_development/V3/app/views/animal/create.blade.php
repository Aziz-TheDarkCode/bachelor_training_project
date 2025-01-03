@extends('layouts.app')

@section('content')
<div class="container">
<h1>Ajouter un Animal</h1>
<form action="{{ url('/animals') }}" method="POST">
@csrf
<div class="form-group">
<label>Type</label>
<input type="text" name="type" class="form-control" required>
</div>
<div class="form-group">
<label>Age</label>
<input type="number" name="age" class="form-control" required>
</div>
<div class="form-group">
<label>Santé</label>
<input type="text" name="health" class="form-control" required>
</div>
<div class="form-group">
<label>Équipement</label>
<select name="equipment_id" class="form-control">
<option value="">Sélectionner un équipement</option>
@foreach($equipment as $item)
<option value="{{ $item->getId() }}">{{ $item->getName() }}</option>
@endforeach
</select>
</div>
<button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
</div>
