<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\Tenant;
use App\Models\User;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;
use App\Mail\UserNotification;


use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use Illuminate\Support\Facades\Log;

class member_client extends Controller
{
    public function __construct()
    {
        // Apply middleware for authentication, except for specified methods
        $this->middleware('auth:sanctum')->except(['signin', 'create_user']);
    
        try {
            // Retrieve the tenant based on the current tenant ID
            $tenantId = tenant('id'); // Ensure `tenant()` is properly defined
            $tenant = Tenant::where('id', $tenantId)->first();
    
            if (!$tenant) {
                throw new \Exception("Tenant not found");
            }
    
            // Configure the tenant's database connection
            DB::purge('tenant');
            config(['database.connections.tenant.database' => $tenant->database_name]);
            DB::reconnect('tenant');
                } catch (\Exception $e) {
                    if (!auth()->check()) {
                        return response()->json(["errMessage"=>"You Aren't Available"]);
                    }
        }
    }
    
   /**
     * ****************************
     * *****Start AUTH SECTION*******
     * ****************************
     */
    public function signin(Request $request){
        // try
        // {
        
          $credentials = $request->validate([
              'email' => ['required'],
              'password' => ['required'],
          ]);

      
      
          if (Auth::attempt($credentials)) 
            {
                // $user = Auth::user();
                //     $token = $user->createToken('MyAppToken')->plainTextToken; 
                    

                    if(Auth::user()->type==1)
                {
                    $user = Auth::user(); 
                    $token=$user->createToken('MyAppToken')->plainTextToken;

                    return response()->json([
                    "message"=>['access_token' => $token,
                     'token_type' => 'Bearer',
                     'name'=>$user->name,
                     "email"=>$user->email,
                ],
                     "status"=>"Admin"]);
                    // return redirect()->route('home_admin');
                }
                else if(Auth::user()->type==0)
                {

                    $user = Auth::user(); 
                    $token=$user->createToken('MyAppToken')->plainTextToken;

                    return response()->json([
                    "message"=>['access_token' => $token,
                     'token_type' => 'Bearer',
                     'name'=>$user->name,
                     "email"=>$user->email,
                ],
                     "status"=>"User"]);
                   
                    
                    
                }
            } 
            else 
            {               
                // return back()->withErrors(['login Credentials Not True']);
                    return response()->json(["message"=>"Login Credentials Wrong","status"=>"false"]);
            }
        // }
      
        //     catch(\Exception $e){
        //     // return $e->getMessage();
        //     }
    }
     

 

/** 
 * 
 * Create Random User For tenant
 */
public function create_user(Request $request)
{
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            if ($validator->fails()) {
                return response()->json(["message"=>"Some Fields Not valid"]);
                // return back()->withErrors($validator)->withInput();
            }
        }

        // Insert user into the tenant's database
        $new_user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verification' => "NotVerified",
        ]);
        if($new_user)
        {
            $details = [
                'email' => $request->email,
                'password' =>$request->password,
                'Dashboard_Link'=>tenant('id').'.app-link.com'

            ];
        
            Mail::to($request->email)->send(new UserNotification($details));
            // return back()->with('success','now you can login');
            return response()->json(["message"=>"Your Account has been created"]);
        }
        else{
            // return back()->with('error', 'Something went wrong!');
            return response()->json(['message'=>"Somethng Wrong"]);
        }

     

       
    
}


/** 
 * 
 * Return Data of Loged in user 
 */
public function return_current_user_data(Request $request)
{
     $data=User::first();
     return response()->json(["message"=>$data]);
    
}
public function AddQuiz(Request $request){
    $data = Quiz::create(['nameOfQuiz' => $request->nameOfQuiz]);

    if (!is_array($request->question)) {
        return response()->json(['error' => 'Question data is not an array'], 422);
    }
    
    $questions = array_map(function($question) {
        return new Question(['question' => $question]);
    }, $request->question);
    
    $data->Question()->saveMany($questions);
    
    foreach ($questions as $key => $question) {
        if (!is_array($request->answer[$key])) {
            return response()->json(['error' => 'Answer data for question ' . $key . ' is not an array'], 422);
        }
    
        $answers = array_map(function($answerData) use ($key) {
            if (!is_array($answerData) || !isset($answerData['answer']) || !isset($answerData['is_correct'])) {
                return response()->json(['error' => 'Invalid answer data format for question ' . $key], 422);
            }
            return new Answer([
                'answer' => $answerData['answer'],
                'is_correct' => $answerData['is_correct'],
            ]);
        }, $request->answer[$key]);
    
        $question->answers()->saveMany($answers);
    }
    
     // Insert multiple answers at once

    // return response()->json(["message" => "Quiz, Question, and Answers created successfully!"]);


    // $data->Question()->save($data2);
    // return response()->json(["message"=>$data]);
}
public function ReturnAllQuizes(Request $request){
    
        $ReturnedQuizes=Quiz::orderBy('id','desc')->get();
        return response()->json(["message"=>$ReturnedQuizes]);
    
    }
public function ReturnCustomQuizes(Request $request,$id){
    
        $quiz = Quiz::findOrFail($id); 

        $questions = $quiz->Question()->with('answers')->get(); 
    
        return response()->json(["message" => $questions,"QuizName"=>$quiz]); 
    }

    public function UpdateQuiz(Request $request, $id) {
        // Find the quiz by ID
        $quiz = Quiz::findOrFail($id);
    
    
        // Remove questions
        if ($request->has('questionsToRemove')) {
            foreach ($request->input('questionsToRemove') as $questionId) {
                $question = Question::find($questionId);
                if ($question) {
                    // Delete related answers first
                    $question->answers()->delete();
                    // Then delete the question
                    $question->delete();
                }
            }
        }
    
        // Update or create questions
        foreach ($request->input('questions') as $questionData) {
            $question = Question::updateOrCreate(
                ['id' => $questionData['id']],
                ['quiz_id' => $quiz->id, 'question' => $questionData['question']]
            );
    
            // Update or create answers
            foreach ($questionData['answers'] as $answerData) {
                Answer::updateOrCreate(
                    ['id' => $answerData['id']],
                    ['question_id' => $question->id, 'answer' => $answerData['answer'], 'is_correct' => $answerData['is_correct']]
                );
            }
        }
    
        return response()->json(['message' => 'Quiz updated successfully']);
    }
    
    
    
    
    

}
