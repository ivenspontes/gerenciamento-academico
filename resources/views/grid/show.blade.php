@extends('layouts.adminlte.layout')

@section('title', 'Editar grade')

@section('content')

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Grade - {{ $grid->name }}</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Nome:</label>
                <input class="form-control form-control-lg" type="text" name="name" value="{{ $grid->name }}" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Turma:</label>
                <input class="form-control form-control-lg" type="text" name="name" value="{{ $grid->classroom->name }}" disabled>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

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
            @foreach ($horariesByWeek as $week)
                <h5>{{ $week->first()->weekday->name }}</h5>
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Professor</th>
                            <th>Disciplina</th>
                            <th>Inicio</th>
                            <th>Termino</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($week as $horary)
                            <tr>
                                <td>{{ $horary->name }}</td>
                                <td>{{ $horary->teacher->name }}</td>
                                <td>{{ $horary->discipline->name }}</td>
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
                <hr>

            @endforeach
        </div>
    </div>

@endsection
