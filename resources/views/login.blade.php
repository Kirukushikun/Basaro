<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col items-center justify-center h-screen ">
    <div class="bg-white p-10 rounded-xl shadow-lg w-full max-w-sm">
        <!-- Heading -->
        <h1 class="text-4xl font-bold text-center">Welcome</h1>
        <p class="text-center text-gray-500 mt-2">We are glad to see you back with us</p>

        <!-- Form -->
        <form class="mt-6 space-y-4">
            <!-- Username -->
            <div>
                <label class="sr-only" for="username">Username</label>
                <div class="flex items-center bg-gray-100 rounded-lg px-3 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A7 7 0 1119 17.804M12 14a4 4 0 100-8 4 4 0 000 8z"/>
                    </svg>
                    <input type="text" id="username" placeholder="Username"
                        class="bg-gray-100 focus:outline-none ml-2 w-full">
                </div>
            </div>

            <!-- Password -->
            <div>
                <label class="sr-only" for="password">Password</label>
                <div class="flex items-center bg-gray-100 rounded-lg px-3 py-2">
                    <input type="password" id="password" placeholder="Password"
                        class="bg-gray-100 focus:outline-none ml-2 w-full">
                </div>
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full bg-black text-white font-bold py-2 rounded-lg hover:bg-gray-800 transition-colors">
                SIGN IN
            </button>
        </form>
    </div>
    
</body>
</html>