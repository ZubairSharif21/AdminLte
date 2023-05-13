
@extends('layouts.app')

  {{-- @extends('layouts.app') --}}

@section('title', 'Dashboard')


@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content">
    @if (session('success'))
    <script>
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        Toast.fire({
            icon: 'success',
            title: '{{ session('success') }}'
        });
    </script>
    @endif
    @if (session('error'))
    <script>
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        Toast.fire({
            icon: 'error',
            title: '{{ session('error') }}'
        });
    </script>
    @endif

    <div class="card-body">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">All User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        {{-- <div class="card-header">
          <h3 class="card-title">Users</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div> --}}
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                          Project Name
                      </th>
                      <th style="width: 30%">
                          Team Members
                      </th>
                      <th>
                          Project Progress
                      </th>
                      <th style="width: 8%" class="text-center">
                          Status
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
              @foreach ($user as $users)

                <tr>
                    <td>
                        {{ $users->id }}
                    </td>
                    <td>
                        <a>
                            {{ $users->name }}
                        </a>
                        <br/>
                        <small>
                            {{ $users->created_at }}
                        </small>
                    </td>
                    <td>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">
                            </li>
                            <li class="list-inline-item">
                                <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar2.png">
                            </li>
                            <li class="list-inline-item">
                                <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar3.png">
                            </li>
                            <li class="list-inline-item">
                                <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar4.png">
                            </li>
                        </ul>
                    </td>
                    @if ($users->progress)
                    <td class="project_progress">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: {{ $users->progress }}%">
                            </div>
                        </div>
                        <small>
                            {{ $users->progress }}% Complete
                        </small>
                    </td>
                    @else
                    <td class="project_progress">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                            </div>
                        </div>
                        <small>
                            0% Complete
                        </small>
                    </td>
                    @endif

                    <td class="project-state">
                        @if ($users->status=='active')
                        <span class="badge badge-success"> {{ $users->status }}</span>
                        @else
                        <span class="badge badge-danger"> {{ $users->status }}</span>
                        @endif


                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="/view-user/{{ $users->id }}">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a>
                        <a class="btn btn-info btn-sm" href="/update-user/{{ $users->id }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" onclick="showConfirmButton" href="/delete-user/{{ $users->id }}">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>

      <!-- /.card -->
       <div class="  card-footer clearfix">
        <ul class=" pagination pagination-sm m-0 d-flex justify-content-center">
          {{-- <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">&raquo;</a></li> --}}
          <div class="pagination">
            {{ $user->links() }}
        </div>

        </ul>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@stop
@section('css')

    @include('layouts.admin.header')
@stop

@section('js')
    <script>  </script>
    @include('layouts.admin.script')
@stop
