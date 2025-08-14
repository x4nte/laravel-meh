<!DOCTYPE html>
<html lang="ru" class="scroll-smooth">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    @vite('resources/css/app.css')
</head>
<body {{$attributes->merge(['class' => 'bg-black text-white min-h-screen font-sans selection:bg-white selection:text-black'],$attributes)}} >
<x-header></x-header>
{{$slot}}
</body>
</html>
