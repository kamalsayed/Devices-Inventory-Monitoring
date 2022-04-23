<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use  Illuminate\Support\Facades\DB;


class PcExt extends Controller
{
    //
    public function index(){
        return view('showpcext');
    }

    public function fetch_data(Request $request){
        
        
        if($request->ajax()){
            $data = DB::table('computer_ext')->orderBy('id','asc')->get();
            echo json_encode($data);
            exit;
        }
    }
    public function add_data(Request $request){
        if($request->ajax()){
            $total =$request->input('working') + $request->input('not_working');
            //kind:kind,working:working,quantity:quantity,not_working:not_working,brand:brand
            $data = array(
                'kind'=>$request->input('kind'),
                'working'=>$request->input('working'),
                'not_working'=>$request->input('not_working'),
                'quantity'=>$total,
                'brand'=>$request->input('brand'),

            );
            
            $id = DB::table('computer_ext')->insertGetId($data);
            if($id>0){
                //echo "<div class='alert alert-success'>تمت الأضافة بنجاح</div>";
            }
        }
    }

    public function update_data(Request $request){
        if($request->ajax()){
            
           

            $data = array(
                $request->column_name   => $request->column_value
            );
            
            if($request->column_name == 'working' || $request->column_name == 'not_working' ){
                DB::table('computer_ext')->where('id',$request->id)->update($data);
                $data3 = DB::table('computer_ext')->where('id',$request->id)->first();
                $total = $data3->working + $data3->not_working;
                $data2= array(
                    'quantity' => $total
                );
                DB::table('computer_ext')->where('id',$request->id)->update($data2);
                exit;
            }
            
            DB::table('computer_ext')->where('id',$request->id)->update($data);
            
            
        }
    }

    public function delete_data(Request $request){
        if($request->ajax()){
            

            
            DB::table('computer_ext')->where('id',$request->id)->delete();
            
            
        }
    }


}
