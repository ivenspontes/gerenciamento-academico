<h1>Disciplinas</h1>

@isset($disciplines)
    @foreach ($disciplines as $discipline)
        {{ $discipline->name }} </br>
        {{ $discipline->cpf }}</br>
        {{ $discipline->birth_date }}</br>
        --------- </br>
    @endforeach
@endisset
