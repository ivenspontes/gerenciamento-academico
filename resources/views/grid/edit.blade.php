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
            <form method="post" action="{{ route('grid.update', $grid->id) }}">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label class="form-label">Nome:</label>
                    <input class="form-control form-control-lg" type="text" name="name" value="{{ $grid->name }}">
                </div>

                <div class="mb-3">
                    <select class="form-control" name="classroom_id" id="classroom_id">
                        @foreach ($classrooms as $classroom)
                            <option value="{{ $classroom->id }}" {{ ($grid->classroom->id == $classroom->id) ?  'selected="selected"' : ''}}>{{ $classroom->name }}</option>
                        @endforeach
                    </select>
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
