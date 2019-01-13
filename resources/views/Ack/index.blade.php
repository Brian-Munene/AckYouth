@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="jumbotron text-center">
                        <h1>Welcome to Ack St.Marys Youth Database</h1>
                        <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p> 
                        <a href='/adminLogin'> Login as Admin</a>
                </div>
        </div>
@endsection