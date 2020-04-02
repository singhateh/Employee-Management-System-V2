<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use App\Advancepayment;
use App\Designation;
use App\Managesalary;
use App\Salary;
use App\User;
use App\Leave;
use App\OvertimePayment;
use App\BonusPayment;
use App\EmployeeSalary;
use App\SalaryType;
use App\Transaction;
use Gate;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class ManagesalaryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.managesalary.index',compact('users'));
    }

    public function detail(Request $request,$id)
    {

//        if($request->startdate){
//            $advance=Advancepayment::where('date',$request->startdate)->get();
//        }else{
//            $advance = Advancepayment::all();
//        }

        $from = $request->input('startdate');
        $to = $request->input('enddate');
        if ( empty($to) && empty($from) ) {
            $advance = Advancepayment::where('employee_id','=',$id)->get();
        } elseif ( empty($to) && ! empty($from) ) {
            $advance = Advancepayment::where('date', $from)->where('employee_id','=',$id)->get();
        } else {
            $advance = Advancepayment::whereBetween('date', [$from, $to])->where('employee_id','=',$id)->get();
        }

        if ( empty($to) && empty($from) ) {
            $overtime = OvertimePayment::where('employee_id','=',$id)->get();
        } elseif ( empty($to) && ! empty($from) ) {
            $overtime = OvertimePayment::where('overtime_date', $from)->where('employee_id','=',$id)->get();
        } else {
            $overtime = OvertimePayment::whereBetween('overtime_date', [$from, $to])->where('employee_id','=',$id)->get();
        }

        if ( empty($to) && empty($from) ) {
            $bonus = BonusPayment::where('employee_id','=',$id)->get();
        } elseif ( empty($to) && ! empty($from) ) {
            $bonus = BonusPayment::where('bonus_date', $from)->where('employee_id','=',$id)->get();
        } else {
            $bonus = BonusPayment::whereBetween('bonus_date', [$from, $to])->where('employee_id','=',$id)->get();
        }

        $bonus_details = BonusPayment::where('employee_id' , $id)->get();
        $overtime_details = OvertimePayment::where('employee_id' , $id)->get();
        $advance_details = Advancepayment::where('employee_id' , $id)->get();

        $designation = Designation::where('employee_id',$id)->first();
        if(!$designation){
       
            return redirect(route('designation'))->with('info','Please Assign Designation for this Employee!');
        }

        $date = date('y-m-d');
        $monthly = date('F', strtotime($date));

        //monthlySalary payment calculation
        $monthlySalary=Salary::where('employee_id',$id)->select(DB::raw("SUM(salary_amount) as salary"))->first();
        $Salaryid=Salary::where('employee_id',$id)->first();
        
        $paidSalary=EmployeeSalary::where('employee_id',$id)->where('month',$monthly)
                                ->select('amount as  paid_salary_amount')->first();
                                // DB::raw("SUM(amount) as 
        //advance payment calculation
        $advancePayment=Advancepayment::where('employee_id',$id)->select(DB::raw("SUM(amount) as total"))->first();
        
        //Overtime payment calculation
        $overtimePayment=OvertimePayment::where('employee_id',$id)->select(DB::raw("SUM(overtime_amount) as overtime"))->first();
        
        //Bonus payment calculation
        $bonusPayment=BonusPayment::where('employee_id',$id)->select(DB::raw("SUM(bonus_amount) as bonus"))->first();
        $des = $designation -> designation_type;
        $user=User::find($id);
        $amount = $user->salary;
        $employee_name = $designation -> users->first_name . ' '. $designation -> users->last_name ;
        $employee_title = $designation -> users->last_name;
        $employee_gender = $designation -> users->gender;


        $salarytype = SalaryType::all();

        $transactions = Transaction::join('users','users.id','=','transactions.employee_id')
                                    ->join('salaries','salaries.id','=','transactions.salary_id')
                                    ->join('salary_types','salary_types.id','=','transactions.salary_type_id')
                                    // ->select('salaries.amount as salary_amount'
                                    //         )
                                    ->where('transactions.employee_id',$id)->paginate(5);

        //To count the leaves of the employee
        //where('employee_id',$id) -> employee_id is from leaves db and $id is from detail(Request $request,$id)
        $total_leaves=Leave::where('employee_id',$id)->where('is_approved',1)->count();
        return view('admin.managesalary.detail',compact('amount','des','employee_name','user','advance','advancePayment','total_leaves'
                    ,'employee_title','employee_gender', 'monthlySalary','overtime','overtimePayment','bonus','bonusPayment',
                'bonus_details','overtime_details','transactions','Salaryid','salarytype','paidSalary','advance_details'));
    }


    public function salarydetail(Request $request)
    {
        # code...
    }

    public function salarylist()
    {
        $users = User::join('salaries','salaries.employee_id','=','users.id')
                        ->join('designations','designations.employee_id','=','users.id')->get();
        return view('admin.managesalary.salarylist',compact('users'));
    }

    public function store(Request $request)
    {
        $users = new Managesalary();
        $users -> employee_name = $request -> employee_name;
        $users -> designation_type = $request -> employee_designation;
        $users -> working_days = $request -> working_days;
        $users -> tax = $request -> tax_deduction;
        $users -> gross_salary = $request -> gross_salary;
        $users -> save();
        return redirect()->route('managesalary.salarylist');
    }

    public function makepayment()
    {
        return view('admin.managesalary.makepayment');
    }

    public function makeAdvance(Request $request)
    {
        $salaries = new Advancepayment();
        $salaries -> employee_id = $request -> employee_id;
        $salaries -> date = $request -> date;
        $salaries -> amount = $request -> amount;
        $salaries -> save();
        Toastr::success('Advance payment successfully done!','Success');
//        \Session::flash('alert-success','New record created successfully');
        return redirect()->route('managesalary.detail', $request->employee_id)->with('success','New record created successfully');
    }

    public function OvertimePayment(Request $request)
    {
        $overtime = new OvertimePayment();
        $overtime -> employee_id = $request -> employee_id;
        $overtime -> overtime_date = $request -> overtime_date;
        $overtime -> overtime_amount = $request -> overtime_amount;
        $overtime -> save();
        Toastr::success('Overtime payment successfully done!','Success');
//        \Session::flash('alert-success','New record created successfully');
        return redirect()->route('managesalary.detail', $request->employee_id)->with('success','Overtime payment successfully done!');
    }

    public function BonusPayment(Request $request)
    {
        $bonus = new BonusPayment();
        $bonus -> employee_id = $request -> employee_id;
        $bonus -> bonus_date = $request -> bonus_date;
        $bonus -> bonus_amount = $request -> bonus_amount;
        $bonus -> save();
        Toastr::success('Bonus payment successfully done!','Success');
//        \Session::flash('alert-success','New record created successfully');
        return redirect()->route('managesalary.detail', $request->employee_id)->with('success','Bonus payment successfully done!');
    }

    public function search(Request $request){
        $data =User::where('username', 'LIKE',"%{$request->search}%")->paginate();
        return redirect()->route('managesalary.detail');
    }

    public function AdvancePaymentdelete($id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $advance = Advancepayment::find($id);
        $advance -> delete();
        Toastr::error('Adavance Payment Deleted successfully!');
        return redirect()->back()->with('success','Adavance Payment Deleted successfully!');
    }


    public function OvertimePaymentdelete($id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $overtime = OvertimePayment::find($id);
        $overtime -> delete();
        Toastr::error('Overtime Payment Deleted successfully!');
        return redirect()->back()->with('success','Overtime Payment Deleted successfully!');
    }

    public function BonusPaymentdelete($id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $bonus = BonusPayment::find($id);
        $bonus -> delete();
        Toastr::error('Bonus Payment Deleted successfully!');
        return redirect()->back()->with('success','Bonus Payment Deleted successfully!');
    }
}
