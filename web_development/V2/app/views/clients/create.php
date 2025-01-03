  <div class="max-w-xl mx-auto w-full bg-white shadow-md rounded-lg p-8">
    <h1 class="text-2xl font-semibold text-gray-900 mb-6">Nouveau Client</h1>
    <form method="POST">
      <!-- Nom -->
      <div class="mb-4">
        <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
        <input type="text" id="nom" name="nom" required 
          class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2 text-sm text-gray-900">
        <p class="text-sm text-gray-500 mt-1">Entrez le nom du client.</p>
      </div>

      <!-- Prénom -->
      <div class="mb-4">
        <label for="prenom" class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
        <input type="text" id="prenom" name="prenom" required 
          class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2 text-sm text-gray-900">
        <p class="text-sm text-gray-500 mt-1">Entrez le prénom du client.</p>
      </div>

      <!-- Email -->
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input type="email" id="email" name="email" required 
          class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2 text-sm text-gray-900">
        <p class="text-sm text-gray-500 mt-1">Entrez l'adresse email du client.</p>
      </div>

      <!-- Téléphone -->
      <div class="mb-6">
        <label for="telephone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
        <input type="tel" id="telephone" name="telephone" required 
          class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2 text-sm text-gray-900">
        <p class="text-sm text-gray-500 mt-1">Entrez le numéro de téléphone du client.</p>
      </div>

      <!-- Buttons -->
      <div class="flex justify-end space-x-4">
        <a href="index.php?controller=client&action=index"
          class="bg-gray-500 text-white font-medium rounded-md px-6 py-2 text-sm hover:bg-gray-700 focus:outline-none">
          Annuler
        </a>
        <button type="submit" 
          class="bg-black text-white font-medium rounded-md px-6 py-2 text-sm hover:bg-gray-900 focus:outline-none">
          Enregistrer
        </button>
      </div>
    </form>
  </div>

<?php
$content = ob_get_clean();
require_once '../app/views/layout/main.php';

?>

