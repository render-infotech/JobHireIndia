{{-- 
<div class="userccount">
<div class="formpanel mt0"> 

{!! Form::model($company, array('method' => 'put', 'route' => array('update.company.profile'), 'class' => 'form', 'files'=>true)) !!}
<h5>{{__('Acount Information')}}</h5>
<div class="row">
<div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'email') !!}">
			<label>{{__('Email')}}</label>
			{!! Form::text('email', null, array('class'=>'form-control', 'id'=>'email', 'placeholder'=>__('Company Email'))) !!}
            {!! APFrmErrHelp::showErrors($errors, 'email') !!} </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'password') !!}">
			<label>{{__('Password')}}</label>
			{!! Form::password('password', array('class'=>'form-control', 'id'=>'password', 'placeholder'=>__('Password'))) !!}
            {!! APFrmErrHelp::showErrors($errors, 'password') !!} </div>
    </div>
</div>
<hr>


<h5>{{__('Company Information')}}</h5>
<div class="row">
    <div class="col-md-6">
        <div class="userimgupbox">
        <div class="imagearea">
			<label>{{__('Company Logo')}}</label>
			{{ ImgUploader::print_image("company_logos/$company->logo", 100, 100) }} 
        </div>
        <div class="formrow">
            <div id="thumbnail"></div>
            <label class="btn btn-default"> {{__('Select Company Logo')}}
                <input type="file" name="logo" id="logo" style="display: none;">
            </label>
            {!! APFrmErrHelp::showErrors($errors, 'logo') !!} 
        </div>
        </div>
    </div>
    <div class="col-md-6">
        
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'name') !!}">
			<label>{{__('Company Name')}} <span>*</span></label>
			{!! Form::text('name', null, array('class'=>'form-control', 'id'=>'name', 'placeholder'=>__('Company Name'))) !!}
            {!! APFrmErrHelp::showErrors($errors, 'name') !!} 
        </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'industry_id') !!}">
			<label>{{__('Industry')}} <span>*</span></label>
			{!! Form::select('industry_id', ['' => __('Select Industry')]+$industries, null, array('class'=>'form-control', 'id'=>'industry_id')) !!}
            {!! APFrmErrHelp::showErrors($errors, 'industry_id') !!} </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'ownership_type') !!}">
			<label>{{__('Ownership')}} <span>*</span></label>
			{!! Form::select('ownership_type_id', ['' => __('Select Ownership type')]+$ownershipTypes, null, array('class'=>'form-control', 'id'=>'ownership_type_id')) !!}
            {!! APFrmErrHelp::showErrors($errors, 'ownership_type_id') !!} </div>
    </div>

    



    <div class="col-md-12">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'description') !!}">
			<label>{{__('Description')}} <span>*</span></label>
			{!! Form::textarea('description', null, array('class'=>'form-control', 'id'=>'description', 'placeholder'=>__('Company details'))) !!}
            {!! APFrmErrHelp::showErrors($errors, 'description') !!} </div>
    </div>
    <div class="col-md-12 d-none">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'location') !!}">
			<label>{{__('Address')}} <span>*</span></label>
			{!! Form::text('location', null, array('class'=>'form-control', 'id'=>'location', 'placeholder'=>__('Location'))) !!}
            {!! APFrmErrHelp::showErrors($errors, 'location') !!} </div>
    </div>
    <div class="col-md-4">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'no_of_offices') !!}">
			<label>{{__('No of Office')}} <span>*</span></label>
			{!! Form::select('no_of_offices', ['' => __('Select num. of offices')]+MiscHelper::getNumOffices(), null, array('class'=>'form-control', 'id'=>'no_of_offices')) !!}
            {!! APFrmErrHelp::showErrors($errors, 'no_of_offices') !!} </div>
    </div>
	<div class="col-md-4">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'no_of_employees') !!}">
			<label>{{__('No of Employees')}} <span>*</span></label>
			{!! Form::select('no_of_employees', ['' => __('Select num. of employees')]+MiscHelper::getNumEmployees(), null, array('class'=>'form-control', 'id'=>'no_of_employees')) !!}
            {!! APFrmErrHelp::showErrors($errors, 'no_of_employees') !!} </div>
    </div>
	<div class="col-md-4">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'established_in') !!}">
			<label>{{__('Established In')}} <span>*</span></label>
			{!! Form::select('established_in', ['' => __('Select Established In')]+MiscHelper::getEstablishedIn(), null, array('class'=>'form-control', 'id'=>'established_in')) !!}
            {!! APFrmErrHelp::showErrors($errors, 'established_in') !!} </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'website') !!}">
			<label>{{__('Website URL')}} <span>*</span></label>
			{!! Form::text('website', null, array('class'=>'form-control', 'id'=>'website', 'placeholder'=>__('Website'))) !!}
            {!! APFrmErrHelp::showErrors($errors, 'website') !!} </div>
    </div>
    
    
  
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'phone') !!}">
			<label>{{__('Phone')}} <span>*</span></label>
			{!! Form::text('phone', null, array('class'=>'form-control', 'id'=>'phone', 'placeholder'=>__('Phone'))) !!}
            {!! APFrmErrHelp::showErrors($errors, 'phone') !!} </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'facebook') !!}">
			<label>{{__('Facebook')}}</label>
			{!! Form::text('facebook', null, array('class'=>'form-control', 'id'=>'facebook', 'placeholder'=>__('Facebook'))) !!}
            {!! APFrmErrHelp::showErrors($errors, 'facebook') !!} </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'twitter') !!}">
			<label>{{__('Twitter')}}</label>
			{!! Form::text('twitter', null, array('class'=>'form-control', 'id'=>'twitter', 'placeholder'=>__('Twitter'))) !!}
            {!! APFrmErrHelp::showErrors($errors, 'twitter') !!} </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'linkedin') !!}">
			<label>{{__('LinkedIn')}}</label>
			{!! Form::text('linkedin', null, array('class'=>'form-control', 'id'=>'linkedin', 'placeholder'=>__('Linkedin'))) !!}
            {!! APFrmErrHelp::showErrors($errors, 'linkedin') !!} </div>
    </div>
   
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'pinterest') !!}">
			<label>{{__('Pinterest')}}</label>
			{!! Form::text('pinterest', null, array('class'=>'form-control', 'id'=>'pinterest', 'placeholder'=>__('Pinterest'))) !!}
            {!! APFrmErrHelp::showErrors($errors, 'pinterest') !!} </div>
    </div>
    <div class="col-md-4">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'country_id') !!}">
			<label>{{__('Country')}} <span>*</span></label>
			{!! Form::select('country_id', ['' => __('Select Country')]+$countries, old('country_id', (isset($company))? $company->country_id:$siteSetting->default_country_id), array('class'=>'form-control', 'id'=>'country_id')) !!}
            {!! APFrmErrHelp::showErrors($errors, 'country_id') !!} </div>
    </div>
    <div class="col-md-4">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'state_id') !!}">
			<label>{{__('State')}} <span>*</span></label>
			<span id="default_state_dd"> {!! Form::select('state_id', ['' => __('Select State')], null, array('class'=>'form-control', 'id'=>'state_id')) !!} </span> {!! APFrmErrHelp::showErrors($errors, 'state_id') !!} </div>
    </div>
    <div class="col-md-4">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'city_id') !!}">
			<label>{{__('City')}} <span>*</span></label>
			<span id="default_city_dd"> {!! Form::select('city_id', ['' => __('Select City')], null, array('class'=>'form-control', 'id'=>'city_id')) !!} </span> {!! APFrmErrHelp::showErrors($errors, 'city_id') !!} </div>
    </div>
    <div class="col-md-12">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'map') !!}">
			<label>{{__('Company Address')}} <span>*</span></label>
			{!! Form::text('map', null, array('class'=>'form-control', 'id'=>'map', 'placeholder'=>__('Company Address'))) !!}
            {!! APFrmErrHelp::showErrors($errors, 'map') !!} </div>
    </div>

    <div class="col-md-12 mt-3">
        <h3>{{__('HR Person Information')}}</h3>
    </div>

    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'contact_name') !!}">
			<label>{{__('Name')}} <span>*</span></label>
			{!! Form::text('contact_name', null, array('class'=>'form-control', 'id'=>'contact_name', 'placeholder'=>__('e.g. John Doe'))) !!}
            {!! APFrmErrHelp::showErrors($errors, 'contact_name') !!} </div>
    </div>

    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'contact_email') !!}">
			<label>{{__('Email')}} <span>*</span></label>
			{!! Form::email('contact_email', null, array('class'=>'form-control', 'id'=>'contact_email', 'placeholder'=>__('Contact email'))) !!}
            {!! APFrmErrHelp::showErrors($errors, 'contact_email') !!} </div>
    </div>
    

    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'ceo') !!}">
			<label>{{__('Designation')}} </label>
			{!! Form::text('ceo', null, array('class'=>'form-control', 'id'=>'ceo', 'placeholder'=>__('e.g. CEO'))) !!}
            {!! APFrmErrHelp::showErrors($errors, 'ceo') !!} </div>
    </div>

   
 
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'registration_number') !!}">
			<label>{{__('Company Registration Number')}} </label>
			{!! Form::text('registration_number', null, array('class'=>'form-control', 'id'=>'registration_number', 'placeholder'=>__('Registration Number'))) !!}
            {!! APFrmErrHelp::showErrors($errors, 'registration_number') !!} </div>
    </div>



   
    
    
    
    
    
    
    <div class="col-md-12">
        <div class="formrow">
            <button type="submit" class="btn">{{__('Update Profile and Save')}} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
        </div>
    </div>
