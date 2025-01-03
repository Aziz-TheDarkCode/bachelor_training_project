<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Ferme</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Fontshare General Sans -->
    <link rel="stylesheet" href="https://api.fontshare.com/v2/css?f[]=general-sans@400,500&display=swap">

    <style>
        body {
            font-family: 'General Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Header Section -->
    <header class="bg-emerald-600 text-white p-4">
        <div class="container mx-auto flex items-center justify-between">
            <h1 class="text-2xl font-bold">Gestion Ferme</h1>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="{{ url('/equipment') }}" class="hover:text-gray-300">Équipements</a></li>
                    <li><a href="{{ url('/animals') }}" class="hover:text-gray-300">Animaux</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content Section -->
    <main class="py-6">
        <div class="container mx-auto px-4">
            @yield('content')
        </div>
    </main>

    <!-- Footer Section -->
    <footer class="bg-emerald-600 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 Gestion Ferme. Tous droits réservés.</p>
        </div>
    </footer>

</body>
</html>

