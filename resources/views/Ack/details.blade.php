@extends('layouts.app')

@section('content')
<div class="container">
         <div class="row justify-content-center">
                <div class="col-md-8"> 
                        <div class="card">
                                <div class="card-header">
                                        <h1>Youth Registration Form</h1>
                                </div>
                                <div class="card-body">
                                        {!! Form::open(['action' => 'YouthController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                                <div class="form-group">
                                                {{Form::label('national_id', 'National ID Number')}}
                                                {{Form::text('national_id', '', ['class' => 'form-control', 'placeholder' => 'Natiional ID Number'])}}
                                                </div>   
                                                <div class="form-group">
                                                        {{Form::label('church_reg_number', 'Church Registration Number')}}
                                                        {{Form::text('church_reg_number', '', ['class' => 'form-control', 'placeholder' => 'Church Registration Number'])}}
                                                </div> 
                                                <div class="form-group">
                                                        {{Form::label('firstname', 'Firstname')}}
                                                        {{Form::text('firstname', '', ['class' => 'form-control', 'placeholder' => 'First Name'])}}
                                                </div>
                                                <div class="form-group">
                                                        {{Form::label('secondname', 'Secondname')}}
                                                        {{Form::text('secondname', '', ['class' => 'form-control', 'placeholder' => 'Second Name'])}}
                                                </div>
                                                <div class="form-group">
                                                        {{Form::label('surname', 'surname')}}
                                                        {{Form::text('surname', '', ['class' => 'form-control', 'placeholder' => 'Surname'])}}
                                                </div>
                                                <div class="form-group">
                                                        {{Form::label('date_of_birth', 'Date of Birth')}}
                                                        {{Form::date('date_of_birth', '', ['class' => 'form-control', 'placeholder' => 'Date of Birth'])}}
                                                </div>
                                                <div class="form-group">
                                                        {{Form::label('phone_number', 'Phone Number')}}
                                                        {{Form::text('phone_number', '', ['class' => 'form-control', 'placeholder' => 'Phone Number'])}}
                                                </div>
                                                <div class="form-group">
                                                        {{Form::label('email', 'Email Address')}}
                                                        {{Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email Address'])}}
                                                </div>
                                                <div>
                                                        {{Form::label('occupation', 'Occupation')}}
                                                        {{Form::select('occupation', ['Student' => 'Student', 'Working' => 'Working'])}}
                                                </div>
                                                <div class="form-group">
                                                        {{Form::label('organization_name', 'Organization Name')}}
                                                        {{Form::text('organization_name', '', ['class' => 'form-control', 'placeholder' => 'Organization Name'])}}
                                                </div>
                                                <div class="form-group">
                                                        {{Form::label('school', 'School')}}
                                                        {{Form::text('school', '', ['class' => 'form-control', 'placeholder' => 'School'])}}
                                                </div>
                                                <div class="form-group">
                                                        {{Form::label('course', 'Course')}}
                                                        {{Form::text('course', '', ['class' => 'form-control', 'placeholder' => 'Course'])}}
                                                </div>
                                                <div class="form-group">
                                                        {{Form::label('year', 'Year of Study')}}
                                                        {{Form::text('year', '', ['class' => 'form-control', 'placeholder' => 'Year of Study'])}}
                                                </div>   
                                                <div>
                                                        {{Form::label('hbc', 'HBC')}}
                                                        {{Form::select('hbc', ['Berea' => 'Berea', 'Macedonia' => 'Macedonia'])}}
                                                </div> 
                                                <div class="form-group">
                                                        {{Form::label('location', 'Home Location')}}
                                                        {{Form::text('location', '', ['class' => 'form-control', 'placeholder' => 'Home Location'])}}
                                                </div> 
                                                <div class="form-group">
                                                       {{Form::file('cv_file')}} 
                                                </div>       
                                                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}} 
                                        {!! Form::close() !!}
                                </div>
                        </div>
                </div>
         </div>
</div>
@endsection
            
      