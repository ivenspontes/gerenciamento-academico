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
                <select class="form-control" name="classroom_id" id="classroom_id">
                    @foreach ($classrooms as $classroom)
                        <option value="{{ $classroom->id }}"
                            {{ $grid->classroom->id == $classroom->id ? 'selected="selected"' : '' }} disabled>
                            {{ $classroom->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Horarios</h3>

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
                        <th>Turma</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($grid->horaries->sortBy('start_time') as $horary)
                        <tr>
                            <td>{{ $horary->name }}</td>
                            <td>{{ $horary->teacher->name }}</td>
                            <td>{{ $horary->discipline->name }}</td>
                            <td>{{ $horary->weekday }}</td>
                            <td>{{ $horary->start_time }}</td>
                            <td>{{ $horary->end_time }}</td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('grid.show', $grid->id) }}"><i
                                        class="fas fa-eye"></i></a>
                                <a class="btn btn-xs btn-warning" href="{{ route('grid.edit', $grid->id) }}"><i
                                        class="fas fa-edit"></i></a>

                                <form method='post' action="{{ route('grid.destroy', $grid->id) }}"
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

@endsection
