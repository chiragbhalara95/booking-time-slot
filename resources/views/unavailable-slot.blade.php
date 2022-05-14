@extends('layouts.app')
@section('custom_style')
<link rel="stylesheet" href="{{ asset('public/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endsection
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Unavailable Slots</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">Unavailable Slots</li>
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
      <h3 class="card-title">Unavailable Slots</h3>
   </div>
   <!-- /.card-header -->
   <!-- form start -->
   <form role="form">
      <div class="card-body">
      <div class="bootstrap-timepicker">
      <div class="form-group">
         <div class="row">
            <div class="col-md-1">
               <br/>
               <label>Monday:</label>
            </div>
            <div class="col-md-4">
               <label>From:</label>
               <div class="input-group date" id="ava_mon_start" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input ava_mon_start-input" data-target="#ava_mon_start"
                     value="{{isset($slotsConfigData[1]['unavailable_start_time']) ? $slotsConfigData[1]['unavailable_start_time'] : ''}}">
                  <div class="input-group-append" data-target="#ava_mon_start" data-toggle="datetimepicker">
                     <div class="input-group-text"><i class="far fa-clock"></i></div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <label>To:</label>
               <div class="input-group date" id="ava_mon_end" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input ava_mon_end-input" data-target="#ava_mon_end"
                     value="{{isset($slotsConfigData[1]['unavailable_end_time']) ? $slotsConfigData[1]['unavailable_end_time'] : ''}}">
                  <div class="input-group-append" data-target="#ava_mon_end" data-toggle="datetimepicker">
                     <div class="input-group-text"><i class="far fa-clock"></i></div>
                  </div>
               </div>
            </div>
         </div>
         <br/>
         <div class="form-group">
            <div class="row">
               <div class="col-md-1">
                  <label>Tuesday:</label>
               </div>
               <div class="col-md-4">
                  <div class="input-group date" id="ava_tue_start" data-target-input="nearest">
                     <input type="text" class="form-control datetimepicker-input ava_tue_start-input" data-target="#ava_tue_start"value="{{isset($slotsConfigData[2]['unavailable_start_time']) ? $slotsConfigData[2]['unavailable_start_time'] : ''}}">
                     <div class="input-group-append" data-target="#ava_tue_start" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="input-group date" id="ava_tue_end" data-target-input="nearest">
                     <input type="text" class="form-control datetimepicker-input ava_tue_end-input" data-target="#ava_tue_end"
                        value="{{isset($slotsConfigData[2]['unavailable_end_time']) ? $slotsConfigData[2]['unavailable_end_time'] : ''}}">
                     <div class="input-group-append" data-target="#ava_tue_end" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                     </div>
                  </div>
               </div>
            </div>
            <br/>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-1">
                     <label>Wednesday:</label>
                  </div>
                  <div class="col-md-4">
                     <div class="input-group date" id="ava_wed_start" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input ava_wed_start-input" data-target="#ava_wed_start"value="{{isset($slotsConfigData[3]['unavailable_start_time']) ? $slotsConfigData[3]['unavailable_start_time'] : ''}}">
                        <div class="input-group-append" data-target="#ava_wed_start" data-toggle="datetimepicker">
                           <div class="input-group-text"><i class="far fa-clock"></i></div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="input-group date" id="ava_wed_end" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input ava_wed_end-input" data-target="#ava_wed_end" 
                           value="{{isset($slotsConfigData[3]['unavailable_end_time']) ? $slotsConfigData[3]['unavailable_end_time'] : ''}}">
                        <div class="input-group-append" data-target="#ava_wed_end" data-toggle="datetimepicker">
                           <div class="input-group-text"><i class="far fa-clock"></i></div>
                        </div>
                     </div>
                  </div>
               </div>
               <br/>
               <div class="form-group">
                  <div class="row">
                     <div class="col-md-1">
                        <label>Thursday:</label>
                     </div>
                     <div class="col-md-4">
                        <div class="input-group date" id="ava_thu_start" data-target-input="nearest">
                           <input type="text" class="form-control datetimepicker-input ava_thu_start-input" data-target="#ava_thu_start"value="{{isset($slotsConfigData[4]['unavailable_start_time']) ? $slotsConfigData[4]['unavailable_start_time'] : ''}}">
                           <div class="input-group-append" data-target="#ava_thu_start" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="far fa-clock"></i></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="input-group date" id="ava_thu_end" data-target-input="nearest">
                           <input type="text" class="form-control datetimepicker-input ava_thu_end-input" data-target="#ava_thu_end"
                              value="{{isset($slotsConfigData[4]['unavailable_end_time']) ? $slotsConfigData[4]['unavailable_end_time'] : ''}}">
                           <div class="input-group-append" data-target="#ava_thu_end" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="far fa-clock"></i></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <br/>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-md-1">
                           <label>Friday:</label>
                        </div>
                        <div class="col-md-4">
                           <div class="input-group date" id="ava_fri_start" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input ava_fri_start-input" data-target="#ava_fri_start"value="{{isset($slotsConfigData[5]['unavailable_start_time']) ? $slotsConfigData[5]['unavailable_start_time'] : ''}}">
                              <div class="input-group-append" data-target="#ava_fri_start" data-toggle="datetimepicker" >
                                 <div class="input-group-text"><i class="far fa-clock"></i></div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="input-group date" id="ava_fri_end" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input ava_fri_end-input" data-target="#ava_fri_end"
                                 value="{{isset($slotsConfigData[5]['unavailable_end_time']) ? $slotsConfigData[5]['unavailable_end_time'] : ''}}">
                              <div class="input-group-append" data-target="#ava_fri_end" data-toggle="datetimepicker">
                                 <div class="input-group-text"><i class="far fa-clock"></i></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br/>
                     <div class="form-group">
                        <div class="row">
                           <div class="col-md-1">
                              <label>Saturday:</label>
                           </div>
                           <div class="col-md-4">
                              <div class="input-group date" id="ava_sat_start" data-target-input="nearest">
                                 <input type="text" class="form-control datetimepicker-input ava_sat_start-input" data-target="#ava_sat_start"value="{{isset($slotsConfigData[6]['unavailable_start_time']) ? $slotsConfigData[6]['unavailable_start_time'] : ''}}">
                                 <div class="input-group-append" data-target="#ava_sat_start" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="input-group date" id="ava_sat_end" data-target-input="nearest">
                                 <input type="text" class="form-control datetimepicker-input ava_sat_end-input" data-target="#ava_sat_end" value="{{isset($slotsConfigData[6]['unavailable_end_time']) ? $slotsConfigData[6]['unavailable_end_time'] : ''}}">
                                 <div class="input-group-append" data-target="#ava_sat_end" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <br/>
                        <div class="form-group">
                           <div class="row">
                              <div class="col-md-1">
                                 <label>Sunday:</label>
                              </div>
                              <div class="col-md-4">
                                 <div class="input-group date" id="ava_sun_start" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input ava_sun_start-input" data-target="#ava_sun_start"value="{{isset($slotsConfigData[7]['unavailable_start_time']) ? $slotsConfigData[7]['unavailable_start_time'] : ''}}">
                                    <div class="input-group-append" data-target="#ava_sun_start" data-toggle="datetimepicker">
                                       <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="input-group date" id="ava_sun_end" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input ava_sun_end-input" data-target="#ava_sun_end" value="{{isset($slotsConfigData[7]['unavailable_end_time']) ? $slotsConfigData[7]['unavailable_end_time'] : ''}}">
                                    <div class="input-group-append" data-target="#ava_sun_end" data-toggle="datetimepicker">
                                       <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                        <button type="button" class="btn btn-primary save-unavailable-slots">Save</button>
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
<script src="{{ asset('public/admin/plugins/moment/moment.min.js') }}"></script>
<!--
   <script src="{{ asset('public/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
   <script src="{{ asset('public/admin/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
   -->
<script src="{{ asset('public/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script>
   $(function () {
     //Timepicker
     $('#ava_mon_start, #ava_tue_start, #ava_wed_start, #ava_thu_start, #ava_fri_start, #ava_sat_start, #ava_sun_start').datetimepicker({
       format: 'LT',
       interval:60
     })
   
     $('#ava_mon_end, #ava_tue_end, #ava_wed_end, #ava_thu_end, #ava_fri_end, #ava_sat_end,  #ava_sun_end').datetimepicker({
       format: 'LT',
       interval:60
     })
   })
</script>
@endsection