@extends('layouts.adminlte.layout')

@section('title', 'Horários')

@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Horários</h3>

            <div class="card-tools">
                <a class="btn btn-primary btn-xs" href="{{ route('horary.create') }}">Criar</a>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            @if ($horaries->count())
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
                        @foreach ($horaries as $horary)
                            <tr>
                                <td>{{ $horary->name }}</td>
                                <td>{{ ($horary->teacher) ? $horary->teacher->name : '' }}</td>
                                <td>{{ ($horary->discipline) ? $horary->discipline->name : '' }}</td>
                                <td>{{ ($horary->grid) ? $horary->grid->name : '' }}</td>
                                <td>{{ $horary->weekday }}</td>
                                <td>{{ $horary->start_time }}</td>
                                <td>{{ $horary->end_time }}</td>
                                <td>
                                    <a class="btn btn-xs btn-primary" href="{{ route('horary.show', $horary->id) }}"><i
                                            class="fas fa-eye"></i></a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('horary.edit', $horary->id) }}"><i
                                            class="fas fa-edit"></i></a>

                                    <form method='post' action="{{ route('horary.destroy', $horary->id) }}"
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
                    <a class="btn btn-primary" href="{{ route('horary.create') }}">Criar</a>
                </div>
            @endif
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
