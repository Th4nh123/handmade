@extends('main')

@section('title','Text Editors')

@push('stylesheet')
<!-- SweetAlert2 -->
<link rel="stylesheet" href=" {{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css')}}">
@endpush

@section('main_sidebar')
@include('side_nav.main_sidebar')
@endsection


@section('navbar','navbar-white navbar-light')

@section('add.paragraph','active')

@section('menu_paragraph','menu-open')

@section('nav_icon_paragraph','active')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Thêm bài đăng</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Thêm bài đăng</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="{{ route('update.paragraph.v2')}}">
          @csrf
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Nội dung bài đăng 
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <textarea id="summernote" class="form-control" name ="paragraph">
                {{-- Place <em>some</em> <u>text</u> <strong>here</strong> --}}
                {!! $content !!}
              </textarea>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Lưu</button>
              {{-- <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-xl">
                Launch Extra Large Modal
              </button> --}}
          </div>
        </form>
      </div>
      <!-- /.col-->
    </div>
    
    <div class="modal fade" id="modal-xl">
      <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Extra Large Modal</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            {{-- <p>One fine body&hellip;</p> --}}
            {{-- {!!$paragraph !!} --}}
            {{-- {!! $view !!} --}}
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- ./row -->
  </section>
  <!-- /.content -->
</div>
@endsection

@push('scripts')
<!-- SweetAlert2 -->
<script src=" {{ asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

  })
  function uploadFile(){
    var formData = $("#summernote").val(); 
    console.log(formData);
    $.ajax({
      headers:{
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					    },
      type : 'POST',
      url: "{{ route('render.paragraph')}}",
      data : {
              'type' : formData
      },
      success: function(result){
      $(".modal-body").html(result.html);
      // $(".card-footer").html(result.html2);
    }});
  }
</script>
@endpush