</div>
<input type="file" name="image" id="image" style="display:none;" accept="image/*"/>
{!! Form::close() !!}
</div>
</div>






@push('styles')
<style type="text/css">
    .datepicker>div {
        display: block;
    }
</style>
<style>
       


        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table thead th {
            background-color: #000;
            color: #fff;
            padding: 12px;
            text-align: left;
        }

        table tbody td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            margin: 5px;
            border: none;
            border-radius: 4px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

      

        .text-success {
            color: #28a745;
        }

        .text-danger {
            color: #dc3545;
        }

    </style>
@endpush
@push('scripts')
@include('includes.tinyMCEFront') 
<script type="text/javascript">
    $(document).ready(function () {
        $('#country_id').on('change', function (e) {
            e.preventDefault();
            filterLangStates(0);
        });
        $(document).on('change', '#state_id', function (e) {
            e.preventDefault();
            filterLangCities(0);
        });
        filterLangStates(<?php echo old('state_id', (isset($company)) ? $company->state_id : 0); ?>);

        /*******************************/
        var fileInput = document.getElementById("logo");
        fileInput.addEventListener("change", function (e) {
            var files = this.files
            showThumbnail(files)
        }, false)
    });

    function showThumbnail(files) {
        $('#thumbnail').html('');
        for (var i = 0; i < files.length; i++) {
            var file = files[i]
            var imageType = /image.*/
            if (!file.type.match(imageType)) {
                console.log("Not an Image");
                continue;
            }
            var reader = new FileReader()
            reader.onload = (function (theFile) {
                return function (e) {
                    $('#thumbnail').append('<div class="fileattached"><img height="100px" src="' + e.target.result + '" > <div>' + theFile.name + '</div><div class="clearfix"></div></div>');
                };
            }(file))
            var ret = reader.readAsDataURL(file);
        }
    }


    function filterLangStates(state_id)
    {
        var country_id = $('#country_id').val();
        if (country_id != '') {
            $.post("{{ route('filter.lang.states.dropdown') }}", {country_id: country_id, state_id: state_id, _method: 'POST', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        $('#default_state_dd').html(response);
                        filterLangCities(<?php echo old('city_id', (isset($company)) ? $company->city_id : 0); ?>);
                    });
        }
    }
    function filterLangCities(city_id)
    {
        var state_id = $('#state_id').val();
        if (state_id != '') {
            $.post("{{ route('filter.lang.cities.dropdown') }}", {state_id: state_id, city_id: city_id, _method: 'POST', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        $('#default_city_dd').html(response);
                    });
        }
    }
