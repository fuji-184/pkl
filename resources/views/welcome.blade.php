<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
       
    <!-- CSS File -->
    

</head>

<body>

   Hello 
   
    <form action="{{ route('logout') }}" method="POST">
                      @csrf
                      @method('POST')
                      
                      <span>
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <button type="submit">Logout</button>
                      </span>
                      
                  </form>

</body>
</html>
