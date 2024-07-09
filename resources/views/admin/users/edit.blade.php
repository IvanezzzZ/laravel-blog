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
              <h1 class="m-0">Редактирование пользователя</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">Главная</a></li>
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
              <form action="{{ route('admin.user.update', $user->id) }}" class="w-25" method="POST">
                @csrf
                @method('patch')

                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <input 
                    type="text" 
                    name="name" 
                    class="form-control" 
                    placeholder="Введите имя" 
                    value="{{ $user->name }}">
                </div>
                
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <input
                    type="email" 
                    name="email" 
                    class="form-control" 
                    placeholder="Введите email"
                    value="{{ $user->email }}">
                </div>

                @error('role')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group w-50">
                  <label>Выберите роль</label>
                  <select class="form-control" name="role">
                    @foreach ($roles as $role_id => $role)
                      <option 
                        value="{{ $role_id }}" {{ $role_id == $user->role ? ' selected' : '' }}>{{ $role }}
                      </option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group w-50">
                  <input type="hidden" name="user_id" value="{{ $user->id }}">
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



