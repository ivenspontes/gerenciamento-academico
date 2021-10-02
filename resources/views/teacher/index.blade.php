<h1>Professores</h1>

@isset($teachers)
    @foreach ($teachers as $teacher)
        {{ $teacher->name }} </br>
        {{ $teacher->cpf }}</br>
        {{ $teacher->birth_date }}</br>
        --------- </br>
    @endforeach
@endisset
