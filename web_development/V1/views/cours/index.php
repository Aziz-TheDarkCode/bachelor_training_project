<?php
// app/views/cours/index.php
$title = "Liste des cours";
ob_start();
?>

<div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
        <h1 class="text-2xl font-semibold text-gray-900">Cours</h1>
        <p class="mt-2 text-sm text-gray-700">Liste de tous les cours disponibles</p>
    </div>
    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <a href="index.php?controller=cours&action=create" class="inline-flex items-center justify-center rounded-md border border-transparent bg-primary px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-800">
            Ajouter un cours
        </a>
    </div>
</div>

<div class="mt-8 flex flex-col">
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Nom du cours</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Code</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Heures</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900"><?php echo htmlspecialchars($row['nom_cours']); ?></td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?php echo htmlspecialchars($row['code_cours']); ?></td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?php echo htmlspecialchars($row['nombre_heures']); ?></td>
                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                <a href="index.php?controller=cours&action=edit&id=<?php echo $row['id']; ?>" class="text-blue-600 hover:text-blue-900 mr-4">Modifier</a>
                                <a href="index.php?controller=cours&action=delete&id=<?php echo $row['id']; ?>" class="text-red-600 hover:text-red-900" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once '../views/layout/main.php';
?>

