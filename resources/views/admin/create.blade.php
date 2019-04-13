@extends('layouts.app')

@section('content')

<head>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

</head>
<div class="container">
    <div class="row justify-content-center">
            <form action="{{ route('word') }}" method="POST">
            <div class="form-group">
                @csrf

                <label for="exampleInputEmail1">Igbo</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="igbo" placeholder="Igbo word" required>
              </div>
              <div class="form-group">
                <label for="eng">English</label>
                <input type="text" name="eng" class="form-control" id="eng" placeholder="English" required>
              </div>
              <input type="submit" class="btn btn-primary" value="Submit">
        </form>
        </div>
    </div>
</div>
@endsection
