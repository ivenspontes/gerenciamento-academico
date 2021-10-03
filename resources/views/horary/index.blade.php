<h1>Horários</h1>

@isset($horaries)
    @foreach ($horaries as $horary)
        {{ $horary->teacher->name }} </br>
        {{ $horary->discipline->name  }}</br>
        {{ $horary->weekday }}</br>
        {{ $horary->start_time }}</br>
        {{ $horary->end_time }}</br>
        --------- </br>
    @endforeach
@endisset
