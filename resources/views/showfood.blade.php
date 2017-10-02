<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard - Admin Template</title>
<link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme.css')}}" />
<link rel="stylesheet" type="text/css" href="{{URL::asset('css/style.css')}}" />

</head>

<body> 
    <div id="container">
    	<div id="header">
        	<h2>Makemymeals admin panel</h2>
    <div id="topmenu">
            	<ul>
                	<li ><a href="{{url('')}}" >Dashboard</a></li>
                    <li ><a href="{{url('orders')}}">Orders</a></li>
                	<li ><a href="{{url('users')}}">Users</a></li>
                    <li class="current"><a href="{{url('foods')}}">Foods</a></li>
                
              </ul>
          </div>
      </div>
        <div id="top-panel">
            
         </div
	</div>
	<div id="sidebar">
    <ul>
      <li><h3><a href="{{url('')}}" class="house">Dashboard</a></h3>
          <ul>
              <li><a href="{{url('')}}" class="report">Show Tiffins on DATE</a></li>
              <!-- <li><a href="#" class="report_seo">A</a></li> -->
              
          </ul>
      </li>
      <li><h3><a href="{{url('orders')}}" class="folder_table">Orders</a></h3>
            <ul>
              <li><a href="{{url('createorder')}}" class="addorder">Create Order</a></li>
            <li><a href="{{url('orders')}}" class="shipping">Show Orders</a></li>
              
          </ul>
      </li>
      
    <li><h3><a href="{{url('users')}}" class="user">Users</a></h3>
            <ul>
              <li><a href="{{url('createuser')}}" class="useradd">Create user</a></li>
              <li><a href="{{url('users')}}" class="group">Show Users</a></li>
              
          </ul>
      </li>

      <li><h3><a href="{{url('foods')}}" class="manage">Foods</a></h3>
            <ul>
              <li><a href="{{url('createfood')}}" class="manage_page">Create Food</a></li>
              <li><a href="{{url('foods')}}" class="cart">Show Foods</a></li>
              <!-- <li><a href="#" class="folder">Product categories</a></li>
              <li><a href="#" class="promotions">Promotions</a></li> -->
          </ul>
      </li>
  </ul>       
</div>
	

		<div id="wrapper">
            <div id="content">
                <div id="box">
                	<h3>Foods</h3>
                    <form id="myform">
                    <table id="table">
                         
                    </table>
                    <input type="submit" value="Update Food"/>
                    </form>

                
                	
                    
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

                    <script>	
                    $(document).ready((function(){
                    var $o = $('#table');
                    var a={{$foodid}};
                    
                    $.ajax({
                    type: 'GET',
                    url: '../api/food',
                    dataType: 'json',
                    success: function(foods){
           
                    $.each(foods.results, function(){
                        
                        if(this.foodid==a){
                        $o.append('<tr><th>'+"foodid"+'</th><td><input type="text" id="foodid" value="'+this.foodid+'"/></td></tr><tr><th>'
                                            +"name"+'</th><td><input type="text" id="name" value="'+this.name+'"/></td></tr><tr><th>'
                                            +"description"+'</th><td><input type="text" id="description" value="'+this.description+'"/></td></tr><tr><th>'
                                            +"LD"+'</th><td><input type="text" id="LD" value="'+this.LD+'"/></td></tr><tr><th>'
                                            +"starters"+'</th><td><input type="text" id="starters" value="'+this.starters+'"/></td></tr><tr><th>'
                                            +"thali"+'</th><td><input type="text" id="thali" value="'+this.thali+'"/></td></tr><tr><th>'
                                            +"chappati"+'</th><td><input type="text" id="chappati" value="'+this.chappati+'"/></td></tr><tr><th>'
                                            +"vegetable"+'</th><td><input type="text" id="vegetable" value="'+this.vegetable+'"/></td></tr><tr><th>'
                                            +"salad&pickle"+'</th><td><input type="text" id="salad&pickle" value="'+"s"+'"/></td></tr><tr><th>'
                                            +"desert"+'</th><td><input type="text" id="desert" value="'+this.desert+'"/></td></tr><tr><th>'
                                            +"complementary"+'</th><td><input type="text" id="complementary" value="'+this.complementary+'"/></td></tr><tr><th>'
                                            +"dailyprice"+'</th><td><input type="text" id="dailyprice" value="'+this.dailyprice+'"/></td></tr><tr><th>'
                                            +"weeklyprice"+'</th><td><input type="text" id="weeklyprice" value="'+this.weeklyprice+'"/></td></tr><tr><th>'
                                            +"monthlyprice"+'</th><td><input type="text" id="monthlyprice" value="'+this.monthlyprice+'"/></td></tr><tr><th>'
                                            +"created_at"+'</th><td>'+this.created_at+'</td></tr><tr><th>'
                                            +"updated_at"+'</th><td>'+this.updated_at+'</td></tr>');
                        }
                        
                        
                     });
                    }
                    });
                    }));

                    $(document).ready(function(){
                      $('form#myform').submit(function(event){
                        event.preventDefault();
                        var foodid=$('#foodid').val();
                        var name=$('#name').val();
                        var description=$('#description').val();
                        var LD=$('#LD').val();
                        var starters=$('#starters').val();
                        var thali=$('#thali').val();
                        var chappati=$('#chappati').val();    
                        var vegetable=$('#vegetable').val();    
                        var salad=$('#salad').val();   
                        var desert=$('#desert').val();    
                        var complementary=$('#complementary').val();    
                        var dailyprice=$('#dailyprice').val();   
                        var weeklyprice=$('#weeklyprice').val();
                        var monthlyprice=$('#monthlyprice').val();   

                    var order={
                        foodid: foodid,
                        name: name,
                        description: description,
                        LD: LD,
                        starters:starters,
                        thali:thali,
                        chappati:chappati,
                        vegetable:vegetable,
                        salad: salad,
                        desert:desert,
                        complementary: complementary,
                        dailyprice : dailyprice,
                        weeklyprice : weeklyprice,
                        monthlyprice : monthlyprice,

                    };
    

            $.ajax({
                 type: 'POST',
                url: '../api/updatefood',
                data: order,
                success: function(elm){

                if(elm.success==0){
                    $('#show').append('<p id="para" style="color:red;" >Unable to update,please try again!</p>')
            //alert('error');
            }
                else{
                    alert('Successfully Updated!')
                    window.location="{{url('foods')}}";
                }
            }
        });

            });  
        });
                    </script> 
                    
                
                <form id="myform1">
                    <input type="hidden" id="foodid" value={{$foodid}} />
                    <input type="submit" value="Delete food"/>

                </form>
                <script>
                $(document).ready(function(){
                      $('form#myform1').submit(function(event){
                        event.preventDefault();
                        var foodid=$('#foodid').val();
                        

                    var order={
                        foodid: foodid,
                        

                    };
    

            $.ajax({
                 type: 'POST',
                url: '../api/deletefood',
                data: order,
                success: function(elm){

                if(elm.success==1){
                    $('#show').append('<p id="para" style="color:red;" >Unable to delete,please try again!</p>')
            //alert('error');
            }
                else{
                    alert('Successfully Deleted!')
                    window.location="{{url('foods')}}";
                }
            }
        });

        });  
        });
                    </script> 