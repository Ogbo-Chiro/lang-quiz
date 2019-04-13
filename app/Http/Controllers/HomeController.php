<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use App\Word;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    //function to oen create blade
    public function create()
    {
        $id = Auth::id();
        $query = User::where('id', $id)->get();
        $level = $query[0]->admin;
        if($level != 1){
        return redirect('home');  
        }
        else{
        return view('admin.create');
    }
}
    //load index page
    public function index()
    {
        return view('home');
    }

    //function to add new word
    public function word(Request $request)
    {
        $word = new Word;

        $word->igbo = $request->igbo;
        $word->eng = $request->eng;
        $word->save();

        return redirect()->route('admin.create');  
    }

    //function to load game
    
    public function game()
    {
        //get questions
        $list = Word::inRandomOrder()->take(4)->get();
        //get four sets of random words for options
        $options0 = Word::inRandomOrder()->take(15)->get();
        $options1 = Word::inRandomOrder()->take(15)->get();
        $options2 = Word::inRandomOrder()->take(15)->get();
        $options3 = Word::inRandomOrder()->take(15)->get();

        //send all the boys to the blade
        return view('game.game', [
            'lists' => $list,
            'choices1' => $options0,
            'choices2' => $options1,
            'choices3' => $options2,
            'choices4' => $options3,

        ]);  

    }

    //function to check answers
    public function check(Request $request){
        //get all four questions
        $q0 = $request->question1;
        $q1 = $request->question2;
        $q2 = $request->question3;
        $q3 = $request->question4;
        //array of questions
        $questions = array($q0, $q1, $q2, $q3);
        //get users answers
        $a0 = $request->choices1;
        $a1 = $request->choices2;
        $a2 = $request->choices3;
        $a3 = $request->choices4;
        //array of answers
        $answers = array($a0, $a1, $a2, $a3);

        $no = 4;
        $j = 0;
        $ans_arr = [];
        //push all the correct answers into ans_arr
        while($j < $no){
            //get the question word
            $cq = $questions[$j];
            //find the match in database
            $ans = Word::where('eng', $cq)->get();
            //push the match into correct answer array
            array_push($ans_arr, $ans);
            $j++;
        }

        $score = 0;
        $wrong = 0;
        $wrong_ans = [];
        //loop through each quesiton checking answers and add to score
        for ($i=0; $i < 4; $i++) { 
            //get users answer
            $as = $answers[$i];
            //get the db row of the correct answer
            $ans_check = $ans_arr[$i];     
                //get actual answer itself from ans_check
                $ans = $ans_check[0]['igbo'];  
                //compare them    
                if($as == $ans){
                    $score ++;
                }
                //push into the wrong array...questions missed
                else{
                    $wrong ++;
                    array_push($wrong_ans, $ans);
                }

        }
        //send the boys to blade
        return view('game.score', [
            'score' => $score,
            'answers' => $ans_arr,
            'questions' => $questions,
            'wrong' => $wrong,
            'wrongs' => $wrong_ans

        ]); 


    }

}
