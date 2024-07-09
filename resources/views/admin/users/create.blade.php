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
              <h1 class="m-0">Добавление пользователя</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">Главная</a></li>
                <li class="breadcrumb-item active">Добавление</li>
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
              <form action="{{ route('admin.user.store') }}" class="w-25" method="POST">
                @csrf

                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <input type="text" name="name" class="form-control" placeholder="Введите имя">
                </div>

                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <input type="email" name="email" class="form-control" placeholder="Введите email">
                </div>

                @error('role')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group w-50">
                  <label>Выберите роль</label>
                  <select class="form-control" name="role">
                    @foreach ($roles as $role_id => $role)
                      <option 
                        value="{{ $role_id }}" {{ $role_id == old('role') ? ' selected' : '' }}>{{ $role }}
                      </option>
                    @endforeach
                  </select>
                </div>

                <button type="submit" class="btn btn-primary">Добавить</button>
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



