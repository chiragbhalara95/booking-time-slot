@extends('layouts.app')
@section('custom_style')
<link rel="stylesheet" href="{{ asset('public/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endsection
@section('content')
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Unavailable Date</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">Unavailable Date</li>
            </ol>
         </div>
      </div>
   </div>
   <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <!-- left column -->
         <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
               <div class="card-header">
                  <h3 class="card-title">Unavailable Date</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
               <form role="form" id="unavailable-dates-frm">
                  @csrf
                  <div class="card-body">
                     @if (!empty($unavailableDatesData))
                     @foreach($unavailableDatesData as $key => $unavailableDatesDetail)
                     <div class="row removeMe">
                        <div class="col-md-6">
                           <div class="input-group date reservationdate" id="reservationdate-dyn-{{$key}}" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" name="unvailable_date[]" data-target="#reservationdate-dyn-{{$key}}" value="{{date('dd/mm/YYYY', strtotime($unavailableDatesDetail))}}" />
                              <div class="input-group-append" data-target="#reservationdate-dyn-{{$key}}" data-toggle="datetimepicker">
                                 <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                           </div>
                        </div>
                        @if($key === 0)
                        <div class="col-md-2">
                           <button class="btn btn-primary add_field_button"><i class="fa fa-plus"></i> Add More</button>
                        </div>
                        @else
                        <div class="col-md-2"><button class="btn btn-danger remove-date"><i class="fa fa-remove"></i>Remove</button></div>
                        @endif
                     </div>
                     @endforeach
                     @else
                     <div class="row">
                        <div class="col-md-6">
                           <div class="input-group date reservationdate" id="reservationdate" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" name="unvailable_date[]" data-target="#reservationdate"/>
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                 <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <button class="btn btn-primary add_field_button"><i class="fa fa-plus"></i> Add More</button>
                        </div>
                     </div>
                     <!-- /.card-body -->
                     @endif
                     <div class="input_fields_wrap">
                        <!-- Dynamic Fields go here -->
                     </div>
                     <div class="card-footer">
                        <button type="button" class="btn btn-primary save-unavailable-date">Save</button>
                     </div>
               </form>
               </div>
               <!-- /.card -->
            </div>
            <!--/.col (left) -->
         </div>
         <!--/.col (left) -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
@section('custom_script')
<script src="{{ asset('public/admin/plugins/moment/moment.min.js') }}"></script>
<!--
   <script src="{{ asset('public/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
   <script src="{{ asset('public/admin/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
   -->
<script src="{{ asset('public/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script>
   $(function () {
     //Date range picker
     $('.reservationdate').datetimepicker({
         format: 'DD/MM/YYYY'
     });
   
   
   })
   
   //Dynamic Datepicker Fields
   $('body').on('focus',".datepicker", function(){
     $(this).datepicker();
   });
   
   $(document).ready(function() {
     var max_fields      = 10; //maximum input boxes allowed
     var wrapper         = $(".input_fields_wrap"); //Fields wrapper
     var add_button      = $(".add_field_button"); //Add button ID
     
     var x = 1; //initlal text box count
     $(add_button).click(function(e){ //on add input button click
         e.preventDefault();
         if(x < max_fields){ //max input box allowed
             x++; //text box increment
   
   
             $(wrapper).append('<div class="row removeMe"><div class="col-md-6"><div class="input-group date reservationdate" id="reservationdate-'+x+'" data-target-input="nearest"><input type="text" class="form-control datetimepicker-input" name="unvailable_date[]" data-target="#reservationdate-'+x+'"/><div class="input-group-append" data-target="#reservationdate-'+x+'" data-toggle="datetimepicker"><div class="input-group-text"><i class="fa fa-calendar"></i></div></div></div></div><div class="col-md-4"><button class="btn btn-danger remove-date"><i class="fa fa-remove"></i>Remove</button></div></div>');
     $('.reservationdate').datetimepicker({
         format: 'DD/MM/YYYY'
     });
         }
     });
     
     $(wrapper).on("click",".remove-date", function(e){ //user click on remove text
         e.preventDefault();
         $(this).closest('div.removeMe').remove(); x--;
     })
   
       $(document).on("click",".remove-date", function(e){ //user click on remove text
         e.preventDefault();
         $(this).closest('div.removeMe').remove(); x--;
     })
   });
</script>
@endsection