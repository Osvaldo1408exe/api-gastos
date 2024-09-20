<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{

    public function index()
    {
       $expenses = Expenses::all();
       return response()->json([
        'status'=>true,
        'expenses'=>$expenses
       ]);
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
        try{

            $expenses= Expenses::create($request->all());
            return response()->json([
             'status' => true,
             'message' => "Product Created Sucessfully!",
             'expense' => $expenses
            ],200);
        }catch(\Exception $e){
            return response()->json([
                "status"=>false,
                "message"=>"Expense not created!"
            ]);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function show(Expenses $expenses,$id)
    {
        try{
            $expense = Expenses::findOrFail($id);
            return response()->json([
                "status"=>true,
                "expense"=>$expense
           ],200);
        }catch(\Exception $e){
            return response()->json([
                "status"=>false,
                "message"=>"Expense not found!"
            ],404);
        }






    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function edit(Expenses $expenses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $expense = Expenses::findOrFail($id);
        $expense->update($request->all());
        return response()->json([
            "status"=> true,
            "message"=>"Expense updated with sucess!"
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Expenses::destroy($id)){
            return response()->json([
                "status"=>true,
                "message"=>"Expense delete with sucess!"
            ],200);
        }else{
            return response()->json([
                "status"=>false,
                "message"=>"Expense not found!"
            ],404);
        }
    }
}
