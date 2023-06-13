<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <script src="https://kit.fontawesome.com/7c8801c017.js" crossorigin="anonymous"></script>

    <!-- Roboto Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    
    
    <style>
      

    </style>
    
    
    
    
    </head>
    <body>
        <div class="container">
            @include('components.nav')

<div class="flex flex-col main">
            <!-- Page Heading -->
            @if (isset($header))
                <header class="header">
                
                        {{ $header }}
                    
                </header>
            @endif

            <!-- Page Content -->
            <main class="mt-5 konten">
              
                {{ $slot }}
                
            </main>
            </div>
        </div>
        
    <script>
  
    </script>
        
    </body>
</html>
