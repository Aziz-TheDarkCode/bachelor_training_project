<?php $__env->startSection('content'); ?>
<div class="container">
<h1>Ajouter un Animal</h1>
<form action="<?php echo e(url('/animals')); ?>" method="POST">
<?php echo csrf_field(); ?>
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
<?php $__currentLoopData = $equipment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($item->getId()); ?>"><?php echo e($item->getName()); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>
<button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
</div>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /srv/http/gestion_ferme/app/views/animal/create.blade.php ENDPATH**/ ?>