</script> 
@endpush --}}
 <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto",
          "Oxygen", "Ubuntu", "Cantarell", sans-serif;
        background-color: #f5f7fa;
      }

      /* Header Styles */
      .header {
        background-color: #fff;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        padding: 12px 24px;
        position: sticky;
        top: 0;
        z-index: 1000;
        display: flex;
        align-items: center;
        justify-content: space-between;
      }

      .header-left {
        display: flex;
        align-items: center;
        gap: 20px;
      }

      .menu-icon {
        font-size: 24px;
        color: #1a1a1a;
        cursor: pointer;
      }

      .logo {
        font-size: 24px;
        font-weight: 600;
        color: #1a1a1a;
        text-decoration: none;
      }

      .logo span {
        color: #dabf75;
      }

      .header-right {
        display: flex;
        align-items: center;
        gap: 16px;
      }

      .credits-btn {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        background: #ddb4587d;
        border: 1px solid #ddb4587d;
        border-radius: 6px;
        color: #1b1b1ab5;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        text-decoration: none;
      }

      .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #0c0a07;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        cursor: pointer;
        position: relative;
      }

      .user-dropdown {
        position: absolute;
        top: 50px;
        right: 0;
        background: white;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        border-radius: 8px;
        min-width: 200px;
        display: none;
        flex-direction: column;
        z-index: 100;
      }

      .user-dropdown.show {
        display: flex;
      }

      .user-dropdown-header {
        padding: 16px;
        border-bottom: 1px solid #e5e7eb;
      }

      .user-dropdown-header p {
        margin: 0;
        font-size: 14px;
        font-weight: 600;
        color: #1a1a1a;
      }

      .user-dropdown-header small {
        font-size: 12px;
        color: #6b7280;
      }

      .user-dropdown a {
        padding: 12px 16px;
        text-decoration: none;
        color: #374151;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
      }

      .user-dropdown a:hover {
        background: #f9fafb;
      }

      .user-dropdown a.signout {
        color: #dc2626;
      }

      /* Layout */
      .main-layout {
        display: flex;
        min-height: calc(100vh - 64px);
      }

      /* Sidebar */
      .sidebar {
        width: 240px;
        background: #fff;
        border-right: 1px solid #e5e7eb;
        padding: 20px 0;
        overflow-y: auto;
      }

      .company-info {
        padding: 0 16px 20px;
        display: flex;
        align-items: center;
        gap: 12px;
        border-bottom: 1px solid #e5e7eb;
        margin-bottom: 20px;
      }

      .company-logo {
        width: 48px;
        height: 48px;
        background: #6366f1;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 20px;
      }

      .company-name {
        font-size: 14px;
        font-weight: 600;
        color: #1a1a1a;
      }

      .sidebar-menu {
        list-style: none;
        padding: 0;
        margin: 0;
      }

      .sidebar-menu > li {
        margin-bottom: 4px;
      }

      .sidebar-menu a {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px 16px;
        color: #6b7280;
        text-decoration: none;
        font-size: 14px;
        transition: all 0.2s;
      }

      .sidebar-menu a:hover {
        background: #f9fafb;
        color: #1a1a1a;
      }

      .sidebar-menu a.active {
        background: #aeb7b347;
        color: #58544b;
        font-weight: 500;
        border-left: 3px solid #dabf75;
      }

      .sidebar-menu a i {
        width: 20px;
        text-align: center;
        font-size: 18px;
      }

      .submenu {
        display: none;
        padding-left: 48px;
        margin-top: 4px;
      }

      .submenu.show {
        display: block;
      }

      .submenu a {
        padding: 8px 16px;
        font-size: 13px;
      }

      .submenu a.active {
        background: #d1fae5;
        border-left: none;
      }

      .credit-warning {
        margin: 16px;
        padding: 12px;
        background: #fef3c7;
        border-left: 3px solid #f59e0b;
        border-radius: 6px;
      }

      .credit-warning p {
        margin: 0 0 4px 0;
        font-size: 13px;
        font-weight: 600;
        color: #92400e;
      }

      .credit-warning a {
        color: #dabf75;
        font-size: 12px;
        text-decoration: none;
        font-weight: 500;
      }

      .buy-credits-btn {
        margin: 16px;
        padding: 10px 16px;
        background: white;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        color: #374151;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
      }

      .buy-credits-btn:hover {
        background: #f9fafb;
      }

      /* Main Content */
      .main-content {
        flex: 1;
        padding: 32px;
        overflow-y: auto;
        max-width: 1200px;
      }

      .page-title {
        font-size: 28px;
        font-weight: 600;
        color: #1a1a1a;
        margin-bottom: 24px;
      }

      /* Form Container */
      .form-container {
        background: white;
        border-radius: 8px;
        padding: 32px;
        border: 1px solid #e5e7eb;
      }

      .section-title {
        font-size: 20px;
        font-weight: 600;
        color: #1a1a1a;
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 2px solid #e5e7eb;
      }

      .form-row {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-bottom: 20px;
      }

      .form-group {
        margin-bottom: 20px;
      }

      .form-label {
        display: block;
        margin-bottom: 8px;
        color: #374151;
        font-weight: 500;
        font-size: 14px;
      }

      .required {
        color: #dc2626;
      }

      .form-control {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        font-size: 14px;
        color: #1a1a1a;
        transition: border-color 0.2s;
      }

      .form-control:focus {
        outline: none;
        border-color: #dabf75;
        box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.1);
      }

      select.form-control {
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23374151' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 12px center;
        padding-right: 36px;
      }

      /* Logo Upload */
      .logo-upload {
        text-align: center;
        padding: 32px;
        background: #f9fafb;
        border: 2px dashed #d1d5db;
        border-radius: 8px;
        margin-bottom: 20px;
      }

      .logo-preview {
        width: 100px;
        height: 100px;
        margin: 0 auto 16px;
        background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .logo-preview i {
        font-size: 40px;
        color: white;
      }

      .logo-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 12px;
      }

      .upload-btn {
        background: white;
        color: #dabf75;
        padding: 10px 20px;
        border: 2px solid #dabf75;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        font-size: 14px;
        transition: all 0.3s;
      }

      .upload-btn:hover {
        background: #dabf75;
        color: white;
      }

      /* Editor */
      .editor-container {
        border: 1px solid #d1d5db;
        border-radius: 6px;
        overflow: hidden;
      }

      .editor-toolbar {
        background: #f9fafb;
        padding: 10px;
        border-bottom: 1px solid #e5e7eb;
        display: flex;
        gap: 4px;
        flex-wrap: wrap;
      }

      .editor-btn {
        padding: 6px 10px;
        border: 1px solid #d1d5db;
        background: white;
        border-radius: 4px;
        cursor: pointer;
        font-size: 13px;
        color: #6b7280;
      }

      .editor-btn:hover {
        background: #f3f4f6;
      }

      .editor-content {
        min-height: 200px;
        padding: 15px;
        background: white;
        font-size: 14px;
        color: #1a1a1a;
      }

      .editor-content:focus {
        outline: none;
      }

      /* Submit Button */
      .btn-submit {
        width: 100%;
        padding: 14px;
        background: #dabf75;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        margin-top: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
      }

      .btn-submit:hover {
        background: #047857;
      }

      @media (max-width: 768px) {
        .sidebar {
          position: fixed;
          left: -240px;
          top: 64px;
          height: calc(100vh - 64px);
          z-index: 999;
          transition: left 0.3s;
        }

        .sidebar.show {
          left: 0;
        }

        .main-content {
          padding: 16px;
        }

        .form-row {
          grid-template-columns: 1fr;
        }
      }

      /* Panel background blur */
      .credits-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.3);
        display: none;
        z-index: 900;
      }

      /* Slide panel */
      .credits-panel {
        position: fixed;
        top: 0;
        right: -400px;
        width: 380px;
        height: 100%;
        background: white;
        box-shadow: -2px 0 12px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        transition: right 0.3s ease;
        padding: 20px;
        overflow-y: auto;
        border-radius: 12px 0 0 12px;
      }

      .credits-panel.show {
        right: 0;
      }

      .credits-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
      }

      .close-btn {
        background: none;
        border: none;
        font-size: 20px;
        cursor: pointer;
        color: #4b5563;
      }

      .credit-item {
        display: flex;
        align-items: center;
        gap: 15px;
        background: #f9fafb;
        padding: 14px;
        border-radius: 8px;
        margin-bottom: 14px;
        border: 1px solid #e5e7eb;
      }

      .credit-icon {
        font-size: 22px;
        color: #dabf75;
      }

      .credit-title {
        margin: 0;
        font-size: 14px;
        color: #6b7280;
      }

      .credit-value {
        margin: 0;
        font-size: 22px;
        font-weight: bold;
        color: #1f2937;
      }

      .buy-credits-slide-btn {
        width: 100%;
        padding: 12px;
        margin-top: 10px;
        background: #bd9c40;
        color: #000;
        border: none;
        border-radius: 6px;
        font-size: 15px;
        cursor: pointer;
      }

      .buy-credits-slide-btn:hover {
        background: #dabf75;
      }
      .logo {
        display: flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
      }

      .logo-img {
        height: 60px;
        width: auto;
        object-fit: contain;
      }

      .logo-text {
        font-size: 24px;
        font-weight: 600;
        color: #1a1a1a;
      }

      .logo-text span {
        color: #dabf75;
      }

      /* Hide text on small screens if needed */
      @media (max-width: 768px) {
        .logo-text {
          display: none;
        }
      }
    </style>
