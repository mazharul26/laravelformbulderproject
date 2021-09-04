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
                        <?php if(!empty($_SESSION['message'])) {?>
                            <div class="alert text-center alert-success" role="alert">
                                <?php
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                ?>
                            </div>
                        <?php }?>
                        <form action="#" name="contact-form" method="post" enctype="multipart/form-data">
                           @csrf
                            <div class="form-group">
                                <x-label for="name" :value="__('Name')" />
                                <x-input  type="text" id="name" class="form-control"  name="name" :value="old('name')" required autofocus />
                            </div>
                            <div class="form-group">
                                <x-label for="email" :value="__('Email')" />
                                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                            </div>
                            <div class="form-group">
                                <x-label for="mobile_no" :value="__('Mobile No')" />
                                <x-input id="mobile_no" class="form-control" type="text" name="mobile_no" :value="old('mobile_no')" required autofocus />
                            </div>
                            <div class="form-group">
                                {{ Form::label('Educational Qualification', null, ['class' => 'control-label']) }}
                                @php
                                    echo Form::checkbox('designation', '1').' SSC ';
                                    echo Form::checkbox('designation', '2').' HSC ';
                                    echo Form::checkbox('designation', '3').' Honous ';
                                    echo Form::checkbox('designation', '4').' Masters ';
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

                            <div class="form-group">

                                <x-label for="mobile_no" :value="__('Massage')" />
                                <textarea class="form-control" name="message" id="message" rows="4"></textarea>
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
                    subject: "required",
                    message: "required",
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
                    subject: {
                        required: true
                    },
                    message: {
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
                    subject: "The subject field is required",
                    message: "The message field is required"
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
@stop
