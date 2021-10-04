@extends('layouts.adminlte.layout')

@section('title', 'Editar grade')

@section('content')

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Grade - {{ $grid->name }}</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">

                @csrf
                @method('put')
                <div class="mb-3">
                    <label class="form-label">Nome:</label>
                    <input class="form-control form-control-lg" type="text" name="name" value="{{ $grid->name }}" disabled>
                </div>

                <div class="mb-3">
                    <select class="form-control" name="classroom_id" id="classroom_id">
                        @foreach ($classrooms as $classroom)
                            <option value="{{ $classroom->id }}" {{ ($grid->classroom->id == $classroom->id) ?  'selected="selected"' : ''}} disabled>{{ $classroom->name }}</option>
                        @endforeach
                    </select>
                </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

@endsection
