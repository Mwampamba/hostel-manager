<!-- Checking room availability -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".checkin-date").on('blur', function() {
            var _checkin_date = $(this).val();
            $.ajax({
                url: "{{url('student/available-rooms')}}/"+_checkin_date,
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

<!-- Select2 options -->
<script>
    $(document).ready( function(){
      $('.selection').select2(); 
    });
  </script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script src="{{asset('admin-assets/dist/js/bootstrap-bundle-min.js')}}"></script>
<script src="{{asset('lightbox/dist/js/lightbox.min.js')}}"></script>
 
</body>
</html>