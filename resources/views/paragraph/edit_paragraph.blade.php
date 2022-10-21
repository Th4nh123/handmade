@extends('main')

@section('title','Text Editors')

@push('stylesheet')
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css')}}">
@endpush

@section('main_sidebar')
@include('side_nav.main_sidebar')
@endsection


@section('navbar','navbar-white navbar-light')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chỉnh sửa bài đăng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Chỉnh sửa bài đăng</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row border">
        <div class="col-md-12">
          <form method="get">
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">
                  Sửa bài đăng
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label for="exampleInputEmail1">URL</label>
                        <input type="url" class="form-control" name="paragraph" id="exampleInputEmail1" placeholder="Enter url">
                      </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Kiểm tra</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">
                  Kết quả
                </h3>
              </div>
              <!-- /.card-header -->
                  <div class="card-body">
                    <form method="POST" action="{{ route('update.paragraph')}}">
                      @csrf
                      <div class="card card-outline card-info">
                        <div class="card-header">
                          <h3 class="card-title">
                            Nội dung bài viết 
                          </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <textarea id="summernote" class="form-control" name ="paragraph">
                            @if (isset($paragraph_get))
                            {!! $paragraph_get->posts_content !!}    
                            @endif
                          </textarea>
                        </div>
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Cập nhật</button>
                          {{-- <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-xl">
                            Launch Extra Large Modal
                          </button> --}}
                      </div>
                    </form>
                   
                  </div>
            </div>
          </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@push('scripts')
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- Page specific script -->
<script>
    $(function () {
    // Summernote
    $('#summernote').summernote()

    });
</script>
@endpush