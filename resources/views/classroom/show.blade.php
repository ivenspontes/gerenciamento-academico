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
        </div>


        <!-- /.card-body -->
    </div>
    <!-- /.card -->

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

                                {{-- FIX THIS --}}
                                <a class="btn btn-xs btn-danger" href="{{ route('student.destroy', $student->id) }}"><i
                                        class="fas fa-times-circle"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

@endsection
