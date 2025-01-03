<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-semibold text-gray-800 mb-4">Liste des Équipements</h1>
    <a href="<?php echo e(url('/equipment/create')); ?>" class="bg-emerald-600 text-white px-4 py-2 rounded-md mb-6 inline-block hover:bg-emerald-700 transition">Ajouter un équipement</a>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <?php $__currentLoopData = $equipment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-emerald-200">
            <div class="p-4">
                <h2 class="text-xl font-semibold text-gray-800 mb-2"><?php echo e($item->getName()); ?></h2>
                <p class="text-sm text-gray-600 mb-2">État: <span class="font-medium"><?php echo e($item->getCondition()); ?></span></p>
                <p class="text-sm text-gray-600 mb-4">Disponibilité: 
                    <span class="font-medium <?php echo e($item->getAvailable() ? 'text-emerald-600' : 'text-red-600'); ?>">
                        <?php echo e($item->getAvailable() ? 'Disponible' : 'Non disponible'); ?>

                    </span>
                </p>
                <div class="flex justify-between items-center">
                    <a href="<?php echo e(url('/equipment/'.$item->getId().'/edit')); ?>" class="bg-gray-700 text-white px-3 py-1 rounded-md text-xs hover:bg-gray-900 transition">Modifier</a>
                    <form action="<?php echo e(url('/equipment/'.$item->getId())); ?>" method="POST">
                        <?php echo method_field('DELETE'); ?>
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-md text-xs hover:bg-red-700 transition" onclick="return confirm('Êtes-vous sûr?')">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /srv/http/gestion_ferme/app/views/equipment/index.blade.php ENDPATH**/ ?>