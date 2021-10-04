@extends('layouts.adminlte.layout')

@section('title', 'Criar professor')

@section('content')

<!-- Default box -->
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Criar professor</h3>

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
        <form method="post" action="{{ route('teacher.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nome:</label>
                <input class="form-control form-control-lg" type="text" name="name" value="{{ old('name') }}">
            </div>
            <div class="row">

                <div class="col-sm-6 mb-3">
                    <label class="form-label">CPF:</label>
                    <input class="form-control form-control-lg" type="text" name="cpf" value="{{ old('cpf') }}">
                </div>

                <div class="col-sm-6 mb-3">
                    <label class="form-label">Data de nascimento:</label>
                    <input class="form-control form-control-lg" type="date" name="birth_date" value="{{ old('birth_date') }}">
                </div>
            </div>
            <div class="text-center mt-3">
                {{-- <a href="index.html" class="btn btn-lg btn-primary">Criar</a> --}}
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
