<?php
// app/views/etudiants/index.php
$title = "Liste des étudiants";
ob_start();
?>

<div class="sm:flex sm:items-center mb-6">
    <div class="sm:flex-auto">
        <h1 class="text-2xl font-bold tracking-tight text-gray-900">Étudiants</h1>
        <p class="mt-2 text-sm text-gray-500">Liste de tous les étudiants inscrits.</p>
    </div>
    <div class="mt-4 sm:mt-0 sm:ml-auto">
        <a href="index.php?action=create" 
           class="inline-flex items-center rounded-lg bg-primary px-4 py-2 text-sm font-medium text-white shadow-md transition hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
            Ajouter un étudiant
        </a>
    </div>
</div>

<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
    <?php while($row = $result->fetch_assoc()): ?>
    <div class="relative flex flex-col bg-white border rounded-lg shadow-sm hover:shadow-md transition overflow-hidden">
        <!-- Card Header -->
        <div class="text-gray-900 p-4 flex justify-between items-center">
            <div>
                <h2 class="text-lg font-semibold leading-tight">Carte de l'étudiant</h2>
                <p class="text-sm">Institut supérieur d'informatique</p>
            </div>
            <img 
                src="./logo.jpg" 
                alt="Logo" 
                class="w-10 h-8 rounded"
            />
        </div>

        <!-- Card Body -->
        <div class="p-4 space-y-4">
            <div class="flex">
                <div class="h-20 w-20 rounded-md overflow-hidden border">
                    <img 
                        src="https://ui-avatars.com/api/?name=<?php echo urlencode($row['nom'] . '+' . $row['prenom']); ?>&background=144f90&color=fff" 
                        alt="<?php echo htmlspecialchars($row['nom']); ?>" 
                        class="object-cover w-full h-full"
                    />
                </div>
                <div class="ml-4 space-y-2">
                    <p class="text-sm font-medium"><strong>Nom Complet:</strong> <?php echo htmlspecialchars($row['nom']) . ' ' . htmlspecialchars($row['prenom']); ?></p>
                    <p class="text-sm"><strong>Filière:</strong> <?php echo htmlspecialchars($row['filiere']); ?></p>
                    <p class="text-sm"><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
                </div>
            </div>
        </div>

        <!-- Card Footer -->
        <div class="flex justify-between items-center px-4 py-3 bg-gray-50 border-t">
            <a href="index.php?action=edit&id=<?php echo $row['id']; ?>" 
               class="text-sm font-medium text-primary hover:underline">
               Modifier
            </a>
            <a href="index.php?action=delete&id=<?php echo $row['id']; ?>" 
               class="text-sm font-medium text-red-600 hover:underline"
               onclick="return confirm('Êtes-vous sûr ?')">
               Supprimer
            </a>
        </div>
    </div>
    <?php endwhile; ?>
</div>

<?php
$content = ob_get_clean();
require_once '../views/layout/main.php';
?>

