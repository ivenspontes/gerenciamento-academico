<h1>Criar professor</h1>

<form method="post" action="{{ route('teacher.store') }}">
    @csrf
    <label for="name">Nome:</label>
    <input type="text" name="name" id="name">
    <label for="cpf">CPF:</label>
    <input type="text" name="cpf" id="cpf">
    <label for="birth_date">Data de nascimento:</label>
    <input type="date" name="birth_date" id="birth_date">
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
