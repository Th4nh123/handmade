@extends('main')

@section('title','Text Editors')

@push('stylesheet')
@endpush

@section('main_sidebar')
@include('side_nav.main_sidebar')
@endsection


@section('navbar','navbar-white navbar-light')

@section('text','active')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chỉnh sửa văn bản</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Chỉnh sửa văn bản</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row border">
        <div class="col-md-12">
          <form action="" method="get">
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">
                  Dịch văn bản
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Vùng văn bản</label>
                        <textarea class="form-control" name="text" rows="6" placeholder="Nhập ...">@if (isset($old_text)){{$old_text}}@endif</textarea>
                      </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Nộp</button>
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
                      <div class="form-group">
                          <label>Vùng văn bản</label>
                          <textarea class="form-control" name="text" rows="5" placeholder="Nhập ..." disabled>@if (isset($translated_text)){{$translated_text}}@endif</textarea>
                      </div>
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
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
@endpush