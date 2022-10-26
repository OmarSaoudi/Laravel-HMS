@extends('layouts.master')

@section('title')
    Settings
@stop

@section('css')
@endsection

@section('content')

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
        Settings
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
       <li class="active">Settings</li>
     </ol>
   </section>

   <section class="content">
      <div class="box box-primary">
          <div class="box-header">
              <h3 class="box-title">Settings</h3>
          </div>
            <div class="box-body">
                    <form action="{{ route('settings.update','test') }}" method="post" enctype="multipart/form-data">
                     @csrf
                     @method('PUT')
                        {{-- 1 --}}
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Company Name</label>
                                 <input name="company_name" value="{{ $setting['company_name'] }}" required type="text" class="form-control" placeholder="Name of Company">
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                        </div>
                        {{-- End 1 --}}

                        {{-- 2 --}}
                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                 <label>Current Year</label>
                                 <select name="current_session" id="current_session" class="form-control" required>
                                    @for($y=date('Y', strtotime('- 1 years')); $y<=date('Y', strtotime('+ 4 years')); $y++)
                                        <option {{ ($setting['current_session'] == (($y-=1).'-'.($y+=1))) ? 'selected' : '' }}>{{ ($y-=1).'-'.($y+=1) }}</option>
                                    @endfor
                                 </select>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                        </div>
                        {{-- End 2 --}}

                        {{-- 3 --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Company Title</label>
                                    <input name="company_title" value="{{ $setting['company_title'] }}" required type="text" class="form-control" placeholder="Title of Company">
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                        </div>
                        {{-- End 3 --}}

                        {{-- 4 --}}
                        <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                  <label>Company Phone</label>
                                  <input name="phone" value="{{ $setting['phone'] }}" required type="text" class="form-control" placeholder="Phone of Company">
                                  <span class="help-block with-errors"></span>
                               </div>
                             </div>
                         </div>
                        {{-- End 4 --}}

                        {{-- 5 --}}
                        <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                  <label>Company Email</label>
                                  <input name="company_email" value="{{ $setting['company_email'] }}" required type="text" class="form-control" placeholder="Email of Company">
                                  <span class="help-block with-errors"></span>
                               </div>
                             </div>
                         </div>
                        {{-- End 5 --}}

                        {{-- 6 --}}
                        <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                  <label>Company Address</label>
                                  <input name="address" value="{{ $setting['address'] }}" required type="text" class="form-control" placeholder="Address of Company">
                                  <span class="help-block with-errors"></span>
                               </div>
                             </div>
                         </div>
                        {{-- End 6 --}}

                        {{-- 7 --}}
                         <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                  <label>The end of the first term</label>
                                  <input name="end_first_term" value="{{ $setting['end_first_term'] }}" required type="text" class="form-control" placeholder="Date Term Ends">
                                  <span class="help-block with-errors"></span>
                               </div>
                             </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                   <label>The end of the second term</label>
                                   <input name="end_second_term" value="{{ $setting['end_second_term'] }}" required type="text" class="form-control" placeholder="Date Term Ends">
                                   <span class="help-block with-errors"></span>
                                </div>
                             </div>
                         </div>
                        {{-- End 7 --}}

                        {{-- 8 --}}
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                        <label>Company logo</label>
                                        <div class="mb-3">
                                            <img style="width:100px ; margin-bottom: 15px;" height="100px" src="{{ URL::asset('attachments/logo/'.$setting['logo']) }}" alt="">
                                        </div>
                                        <input name="logo" accept="image/*" type="file" class="file-input" data-show-caption="false" data-show-upload="false" data-fouc>
                                  </div>
                              </div>
                          </div>
                         {{-- End 8 --}}

                        <br><br>
                        <div class="form-group" style="text-align:center">
                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Saving Data</button>
                        </div>
                    </form>
            </div>
        </div>
   </section>
</div>

@endsection

@section('js')
@endsection
