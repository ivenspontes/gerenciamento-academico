<h1>Criar disciplina</h1>

<form method="post" action="{{ route('teacher.store') }}">
    @csrf
    <label for="name">Nome:</label>
    <input type="text" name="name" id="name">
    <input type="submit" value="enviar">
</form>

@isset ($errors)

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endisset