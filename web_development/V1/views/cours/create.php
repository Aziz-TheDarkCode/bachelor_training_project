<?php
// app/views/cours/create.php
$title = "Ajouter un cours";
ob_start();
?>

<div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Ajouter un cours</h3>
            <p class="mt-1 text-sm text-gray-600">
                Remplissez les informations du cours.
            </p>
        </div>
    </div>
    <div class="mt-5 md:col-span-2 md:mt-0">
        <form method="POST">
            <div class="shadow sm:overflow-hidden sm:rounded-md">
                <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="nom_cours" class="block text-sm font-medium text-gray-700">Nom du cours</label>
                            <input type="text" name="nom_cours" id="nom_cours" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100/70 h-10 px-4 focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="code_cours" class="block text-sm font-medium text-gray-700">Code du cours</label>
                            <input type="text" name="code_cours" id="code_cours" required
                                class="mt-1 block w-full rounded-md bg-gray-100/70 h-10 px-4 border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="nombre_heures" class="block text-sm font-medium text-gray-700">Nombre d'heures</label>
                            <input type="number" name="nombre_heures" id="nombre_heures" required
                                class="mt-1 block bg-gray-100/70 h-10 px-4 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                    <a href="index.php?action=index" class="inline-flex justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Annuler
                    </a>
                    <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-primary py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Enregistrer
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once '../views/layout/main.php';
?>

