@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">  
            <h1>Youths</h1>
            @if(count($youths) > 0)    
                @foreach($youths as $youth)
                    <div class="card">
                        <div class="card-header">
                            <h3><a href="/profile/{{$youth->id}}">
                                {{$youth->firstname}}
                                {{$youth->secondname}}
                                {{$youth->surname}}
                                </a>
                            </h3>
                        </div>
                        <div class="card-body">
                                <small>National Id Number: <strong>{{$youth->national_id}}</strong></small> <br>
                                <small>Church Reg Number: <strong>{{$youth->church_reg_number}}</strong></small><br>
                                <small>Date of Birth: <strong>{{$youth->date_of_birth}}</strong></small><br>
                                    <small>Phone Number: <strong>{{$youth->phone_number}}</strong></small> <br>
                                    <small>Email:<strong> {{$youth->email}}</strong></small><br>
                                    <small>HBC: <strong>{{$youth->hbc}}</strong></small><br>
                                    <small>Location: <strong>{{$youth->location}}</strong></small><br>
                                    <small> Occupation: <strong>{{$youth->occupation}}</strong></small><br>
                                    <small>Organization Name: <strong>{{$youth->organization_name}}</strong></small><br>
                                    <small>School:<strong> {{$youth->school}}</strong></small><br>
                                    <small>Course: <strong>{{$youth->course}}</strong></small><br>
                                    <small>Year: <strong>{{$youth->year}}</strong></small> <br>
                        </div>   
                    </div>    
                @endforeach
                {{$youths->links()}}
            @else
                <p>No Youths found</p> 
            @endif
@endsection