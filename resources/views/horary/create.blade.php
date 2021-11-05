@extends('layouts.adminlte.layout')

@section('title', 'Criar horário')

@section('content')

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Criar horário</h3>

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
            <form method="post" action="{{ route('horary.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nome:</label>
                    <input class="form-control form-control-lg" type="text" name="name" value="{{ old('name') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Professor:</label>
                    <select class="form-control" name="teacher_id" id="teacher_id">
                        <option value="" selected="selected">Escolha...</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}"
                                {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>

                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Disciplina:</label>
                    <select class="form-control" name="discipline_id" id="discipline_id">
                        <option value="" selected="selected">Escolha...</option>
                        @foreach ($disciplines as $discipline)
                            <option value="{{ $discipline->id }}"
                                {{ old('discipline_id') == $discipline->id ? 'selected' : '' }}>{{ $discipline->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Grade:</label>
                    <select class="form-control" name="grid_id" id="grid_id">
                        <option value="" selected="selected">Escolha...</option>
                        @foreach ($grids as $grid)
                            <option value="{{ $grid->id }}" {{ old('grid_id') == $grid->id ? 'selected' : '' }}>
                                {{ $grid->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Dia da semana:</label>
                    <select class="form-control" name="week_id" id="week_id">
                        <option value="" selected="selected">Escolha...</option>
                        @foreach ($weekdays as $day)
                            <option value="{{ $day->id }}" {{ old('week_id') == $day->id ? 'selected' : '' }}>{{ $day->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Horário inicio:</label>
                    <input class="form-control form-control-lg" type="time" name="start_time"
                        value="{{ old('start_time') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Horário termino:</label>
                    <input class="form-control form-control-lg" type="time" name="end_time"
                        value="{{ old('end_time') }}">
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-lg btn-primary">Criar</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    @isset($errors)
        @if ($errors->any())

            <div class="alert alert-danger" role="alert">
                <div class="alert-message">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            </div>

        @endif
    @endisset

@endsection

@section('js')
    {!! JsValidator::formRequest('App\Http\Requests\HoraryRequest') !!}
@endsection
