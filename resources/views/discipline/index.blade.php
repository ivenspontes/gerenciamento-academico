@extends('layouts.adminlte.layout')

@section('title', 'Disciplinas')

@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Disciplinas</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            @if($disciplines->count())
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($disciplines as $discipline)
                            <td>{{ $discipline->name }}</td>

                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('discipline.show', $discipline->id) }}"><i
                                        class="fas fa-eye"></i></a>
                                <a class="btn btn-xs btn-warning" href="{{ route('discipline.edit', $discipline->id) }}"><i
                                        class="fas fa-edit"></i></a>

                                {{-- FIX THIS --}}
                                <a class="btn btn-xs btn-danger" href="{{ route('discipline.destroy', $discipline->id) }}"><i
                                        class="fas fa-times-circle"></i></a>
                            </td>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-center mb-3">
                    <h1>Sem registros</h1>
                    <a class="btn btn-primary" href="{{ route('discipline.create') }}">Criar</a>
                </div>
            @endif
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
