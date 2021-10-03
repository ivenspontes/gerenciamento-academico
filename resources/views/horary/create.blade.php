<h1>Criar horário</h1>

<form method="post" action="{{ route('teacher.store') }}">
    @csrf
    <label for="teacher_id">Professor:</label>
    <input type="text" name="teacher_id" id="teacher_id">
    <label for="discipline_id">Disciplina:</label>
    <input type="text" name="discipline_id" id="discipline_id">
    <label for="weekday">Dia da semana:</label>
    <input type="text" name="weekday" id="weekday">
    <label for="start_time">Horário de início:</label>
    <input type="date" name="start_time" id="start_time">
    <label for="end_time">Horário de término:</label>
    <input type="date" name="end_time" id="end_time">
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
