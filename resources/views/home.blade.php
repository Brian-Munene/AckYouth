@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <a href="/details" class="btn btn-default" role="button">Fill in Details</a>
                <div>
                    <p>
                        Feel ready for internship? Check the box and let us help you
                        <a href="/internshipForm" class="btn btn-success" role="button">Internship</a>
                    </p> 
                </div>
                    @foreach($youth as $field)
                            <div class="card">
                                <div class="card-header"><h3><a href="/profile/{{$field->id}}">
                                    {{$field->firstname}} 
                                    {{$field->secondname}}
                                    {{$field->surname}}
                                    </a>
                                </h3>
                                    @if(Auth::user()->id == $field->user_id)
                                        <a href="/edit/{{$field->id}}" class="btn btn-default">Update Details</a>
                                    @endif
                                </div>

                                <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <small>National Id Number: <strong>{{$field->national_id}}</strong></small> <br>
                                    <small>Church Reg Number: <strong>{{$field->church_reg_number}}</strong></small><br>
                                    <small>Date of Birth: <strong>{{$field->date_of_birth}}</strong></small>   
                                    <small>Phone Number: <strong>{{$field->phone_number}}</strong></small> <br>
                                    <small>Email:<strong> {{$field->email}}</strong></small><br>
                                    <small>HBC: <strong>{{$field->hbc}}</strong></small><br>
                                    <small>Location: <strong>{{$field->location}}</strong></small><br>           
                                    <small> Occupation: <strong>{{$field->occupation}}</strong></small><br>
                                    <small>Organization Name: <strong>{{$field->organization_name}}</strong></small> <br>
                                    <small>School:<strong> {{$field->school}}</strong></small><br>
                                    <small>Course: <strong>{{$field->course}}</strong></small><br>
                                    <small>Year: <strong>{{$field->year}}</strong></small> <br>    
                                    
                                </div>
                            </div>
            @endforeach   
        </div>
    </div>
</div>

@endsection
