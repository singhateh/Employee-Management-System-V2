<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use App\User;
use Gate;
use App\Salary;
use App\EmployeeSalary;
use App\Receipt;
use App\ReceiptDetail;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use Illuminate\Support\Facades\Auth;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $salaries = Salary::paginate(15);
       $users = User::all();
        return view('admin.salary.index',compact('salaries','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }

        $users = User::all();
        return view('admin.salary.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([
            'salary_amount' => 'required',
        ]);
        $salary = new Salary();
        $salary -> employee_id = $request -> employee_name;
        $salary -> salary_amount = $request -> salary_amount;
        $salary -> save();
        Toastr::success('Salary successfully added!','Success');
        return redirect()->route('salary');
    }

    public function paymentstore(Request $request)
    {
        $input = $request->all();
        // dd($input); die;
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([
            'employee_id' => 'required',
            'salary_id' => 'required',
            'paid_amount' => 'required',
            'date' => 'required',
        ]);
        $paymentsalary = new EmployeeSalary();
        $paymentsalary -> employee_id = $request -> employee_id;
        $paymentsalary -> salary_id = $request -> salary_id;
        $paymentsalary -> amount = $request -> paid_amount;
        $paymentsalary -> paid_date = $request -> date;
        $paymentsalary -> day = $request -> day;
        $paymentsalary -> month = $request -> month;
        $paymentsalary -> year = $request -> year;
        $paymentsalary -> save();

        $transaction = Transaction::create(
            ['employee_id' => $paymentsalary->employee_id,
            'salary_id' => $request->salary_id,
            'salary_type_id' => $request->salary_type,
            'user_id' => $request->user_id,
            'paid_amount' => $request->paid_amount,
            'transaction_date' => $request->date,
            'remark' => $request->remark,
            'description' => $request->description
            ]);

        // $transaction = new Transaction($request->all());
        $receipt = Receipt::create($request->all());
        $receiptDetail = ReceiptDetail::create(
            ['receipt_id' => $receipt->id,
            'employee_id' => $request->employee_id,
            'transaction_id' => $transaction->id,
            ]);
        Toastr::success('Employee Salary Paid Successfully!','Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function show(Salary $salary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $salary = Salary::find($id);
        return view('admin.salary.edit',compact('salary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([
            'salary_amount' => 'required',
        ]);
        $salary = Salary::find($id);
        $salary -> salary_amount = $request -> salary_amount;
        $salary -> save();
        Toastr::success('Salary successfully updated!','Success');
        return redirect()->route('salary');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $salary = Salary::find($id);
        $salary -> delete();
        Toastr::error('Salary successfully deleted!','Deleted');
        return redirect()->route('salary');
    }
}
