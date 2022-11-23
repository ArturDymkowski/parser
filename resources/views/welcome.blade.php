<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Friendly Solutions Corp</title>
    </head>
    <body>
        <a href="{{ route('export') }}">Pobierz CSV</a>
    </body>
</html>
