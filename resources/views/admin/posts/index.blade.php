@extends('admin.layouts.main')

@section('content')
<div class="wrapper">
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Посты</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">Главная</a></li>
                <li class="breadcrumb-item active">Посты</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-8">
              <div class="card">
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th class="text-center">Действия</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($posts as $post)
                      <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                          <a href="{{ route('admin.post.show', $post->id) }}" class="text-success">Просмотр</a>
                        </td>
                        <td>
                          <a href="{{ route('admin.post.edit', $post->id) }}" class="text-warning">Редактирование</a>
                        </td>
                        <td>
                          <form action="{{ route('admin.post.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="border-0 bg-transparent text-danger">Удалить</button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <a href="{{ route('admin.post.create') }}">
              <button type="button" class="btn btn-block btn-primary">Добавить</button>
            </a>
          </div>
            
            <!-- ./col -->
          {{-- </div> --}}
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Blog</a></strong>
    </footer>
  
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
@endsection



