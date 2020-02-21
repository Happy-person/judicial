<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\solution;

class solutionController extends Controller
{
    public function index()
    {
        $Solution = solution::select('case_type','case_description','solution','section','judge_name','court_name','judgement_date')->where('deleted_at', '=', NULL)->get(); 
        $solutionArray = array();
        foreach($Solution as $value){
          $solutionArray[] = [
           
            "case_type" => $value->case_type,
            "case_description" => $value->address,
            "solution" => $value->solution,
            "section" => $value->section,
            "judge_name" => $value->judge_name,
            "court_name" => $value->court_name,
            "judgement_date" => $value->judgement_date
          ];
        }
        return response::json(['error' => false, 'message' =>"success", "Result" => $Solution]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formdata=$request->all();
       // echo"<pre>"; print_r($formdata);exit;
        solution::create([
        'case_type'=> $formdata['case_type'],
        'case_description'=> $formdata['case_description'],
        'solution'=> $formdata['solution'],
        'section'=> $formdata['section'],
        'judge_name'=> $formdata['judge_name'],
        'court_name'=> $formdata['court_name'],
        'judgement_date'=> $formdata['judgement_date']
        ]
    );
return Response::json(['message'=>"stored successfully"]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MODELS\solutions  $solutions
     * @return \Illuminate\Http\Response
     */
    public function show($sol_id)
    {
        $Solution = solution::select('case_type','case_description','solution','section','judge_name','court_name','judgement_date')->where('sol_id', $sol_id)->first();
        $solutionArray = array();
        foreach($Solution as $value){
          $solutionArray[] = [
           
            "case_type" => $value->case_type,
            "case_description" => $value->address,
            "solution" => $value->solution,
            "section" => $value->section,
            "judge_name" => $value->judge_name,
            "court_name" => $value->court_name,
            "judgement_date" => $value->judgement_date
          ];
        }
        return response::json(['error' => false, 'message' =>"success", "Result" => $Solution]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MODELS\solutions  $solutions
     * @return \Illuminate\Http\Response
     */
    public function edit(solutions $solutions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MODELS\solutions  $solutions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, solutions $solutions)
    {
        $formdata=$request->all();
        // echo"<pre>"; print_r($formdata);exit;
         solution::create([
         'case_type'=> $formdata['case_type'],
         'case_description'=> $formdata['case_description'],
         'solution'=> $formdata['solution'],
         'section'=> $formdata['section'],
         'judge_name'=> $formdata['judge_name'],
         'court_name'=> $formdata['court_name'],
         'judgement_date'=> $formdata['judgement_date']
         ]
     );
     $Solution = solution::where('sol_id', $sol_id)->update($formdata);

 return Response::json(['message'=>"updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MODELS\solutions  $solutions
     * @return \Illuminate\Http\Response
     */
    public function destroy($sol_id)
    {
        $Solution = solution::where('sol_id', $sol_id)->update(['deleted_at' => date('y-m-d')]);
        return response::json(['error' => false, 'message' =>"Deleted successfully"]); 
    }
}
