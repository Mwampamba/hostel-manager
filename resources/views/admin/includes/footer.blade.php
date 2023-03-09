  <footer class="main-footer">
        <strong>Copyright &copy; 2023</a>.</strong>
          All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
<!-- ./wrapper -->
<!-- select2 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- jQuery -->
  <script src="{{ asset('admin-assets/plugins/jquery/jquery.min.js')}}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('admin-assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- ChartJS -->
  <script src="{{ asset('admin-assets/plugins/chart.js/Chart.min.js')}}"></script>
  <!-- Sparkline -->
  <script src="{{ asset('admin-assets/plugins/sparklines/sparkline.js')}}"></script>
  <!-- JQVMap -->
  <script src="{{ asset('admin-assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
  <script src="{{ asset('admin-assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset('admin-assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
  <!-- daterangepicker -->
  <script src="{{ asset('admin-assets/plugins/moment/moment.min.js')}}"></script>
  <script src="{{ asset('admin-assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{ asset('admin-assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
  <!-- Summernote -->
  <script src="{{ asset('admin-assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('admin-assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('admin-assets/dist/js/adminlte.js')}}"></script>
  
  <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


   <!-- Summernote JS CDN Link-->
   <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
   <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
   
   <!-- Checking room availability -->
<script type="text/javascript">
   $(document).ready(function() {
    $(".checkin-date").on('blur', function() {
      var _checkin_date = $(this).val();
      $.ajax({
        url: "{{url('admin/available-rooms')}}/"+_checkin_date,
        dataType: 'json',
        beforeSend: function(){
          $(".room-list").html('<option>--- Loading ---</option>');
        },
        success:function(respond) {
          var _html='';
          $.each(respond.available_rooms, function(index, room) {
            _html+='<option value="'+room.id+'">'+room.name+'</option>';
        });
        $(".room-list").html(_html);
      }
      });
    });
   });
  </script>

   <!-- blogSummernote -->
   <script>
    $(document).ready(function() {
        $("#blogSummernote").summernote({
          height: 200,
        });
        $('.dropdown-toggle').dropdown();
    });
</script>

 <!-- Select2 options -->
  <script>
    $(document).ready( function(){
      $('#myDataTable').DataTable();
      $('.selection').select2(); 
    });
  </script>

   <!-- Toastr popup -->
  @if(Session::has('success'))
    <script>
      toastr.success("{!! Session::get('success') !!}");
    </script>
  @endif

  @if(Session::has('delete'))
    <script>
      toastr.success("{!! Session::get('delete') !!}");
    </script>
  @endif

</body>
</html>


