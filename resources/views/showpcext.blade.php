@extends('layouts.app')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" > لاوازم أجهزة الحاسب</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        
                <div id="trick">   

                <table  class="table table-bordered table-striped" id="ext">
                    
                    <thead>
                    <tr>
                    <th>الصنف</th>
                    <th>النوع</th>
                    <th>يعمل</th>
                    <th>لا يعمل</th>
                    <th>اجمالي</th>
                    <th>اضافة & حذف</th>   
                    </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td contenteditable id="kind"></td>

                            <td contenteditable    id="brand"></td>
       
                            <td contenteditable    id="working"></td>
       
                            <td contenteditable   id="not_working"></td>
                            <td    id="quantity"></td>

       
                            <td>  <button type="button" class="btn btn-success btn-xs" id="addpcext">أضافة</button>   </td></tr> 

                    </tbody>
                    
                    <tfoot>
                        <tr>
                        <th>الصنف</th>
                        <th>النوع</th>
                        <th>يعمل</th>
                        <th>لا يعمل</th>
                        <th>اجمالي</th>
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
        $(document).on('click','#addpcext', function(){
                var kind = $('#kind').text();
                var working = $('#working').text();
                var not_working = $('#not_working').text();
                var quantity = $('#quantity').text();
                var brand = $('#brand').text();
                if(kind !='' && working !='' && not_working !='' &&  brand !=''){
                    $.ajax({
                        url:"{{url('/showext/add_data')}}",
                        method:'post',
                        data:{kind:kind,working:working,quantity:quantity,not_working:not_working,brand:brand,_token: CSRF_TOKEN},
                        success:function(data){
                            //$(#message).html(data);
                            $(`<div class="alert alert-success alert-dismissible align-content-center text-lg-right" id="succ">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >&times;</button>
                            <h5><i class="icon fas fa-check align-content-center"></i> تنبيه</h5>
                            <h4>تمت الأضافة بنجاح</h4>
                          </div>`).insertBefore("#trick");
                            $('#kind').html("");
                            $('#working').html("");
                            $('#not_working').html("");
                            $('#quantity').html("");
                            $('#brand').html("");
                            $('#ext').DataTable();
                            
                            //table =$('#ext').DataTable();
                            
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
                    url:"{{url('/showext/update_data')}}",
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
                    url: "{{url('/showext/delete_data')}}",
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
                 url:"/showext/fetch_data",
                 dataType:"json",
                 success:function(data){
                   
                    $('#trick').empty();
                    $('#trick').html(`
                    <table  class="table table-bordered table-striped" id="ext">
                    
                       <thead>
                           <tr>
                              <th>الصنف</th>
                              <th>النوع</th>
                              <th>يعمل</th>
                              <th>لا يعمل</th>
                              <th>اجمالي</th>
                              <th>اضافة & حذف</th>
                           </tr>
                       </thead>

                     <tbody>
                        <tr>
                            <td contenteditable id="kind"></td>
                            <td contenteditable    id="brand"></td>
       
                            <td contenteditable    id="working"></td>
       
                            <td contenteditable   id="not_working"></td>
                            <td    id="quantity"></td>

       
                            <td>  <button type="button" class="btn btn-success btn-xs" id="addpcext">أضافة</button>   </td></tr> 

                     </tbody>
                    
                     <tfoot>
                        <tr>
                        <th>الصنف</th>
                        <th>النوع</th>
                        <th>يعمل</th>
                        <th>لا يعمل</th>
                        <th>اجمالي</th>
                        <th>اضافة & حذف</th>
                        </tr>
                     </tfoot>                  
                    
                </table>`);
 
                    //$('#ext tbody tr:not(:first)').empty(); 
                    if(table!=null){
                    table.clear();
                    table.distroy();
                    table =$('#ext').DataTable();
                    }
                    var html='';
                    html+=`<tr>
                            <td contenteditable id="kind"></td>
                            <td contenteditable    id="brand"></td>
       
                            <td contenteditable    id="working"></td>
       
                            <td contenteditable   id="not_working"></td>
                            <td    id="quantity"></td>

       
                            <td>  <button type="button" class="btn btn-success btn-xs" id="addpcext">أضافة</button>   </td></tr> `;
                     if(data.length>0){
                     for(var i=0 ;i < data.length ; i++){
                        
                    html+='<tr>';

                    html+='<td contenteditable class="column_name" data-column_name="kind"   data-id="'+data[i].id+'">'+data[i].kind+'</td>';
                    
                   

                    html+='<td contenteditable class="column_name" data-column_name="brand" data-id="'+data[i].id+'">'+data[i].brand+'</td>';

                       
                    html+='<td contenteditable  class="column_name" data-column_name="working"   data-id="'+data[i].id+'">'+data[i].working+'</td>';

                    html+='<td contenteditable class="column_name" data-column_name="not_working"  data-id="'+data[i].id+'">'+data[i].not_working+'</td>';

                    html+='<td  class="column_name" data-column_name="quantity" data-id="'+data[i].id+'">'+data[i].quantity+'</td>';

                    html+='<td> <button type="button" class="btn btn-danger btn-xs delete" id="'+data[i].id+'">حذف</button> </td></tr>';

                    }
                       

                    $('#ext tbody').html(html);
                       
                    var table = $('#ext').DataTable();
                       
                       

                }else{
                    var tr_str = "<tr class='norecord'>" +
                    "<td align='center' colspan='5'>No record found.</td>" +
                    "</tr>";

                    $("#ext tbody").append(tr_str);
                    var table =$('#ext').DataTable();
                }
                }
               
                
                   
                })
            }//fetch_data end



          


  
        });


</script>



   

    

@stop




