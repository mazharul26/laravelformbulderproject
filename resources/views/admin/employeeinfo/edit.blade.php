@extends('admin.layouts.master')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" />
@stop
@section('admincontent')
    <style type="text/css">
        .error {
            color: #DC143C;
            font-weight: 400;
            display: block;
            padding: 6px 0 0;
            font-size: 14px;
            margin-bottom: 0px !important;
        }
        .form-control.error {
            border-color: #DC143C;
            padding: .375rem .75rem;
        }
    </style>
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h5><strong>Employee Information</strong></h5>
                    </div>
                    <div class="card-body">
                        @include('massage.errormassage')
                        <form action="{{route('admin.employeeinfo.update',$item->id)}}" name="contact-form" method="post" enctype="multipart/form-data">
                           @csrf
                           @method('put')
                            <div class="form-group">
                                <x-label for="employee_name" :value="__('Name')" />
                                <x-input  type="text" id="employee_name" class="form-control"  
                                name="employee_name" :value="$item->employee_name ?? ''" required autofocus />
                            </div>
                            <div class="form-group">
                                <x-label for="employee_email" :value="__('Email')" />
                                <x-input id="email" class="form-control" type="email"
                                 name="employee_email" :value="$item->employee_email ?? ''" required autofocus />
                            </div>
                            <div class="form-group">
                                <x-label for="employee_mobile_no" :value="__('Mobile No')" />
                                <x-input id="employee_mobile_no" class="form-control" type="text" name="employee_mobile_no" :value="$item->employee_mobile_no" required autofocus />
                            </div>
                            
                            <div class="form-group">
                                {{ Form::label('Educational Qualification', null, ['class' => 'control-label']) }}
                                @php
                                    echo Form::checkbox('educational_qualification[]', 'SSC').' SSC ';
                                    echo Form::checkbox('educational_qualification[]', 'HSC').' HSC ';
                                    echo Form::checkbox('educational_qualification[]', 'Honous').' Honous ';
                                    echo Form::checkbox('educational_qualification[]', 'Masters').' Masters ';
                                @endphp
                            </div>
                            <div class="form-group">
                                {{ Form::label('Gender', null, ['class' => 'control-label']) }}
                                @php
                                    echo Form::radio('gender', '1').' male ';
                                    echo Form::radio('gender', '2').' Female ';
                                    echo Form::radio('gender', '3').' other ';
                                @endphp
                            </div>
                         
                            <div class="form-group text-right">
                                <button class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js" ></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script>
        $(function() {
            $("form[name='contact-form']").validate({
                // Define validation rules
                rules: {
                    name: "required",
                    email: "required",
                    mobile_no: "required",
                    gender: "required",
                    educational_qualification: "required",
                   
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    mobile_no: {
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                        number: true
                    },
                    gender: {
                        required: true
                    },
                    educational_qualification: {
                        required: true
                    }
                },
                // Specify validation error messages
                messages: {
                    name: "The name field is required.",
                    email: {
                        required: "The email field is required",
                        minlength: "Please enter a valid email address"
                    },
                    mobile_no: {
                        required: "The mobile number field is required",
                        minlength: "Mobile number must be min 10 characters long",
                        maxlength: "Mobile number must not be more than 10 characters long"
                    },
                    gender: "The gender field is required",
                    educational_qualification: "The educational qualification field is required"
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
@stop
