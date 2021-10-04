<h1>Grade de horário</h1>

<form method="post" action="{{ route('teacher.update', $grid->id) }}">
    <input type="text" name="name" id="name" value="{{ $grid->name }}">
    <input type="submit" value="Atualizar">
</form>
