<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
</head>
<body>
    <h1>Lista de Notas</h1>

    <!-- Formulario para agregar una nueva nota -->
    <h2>Agregar nueva nota</h2>

    <!-- Mostrar errores si existen -->
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('notas.store') }}" method="POST">
        @csrf <!-- Token CSRF para seguridad -->
        
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
        <br><br>
        
        <label for="contenido">Contenido:</label>
        <textarea id="contenido" name="contenido" required>{{ old('contenido') }}</textarea>
        <br><br>
        
        <button type="submit">Guardar Nota</button> <!-- Botón para enviar el formulario -->
    </form>

    <h3>Notas existentes:</h3>
    @foreach ($notas as $nota)
        <p>
            <strong>{{ $nota->titulo }}</strong>: {{ $nota->contenido }}
        </p>
        
        <!-- Formulario para eliminar la nota -->
        <form action="{{ route('notas.destroy', $nota->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar</button>
        </form>
    @endforeach
</body>
</html>



