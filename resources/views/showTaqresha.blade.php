@extends('layouts.app')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">التقريشة</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="trick">   

                        <table  class="table table-bordered table-striped" id="pcs">
                            
                            <thead>
                            <tr>
                            <th>نوع الجهاز</th>
                            <th>حالة الجهاز</th>
                            <th>رقم مسلسل</th>
                            <th>مكان التواجد</th>
                            <th>اضافة & حذف</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                                <tr>
                                    <td contenteditable id="computer_brand"></td>
                                    <td contenteditable    id="working"></td>
               
                                    <td contenteditable    id="serial"></td>
               
                                    <td contenteditable   id="place"></td>
               
                                    <td>  <button type="button" class="btn btn-success btn-xs" id="addpc">أضافة</button>   </td></tr> 
        
                            </tbody>
                            
                            <tfoot>
                            <tr>
                                <th>نوع الجهاز</th>
                                <th>حالة الجهاز</th>
                                <th>رقم مسلسل</th>
                                <th>مكان التواجد</th>
                                <th>اضافة & حذف</th>
                                 
                            </tr>
                            </tfoot>
                            
                        </table>
                            </div><!-- trick end -->
                        </div>
                <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </section>
        @stop
        
        
        @section('footer')
        
        
        
        <script>
         
         
        
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $(document).ready(function(){
                //var table;
        
                fetch_data();
                
                
                var _token = $('input[name="_token"]').val();
                $(document).on('click','#addpc', function(){
                        var computer_brand = $('#computer_brand').text();
                        var working = $('#working').text();
                        var serial = $('#serial').text();
                        var place = $('#place').text();
                        if(computer_brand !='' && working !='' && serial !='' && place !=''){
                            $.ajax({
                                url:"{{url('/showpc/add_data')}}",
                                method:'post',
                                data:{computer_brand:computer_brand,working:working,serial:serial,place:place,_token: CSRF_TOKEN},
                                success:function(data){
                                    //$(#message).html(data);
                                    $(`<div class="alert alert-success alert-dismissible align-content-center text-lg-right" id="succ">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >&times;</button>
                                    <h5><i class="icon fas fa-check align-content-center"></i> تنبيه</h5>
                                    <h4>تمت الأضافة بنجاح</h4>
                                  </div>`).insertBefore("#trick");
                                    $('#computer_brand').html("");
                                    $('#working').html("");
                                    $('#serial').html("");
                                    $('#place').html("");
                                    $('#pcs').DataTable();
                                    
                                    //table =$('#pcs').DataTable();
                                    
                                    fetch_data();
                                    
                                },
                                error:function(){
                                    console.log("error");
                                },
                            });
        
                        }else{
                            
                           $(`<div class="alert alert-warning alert-dismissible text-lg-right" id="fail" >
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >&times;</button>
                                    <h5><i class="icon fas fa-exclamation-triangle"></i> تنبيه</h5>
                                    <h4>برجاء ملئ كافة الحقول</h4>
                                  </div>`).insertBefore("#trick");
                            
                            console.log("error2");
                        }
        
                    });//end add
        
                $(document).on('blur','.column_name',function(){
                    var column_name = $(this).data('column_name');
                    var column_value =$(this).text();
                    var id= $(this).data("id");
                    console.log(id);
                    if(column_value!=''){
                        $.ajax({
                            url:"{{url('/showpc/update_data')}}",
                            method:'post',
                            data:{column_name:column_name,column_value:column_value,id:id,_token: CSRF_TOKEN},
                            success:function(data){
                                $(`<div class="alert alert-success alert-dismissible align-content-center text-lg-right" id="succ">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >&times;</button>
                                    <h5><i class="icon fas fa-check align-content-center"></i> تنبيه</h5>
                                    <h4>تم التحديث بنجاح</h4>
                                  </div>`).insertBefore("#trick");
                                  fetch_data();
                            },
                            error:function(){
                                $(`<div class="alert alert-warning alert-dismissible text-lg-right" id="fail" >
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >&times;</button>
                                    <h5><i class="icon fas fa-exclamation-triangle"></i> تنبيه</h5>
                                    <h4>برجاء ملئ كافة الحقول</h4>
                                  </div>`).insertBefore("#trick");
                            }
                        });
                    }
        
        
                });//end update
        
                $(document).on('click','.delete',function(){
                    var id=$(this).attr("id");
                    if(confirm("هل أنت متأكد انك تريد حذف ذلك الصف ؟")){
                        $.ajax({
                            url: "{{url('/showpc/delete_data')}}",
                            method:"POST",
                            data:{id:id,_token:CSRF_TOKEN},
                            success:function(){
                                  
                                fetch_data();
                                
                                $(`<div class="alert alert-success alert-dismissible align-content-center text-lg-right" id="succ">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >&times;</button>
                                    <h5><i class="icon fas fa-check align-content-center"></i> تنبيه</h5>
                                    <h4>تم الحذف بنجاح</h4>
                                  </div>`).insertBefore("#trick");
                                  
                                   
                                  
                                  
                                 
                            }
        
        
                        });
                    }
                });
        
        
        
        
                function fetch_data(){
                 $.ajax({
                         type: 'get',
                         url:"/showpc/fetch_data",
                         dataType:"json",
                         success:function(data){
                           
                            $('#trick').empty();
                            $('#trick').html(`<table  class="table table-bordered table-striped" id="pcs">
                            
                            <thead>
                            <tr>
                            <th>نوع الجهاز</th>
                            <th>حالة الجهاز</th>
                            <th>رقم مسلسل</th>
                            <th>مكان التواجد</th>
                            <th>اضافة & حذف</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                                <tr>
                                    <td contenteditable id="computer_brand"></td>
                                    <td contenteditable    id="working"></td>
               
                                    <td contenteditable    id="serial"></td>
               
                                    <td contenteditable   id="place"></td>
               
                                    <td>  <button type="button" class="btn btn-success btn-xs" id="addpc">أضافة</button>   </td></tr> 
        
                            </tbody>
                            
                            <tfoot>
                            <tr>
                                <th>نوع الجهاز</th>
                                <th>حالة الجهاز</th>
                                <th>رقم مسلسل</th>
                                <th>مكان التواجد</th>
                                <th>اضافة & حذف</th>
                                 
                            </tr>
                            </tfoot>
                            
                        </table>`);
         
                            $('#pcs tbody tr:not(:first)').empty(); 
                            if(table!=null){
                            table.clear();
                            table.distroy();
                            table =$('#pcs').DataTable();
                            }
                             var html='';
                            html+=`<tr>
                                    <td contenteditable id="computer_brand"></td>
                                    <td contenteditable    id="working"></td>
               
                                    <td contenteditable    id="serial"></td>
               
                                    <td contenteditable   id="place"></td>
               
                                    <td>  <button type="button" class="btn btn-success btn-xs" id="addpc">أضافة</button>   </td></tr>`;
                             if(data.length>0){
                             for(var i=0 ;i < data.length ; i++){
                                
                            html+='<tr>';
        
                            html+='<td contenteditable class="column_name" data-column_name="computer_brand"   data-id="'+data[i].id+'">'+data[i].computer_brand+'</td>';
                            
                             if(data[i].working===0){
        
                            html+='<td contenteditable  class="column_name" data-column_name="working"   data-id="'+data[i].id+'">لايعمل</td>';
        
                            }else{
        
                            html+='<td contenteditable class="column_name" data-column_name="working" data-id="'+data[i].id+'">يعمل</td>';
        
                               }
                               html+='<td contenteditable  class="column_name" data-column_name="serial"   data-id="'+data[i].id+'">'+data[i].serial+'</td>';
        
                               html+='<td contenteditable class="column_name" data-column_name="place"  data-id="'+data[i].id+'">'+data[i].place+'</td>';
                               html+='<td> <button type="button" class="btn btn-danger btn-xs delete" id="'+data[i].id+'">حذف</button> </td></tr>';
        
                               }
                               
        
                               $('#pcs tbody').html(html);
                               var table =$('#pcs').DataTable();
                               
                               
        
                        }
                        else{
                    var tr_str = "<tr class='norecord'>" +
                    "<td align='center' colspan='5'>No record found.</td>" +
                    "</tr>";
        
                    $("#pcs tbody").append(tr_str);
                    var table =$('#pcs').DataTable();
                        }
                        }
                       
                        
                           
                        })
                    }//fetch_data end
        
        
        
                  
        
        
          
                });
        
        
              
                </script>
        
        
        
           
        
            
        
        @stop
        
        