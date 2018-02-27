<script src="{{ asset('/lib/jquery-3/jQuery-v3-1-1.min.js') }}"></script>
<script src="{{ asset('/lib/bootstrap-3/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/lib/bootstrap-3/js/bootstrap-datepicker.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(function () {
        $('#fecha').datetimepicker();
    });
    $(document).ready(function(){
        $('#table').DataTable();
    });
</script>
@yield('script')
