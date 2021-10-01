<h1>Professores</h1>

@isset($teachers)
    @foreach ($teachers as $teacher)
        {{ $teacher->name }}
        {{ $teacher->cpf }}
        {{ $teacher->birth_date }}
    @endforeach
@endisset
