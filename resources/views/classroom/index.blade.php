<h1>Turmas</h1>

@isset($classrooms)
    @foreach ($classrooms as $classroom)
        {{ $classroom->name }} </br>
        --------- </br>
    @endforeach
@endisset
