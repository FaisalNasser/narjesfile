@extends('layouts.app')

@section('content')
<style>
 .main-container
  {
      display: flex; width: 185px;height: 150px; justify-content: center;  border-radius: 8px;margin: 20px; text-align:center;"
  }
  .maincontainerchild
  {
      color: #333; background-color: #fff;padding: 50px;width: 175px;height: 175px;top: -12px;position: relative; border-radius: 20px;
  }
  h1{
      font-size:50px;
  }
  @media screen and (max-width: 425px) {
  .main-container
  {
      width:130px;
      height:65px;
  }
    h1{
      font-size:30px;
  }
  .maincontainerchild
  {
    padding: 10px; 
    width: 120px;
    height: 90px;
}
}
    @media screen and (max-width: 375px) {
  .main-container
  {
      width:90px;
      height:50px;
  }
    h1{
      font-size:30px;
  }
  .maincontainerchild
  {
    padding: 0px; 
    width: 80px;
    height: 80px;
}
}
</style>
    <div class="row wrapper border-bottom white-bg page-heading">
          <div class="col-lg-10">
                    <h2>@lang('site.tables_orders')</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{url('/')}}">@lang('site.home')</a>
                        </li>
                     
                        <li class="active">
                            <strong>@lang('site.tables_orders')</strong>
                        </li>
                    </ol>
         </div>
         <div class="col-lg-2">

        </div>
    </div>
    <div class="row" style="direction:rtl;">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12" >
            <div class="row ">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12" >
                        <div class="panel panel-default">
                             <div class="panel-heading">
                                  <div class="btn-group" role="group" aria-label="Basic example" style="display: inline-flex;">
                                      <a type="button" data-status="-1" class="btn btn-secondary getTable " style="background-color:#2f4050;color:#f7971d;"> @lang('site.ALLTables')</a>
                                      <a type="button"  data-status="1" class="btn btn-secondary getTable" style="color: #333;" > @lang('site.Orders')</a>
                                      <a type="button"  data-status="0" class="btn btn-secondary getTable" style="color: #333;"> @lang('site.EmptyTables')</a>
                                      <a type="button"  data-status="2" class="btn btn-secondary getTable" style="color: #333;"> @lang('site.ReservedTables')</a>

                                    </div>
                                         <input id="searchItem" class="" style="color: #333;background-color: #f5f5f5;border-color: #ddd;     padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px; display: inline-block;
    float: left;" placeholder="@lang('site.search')" />
                              </div>
                           </div>
                 
                 </div>
            </div>
          

           



            <div class="row" >
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="div-details" >
              @forelse ($tables as $key => $table)
               <?php if(is_numeric($table->table_name)) { ?>     

              <div class="col-md-2 col-sm-6 col-xs-6  maincontainer" >
                   <?php 
                                 if($table->status == 0) { 
                                    $back = '#1bb394'; 
                                } else if($table->status == 1) { 
                                     $back = '#f8ac59'; 
                                }else
                                {
                                     $back = '#ed5565'; 
                                }
                                       ?>
                  <a  href="{{url('tables_orders/create_Orders/'. $table->id)}}">                 
             <div data-id="{{$table->id}}" class="main-container" style="background-color: <?php echo$back;?>; ">
      <div class="maincontainerchild" style=" ">
             @lang('site.table_id')       <h1 style=" font-weight:bold; color: #333;"> {{$table->table_name}} </h1>
    </div>
    </div></a>  
               </div>
                  <?php } ?>        
              @empty
              <div> @lang('site.no_record_found')</div>
             @endforelse

       

          </div>
          
          
      </div>
  
 


        </div>

    </div>
<script>
    $(document).ready(function() {
    //         $('.maincontainer').on('click', function(){
      

    //     var value = $(this).attr("data-tid");

    //     console.log(value);

    // });

    $('.getTable').on('click', function(){
        $('#div-details').html('');
        $(".btn").css("background-color", "");
        $(".btn").css("color", "#333");
        $(this).css("background-color", "#2f4050");
        $(this).css("color", "#f7971d");

        var value = $(this).attr("data-status");
        var back='#ed5565';
        if(value == 0) {  back= '#1bb394'; } 
        else if(value== 1) { back = '#f8ac59';  }
        else {back = '#ed5565';}
        console.log(value);
         $.ajax({
        type: 'GET', //THIS NEEDS TO BE GET
        url: "{{url('tables/get_tablesOrders')}}/" + value + "",
         success: function (data) {
         console.log(data);
         var tablecontent ="";
         for (var i = 0; i < data.length; i++) {
             
             if($.isNumeric(data[i].table_name))
             {
                  if(data[i].status == 0) {  back= '#1bb394'; } 
                  else if(data[i].status== 1) { back = '#f8ac59';  }
                  else {back = '#ed5565';}
                 var tableUrl = 'tables_orders/create_Orders/'+data[i].id+'/';
                 tablecontent+='<div class="col-md-2 col-sm-6 col-xs-6  maincontainer" ><a href="'+tableUrl+'"><div class="main-container" data-id="{{$table->id}}" id="main-container" style="  background-color:'+back+'; "><div class="maincontainerchild"  style="">@lang('site.table_id')<h1 style="font-weight:bold; color: #333;">  '+data[i].table_name+' </h1> </div></div></a></div>';
             }

         }
        $('#div-details').append(tablecontent);
        }
               
         });
        
    });
       
       
            $('body').on('keyup','#searchItem',function(){
            var searchQuery = $(this).val();
            console.log(searchQuery);
             $('#div-details').html('');

            $.ajax({
                method:'POST',
                url:'<?php echo url("tables/get_tableOfItem"); ?>' ,
                dataType : 'json' ,
                data : {
                    '_token' : '{{ csrf_token() }}',
                    name :searchQuery
                } ,
                success :function(data){
                  console.log(data)
                      var tablecontent ="";
               for (var i = 0; i < data.length; i++) {
             
             if($.isNumeric(data[i].table_name))
             {
                  if(data[i].status == 0) {  back= '#1bb394'; } 
                  else if(data[i].status== 1) { back = '#f8ac59';  }
                  else {back = '#ed5565';}
                 var tableUrl = 'tables_orders/create_Orders/'+data[i].id+'/';
                 tablecontent+='<div class="col-md-2 col-sm-6 col-xs-6  maincontainer" ><a href="'+tableUrl+'"><div class="main-container" data-id="{{$table->id}}" id="main-container" style="  background-color:'+back+'; "><div class="maincontainerchild"  style="">@lang('site.table_id')<h1 style="font-weight:bold; color: #333;">  '+data[i].table_name+' </h1> </div></div></a></div>';
             }

         }
               $('#div-details').append(tablecontent); 
                     }
                       
                        
                     
                   
                   
                    });
                
            });
   
        });

        

</script>

@endsection
