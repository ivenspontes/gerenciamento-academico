<h1>Horário</h1>

<form method="post" action="{{ route('horary.update', $horary->id) }}">
    <input type="text" name="teacher_id" id="teacher_id" value="{{ $horary->teacher->name }}">
    <input type="text" name="discipline_id" id="discipline_id" value="{{ $horary->discipline->name }}">
    <input type="text" name="grid_id" id="grid_id" value="{{ $horary->grid->name }}">
    <input type="text" name="weekday" id="weekday" value="{{ $horary->weekday }}">
    <input type="date" name="start_time" id="start_time" value="{{ $horary->start_time }}">
    <input type="date" name="end_time" id="end_time" value="{{ $horary->end_time }}">
    <input type="submit" value="Atualizar">
</form>
