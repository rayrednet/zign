<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Zign - Sign Language Plugin for Zoom</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto px-4 py-8">
        <header class="text-center mb-8">
            <h1 class="text-4xl font-bold text-blue-600">Welcome to Zign</h1>
            <p class="text-xl text-gray-600 mt-2">Enhancing Zoom meetings with sign language support</p>
        </header>

        <main class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-8">
            <section class="mb-8">
                <h2 class="text-2xl font-semibold mb-4">About Zign</h2>
                <p class="text-gray-700">Zign is a powerful sign language plugin for Zoom that helps make your meetings more inclusive and accessible. With real-time sign language interpretation and customizable features, Zign bridges communication gaps effortlessly.</p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold mb-4">Key Features</h2>
                <ul class="list-disc list-inside text-gray-700">
                    <li>Real-time sign language interpretation</li>
                    <li>Customizable interpreter window</li>
                    <li>Support for multiple sign languages</li>
                    <li>Easy integration with Zoom</li>
                </ul>
            </section>

            <section class="text-center">
                <h2 class="text-2xl font-semibold mb-4">Get Started</h2>
                <p class="text-gray-700 mb-4">Sign in with your Zoom account to start using Zign in your meetings.</p>
                <a href="https://zoom.us/oauth/authorize?response_type=code&client_id={{ env('ZOOM_CLIENT_ID') }}&redirect_uri={{ urlencode(config('app.url') . '/oauth/callback') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300">
                    Sign in with Zoom
                </a>
            </section>
        </main>

        <footer class="text-center mt-8 text-gray-600">
            <p>&copy; {{ date('Y') }} Zign. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>