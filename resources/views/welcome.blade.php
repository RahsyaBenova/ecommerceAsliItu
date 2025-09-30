<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ecommerce - app</title>
        @vite('resources/css/app.css')
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        @vite('resources/js/app.js')
    </head>
    <body>
        <livewire:header />
        <livewire:hero-section />
        <livewire:ai-product-recommendation />
        <livewire:product-section />
        <livewire:footer />
    </body>
</html>
