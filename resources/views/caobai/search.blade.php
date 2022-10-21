@extends('main')

@section('title','KeyTable')

@push('stylesheet')
@endpush

@section('main_sidebar')
@include('side_nav.main_sidebar')
@endsection

@section('navbar','navbar-white navbar-light')

@section('tool_menu','menu-open')

@section('tool','active')

@section('key_manage','active')
    
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách Key</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="{{ route('key.create.view')}}" class="btn btn-block btn-info">Tạo Key</a>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>        

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="ribbon-wrapper">
                <div class="ribbon bg-info">
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
          </div>
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Danh sách Key</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                 <thead>
                  <tr>
                    <th width="2%">id</th>
                    <th>Tiền tố</th>
                    <th>Key Cha</th>
                    <th>Hậu tố</th>
                    <th>Key cha 1</th> 
                    <th>Key cha 2</th> 
                    <th>Key cha 3</th> 
                    <th>Key cha 4</th> 
                    <th>TopView</th> 
                    <th>TopView</th> 
                    <th>TopView</th> 
                    <th>TopView</th> 
                  </tr>
                 </thead>
                 <tbody>
                  @if (isset($keyCaoBai))
                  @foreach ($keyCaoBai as $key => $item)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$item->tien_to}}</td>
                    <td>{{$item->Key_cha}}</td>
                    <td>{{$item->hau_to}}</td>
                    <td>{{$item->Key_cha1}}</td>
                    <td>{{$item->Key_cha2}}</td>
                    <td>{{$item->Key_cha3}}</td>
                    <td>{{$item->Key_cha4}}</td>
                    <td>{{$item->topview}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  @endforeach 
                  @endif
                 </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@push('scripts')
<!-- Ion Slider -->
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- Page specific script -->
<script>
    $(function () {
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
</script>
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
      url: "{{ route('key.render')}}",
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