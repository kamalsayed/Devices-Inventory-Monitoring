<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use  Illuminate\Support\Facades\DB;

use App\ShowTableM;


class ShowTable extends Controller
{
    //
    public function index(){
        return view('showpc');
    }

    public function fetch_data(Request $request){
        
        
        if($request->ajax()){
            $data = DB::table('computers')->orderBy('id','asc')->get();
            echo json_encode($data);
            exit;
        }
    }
    public function add_data(Request $request){
        if($request->ajax()){
            if($request->input('working')=="يعمل"){
                $work=1;
            }else{
                $work=0;
            }

            $data = array(
                'computer_brand'=>$request->input('computer_brand'),
                'working'=>$work,
                'serial'=>$request->input('serial'),
                'place'=>$request->input('place'),
                'notes'=>$request->input('notes'),
            );
            
            $id = DB::table('computers')->insertGetId($data);
            if($id>0){
                //echo "<div class='alert alert-success'>تمت الأضافة بنجاح</div>";
            }
        }
    }
    public function update_data(Request $request){
        if($request->ajax()){
            if($request->column_name=="working"){
                if($request->column_value=="يعمل"){
                    $work=1;
                }else{
                    $work=0;
                }
                $data = array(
                    $request->column_name   => $work
                );
                
                DB::table('computers')->where('id',$request->id)->update($data);  
                exit;
            }

            $data = array(
                $request->column_name   => $request->column_value
            );
            
            DB::table('computers')->where('id',$request->id)->update($data);
            
            
        }
    }

    public function delete_data(Request $request){
        if($request->ajax()){
            

            
            DB::table('computers')->where('id',$request->id)->delete();
            
            
        }
    }


}
