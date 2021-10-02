<h1>Professor</h1>

<form method="post" action="{{ route('teacher.update', $teacher->id) }}">
    <input type="text" name="name" id="name" value="{{ $teacher->name }}">
    <input type="text" name="cpf" id="cpf" value="{{ $teacher->cpf }}">
    <input type="date" name="birth_date" id="birth_date" value="{{ $teacher->birth_date }}">
    <input type="submit" value="Atualizar">
</form>
