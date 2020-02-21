<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\criminal;

class criminalController extends Controller
{
    public function index()
    {
                //echo "<pre>";print_r($request->all());exit;
                $Criminal = criminal::select('crimi_case_no','party_name','p_father_name','p_age','p_address','p_phone_no','opponent_name','o_father_name','o_age','o_address','o_phone_no','case_history','occurence_place','o_previous_case_involved','o_previous_case','lawyer_req','FIR_copy','evidence')->where('deleted_at', '=', NULL)->get(); 
                $CriminalArray = array();
                foreach($Criminal as $value){
                  $CriminalArray[] = [
                    "crimi_case_no" => $value->crimi_case_no,
                    "party_name" => $value->party_name,
                    "p_father_name" => $value->p_father_name,
                    "p_age" => $value->p_age,
                    "p_address" => $value->p_address,
                    "p_phone_no" => $value->p_phone_no,
                    "opponent_name" => $value->opponent_name,
                    "o_father_name" => $value->o_father_name,
                    "o_age" => $value->o_age,
                    "o_address" => $value->o_address,
                    "o_phone_no" => $value->o_phone_no,
                    "case_history" => $value->case_history,
                    "occurence_place" => $value->occurence_place,
                    "decision" => $value->decision,
                    "o_previous_case_involved" => $value->o_previous_case_involved,                 
                    "o_previous_case" => $value->o_previous_case,
                    "lawyer_req" => $value->lawyer_req,
                    "FIR_copy" => $value->FIR_copy,
                    "evidence" => $value->evidence,
                    
                  ];
                }
                return response::json(['error' => false, 'message' =>"success", "Result" => $Criminal]);
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
        $fircopy= $formdata["FIR_copy"];
        $fir_name = $fircopy->getClientOriginalName();
        $fircopy->move(public_path() . '/fir_copy/', $fir_name);
        $fir= url('/') . '/fir_copy/' . $fir_name;

        $evidence = $formdata["evidence"];
        $evidence_name = $evidence->getClientOriginalName();
        $evidence->move(public_path() . '/evidence/', $evidence_name);
        $evidences = url('/') . '/evidence/' . $evidence_name;

         criminal::create([
         'crimi_case_no'=> $formdata['crimi_case_no'],
         'party_name'=> $formdata['party_name'],
         'p_father_name'=> $formdata['p_father_name'],
         'p_age'=> $formdata['p_age'],
         'p_address'=> $formdata['p_address'],
         'p_phone_no'=> $formdata['p_phone_no'],
         'opponent_name'=> $formdata['opponent_name'],
         'o_father_name'=> $formdata['o_father_name'],
         'o_age'=> $formdata['o_age'],
         'o_address'=> $formdata['o_address'],
         'o_phone_no'=> $formdata['o_phone_no'],
         'case_history'=> $formdata['case_history'],
         'occurence_place'=> $formdata['occurence_place'],
         'decision'=> $formdata['decision'],
         'o_previous_case_involved'=> $formdata['o_previous_case_involved'],
         'o_previous_case'=> $formdata['o_previous_case'],
         'lawyer_req'=> $formdata['lawyer_req'],
         'FIR_copy'=> $fir,
         'evidence'=> $evidences,
         ]
     );
 return Response::json(['message'=>"stored successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MODELS\criminal  $criminal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          //echo "<pre>";print_r($request->all());exit;
          $Criminal = criminal::select('crimi_case_no','party_name','p_father_name','p_age','p_address','p_phone_no','opponent_name','o_father_name','o_age','o_address','o_phone_no','case_history','occurence_place','o_previous_case_involved','o_previous_case','lawyer_req','FIR_copy','evidence')->where('id', id)->first();  
          $CriminalArray = array();
          foreach($Criminal as $value){
            $CriminalArray[] = [
              "crimi_case_no" => $value->crimi_case_no,
              "party_name" => $value->party_name,
              "p_father_name" => $value->p_father_name,
              "p_age" => $value->p_age,
              "p_address" => $value->p_address,
              "p_phone_no" => $value->p_phone_no,
              "opponent_name" => $value->opponent_name,
              "o_father_name" => $value->o_father_name,
              "o_age" => $value->o_age,
              "o_address" => $value->o_address,
              "o_phone_no" => $value->o_phone_no,
              "case_history" => $value->case_history,
              "occurence_place" => $value->occurence_place,
              "decision" => $value->decision,
              "o_previous_case_involved" => $value->o_previous_case_involved,                 
              "o_previous_case" => $value->o_previous_case,
              "lawyer_req" => $value->lawyer_req,
              "FIR_copy" => $value->FIR_copy,
              "evidence" => $value->evidence,
              
            ];
          }
          return response::json(['error' => false, 'message' =>"success", "Result" => $Criminal]);

 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MODELS\criminal  $criminal
     * @return \Illuminate\Http\Response
     */
    public function edit(criminal $criminal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MODELS\criminal  $criminal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, criminal $criminal)
    {
        $formdata=$request->all();
        // echo"<pre>"; print_r($formdata);exit;
        $fir_copy= criminal::where('crimi_id', $crimi_id)->first();
        $fir = $fir_copy->FIR_copy;
        
        if ($formdata['FIR_copy'] != "") {
            $fir_copy= $formdata['FIR_copy'];
            $fir_name = $fir_copy->getClientOriginalName();
            $size = $fir_copy-> getSize();
            $fir_copy->move(public_path() . '/fir_copy/', $fir_name);
            $updatefir = url('/') . '/fir_copy/' . $fir_name;
        } else {
            $updatefir = $fir;
        }
        $evidence=criminal::where('crimi_id', $crimi_id)->first();
        $evidences = $evidence->evidence;
        
        if ($formdata['evidence'] != "") {
            $evidence= $formdata['evidence'];
            $evidence_name = $evidence->getClientOriginalName();
            $size = $evidence-> getSize();
            $evidence->move(public_path() . '/evidence/', $certificates_name);
            $updateevidence = url('/') . '/evidence/' . $certificate_name;
        } else {
            $updateevidence = $evidences;
        }
         criminal::create([
         'crimi_case_no'=> $formdata['crimi_case_no'],
         'party_name'=> $formdata['party_name'],
         'p_father_name'=> $formdata['p_father_name'],
         'p_age'=> $formdata['p_age'],
         'p_address'=> $formdata['p_address'],
         'p_phone_no'=> $formdata['p_phone_no'],
         'opponent_name'=> $formdata['opponent_name'],
         'o_father_name'=> $formdata['o_father_name'],
         'o_age'=> $formdata['o_age'],
         'o_address'=> $formdata['o_address'],
         'o_phone_no'=> $formdata['o_phone_no'],
         'case_history'=> $formdata['case_history'],
         'occurence_place'=> $formdata['occurence_place'],
         'decision'=> $formdata['decision'],
         'o_previous_case_involved'=> $formdata['o_previous_case_involved'],
         'o_previous_case'=> $formdata['o_previous_case'],
         'lawyer_req'=> $formdata['lawyer_req'],
         'FIR_copy'=> $formdata['FIR_copy'],
         'evidence'=> $formdata['evidence'],
         ]
     );
     $Criminal = criminal::where('id', $id)->update($formdata);
 return Response::json(['message'=>"updated successfully"]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MODELS\criminal  $criminal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Criminal = criminal::where('id', $id)->update(['deleted_at' => date('y-m-d')]);
        return response::json(['error' => false, 'message' =>"Deleted successfully"]);  
     
    }
}
