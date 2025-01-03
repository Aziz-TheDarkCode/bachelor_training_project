<?php
$title = "Liste des clients";
ob_start();
?>


<div class="">
<div class="px-4 py-6 sm:px-0">
<h1 class="text-3xl font-bold text-gray-900 mb-6">Liste des Clients</h1>
<a href="index.php?controller=client&action=create"
class="mb-6 inline-block px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700">
Nouveau Client
</a>
<div class="mt-4 overflow-x-auto">
<table class="min-w-full bg-white shadow-md rounded-lg">
<thead class="bg-gray-50">
<tr>
<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prénom</th>
<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Téléphone</th>
<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-gray-200">
<?php while ($client = $clients->fetch(PDO::FETCH_ASSOC)): ?>
<tr>
<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($client['nom']); ?></td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($client['prenom']); ?></td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($client['email']); ?></td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($client['telephone']); ?></td>
<td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
<a href="index.php?controller=client&action=edit&id=<?php echo $client['id']; ?>"
class="text-yellow-600 hover:text-yellow-900 mr-4">Modifier</a>
<a href="index.php?controller=client&action=delete&id=<?php echo $client['id']; ?>"
class="text-red-600 hover:text-red-900"
onclick="return confirm('Êtes-vous sûr?')">Supprimer</a>
</td>
</tr>
<?php endwhile; ?>
</tbody>
</table>
</div>
</div>
</div>
<?php
$content = ob_get_clean();
require_once '../app/views/layout/main.php';
?>
