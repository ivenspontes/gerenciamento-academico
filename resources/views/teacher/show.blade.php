@extends('layouts.adminlte.layout')

@section('title', 'Mostar Professor')

@section('content')

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Professor - {{ $teacher->name }}</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Nome:</label>
                <input class="form-control form-control-lg" type="text" name="name" value="{{ $teacher->name }}" disabled>
            </div>
            <div class="row">

                <div class="col-sm-6 mb-3">
                    <label class="form-label">CPF:</label>
                    <input class="form-control form-control-lg" type="text" name="cpf" value="{{ $teacher->cpf }}"
                        disabled>
                </div>

                <div class="col-sm-6 mb-3">
                    <label class="form-label">Data de nascimento:</label>
                    <input class="form-control form-control-lg" type="date" name="birth_date"
                        value="{{ $teacher->birth_date }}" disabled>
                </div>


                <label class="form-label">Disciplinas:</label>
                @foreach ($teacher->disciplines as $discipline)
                    <div class="col-12">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" value="{{ $discipline->id }}"
                                name="disciplines[]" id="check{{ $discipline->id }}" disabled checked="">
                            <label class="form-check-label"
                                for="check{{ $discipline->id }}">{{ $discipline->name }}</label>
                        </div>
                    </div>
                @endforeach

                <label class="form-label">Turmas:</label>
                @foreach ($grids as $grid)
                    <div class="col-sm-12 mb-3">
                        <input class="form-control form-control-lg" type="text" name="cpf"
                            value="{{ $grid->classroom->name }}" disabled>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

@endsection
