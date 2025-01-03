<body class="flex items-center justify-center">
  <div class="max-w-5xl w-full bg-white shadow-md rounded-lg p-8">
    <h1 class="text-2xl font-semibold text-gray-900 mb-6">Nouveau Rendez-Vous</h1>
    <form method="POST">
      <!-- Client ID -->
      <div class="mb-4">
        <label for="client_id" class="block text-sm font-medium text-gray-700 mb-1">Client ID</label>
        <select id="client_id" name="client_id" required 
              class="shadow border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
              <?php while ($client = $clients->fetch(PDO::FETCH_ASSOC)): ?>
                <option value="<?php echo $client['id']; ?>">
                  <?php echo htmlspecialchars($client['nom'] . ' ' . $client['prenom']); ?>
                </option>
              <?php endwhile; ?>
            </select>
        <p class="text-sm text-gray-500 mt-1">Choisir le nom du client pour le rendez-vous.</p>
      </div>

      <!-- Date -->
      <div class="mb-4">
        <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Date</label>
        <input type="date" id="date" name="date" required 
          class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2 text-sm text-gray-900">
        <p class="text-sm text-gray-500 mt-1">Selectionner la date pour le RV.</p>
      </div>

      <!-- Time -->
      <div class="mb-4">
        <label for="heure" class="block text-sm font-medium text-gray-700 mb-1">Heure</label>
        <input type="time" id="heure" name="heure" required 
          class="w-full border-red-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2 text-sm text-gray-900">
        <p class="text-sm text-gray-500 mt-1">Entre l'heure  pour  the RV (HH:MM).</p>
      </div>

      <!-- Description -->
      <div class="mb-6">
        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
        <textarea id="description" name="description" rows="3" placeholder="Enter appointment details" 
          class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2 text-sm text-gray-900"></textarea>
        <p class="text-sm text-gray-500 mt-1">Provide a brief description of the appointment.</p>
      </div>

      <!-- Submit Button -->
      <div class="flex justify-end">
        <button type="submit" 
          class="bg-black text-white font-medium rounded-md px-6 py-2 text-sm hover:bg-gray-900 focus:outline-none">
          Create Appointment
        </button>
      </div>
    </form>
  </div>
</body>
<?php
$content = ob_get_clean();
require_once '../app/views/layout/main.php';

?>
