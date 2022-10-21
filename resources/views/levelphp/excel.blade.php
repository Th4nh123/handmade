@extends('main')

@section('title','Excel')

@push('stylesheet')
@endpush

@section('main_sidebar')
@include('side_nav.main_sidebar')
@endsection

@section('navbar','navbar-white navbar-light')

@section('excel','active')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Nhập Excel</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Nhập Excel</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="ribbon-wrapper">
              <div class="ribbon bg-primary">
                Excel
              </div>
            </div>
            <div class="card-header">
              <h3 class="card-title">Nhập Excel</h3>
            </div>
            <!-- /.card-header -->
            <form id="quickForm" enctype="multipart/form-data">
              <div class="card-body">
                <div class="row">
                  <div class="col-8">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="file" accept=".xlsx, .xls" required>
                          <label class="custom-file-label" for="exampleInputFile">Chọn file</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-2 text-md-left">
                    <a onclick="uploadFile()" class="btn btn-secondary text-white">kiểm tra file</a>
                  </div>
                  <div class="col-2 text-md-right">
                    <a href="{{ url('danhsachkey.xls')}}"  class="btn btn-primary">Tải về file mẫu</a>
                  </div>
                </div> 
                <div class="row" id="table">
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
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
  function uploadFile(){
    var formData = new FormData($('form#quickForm')[0]); 
    $.ajax({
      headers:{
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					    },
      type : 'POST',
      url: "{{ route('render')}}",
      data: formData,
      async: false,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
      success: function(result){
      $("#table").html(result.html);
      $(".card-footer").html(result.html2);
    }});
  }
</script>
@endpush
