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
              <h1 class="m-0">Редактирование поста</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Посты</a></li>
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
              <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')

                @error('title')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group w-50">
                  <input 
                    type="text" 
                    name="title" 
                    class="form-control" 
                    placeholder="Название поста"
                    value="{{ $post->title }}">
                </div>

                @error('content')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <textarea 
                  id="summernote" 
                  name="content">{{ $post->content }}</textarea>
                </div>

                @error('preview_img')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="w-25">
                  <img src="{{ asset('storage/' . $post->preview_img) }}" alt="preview_img">
                </div>
                <div class="form-group w-50">
                  <label for="exampleInputFile">Выберите превью</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="preview_img" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Выберите изображение</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Загрузка</span>
                    </div>
                  </div>
                </div>

                @error('main_img')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="w-25">
                  <img src="{{ asset('storage/' . $post->main_img) }}" alt="main_img">
                </div>
                <div class="form-group w-50">
                  <label for="exampleInputFile">Выберите главное изображение</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="main_img" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Загрузка</span>
                    </div>
                  </div>
                </div>

                @error('main_img')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group w-50">
                  <label>Выберите категорию</label>
                  <select class="form-control" name="category_id">
                    @foreach ($categories as $category)
                      <option 
                        value="{{ $category->id }}" {{ $category->id == $post->category_id ? ' selected' : '' }}>{{ $category->title }}
                      </option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Выберите теги</label>
                  <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;">
                    @foreach ($tags as $tag)
                    <option {{ is_array( $post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                  </select>
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



