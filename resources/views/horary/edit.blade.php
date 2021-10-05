@extends('layouts.adminlte.layout')

@section('title', 'Editar horário')

@section('content')

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar horário</h3>

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
            <form method="post" action="{{ route('horary.update', $horary->id) }}">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label class="form-label">Nome:</label>
                    <input class="form-control form-control-lg" type="text" name="name" value="{{ $horary->name }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Professor:</label>
                    <select class="form-control" name="teacher_id" id="teacher_id">
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}"
                                {{ $horary->teacher->id == $teacher->id ? 'selected="selected"' : '' }}>
                                {{ $teacher->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Disciplina:</label>
                    <select class="form-control" name="discipline_id" id="discipline_id">
                        @foreach ($disciplines as $discipline)
                            <option value="{{ $discipline->id }}"
                                {{ $horary->discipline->id == $discipline->id ? 'selected="selected"' : '' }}>
                                {{ $discipline->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Grade:</label>
                    <select class="form-control" name="grid_id" id="grid_id">
                        @foreach ($grids as $grid)
                            <option value="{{ $grid->id }}"
                                {{ $horary->grid->id == $grid->id ? 'selected="selected"' : '' }}>{{ $grid->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Dia da semana:</label>
                    <select class="form-control" name="weekday" id="weekday">
                        <option value="Domingo" {{ $horary->weekday == 'Domingo' ? 'selected="selected"' : '' }}>
                            Domingo</option>
                        <option value="Segunda-Feira"
                            {{ $horary->weekday == 'Segunda-Feira' ? 'selected="selected"' : '' }}>Segunda-Feira
                        </option>
                        <option value="Terça-Feira"
                            {{ $horary->weekday == 'Terça-Feira' ? 'selected="selected"' : '' }}>Terça-Feira</option>
                        <option value="Quarta-Feira"
                            {{ $horary->weekday == 'Quarta-Feira' ? 'selected="selected"' : '' }}>Quarta-Feira</option>
                        <option value="Quinta-Feira"
                            {{ $horary->weekday == 'Quinta-Feira' ? 'selected="selected"' : '' }}>Quinta-Feira</option>
                        <option value="Sexta-Feira"
                            {{ $horary->weekday == 'Sexta-Feira' ? 'selected="selected"' : '' }}>Sexta-Feira</option>
                        <option value="Sábado" {{ $horary->weekday == 'Sábado' ? 'selected="selected"' : '' }}>Sábado
                        </option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Horário inicio:</label>
                    <input class="form-control form-control-lg" type="time" name="start_time"
                        value="{{ $horary->start_time }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Horário termino:</label>
                    <input class="form-control form-control-lg" type="time" name="end_time"
                        value="{{ $horary->end_time }}">
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-lg btn-primary">Atualizar</button>
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
{{--
@section('js')
    {!! JsValidator::formRequest('App\Http\Requests\HoraryRequest') !!}
@endsection --}}
