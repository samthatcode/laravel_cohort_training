<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ninja Network</title>

    @vite('resources/css/app.css')
</head>

<body>

    <header>
        <nav>
            <h1>Trainee Network</h1>
            <a href="{{ route('trainees.index') }}">
                All Trainee
            </a>
            <a href="{{ route('trainees.create') }}">
                Create New Trainee
            </a>
        </nav>
    </header>

    <main class="container">
        {{ $slot }}
    </main>

</body>

</html>
