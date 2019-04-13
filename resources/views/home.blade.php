@extends('layouts.app')

@section('content')

<head>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

</head>
<body style="background-image: linear-gradient(120deg, #f6d365 0%, #fda085 100%);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br><br><br><br>
                <center>
                    <h4 class="games">Quizzes Available</h4><br>
                    <div class="btn-group btn-group-justified">
                        <br>
                        <a href="{{ route('game') }}" class="btn btn-games">English to Igbo</a>

                    </div>
        

                </center>

            </div>
        </div>
    </div>

        <footer class="footer">
      <div class="container">
        <span class="text-muted email">igboquiz@gmail.com</span>  <br>
        <span class="text-muted">Copyright &copy 2019</span>

      </div>
    </footer>
</body>
@endsection
