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

@section('caobai','active')
    
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cào bài</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active">Cào bài</li>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Danh sách Key</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('url.inspect')}}">
                    <div class="row">
                    
                        <div class="col-sm-8">
                            <!-- Select multiple-->
                            <div class="form-group">
                              <select class="custom-select form-control-border border-width-2" name="keyCaoBai">{{--onchange="SelectBase(this)"--}}
                                @foreach ($keyCaoBai as $item)
                                <option>{{$item->Key_cha}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-2 text-md-right">
                              <button type="submit" class="btn btn-secondary text-white">kiểm tra file</a>
                          </div>
                          <div class="col-2">
                              {{-- <a href="{{ url('danhsachkey.xls')}}"  class="btn btn-primary">Tải về file mẫu</a> --}}
                          </div>
                  </div>
                </form>
                    <br>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                         <tr>
                           <th width="2%">id</th>
                           <th>Url</th> 
                           <th>Url Hoàn thiện</th> 
                           <th>Tùy chọn</th>
                         </tr>
                        </thead>
                        <tbody>
                            @if (isset($url))
                                @foreach ($url as $key => $item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                          {{$item->link}}
                                        </td>
                                        <td></td>
                                        <td>
                                          <a href="{{ route('create')}}" class="btn btn-block btn-success">Lưu Url</a>
                                        </td>
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
    function SelectBase(el){
            var type = $(el).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : "{{ route('url.inspect') }}",
                type : 'POST',
                data : {
                    'type' : type
                },
                success : function(res) {
                    $('#table_base').html(res.html);
                }
            })
        }
        $(document).ready(function(){
            $("a").click(function(){
                var formData = 1;
                $.ajax({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                type : 'post',
                url: "{{ route('url.inspect')}}",
                data: formData,
                success: function(result){
                $("#table").html(result.html);
                // $(".card-footer").html(result.html2);
                }
            });
        });
       
  });
</script>
@endpush