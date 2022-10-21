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
              <div class="col-3">
                <div class="form-group">
                  <label for="InputKey1">Tiền tố</label>
                  <input type="text" class="form-control" id="Inputkey1" name="tien_to"  placeholder="Nhập key1...">
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="InputKey2">Key Cha</label>
                  <input type="text" class="form-control" id="Inputkey2" name="KeyCha"  placeholder="Nhập key2...">
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="InputKey3">Hậu tố</label>
                  <input type="text" class="form-control" id="Inputkey3" name="hau_to"  placeholder="Nhập key3...">
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="InputKey4">Key Cha1</label>
                  <input type="text" class="form-control" id="Inputkey4" name="KeyCha1"  placeholder="Nhập key4...">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-3">
                <div class="form-group">
                  <label for="InputKey5">Key Cha2</label>
                  <input type="text" class="form-control" id="Inputkey5" name="KeyCha2"  placeholder="Nhập key5...">
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="InputKey6">Key Cha3</label>
                  <input type="text" class="form-control" id="Inputkey6" name="KeyCha3"  placeholder="Nhập key6...">
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="InputKey7">Key Cha4</label>
                  <input type="text" class="form-control" id="Inputkey7" name="KeyCha4"  placeholder="Nhập key7...">
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="InputKey8">TopView</label>
                  <input type="text" class="form-control" id="Inputkey8" name="TopView"  placeholder="Nhập key8...">
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