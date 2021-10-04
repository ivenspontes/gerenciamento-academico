@extends('layouts.adminlte.layout')

@section('title', 'Mostar turma')

@section('content')

<!-- Default box -->
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Turma - {{ $classroom->name }}</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label">Nome:</label>
            <input class="form-control form-control-lg" type="text" name="name" value="{{ $classroom->name }}" disabled>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

@endsection
