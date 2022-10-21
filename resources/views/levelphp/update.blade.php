@extends('main')

@section('title','Cập nhật Key')

@push('stylesheet')

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
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Cập nhật Key</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{route('key.update',['id' => $id])}}">
              @csrf
              <div class="card-body">
                @foreach ($key as $item)
                <div class="row">
                  <div class="col-1">
                    <div class="form-group">
                      <label for="Inputid">Id</label>
                      <input type="text" class="form-control" id="Inputid" value="{{$item->id}}" name="id" disabled>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-group">
                      <label for="InputKey1">Key1</label>
                      <input type="text" class="form-control" id="Inputkey1" value="{{$item->key1}}" name="Inputkey1" placeholder="Enter key1...">
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-group">
                      <label for="Inputkey2">Key2</label>
                      <input type="text" class="form-control" id="Inputkey2" value="{{$item->key2}}" name="Inputkey2" placeholder="Enter key2...">
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-group">
                      <label for="Inputkey3">Key3</label>
                      <input type="text" class="form-control" id="Inputkey3" value="{{$item->key3}}" name="Inputkey3" placeholder="Enter key3...">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <div class="form-group">
                      <label for="Inputkey4">Key4</label>
                      <input type="text" class="form-control" id="Inputkey4" value="{{$item->key4}}" name="Inputkey4" placeholder="Enter key4...">
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-group">
                      <label for="Inputkey5">Key5</label>
                      <input type="text" class="form-control" id="Inputkey5" value="{{$item->key5}}" name="Inputkey5" placeholder="Enter key5...">
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-group">
                      <label for="Inputkey6">Key6</label>
                      <input type="text" class="form-control" id="Inputkey6" value="{{$item->key6}}" name="Inputkey6" placeholder="Enter key6...">
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-group">
                      <label for="Inputkey7">Key7</label>
                      <input type="text" class="form-control" id="Inputkey7" value="{{$item->key7}}" name="Inputkey7" placeholder="Enter key7...">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <div class="form-group">
                      <label for="Inputkey8">Key8</label>
                      <input type="text" class="form-control" id="Inputkey8" value="{{$item->key8}}" name="Inputkey8" placeholder="Enter key8...">
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-group">
                      <label for="Inputkey9">Key9</label>
                      <input type="text" class="form-control" id="Inputkey9" value="{{$item->key9}}" name="Inputkey9" placeholder="Enter key9...">
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-group">
                      <label for="Inputkey10">Key10</label>
                      <input type="text" class="form-control" id="Inputkey10" value="{{$item->key10}}" name="Inputkey10" placeholder="Enter key10...">
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-group">
                      <label for="Inputkey11">Key11</label>
                      <input type="text" class="form-control" id="Inputkey11" value="{{$item->key11}}" name="Inputkey11" placeholder="Enter key11...">
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
              <!-- /.card-body -->
        
              <div class="card-footer">
                <button type="submit" class="btn btn-info">Lưu</button>
              </div>
            </form>
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
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