<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\browsing\BrowsingRequest;
use App\Http\Requests\Admin\CreateAdminRequest;
use App\Models\Bill;
use App\Models\Classes;
use App\Models\Infor_Temp;
use App\Models\User;
use App\Models\User_Class;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class BrowsingAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $browsings = Infor_Temp::paginate(3);
        $classes = Classes::all();
        $user = User::Where('is_admin',2)->paginate(3);
        return view('admin/browsingAccount/index')->with(compact("browsings","classes","user"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/browsingAccount/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAdminRequest $request)
    {   
        $data = $request->all();
        $data["is_admin"] = 2;
        $data["password"] = Hash::make("admin123");
        $data["status"] = 1;
        if(User::create($data)){
            //notice here(2)
            return redirect('/admin/browsing-account')->with('success','Account successfully created');
        }
        return back()->with('error','failed'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Infor_Temp::findOrFail($id);
        $class = Classes::findOrFail($data->id_class);
        $check = User::where("email",$data->email)->exists();
        if($check){
            try {
                $listClass = User_Class::create([
                    'id_class' => $data['id_class'],
                    'id_user' => $data['id'],
                ]);
                $bill = Bill::create([
                    'amount' => $data['price'],
                    'id_user' =>  $data['id'],
                ]);
                //mail
                $details = [
                    "name" =>  $data->name,
                    "nameclass" => $class->name,
                    "price"=> $data['price']
                ];
                \Mail::to($data['email'])->send(new \App\Mail\MyMailNew($details));
                $data->delete();
                return redirect('/admin/browsing-account')->with('success','user infor Update is success');
            } catch (Exception $ex) {
                DB::rollBack();
                throw $ex;
            }
        }else{
            try {
                DB::beginTransaction();
                $user = User::create([
                    'name' => $data->name,
                    'phone' => $data->phone,
                    'email' => $data->email,
                    'password' => Hash::make("usermember123"),
                    'status' => 1,
                    'is_admin' => 3,
                ]);
                if($user){
                    $listClass = User_Class::create([
                        'id_class' => $data->id_class,
                        'id_user' => $user->id,
                    ]);
                    $bill = Bill::create([
                        'amount' => $data->price,
                        'id_user' =>  $user->id,
                    ]);
                    //mail
                    $details = [
                        "name" =>  $data->name,
                        "nameclass" => $class->name,
                        "price"=> $data->price
                    ];
                    \Mail::to($data['email'])->send(new \App\Mail\MyMailNew($details));
                    $data->delete();
                }
                DB::commit();
                return redirect('/admin/browsing-account')->with('success','user infor Update is success');
            } catch (Exception $ex) {
                DB::rollBack();
                throw $ex;
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $browsings = Infor_Temp::findOrFail($id);
        $classes = Classes::all();
        return view('admin/browsingAccount/edit')->with(compact("browsings","classes"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrowsingRequest $request, $id)
    {
        $data = $request->all();
        $browsings = Infor_Temp::findOrFail($id);
        if($browsings->update($data)){
            return redirect('/admin/browsing-account')->with('success','user infor Update is success');
        }
        return back()->with('error','teacher Update failed'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function delete($id)
    {
        echo "ASd";
        exit();
    }
}
