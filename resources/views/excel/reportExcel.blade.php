<button type="button" onclick="save()"  class="btn btn-success">Lưu file</button>

<link rel="stylesheet" href=" {{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css')}}">

<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{ asset('plugins/toastr/toastr.min.js')}}"></script>
<script type="text/javascript">
function save(){
        var TYPE_CS = 2;
        var Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        // if(type == 1){
            // url
        // }
        var url = "{{$route}}";
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: url,
            data: {
                'type' : TYPE_CS
            },
            success: function (response) {
                if(response.status == "OK"){
                    window.location.href = "{{route('key.excel')}}";
                }
            }
            
        });
        toastr.success('Lưu file thành công')
}
</script>
