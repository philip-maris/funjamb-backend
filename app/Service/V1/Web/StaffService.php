<?php

namespace App\Service\V1\Web;

use App\Http\Requests\V1\Web\Staff\CreateStaffRequest;
use App\Mail\NewStaffMail;
use App\Models\V1\Customer;
use App\Util\BaseUtil\RandomUtil;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class StaffService
{
    use RandomUtil;
    public function index(){
        $staff = Customer::where("isAdmin", 1)->where("isSuperAdmin", null)->get();
//        dd($Staff);
        return view("v1.dash.staff.index", ["staffs"=>$staff]);
    }

    public function show(){
        return view("v1.dash.staff.add");
    }

    public function create(CreateStaffRequest $createStaffRequest){
        $createStaffRequest->validated();
        $password = $this->RANDOM_STRING(7);

        $staff = Customer::create([
            "customerFirstName"=>$createStaffRequest->staffFirstName,
            "customerLastName"=>$createStaffRequest->staffLastName,
            "customerEmail"=>$createStaffRequest->staffEmail,
            "customerPhoneNo"=>$createStaffRequest->staffPhoneNo,
            "customerPassword"=>Hash::make($password),
            "customerStatus"=>"Active",
            "isAdmin"=>1,
        ]);

        if (!$staff){
            alert("error", "Unable to create Staff", "error");
            return  back();
        }
        $fullName = $staff->customerFirstName ." ". $staff->customerLastName;
        Mail::to($staff->customerEmail)->send(new NewStaffMail($fullName, $staff->customerEmail, $password));
        alert("success", "staff created successful", "success");
        return  back();
    }

    public function edit($staffId){
        dd($staffId);

    }

    public function update(){

    }
    public function delete($staffId){
        $staff = Customer::where("customerId", $staffId)->first();
        if (!$staff){
            alert("error", "staff cannot be found", "error");
            return back();
        }

        if (!$staff->delete()){
            alert("error", "cannot delete staff", "error");
            return back();
        }

        alert("success", "deleted successful", "success");
        return back();

    }
}
