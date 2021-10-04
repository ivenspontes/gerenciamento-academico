<h1>Grades de horários</h1>

@isset($grids)
    @foreach ($grids as $grid)
        {{ $grid->name }} </br>
        {{ $grid->classroom }}</br>
        {{-- {{ $grid->birth_date }}</br> --}}
        --------- </br>
    @endforeach
@endisset
