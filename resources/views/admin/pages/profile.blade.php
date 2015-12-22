@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Profile</h1>
    </div>

</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Change Profile
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">

                @include('admin.includes.status')

                <div class="col-lg-6">
                    {!! Form::open(array('role' => 'form')) !!}
                        <div class="form-group">
                            <label>Email</label>
                            {!! Form::text('email', $model->email ,array('class' => 'form-control', 'placeholder' => 'Email')) !!}
                           
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            {!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'New Password')) !!}
                            
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            {!! Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Confirm Password')) !!}
                           
                        </div>
                        <button type="submit" class="btn btn-default">Update</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>
@stop