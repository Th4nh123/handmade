@extends('main')

@section('title','Create Key')

@push('stylesheet')

@endpush

@section('main_sidebar')
@include('side_nav.main_sidebar')
@endsection


@section('navbar','navbar-white navbar-light')

@section('create','active')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tạo key</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Tạo Key</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Tạo Key</h3>
          </div>
          <!-- /.card-header -->
         <form method="post">
            @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="InputKey1">Tên miền</label>
                  <input type="text" class="form-control" id="Inputkey1" name="domain"  placeholder="Nhập tên miền...">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="InputKey2">Loại</label>
                  <input type="text" class="form-control" id="Inputkey2" name="category"  placeholder="Nhập loại...">
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
    
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Lưu</button>
          </div>
         </form>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

@endsection

@push('scripts')
<!-- AdminLTE App -->
<script src=" {{ asset('dist/js/adminlte.min.js')}}"></script>
@endpush