<main class="main-content">
    <h1 class="page-title">{{ __('Company Profile') }}</h1>

    <div class="form-container">

        {!! Form::model($company, [
            'method' => 'PUT',
            'route' => ['update.company.profile'],
            'files' => true,
            'class' => 'company-form'
        ]) !!}

        {{-- ================= ACCOUNT INFO ================= --}}
        <h2 class="section-title">{{ __('Account Information') }}</h2>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label">{{ __('Email') }}</label>
                {!! Form::email('email', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                <label class="form-label">{{ __('Password') }}</label>
                {!! Form::password('password', ['class'=>'form-control']) !!}
            </div>
        </div>

        {{-- ================= COMPANY INFO ================= --}}
        <h2 class="section-title">{{ __('Company Information') }}</h2>

        {{-- LOGO --}}
        <div class="logo-upload">
            <div class="logo-preview">
                {{ ImgUploader::print_image("company_logos/$company->logo", 80, 80) }}
            </div>

            <label class="form-label">{{ __('Company Logo') }}</label>
            <button type="button" class="upload-btn"
                onclick="document.getElementById('logo').click()">
                {{ __('SELECT COMPANY LOGO') }}
            </button>

            <input type="file" name="logo" id="logo" hidden>
        </div>

        {{-- COMPANY NAME --}}
        <div class="form-group">
            <label class="form-label">{{ __('Company Name') }} <span class="required">*</span></label>
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        {{-- INDUSTRY & OWNERSHIP --}}
        <div class="form-row">
            <div class="form-group">
                <label class="form-label">{{ __('Industry') }} *</label>
                {!! Form::select('industry_id',
                    ['' => __('Select Industry')] + $industries,
                    null,
                    ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                <label class="form-label">{{ __('Ownership') }} *</label>
                {!! Form::select('ownership_type_id',
                    ['' => __('Select Ownership type')] + $ownershipTypes,
                    null,
                    ['class'=>'form-control']) !!}
            </div>
        </div>

        {{-- DESCRIPTION --}}
        <div class="form-group">
            <label class="form-label">{{ __('Description') }} *</label>
            {!! Form::textarea('description', null, ['class'=>'form-control editor']) !!}
        </div>

        {{-- OFFICE / EMPLOYEES --}}
        <div class="form-row">
            <div class="form-group">
                <label class="form-label">{{ __('No of Office') }} *</label>
                {!! Form::select('no_of_offices',
                    ['' => __('Select')] + MiscHelper::getNumOffices(),
                    null,
                    ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                <label class="form-label">{{ __('No of Employees') }} *</label>
                {!! Form::select('no_of_employees',
                    ['' => __('Select')] + MiscHelper::getNumEmployees(),
                    null,
                    ['class'=>'form-control']) !!}
            </div>
        </div>

        {{-- ESTABLISHED & WEBSITE --}}
        <div class="form-row">
            <div class="form-group">
                <label class="form-label">{{ __('Established In') }} *</label>
                {!! Form::select('established_in',
                    ['' => __('Select')] + MiscHelper::getEstablishedIn(),
                    null,
                    ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                <label class="form-label">{{ __('Website URL') }} *</label>
                {!! Form::text('website', null, ['class'=>'form-control']) !!}
            </div>
        </div>

        {{-- CONTACT --}}
        <div class="form-row">
            <div class="form-group">
                <label class="form-label">{{ __('Phone') }} *</label>
                {!! Form::text('phone', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                <label class="form-label">{{ __('Facebook') }}</label>
                {!! Form::text('facebook', null, ['class'=>'form-control']) !!}
            </div>
        </div>

        {{-- SOCIAL --}}
        <div class="form-row">
            <div class="form-group">
                <label class="form-label">{{ __('Twitter') }}</label>
                {!! Form::text('twitter', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                <label class="form-label">{{ __('LinkedIn') }}</label>
                {!! Form::text('linkedin', null, ['class'=>'form-control']) !!}
            </div>
        </div>

        {{-- LOCATION --}}
        <div class="form-row">
            <div class="form-group">
                <label class="form-label">{{ __('Country') }} *</label>
                {!! Form::select('country_id',
                    ['' => __('Select Country')] + $countries,
                    $company->country_id ?? $siteSetting->default_country_id,
                    ['class'=>'form-control','id'=>'country_id']) !!}
            </div>

            <div class="form-group">
                <label class="form-label">{{ __('State') }} *</label>
                <span id="default_state_dd">
                    {!! Form::select('state_id',[''=>__('Select State')],null,['class'=>'form-control','id'=>'state_id']) !!}
                </span>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">{{ __('Company Address') }} *</label>
            {!! Form::text('map', null, ['class'=>'form-control']) !!}
        </div>

        {{-- ================= HR INFO ================= --}}
        <h2 class="section-title">{{ __('HR Person Information') }}</h2>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label">{{ __('Name') }} *</label>
                {!! Form::text('contact_name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                <label class="form-label">{{ __('Email') }} *</label>
                {!! Form::email('contact_email', null, ['class'=>'form-control']) !!}
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label">{{ __('Designation') }}</label>
                {!! Form::text('ceo', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                <label class="form-label">{{ __('Company Registration Number') }}</label>
                {!! Form::text('registration_number', null, ['class'=>'form-control']) !!}
            </div>
        </div>

        {{-- SUBMIT --}}
        <button type="submit" class="btn-submit">
            <i class="fas fa-save"></i>
            {{ __('UPDATE PROFILE AND SAVE') }}
        </button>

        {!! Form::close() !!}
    </div>
</main>
