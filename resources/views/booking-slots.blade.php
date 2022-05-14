@extends('layouts.app')
@section('custom_style')
<link rel="stylesheet" href="{{ asset('public/calendar/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('public/calendar/css/theme.css') }}">
@endsection
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Booked Slots</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">Booked Slots</li>
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
                  <h3 class="card-title">Booked Slots</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
               <form role="form">
                  <input type="hidden" id="booking_selected_date" value="">
                  <div class="card-body">
                     <div class="calendar-container"></div>
                     <div class="time-slot-container">
                        <div class="row mt-2 calendar-slot-selection">
                        </div>
                     </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                     <button type="button" class="btn btn-primary save-booking-slots">Save</button>
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
   </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
@section('custom_script')
<script src="{{ asset('public/admin/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('public/calendar/js/calendar.min.js') }}"></script>
<script type="text/javascript">
   $(function(){
   
   $("#booking_selected_date").val(convert(new Date()))
   getBookableSlots(convert(new Date()))
   
   function selectDate(date) {
     $('.calendar-container').updateCalendarOptions({
       date: date
     });
   }
   
   var defaultConfig = {
     weekDayLength: 1,
     date: new Date(),
     showYearDropdown: true,
     startOnMonday: true,
     disable: function (date) { 
       return date < new Date(); 
     },
       onClickDate:function (date) {
           selectDate(date)
           getBookableSlots(convert(date))
           $("#booking_selected_date").val(convert(date))
       }
   
   };
   
   $('.calendar-container').calendar(defaultConfig)
   });
   
   function convert(str) {
     var date = new Date(str),
       mnth = ("0" + (date.getMonth() + 1)).slice(-2),
       day = ("0" + date.getDate()).slice(-2);
     return [date.getFullYear(), mnth, day].join("-");
   }
   
</script>
@endsection