<?php
$title = "Modifier Client";
ob_start();
?>

<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Modifier Client</h1>
        <div class="bg-white shadow rounded-lg p-8">
            <form method="POST">
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Nom</label>
                        <input type="text" name="nom" value="<?php echo htmlspecialchars($client['nom']); ?>" required
                            class="border-gray-300 rounded-lg shadow-sm w-full py-2 px-3 focus:ring focus:ring-blue-300">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Prénom</label>
                        <input type="text" name="prenom" value="<?php echo htmlspecialchars($client['prenom']); ?>" required
                            class="border-gray-300 rounded-lg shadow-sm w-full py-2 px-3 focus:ring focus:ring-blue-300">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Email</label>
                        <input type="email" name="email" value="<?php echo htmlspecialchars($client['email']); ?>" required
                            class="border-gray-300 rounded-lg shadow-sm w-full py-2 px-3 focus:ring focus:ring-blue-300">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Téléphone</label>
                        <input type="tel" name="telephone" value="<?php echo htmlspecialchars($client['telephone']); ?>" required
                            class="border-gray-300 rounded-lg shadow-sm w-full py-2 px-3 focus:ring focus:ring-blue-300">
                    </div>
                </div>
                <div class="mt-6 flex items-center space-x-4">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg focus:ring focus:ring-blue-300">
                        Mettre à jour
                    </button>
                    <a href="index.php?action=clients"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-6 rounded-lg focus:ring focus:ring-gray-300">
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once '../app/views/layout/main.php';
?>

