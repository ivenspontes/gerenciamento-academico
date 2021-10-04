<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="{{ asset('assets/adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Sistema Academico</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="../gallery.html" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Inicio
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('teacher.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Professores
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('discipline.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p>
                            Disciplinas
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('student.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>
                            Estudantes
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('classroom.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Turmas
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('grid.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-grip-horizontal"></i>
                        <p>
                            Grades
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('horary.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-clock"></i>
                        <p>
                            Horários
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
