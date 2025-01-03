<?php
$title = "Liste des rendez-vous";
ob_start();
?>

<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
<div class="px-4 py-6 sm:px-0">
<h1 class="text-3xl font-bold text-gray-900 mb-6">Liste des Rendez-vous</h1>
<a href="index.php?controller=rendezvous&action=create" class="mb-6 inline-block px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700">
Nouveau Rendez-vous
</a>
<div class="mt-4 overflow-x-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
  <?php while ($rdv = $rendezVous->fetch(PDO::FETCH_ASSOC)): ?>
  <div class="w-full max-w-md border rounded-lg shadow-md bg-white">
    <div class="p-4 border-b">
      <h2 class="text-lg font-semibold">
        <?php echo htmlspecialchars($rdv['nom'] . ' ' . $rdv['prenom']); ?>
      </h2>
    </div>
    <div class="p-4 grid gap-4">
      <div class="flex items-center">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="mr-2 h-4 w-4 opacity-70"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          stroke-width="2"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M8 7V3m8 4V3M4 11h16M4 19h16M4 15h16M4 7h16"
          />
        </svg>
        <span class="text-sm text-gray-500">
          <?php echo htmlspecialchars($rdv['date']); ?>
        </span>
      </div>
      <div class="flex items-center">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="mr-2 h-4 w-4 opacity-70"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          stroke-width="2"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M12 8v4l3 3m0 0H6.5"
          />
        </svg>
        <span class="text-sm text-gray-500">
          <?php echo htmlspecialchars($rdv['heure']); ?>
        </span>
      </div>
      <p class="text-sm text-gray-500">
        <?php echo htmlspecialchars($rdv['description']); ?>
      </p>
    </div>
    <div class="p-4 border-t flex justify-end space-x-2">
      <a
        href="index.php?controller=rendezvous&action=edit&id=<?php echo $rdv['id']; ?>"
        class="flex items-center px-3 py-1 text-sm text-gray-700 border rounded hover:bg-gray-100"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="mr-2 h-4 w-4"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          stroke-width="2"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M11 5h3m0 4h-4l-1-4m6 5H7"
          />
        </svg>
        Modifier
      </a>
      <a
        href="index.php?controller=rendezvous&action=delete&id=<?php echo $rdv['id']; ?>"
        class="flex items-center px-3 py-1 text-sm text-red-600 border rounded hover:bg-red-100"
        onclick="return confirm('Êtes-vous sûr?')"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="mr-2 h-4 w-4"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          stroke-width="2"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M19 9l-7 7-7-7"
          />
        </svg>
        Supprimer
      </a>
    </div>
  </div>
  <?php endwhile; ?>
</div>

        </div>
</div>
</div>
<?php
$content = ob_get_clean();
require_once '../app/views/layout/main.php';

?>

