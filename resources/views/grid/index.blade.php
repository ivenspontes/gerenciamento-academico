@extends('layouts.adminlte.layout')

@section('title', 'Grade de horários')

@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Grade de horários</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            @if ($grids->count())
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Turma</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grids as $grid)
                            <td>{{ $grid->name }}</td>
                            <td>{{ $grid->classroom->name }}</td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('grid.show', $grid->id) }}"><i
                                        class="fas fa-eye"></i></a>
                                <a class="btn btn-xs btn-warning" href="{{ route('grid.edit', $grid->id) }}"><i
                                        class="fas fa-edit"></i></a>

                                {{-- FIX THIS --}}
                                <a class="btn btn-xs btn-danger" href="{{ route('grid.destroy', $grid->id) }}"><i
                                        class="fas fa-times-circle"></i></a>
                            </td>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-center mb-3">
                    <h1>Sem registros</h1>
                    <a class="btn btn-primary" href="{{ route('grid.create') }}">Criar</a>
                </div>
            @endif
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
