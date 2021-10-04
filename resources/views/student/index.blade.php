<h1>Estudantes</h1>

@isset($students)
    @foreach ($students as $student)
        {{ $student->name }} </br>
        {{ $student->cpf }}</br>
        {{ $student->birth_date }}</br>
        --------- </br>
    @endforeach
@endisset
