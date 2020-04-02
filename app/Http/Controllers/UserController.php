<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use App\User;
use App\Salary;
use App\Designation;
use App\EmployeeDetail;
use App\Document;
use App\Skill;
use App\EmployeeSalary;
use App\AdvancePayment;
use App\OvertimePayment;
use App\BonusPayment;
use Gate;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $users = User::withCount(['leave', 'leave as approve_leave_count' => function($query){
            $query->where('is_approved',true);
        }])->paginate(10);

        // $id = $request->get('user_id');
        // $users_id = User::where('id', $id)
        //                 ->select('id as user_id')->first();
            // dd($users);
        return view('admin.user.index',compact('users'));
    }

    public function salary(Request $request)
    {
        $user_id = Auth::user()->id;
        $employee_salary = EmployeeSalary::join('transactions','transactions.employee_id','=','employee_salaries.employee_id')
        ->join('salary_types','salary_types.id','=','transactions.salary_type_id')                                
        ->join('salaries','salaries.employee_id','=','employee_salaries.employee_id')                                
        ->where('employee_salaries.employee_id',$user_id)->get();

         $salary_amount = Salary::where('employee_id',$user_id)->first(); 

        $salary = EmployeeSalary::where('employee_id',$user_id)->first();
        $Advancesalary = AdvancePayment::where('employee_id',$user_id)->first();
        $Overtimesalary = OvertimePayment::where('employee_id',$user_id)->first();
        $Bonussalary = BonusPayment::where('employee_id',$user_id)->first();

        $employee_advance_salary = AdvancePayment::where('employee_id',$user_id)->get();
        $employee_overtime_salary = OvertimePayment::where('employee_id',$user_id)->get();
        $employee_bonus_salary = BonusPayment::where('employee_id',$user_id)->get();
        // dd($employee_salary);
        return view('admin.user.salary.table',compact('employee_salary',
        'user_id','employee_advance_salary','salary','Bonussalary','Overtimesalary','Advancesalary','salary_amount','employee_overtime_salary','employee_bonus_salary'));
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

        $countries = DB::table('countries')->get();
        $roles = DB::table('roles')->get();
        $roles = DB::table('roles')->get();
        $cities = DB::table('cities')->get();
        $departments = DB::table('departments')->get();
        return view('admin.user.create', compact('countries','departments','roles','cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        // dd($input);

        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([
            'username' => 'required',
            // 'image' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
          //  'password' => 'required',
//            'status' => 'required',

    ]);

    

        $user = new User();
        $user -> username = $request -> username;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file -> move('uploads/gallery/', $filename);
            $user->image = $filename;
        }else{
            $user->image = '';
        }
        $user -> first_name = $request -> fname;
        $user -> last_name = $request -> lname;
        $user -> role = $request -> role;
        $user -> email = $request -> email;
        $user -> phone = $request -> phone;
        $user -> address = $request -> address;
        $user -> gender = $request -> gender;
        $user -> dob = $request -> dob  = date('Y-m-d');
        $user -> join_date = $request -> jdate  = date('Y-m-d');
        $user -> job_type = $request -> job_type;
        $user -> country = $request -> country;
        $user -> city = $request -> city;
        $user -> salary = $request -> salary_amount;
       $user -> password = bcrypt($request -> password);
       $user -> status = $request -> status;
        $user -> save();

        $employment_detail = EmployeeDetail::create(
        ['employee_id' => $user->id,
        'roll_no' => $request->roll_no,
        'employee_type' => $request->employee_type,
        'office_email' => $request->office_email,
        'emergency_number' => $request->emergency_number,
        'passport' => $request->passport
        ]);

        $skills = Skill::create(
        ['employee_id' => $user->id,
        'skill_name' => $request->skill_1,
        'skill_name' => $request->skill_2,
        'skill_name' => $request->skill_3
        ]);

        $designation = Designation::create(
        ['employee_id' => $user->id,
        'designation_type' => $request->designation
        ]);

  
        $employment_detail = Salary::create(
        ['employee_id' => $user->id,
        'salary_amount' => $request->salary_amount,
        'salary_type' => $request->salary_type,
        'allowance_amount' => $request->medical_allowance,
        // 'emergency_number' => $request->emergency_number,
        'bank_name' => $request->bank_name,
        'account_number' => $request->account_number
        ]);

        Toastr::success('Employee successfully added!','Success');
        return redirect()->route('user')->with('success','Employee successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $user = User::join('employment_details', 'employment_details.employee_id','=','users.id')
                    ->join('designations', 'designations.employee_id','=','users.id')
                    ->join('skills', 'skills.employee_id','=','users.id')
                    ->join('salaries', 'salaries.employee_id','=','users.id')
                    ->where('users.id',$id)
                    // ->join('documents', 'documents.employee_id','=','users.id')
                    ->first();

        $users_id = User::where('id', $id)
                        ->select('id as user_id')->first();

        $designation = Designation::where('employee_id', $id)
                        ->select('id as designation_id')->first(); 
                        
        $employent = EmployeeDetail::where('employee_id', $id)
                        ->select('id as employent_id')->first(); 

        $skill = Skill::where('employee_id', $id)
                        ->select('id as skill_id')->first(); 

        $document = Document::where('employee_id', $id)
                        ->select('id as document_id')->first(); 

        $salary = Salary::where('employee_id', $id)
                        ->select('id as salary_id')->first(); 
                    // dd($user);


            $countries = DB::table('countries')->get();
            $roles = DB::table('roles')->get();
            $roles = DB::table('roles')->get();
            $cities = DB::table('cities')->get();

        return view('admin.user.edit',compact('user','users_id','salary','document','skill','designation','employent','countries','roles','cities'));
    }

    public function updateDesignation(Request $request)
    {
        $designation = Designation::findOrFail($request->designation_id);
        $designation->designation_type = $request->designation_type;
        $designation->save();

        return response()->json(['message' => 'Employee Designation Updated Successfully!']);
    }


    public function updateEmplomentDetail(Request $request)
    {
        $employment_detail = EmployeeDetail::findOrFail($request->employment_id);
        $employment_detail->roll_no = $request->roll_no;
        $employment_detail->employee_type = $request->employee_type;
        $employment_detail->office_email = $request->office_email;
        $employment_detail->emergency_number = $request->emergency_number;
        $employment_detail->passport = $request->passport;

        $employment_detail->save();

        return response()->json(['message' => 'Employee Employment Detail Updated Successfully!']);
    }


    public function updateEmployeeSkill(Request $request)
    {
        $input = $request->all();
        // dd($input); die;

        $employment_skill = Skill::findOrFail($request->skill_id);
        $employment_skill->skill_name1 = $request->skill_1;
        $employment_skill->skill_name2 = $request->skill_2;
        $employment_skill->skill_name3 = $request->skill_3;

        $employment_skill->save();

        return response()->json(['message' => 'Employee  Skills Updated Successfully!']);
    }

    public function updateEmployeeSalary(Request $request)
    {
        $input = $request->all();
        // dd($input); die;

        $employment_salary = Salary::findOrFail($request->salary_id);
        $employment_salary->salary_amount = $request->salary_amount;
        $employment_salary->salary_type = $request->salary_type;
        $employment_salary->allowance_amount = $request->allowance_amount;
        $employment_salary->bank_name = $request->bank_name;
        $employment_salary->account_number = $request->account_number;

        $employment_salary->save();

        return response()->json(['message' => 'Employee  Bank Details Updated Successfully!']);
    }


    public function userDocuments($user_id, Request $request)
    {
        $input = $request->all();
        $employment_image = User::findOrFail($user_id);
        // dd($employment_image); die;
        $employee_document = Document::where('employee_id',$user_id)->get();
        // dd($employee_document); die;
        return view('admin.user.document', compact('employment_image','employee_document'));
    }


    public function userViewDocuments($document_id)
    {
        
        $employment_image = Document::find($document_id);

       return view('admin.user.preview_document', compact('employment_image'));
    }

    public function userDownloadDocuments($document)
    {
        $headers = "New Downloaded File";
      return response()->download('uploads/documents/' .$document, $headers);
    }

    public function userDeleteDocuments($id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $document = Document::find($id);
        $document -> delete();
        Toastr::error('Document successfully deleted!','Deleted');
        return redirect()->back();
    }


    public function uploadImage(Request $request)
    {
        $input = $request->all();
        // dd($input); die;
        $employment_image = User::findOrFail($request->user_id);
        $file = $request->file('file');
        // $employment_image -> image = $request -> image;
        if($file){
            // $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $fileSize = $file->getClientSize();
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file -> move('uploads/documents/', $filename);
            $employment_image = Document::create([
                'employee_id'=>$request->user_id,
                'document_name'=>$fileName,
                // 'document_title'=>$fileName,
                'document_size'=>$fileSize,
                'document_extension'=>$extension,
                'document_unique_name'=>$filename
                ]);
                // dd($employment_image); die;
        }

        

        Toastr::success('Image successfully updated!','Success');
        return redirect()->back();
        // return response()->json(['message' => 'Employee  Bank Details Updated Successfully!']);
    }


    public function update(Request $request, $id)
    {
        $users = $request->all();
        // dd($users); die;
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([
            'username' => 'required',
            // 'image' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
          //  'password' => 'required',
//            'status' => 'required',
        ]);
        
        
        $user = User::find($id);
        $user -> username = $request -> username;
        // $user -> image = $request -> img;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file -> move('uploads/gallery/', $filename);
            $user->image = $filename;
            // dd($filename); die;
        }else{
//            return $request;
            $user->image = '';
            // dd($user); die;
        }

             
        $user -> first_name = $request -> fname;
        $user -> last_name = $request -> lname;
        $user -> role = $request -> role;
        $user -> email = $request -> email;
        $user -> phone = $request -> phone;
        $user -> gender = $request -> gender;
        $user -> address = $request -> address;
        $user -> join_date = $request -> jdate  = date('Y-m-d');
        $user -> dob = $request -> dob  = date('Y-m-d');
        $user -> job_type = $request -> job_type;
        $user -> country = $request -> country;
        $user -> city = $request -> city;
        $user-> salary = $request -> salary;
        $user -> password = bcrypt($request -> password);
        $user-> status = $request -> status;
        // dd($user); die;
        $user -> save();
        Toastr::success('Employee successfully updated!','Success');
        return redirect()->back();
        // ->with('success','Employee Updated successfully added!');;
}


    public function show()
    {
        # code...
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $user = User::find($id);
        $user -> delete();
        Toastr::error('Employee successfully deleted!','Deleted');
        return redirect()->route('user');
    }

    public function search(Request $request){
        $users =User::where('username', 'LIKE',"%{$request->search}%")->paginate();
        return view('admin.user.index',compact('users'));
    }

}
