@extends('layouts.adminlte.layout')

@section('title', 'Editar professor')

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
            <form method="post" action="{{ route('teacher.update', $teacher->id) }}">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label class="form-label">Nome:</label>
                    <input class="form-control form-control-lg" type="text" name="name" value="{{ $teacher->name }}">
                </div>
                <div class="row">

                    <div class="col-sm-6 mb-3">
                        <label class="form-label">CPF:</label>
                        <input class="form-control form-control-lg" type="text" name="cpf" value="{{ $teacher->cpf }}">
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label class="form-label">Data de nascimento:</label>
                        <input class="form-control form-control-lg" type="date" name="birth_date"
                            value="{{ $teacher->birth_date }}">
                    </div>
                </div>

                <label class="form-label">Disciplinas:</label>
                @foreach ($disciplines as $discipline)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="{{ $discipline->id }}" name="disciplines[]"
                            id="check{{ $discipline->id }}"
                            {{ $teacher->disciplines->where('id', $discipline->id)->first() ? 'checked=""' : '' }}>
                        <label class="form-check-label" for="check{{ $discipline->id }}">{{ $discipline->name }}</label>
                    </div>
                @endforeach

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

@section('js')
    {!! JsValidator::formRequest('App\Http\Requests\TeacherRequest') !!}
@endsection
