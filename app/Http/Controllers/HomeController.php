<?php

namespace App\Http\Controllers;

use App\Models;
use Illuminate\Http\Request;
use App\Models\formModel;
use App\Models\formAnswerModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
    public function buildJson($data, $status = 200, $header = array(), $options = 0)
    {
        $default_data = ['is_error' => false, 'msg' => ''];
        return response()->json(array_merge($default_data, $data), $status, $header, $options);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function createForm()
    {
        return view('form-template');
    }
    public function getFormAnswered(){
        $where = [];
        // Get all forms and answers that will be group by form_id
        // return formModel:: LEFTJOIN('form_answer as fa', 'fa.form_id', '=', 'form.id')
        //     ->ORDERBY('form.id', 'desc')
        //     ->PAGINATE(15);
        array_push($where, ['form.status', '=', 0]);
        $count = DB::table('form')
                ->select(DB::raw('COUNT(form_answer.id) as repondents, form.id'))                
                ->leftJoin('form_answer', 'form.id', '=', 'form_answer.form_id')
                ->groupBy('form.id')
                ->get();

        $form = formModel::SELECT('form.*')
            ->where($where)
            // ->ORDERBY($field,$direction)
            ->paginate(15);

        return $this->buildJson(['count'=>$count, 'form' => $form]);
    }
    public function saveForm(Request $request){
        try {
            $str = rand();
            $code = md5($str);
            $code = $request->id != 0 ? $request->code : $code;
            $form = formModel::UPDATEORCREATE(
                [ 'id' => $request->id ],
                [
                    'code'                => $code,
                    'questionaire'        => $request->element_list_data,
                    'effective_date_from' => date('Y-m-d H:i:s'),
                    'effective_date_to'   => date('Y-m-d H:i:s'),
                    'project_id'          => $request->project_id,
                    'contributors'        => $request->contributors,
                    'author_id'           => $request->author_id,
                    'status'              => $request->status,
                ]
            );
            if($form){
                // return response()->json(['message' => 'Account Informations is saved'], 200);
                return response()->json(['id' => $form->id, 'code' => $code], 200);
            }
            else
                return response()->json(['message' => 'There was a problem processing your request'], 500);
        }
        catch (\Exception $e) {
			return response()->json(['message' => $e->getMessage()], 500);
		}
    }
    public function saveAnsweredForm(Request $request){
        try {
            
            $formAnswer = formAnswerModel::UPDATEORCREATE(
                [ 'id' => $request->id ],
                [
                    'form_id'             => $request->form_id,
                    'questionaire_answers'=> $request->element_list_data,
                    'status'              => 1,
                ]
            );
            if($formAnswer){
                // return response()->json(['message' => 'Account Informations is saved'], 200);
                return response()->json(['id' => $formAnswer->id], 200);
            }
            else
                return response()->json(['message' => 'There was a problem processing your request'], 500);
        }
        catch (\Exception $e) {
			return response()->json(['message' => $e->getMessage()], 500);
		}
    }
    public function getQuestion(Request $request){
        return view('question', ['code'=>$request->code]);
    }
    public function getQuestionContent(Request $request){
        return formModel::WHERE('code', $request->code)->GET();
    }
    public function editForm($code){
        return view('form-template');
    }
    public function getSavedForm(Request $request){
        return formModel::WHERE('code', $request->code)->GET();
    }
}
