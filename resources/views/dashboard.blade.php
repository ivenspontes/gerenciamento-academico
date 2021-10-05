@extends('layouts.adminlte.layout')

@section('title', 'dashboard')

@section('content')

<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
      <div class="info-box">
        <span class="info-box-icon bg-info"><i class="fa fa-user-tie"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Professores</span>
          <span class="info-box-number">{{ $teachers->count() }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-info"><i class="fas fa-chalkboard-teacher"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Disciplinas</span>
            <span class="info-box-number">{{ $disciplines->count() }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Turmas</span>
            <span class="info-box-number">{{ $classrooms->count() }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-info"><i class="fas fa-user-graduate"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Estudantes</span>
            <span class="info-box-number">{{ $students->count() }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-info"><i class="fas fa-grip-horizontal"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Grades</span>
            <span class="info-box-number">{{ $grids->count() }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-info"><i class="far fa-clock"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Horários</span>
            <span class="info-box-number">{{ $horaries->count() }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
</div>


@endsection
