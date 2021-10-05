@extends('layouts.adminlte.layout')

@section('title', 'Turmas')

@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Turmas</h3>

            <div class="card-tools">
                <a class="btn btn-primary btn-xs" href="{{ route('classroom.create') }}">Criar</a>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            @if ($classrooms->count())
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Grade</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classrooms as $classroom)
                            <tr>
                                <td>{{ $classroom->name }}</td>
                                <td>{{ ($classroom->grid) ? $classroom->grid->name : '' }}</td>

                                <td>
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('classroom.show', $classroom->id) }}"><i
                                            class="fas fa-eye"></i></a>
                                    <a class="btn btn-xs btn-warning"
                                        href="{{ route('classroom.edit', $classroom->id) }}"><i
                                            class="fas fa-edit"></i></a>

                                    <form method='post' action="{{ route('classroom.destroy', $classroom->id) }}"
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
            @else
                <div class="text-center mb-3">
                    <h1>Sem registros</h1>
                    <a class="btn btn-primary" href="{{ route('classroom.create') }}">Criar</a>
                </div>
            @endif
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
