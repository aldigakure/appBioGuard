<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - BioGuard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-zinc-950 text-white min-h-screen flex items-center justify-center">
    <div class="text-center">
        <h1 class="text-3xl font-bold text-emerald-400 mb-4">You logged as user</h1>
        <p class="text-xl text-zinc-300">Halo, <span class="text-white font-semibold">{{ Auth::user()->name }}</span>!</p>
        
        <div class="mt-8 flex justify-center gap-6">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-zinc-400 hover:text-white transition-colors underline">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>
