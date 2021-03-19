<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Classes;
use App\Models\Infor_Temp;
use App\Models\User_Class;
use Illuminate\Http\Request;

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
        return view('admin/browsingAccount/index')->with(compact("browsings"));
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
        //
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
        dd($data);
        exit();
        try {
            DB::beginTransaction();
            $user = User::create([
                'name' => $data['name'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'password' => Hash::make("usermember123"),
            ]);
            if($user){
                $listClass = User_Class::create([
                    'id_class' => $data['id_class'],
                    'id_user' => $this->id
                ]);
                $bill = Bill::create([
                    'amount' => Classes::Select('price')->Where("id_class",$data['id_class']),
                    'id_user' => $this->id
                ]);
            }
            $token = JWTAuth::fromUser($user);
            $user = $user->setAttribute('token', $token);
            DB::commit();
            return $this->formatJson(AuthResource::class, $user);
        } catch (Exception $ex) {
            DB::rollBack();
            throw $ex;
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
