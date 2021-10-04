<h1>Criar horário</h1>

<form method="post" action="{{ route('teacher.store') }}">
    @csrf
    <label for="teacher_id">Professor:</label>
    <select name="teacher_id" id="teacher_id">
        @foreach ($teachers as $teacher)
            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
        @endforeach
    </select>

    <label for="discipline_id">Disciplina:</label>
    <select name="discipline_id" id="discipline_id">
        @foreach ($disciplines as $discipline)
            <option value="{{ $discipline->id }}">{{ $discipline->name }}</option>
        @endforeach
    </select>

    <label for="grid_id">Grade:</label>
    <select name="grid_id" id="grid_id">
        @foreach ($grids as $grid)
            <option value="{{ $grid->id }}">{{ $grid->name }}</option>
        @endforeach
    </select>

    <label for="weekday">Dia da semana:</label>
    <select name="weekday" id="weekday">
        <option value="Domingo">Domingo</option>
        <option value="Segunda-Feira">Segunda-Feira</option>
        <option value="Terça-Feira">Terça-Feira</option>
        <option value="Quarta-Feira">Quarta-Feira</option>
        <option value="Quinta-Feira">Quinta-Feira</option>
        <option value="Sexta-Feira">Sexta-Feira</option>
        <option value="Sábado">Sábado</option>
    </select>

    <label for="start_time">Horário de início:</label>
    <input type="time" name="start_time" id="start_time">
    <label for="end_time">Horário de término:</label>
    <input type="time" name="end_time" id="end_time">
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
