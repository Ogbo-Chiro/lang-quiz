@extends('layouts.app')

@section('content')

<head>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>



</head>
    <div class="container">
    <div class="row">
    <div class="col-lg-2"></div>
        <div class="col-lg-8">
                    <br><br>
            <center>
            <p class="head">Hit the translation and submit!</p>
        </center>
        <form action="{{ route('check')}}" method="POST">
        @csrf()
            <div class="form-row">
                <?php 
                //variable to change the the options
                    $q = 0;
                //variable for changing the choice option from the queries
                    $l = 0; 
                //variable to change the radio-id and label for attribute
                    $a = 0;
                ?>
                @foreach($lists as $quiz)

                <?php?>
                <?php
                    $q++; 
                    $l++; 
                    //get question
                    $eng = $quiz->eng;
                    //get answer
                    $igbo = $quiz->igbo; 
                    //declare option variable
                    $option = [];    
                    //put answer first            
                    array_push($option, $igbo);
                    //there are four queries from the databases; one to mathc each question
                    //foreach question, take one choice query
                    $old = ${'choices' . $l};
                    //pull out all the igbo words and add them to the option array
                    foreach ($old as $value) {
                        array_push($option, $value->igbo);
                    }

                    $options = array_unique($option);

                    //leave only three options
                    $n = count($options);
                    while($n != 3){
                        array_pop($options);
                        $n--;
                    }

                    //mix em up
                    shuffle($options);
                ?>


                <div class="form-group col-md-6" style="margin-bottom: 20px;">
                    <!-- question -->
                    <div class="ques_group">
                    <b><input class="ques_word" type="text" name="<?php echo "question" . $q; ?>" value="{{ $eng }}" readonly/></b>
                </div>
                <div id = "<?php echo "question" . $q; ?>" class="option-cover">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="<?php echo "choices" . $q; ?>" id="<?php echo "option" . $a; ?>" value="{{ $options[0] }}">
                        <label class="form-check-label" for="<?php echo "option" . $a; ?>"><span></span>
                        {{ $options[0] }}
                        </label>
                    </div>
                    <br>
                    <!-- increase the variable a -->
                    <?php $a++; ?>

                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="<?php echo "choices" . $q; ?>" id="<?php echo "option" . $a; ?>" value="{{ $options[1] }}">
                      <label class="form-check-label" for="<?php echo "option" . $a; ?>"><span></span>
                        {{ $options[1] }}
                      </label>
                    </div>
                    <br>

                    <?php $a++; ?>

                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="<?php echo "choices" . $q; ?>" id="<?php echo "option" . $a; ?>" value="{{ $options[2] }}">
                      <label class="form-check-label" for="<?php echo "option" . $a; ?>"><span></span>
                        {{ $options[2] }}
                      </label>
                    </div>
                </div>
                    <?php $a++; ?>

            </div>
                @endforeach
            </div>

            <!-- submit button -->
            <center>

                    <input type="submit" class="btn btn-default" value="Submit"  style="margin-right: 10px;" >

    </center>

        </form>

    </div>
        <div class="col-lg-2"></div>
    </div>
</div>

@endsection
