@extends('layouts.adminlte.layout')

@section('title', 'Professores')

@section('content')
    <!-- Default box -->
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
            @empty(!$teachers)
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>cpf</th>
                            <th>Data de nascimento</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $teacher)
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->cpf }}</td>
                            <td>{{ $teacher->birth_date }}</td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('teacher.show', $teacher->id) }}"><i
                                        class="fas fa-eye"></i></a>
                                <a class="btn btn-xs btn-warning" href="{{ route('teacher.edit', $teacher->id) }}"><i
                                        class="fas fa-edit"></i></a>

                                {{-- FIX THIS --}}
                                <a class="btn btn-xs btn-danger" href="{{ route('teacher.destroy', $teacher->id) }}"><i
                                        class="fas fa-times-circle"></i></a>
                            </td>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-center mb-3">
                    <h1>Sem registros</h1>
                    <a class="btn btn-primary" href="{{ route('teacher.create') }}">Criar</a>
                </div>
            @endempty
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
