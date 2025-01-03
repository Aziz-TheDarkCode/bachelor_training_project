


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Gestion Universitaire'; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://api.fontshare.com/v2/css?f[]=general-sans@400,500&display=swap">
    <style>
        body {
            font-family: 'General Sans', sans-serif;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1e40af',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
              <img 
                src="./logo.jpg" 
                alt="Logo" 
                class="w-10 mr-4 h-8 rounded"
            />

              <h1 class="text-xl font-bold text-gray-800">Gestion Universitaire</h1>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="index.php?controller=etudiant&action=index" class="inline-flex items-center px-1 pt-1 text-gray-700 hover:text-gray-900">
                            Étudiants
                            </a>
                        <a href="index.php?controller=cours&action=index" class="inline-flex items-center px-1 pt-1 text-gray-700 hover:text-gray-900">
                            Cours
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <?php echo $content; ?>
    </main>
</body>
</html>
