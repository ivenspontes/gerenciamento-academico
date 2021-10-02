<h1>Disciplina</h1>

<form method="post" action="{{ route('teacher.update', $discipline->id) }}">
    <input type="text" name="name" id="name" value="{{ $discipline->name }}">
    <input type="submit" value="Atualizar">
</form>
