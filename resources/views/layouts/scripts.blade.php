

<script src="{{ asset('lib/jquery/jquery.js') }}"></script>
<script src="{{ asset('lib/jquery-ui/jquery-ui.js') }}"></script>
<script src="{{ asset('lib/bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ asset('js/jquery.form.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
{{-- <script src="{{ asset('lib/timepicker/jquery.timepicker.js') }}"></script> --}}
<script>
    $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
</script>

<script src="{{ asset('lib/jquery-toggles/toggles.js') }}"></script>

<script>
    // Date Picker
    $('.datepicker').datepicker();
    $('#datepicker-inline').datepicker();
    $('#datepicker-multiple').datepicker({ numberOfMonths: 2 });
   
</script>

{{-- <script src="{{ asset('lib/morrisjs/morris.js') }}"></script> --}}
<script src="{{ asset('lib/raphael/raphael.js') }}"></script>

<script src="{{ asset('lib/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('lib/flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('lib/flot-spline/jquery.flot.spline.js') }}"></script>

<script src="{{ asset('lib/jquery-knob/jquery.knob.js') }}"></script>

<script src="{{ asset('lib/jquery-autosize/autosize.js') }}"></script>
<script src="{{ asset('lib/select2/select2.js') }}"></script>
<script src="{{ asset('js/AutoNumeric/autoNumeric.min.js') }}"></script>

<script src="{{ asset('lib/wysihtml5x/wysihtml5x.js') }}"></script>
<script src="{{ asset('lib/wysihtml5x/wysihtml5x-toolbar.js') }}"></script>
<script src="{{ asset('lib/handlebars/handlebars.js') }}"></script>
<script src="{{ asset('lib/summernote/summernote.js') }}"></script>
<script src="{{ asset('lib/bootstrap3-wysihtml5-bower/bootstrap3-wysihtml5.all.js') }}"></script>
<script src="{{ asset('lib/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('lib/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.js') }}"></script>


<script src="{{ asset('lib/jquery.gritter/jquery.gritter.js') }}"></script>
<script src="{{ asset('lib/jquery-validate/jquery.validate.js') }}"></script>
<script src="{{ asset('js/quirk.js') }}"></script>

<script src="{{ asset('js/dashboard.js') }}"></script>



@stack('js')
</body>

</html>