<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use  Illuminate\Support\Facades\DB;

class ColoredPrinter extends Controller
{
    //
    public function index(){
        return view('showColoredPrinter');
    }

    public function fetch_data(Request $request){
        
        
        if($request->ajax()){
            $data = DB::table('printers')->where('printer_colors' , 1)->orderBy('id','asc')->get();
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
                'printer_brand'=>$request->input('printer_brand'),
                'working'=>$work,
                'serial'=>$request->input('serial'),
                'place'=>$request->input('place'),
                'printer_colors' => 1
            );
            
            $id = DB::table('printers')->insertGetId($data);
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
            
           
            
            DB::table('printers')->where('id',$request->id)->update($data);
            
            
        }
    }

    public function delete_data(Request $request){
        if($request->ajax()){
            

            
            DB::table('printers')->where('id',$request->id)->delete();
            
            
        }
    }
}
