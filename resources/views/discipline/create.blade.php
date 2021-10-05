@extends('layouts.adminlte.layout')

@section('title', 'Criar disciplina')

@section('content')

<!-- Default box -->
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Criar disciplina</h3>

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
        <form method="post" action="{{ route('discipline.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nome:</label>
                <input class="form-control form-control-lg" type="text" name="name" value="{{ old('name') }}">
            </div>

            <label class="form-label">Professores:</label>
            @foreach ($teachers as $teacher)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" value="{{ $teacher->id }}" name="teachers[]" id="check{{ $teacher->id }}">
                    <label class="form-check-label" for="check{{ $teacher->id }}">{{ $teacher->name }}</label>
                </div>
            @endforeach

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
