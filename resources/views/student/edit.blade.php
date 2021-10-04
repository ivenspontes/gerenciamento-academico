<h1>Estudante</h1>

<form method="post" action="{{ route('student.update', $student->id) }}">
    <input type="text" name="name" id="name" value="{{ $student->name }}">
    <input type="text" name="cpf" id="cpf" value="{{ $student->cpf }}">
    <input type="date" name="birth_date" id="birth_date" value="{{ $student->birth_date }}">
    <input type="submit" value="Atualizar">
</form>
