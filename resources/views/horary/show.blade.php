@extends('layouts.adminlte.layout')

@section('title', 'Mostrar horário')

@section('content')

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Mostrar horário</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                {{-- <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button> --}}
            </div>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Nome:</label>
                <input disabled class="form-control form-control-lg" type="text" name="name" value="{{ $horary->name }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Professor:</label>
                <select disabled class="form-control" name="teacher_id" id="teacher_id">
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}"
                            {{ $horary->teacher->id == $teacher->id ? 'selected="selected"' : '' }}>
                            {{ $teacher->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Disciplina:</label>
                <select disabled class="form-control" name="discipline_id" id="discipline_id">
                    @foreach ($disciplines as $discipline)
                        <option value="{{ $discipline->id }}"
                            {{ $horary->discipline->id == $discipline->id ? 'selected="selected"' : '' }}>
                            {{ $discipline->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Grade:</label>
                <select disabled class="form-control" name="grid_id" id="grid_id">
                    @foreach ($grids as $grid)
                        <option value="{{ $grid->id }}"
                            {{ $horary->grid->id == $grid->id ? 'selected="selected"' : '' }}>{{ $grid->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Dia da semana:</label>
                <select disabled class="form-control" name="weekday" id="weekday">
                    @foreach ($weekdays as $day)
                        <option value="{{ $day->id }}"
                            {{ $horary->week_id == $day->id ? 'selected="selected"' : '' }}>{{ $day->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Horário inicio:</label>
                <input disabled class="form-control form-control-lg" type="time" name="start_time"
                    value="{{ $horary->start_time }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Horário termino:</label>
                <input disabled class="form-control form-control-lg" type="time" name="end_time"
                    value="{{ $horary->end_time }}">
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

@endsection
