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
              <h1 class="m-0">Редактирование тега</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.tag.index') }}">Теги</a></li>
                <li class="breadcrumb-item active">Редактирование</li>
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
            <div class="col-12">
              <form action="{{ route('admin.tag.update', $tag->id) }}" class="w-25" method="POST">
                @csrf
                @method('patch')
                @error('title')
                    <div class="text-danger">Это поле необходимо для заполнения</div>
                @enderror
                <div class="form-group">
                  <input 
                    type="text" 
                    name="title" 
                    class="form-control" 
                    placeholder="Название категории" 
                    value="{{ $tag->title }}">
                </div>
                <button type="submit" class="btn btn-primary">Обновить</button>
              </form>
            </div>
            
            <!-- ./col -->
          </div>
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



