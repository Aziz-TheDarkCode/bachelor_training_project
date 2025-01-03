<?php $__env->startSection('content'); ?>
<div class="container">
<h1>Liste des Animaux</h1>
<a href="<?php echo e(url('/animals/create')); ?>" class="btn btn-primary mb-3">Ajouter un animal</a>

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
<?php $__currentLoopData = $animals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $animal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td><?php echo e($animal->getType()); ?></td>
<td><?php echo e($animal->getAge()); ?></td>
<td><?php echo e($animal->getHealth()); ?></td>
<td><?php echo e($animal->getEquipment() ? $animal->getEquipment()->getName() : 'Aucun'); ?></td>
<td>
<a href="<?php echo e(url('/animals/'.$animal->getId().'/edit')); ?>" class="btn btn-sm btn-warning">Modifier</a>
<form action="<?php echo e(url('/animals/'.$animal->getId())); ?>" method="POST" style="display: inline;">
<?php echo method_field('DELETE'); ?>
<?php echo csrf_field(); ?>
<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr?')">Supprimer</button>
</form>
</td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>
</div>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /srv/http/gestion_ferme/app/views/animal/index.blade.php ENDPATH**/ ?>