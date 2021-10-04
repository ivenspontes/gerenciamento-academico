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
                    @foreach ($teachers as $teacher)
                        <option value="" selected="selected">Escolha...</option>
                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Disciplina:</label>
                <select class="form-control" name="discipline_id" id="discipline_id">
                    @foreach ($disciplines as $discipline)
                        <option value="" selected="selected">Escolha...</option>
                        <option value="{{ $discipline->id }}">{{ $discipline->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Grade:</label>
                <select class="form-control" name="grid_id" id="grid_id">
                    @foreach ($grids as $grids)
                        <option value="" selected="selected">Escolha...</option>
                        <option value="{{ $grids->id }}">{{ $grids->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Dia da semana:</label>
                <select class="form-control" name="weekday" id="weekday">
                    <option value="" selected="selected">Escolha...</option>
                    <option value="Domingo">Domingo</option>
                    <option value="Segunda-Feira">Segunda-Feira</option>
                    <option value="Terça-Feira">Terça-Feira</option>
                    <option value="Quarta-Feira">Quarta-Feira</option>
                    <option value="Quinta-Feira">Quinta-Feira</option>
                    <option value="Sexta-Feira">Sexta-Feira</option>
                    <option value="Sábado">Sábado</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Horário inicio:</label>
                <input class="form-control form-control-lg" type="time" name="start_time" value="{{ old('start_time') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Horário termino:</label>
                <input class="form-control form-control-lg" type="time" name="end_time" value="{{ old('name') }}">
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
