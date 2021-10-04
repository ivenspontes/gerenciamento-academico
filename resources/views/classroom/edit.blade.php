<h1>Turma</h1>

<form method="post" action="{{ route('classroom.update', $classroom->id) }}">
    <input type="text" name="name" id="name" value="{{ $classroom->name }}">
    <input type="submit" value="Atualizar">
</form>
