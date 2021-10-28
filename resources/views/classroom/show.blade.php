@extends('layouts.adminlte.layout')

@section('title', 'Mostar turma')

@section('content')

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Turma - {{ $classroom->name }}</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Nome:</label>
                <input class="form-control form-control-lg" type="text" name="name" value="{{ $classroom->name }}"
                    disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Grade:</label>
                <input class="form-control form-control-lg" type="text" name="name"
                    value="{{ $classroom->grid ? $classroom->grid->name : '' }}" disabled>
            </div>
        </div>


        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    @if ($gridsWeek)

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Grade de horário</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @foreach ($gridsWeek as $key => $value)
                    <h4>{{ $key }}</h4>
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Professor</th>
                                <th>Disciplina</th>
                                <th>Grade</th>
                                <th>Dia da semana</th>
                                <th>Inicio</th>
                                <th>Termino</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- {{ dd($classroom->grid->horaries->groupBy('weekday')) }} --}}

                            @foreach ($value as $horary)
                                <tr>
                                    <td>{{ $horary['name'] }}</td>
                                    <td>{{ \App\Models\Teacher::find($horary['teacher_id'])->name }}</td>
                                    <td>{{ \App\Models\Discipline::find($horary['discipline_id'])->name }}</td>
                                    <td>{{ \App\Models\Grid::find($horary['grid_id'])->name }}</td>
                                    <td>{{ $horary['weekday'] }}</td>
                                    <td>{{ $horary['start_time'] }}</td>
                                    <td>{{ $horary['end_time'] }}</td>

                                    <td>
                                        <a class="btn btn-xs btn-primary"
                                            href="{{ route('student.show', $horary['id']) }}"><i
                                                class="fas fa-eye"></i></a>
                                        <a class="btn btn-xs btn-warning"
                                            href="{{ route('student.edit', $horary['id']) }}"><i
                                                class="fas fa-edit"></i></a>
                                        <form method='post' action="{{ route('horary.destroy', $horary['id']) }}"
                                            style="display:inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-xs">
                                                <i class="fas fa-times-circle"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                @endforeach
            </div>

            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    @endif



    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Estudantes</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Data nascimento</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classroom->students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->cpf }}</td>
                            <td>{{ $student->birth_date }}</td>

                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('student.show', $student->id) }}"><i
                                        class="fas fa-eye"></i></a>
                                <a class="btn btn-xs btn-warning" href="{{ route('student.edit', $student->id) }}"><i
                                        class="fas fa-edit"></i></a>

                                <form method='post' action="{{ route('horary.destroy', $student->id) }}"
                                    style="display:inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-xs">
                                        <i class="fas fa-times-circle"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    @if ($teachers)

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Professores</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Data nascimento</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $teacher)

                            <tr>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->cpf }}</td>
                                <td>{{ $teacher->birth_date }}</td>

                                <td>
                                    <a class="btn btn-xs btn-primary" href="{{ route('teacher.show', $teacher->id) }}"><i
                                            class="fas fa-eye"></i></a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('teacher.edit', $teacher->id) }}"><i
                                            class="fas fa-edit"></i></a>

                                    <form method='post' action="{{ route('horary.destroy', $teacher->id) }}"
                                        style="display:inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-xs">
                                            <i class="fas fa-times-circle"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    @endif

@if ($disciplines)

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Disciplinas</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover my-0">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($disciplines as $discipline)

                    <tr>
                        <td>{{ $discipline->name }}</td>

                        <td>
                            <a class="btn btn-xs btn-primary"
                                href="{{ route('discipline.show', $discipline->id) }}"><i
                                    class="fas fa-eye"></i></a>
                            <a class="btn btn-xs btn-warning"
                                href="{{ route('discipline.edit', $discipline->id) }}"><i
                                    class="fas fa-edit"></i></a>

                            <form method='post' action="{{ route('horary.destroy', $discipline->id) }}"
                                style="display:inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-xs">
                                    <i class="fas fa-times-circle"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

@endif



@endsection
