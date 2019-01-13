<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('inc.messages')
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <hr/>
                            <a href="/home" class="btn btn-default" role="button">Back</a>
                            
                            <div class="card">
                                <div class='card-header'>
                                    Fill form to send a internship notification.
                                </div>

                                <div class='card-body'>
                                
                                    {!!Form::open(['action' => 'YouthController@InternshipSearch', 'method' => 'POST'])!!}
                                        <div class="form-group">
                                                Please ensure that you have uploaded a copy of your CV for consideration.
                                        </div> 
                                        <div class="form-group">
                                            {{Form::label('start_date', 'Start Date')}}
                                            {{Form::date('start_date', '', ['class' => 'form-control', 'placeholder' => 'Start Date'])}}
                                        </div>
                                        <div class="form-group">    
                                            {{Form::label('end_date', 'End Date')}}
                                            {{Form::date('end_date', '', ['class' => 'form-control', 'placeholder' => 'End Date'])}}
                                        </div>
                                            {{Form::submit('Internship', ['class' => 'btn btn-success']) }}  
                                    {!!Form::close()!!}
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>   
    </div>
</body>
</html>       