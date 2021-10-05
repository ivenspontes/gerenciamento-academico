@extends('layouts.adminlte.layout')

@section('title', 'Mostar disciplina')

@section('content')

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Disciplina - {{ $discipline->name }}</h3>

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
                <input class="form-control form-control-lg" type="text" name="name" value="{{ $discipline->name }}"
                    disabled>
            </div>

            <label class="form-label">Disciplinas:</label>
            @foreach ($discipline->teachers as $teacher)
                <div class="col-12">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="{{ $teacher->id }}" name="teachers[]"
                            id="check{{ $teacher->id }}" disabled checked="">
                        <label class="form-check-label" for="check{{ $teacher->id }}">{{ $teacher->name }}</label>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

@endsection
