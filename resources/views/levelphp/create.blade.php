
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
            <h1>Tạo Spin Word</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Tạo Spin Word</li>
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
            <h3 class="card-title">Tạo Spin Word</h3>
          </div>
          <!-- /.card-header -->
         <form method="post">
            @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-3">
                <div class="form-group">
                  <label for="InputKey1">Key1</label>
                  <input type="text" class="form-control" id="Inputkey1" name="Inputkey1"  placeholder="Nhập key1...">
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="InputKey2">Key2</label>
                  <input type="text" class="form-control" id="Inputkey2" name="Inputkey2"  placeholder="Nhập key2...">
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="InputKey3">Key3</label>
                  <input type="text" class="form-control" id="Inputkey3" name="Inputkey3"  placeholder="Nhập key3...">
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="InputKey4">Key4</label>
                  <input type="text" class="form-control" id="Inputkey4" name="Inputkey4"  placeholder="Nhập key4...">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-3">
                <div class="form-group">
                  <label for="InputKey5">Key5</label>
                  <input type="text" class="form-control" id="Inputkey5" name="Inputkey5"  placeholder="Nhập key5...">
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="InputKey6">Key6</label>
                  <input type="text" class="form-control" id="Inputkey6" name="Inputkey6"  placeholder="Nhập key6...">
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="InputKey7">Key7</label>
                  <input type="text" class="form-control" id="Inputkey7" name="Inputkey7"  placeholder="Nhập key7...">
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="InputKey8">Key8</label>
                  <input type="text" class="form-control" id="Inputkey8" name="Inputkey8"  placeholder="Nhập key8...">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <label for="InputKey9">Key9</label>
                  <input type="text" class="form-control" id="Inputkey9" name="Inputkey9"  placeholder="Nhập key9...">
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="InputKey10">Key10</label>
                  <input type="text" class="form-control" id="Inputkey10" name="Inputkey10"  placeholder="Nhập key10...">
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="InputKey11">Key11</label>
                  <input type="text" class="form-control" id="Inputkey11" name="Inputkey11"  placeholder="Nhập key11...">
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
<!-- bs-custom-file-input -->
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<!-- AdminLTE App -->
<script src=" {{ asset('dist/js/adminlte.min.js')}}"></script>
<script>
    $(function () {
      bsCustomFileInput.init();
    });
</script>
@endpush