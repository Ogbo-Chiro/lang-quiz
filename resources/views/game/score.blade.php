<?php



?>
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

</head>


<body style="background-image: linear-gradient(120deg, #f6d365 0%, #fda085 100%);">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 display_ans">
                <h2></h2>

                <table class="table table-borderless table-striped">
                    <thead>
                        <td>English</td>
                        <td>Igbo</td>
                    </thead>
                    <?php $k = -1;
                    foreach($questions as $qs){
                        $k++;

                        if(in_array($answers[$k][0]->igbo, $wrongs)){
                            $style = 'red';
                        }
                        else{
                            $style = 'green';
                        }
                        echo "<tr class='" . $style . "'>" .
                                "<td>" . $qs . "</td>" .
                                "<td>" . $answers[$k][0]->igbo . "</td>
                            </tr>";
                    }
                    ?>
                </table>
            </div>

            <div class="col-lg-8 display_score">
                <h2>Your score!</h2>
                <h1><b>{{ $score }}</b></h1><br>
                <?php
                if($score == 4){
                    echo "<h5 class='comment'>Excellent!</h5>";
                }
                ?>
                <div class="btn-group btn-group-justified">
                    <a href="{{ route('game')}}" class="btn btn-link">PLAY AGAIN</a>
                </div>

            </div>
        </div>
    </div>
</body>