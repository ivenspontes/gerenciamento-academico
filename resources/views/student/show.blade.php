@extends('layouts.adminlte.layout')

@section('title', 'Mostar estudante')

@section('content')

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Estudante - {{ $student->name }}</h3>

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
                <input class="form-control form-control-lg" type="text" name="name" value="{{ $student->name }}" disabled>
            </div>
            <div class="row">

                <div class="col-sm-6 mb-3">
                    <label class="form-label">CPF:</label>
                    <input class="form-control form-control-lg" type="text" name="cpf" value="{{ $student->cpf }}"
                        disabled>
                </div>

                <div class="col-sm-6 mb-3">
                    <label class="form-label">Data de nascimento:</label>
                    <input class="form-control form-control-lg" type="date" name="birth_date"
                        value="{{ $student->birth_date }}" disabled>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Turma:</label>
                <input class="form-control form-control-lg" type="text" name="classroom"
                    value="{{ isset($student->classroom->name) ? $student->classroom->name : '' }}" disabled>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

@endsection
