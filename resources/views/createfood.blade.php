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
          

 
        <p id="show"></p>
        <div id="wrapper">
            <div id="content">
                <div id="box">
                	<h3>Create food</h3>

                     <form  id="myform">
                	  <table width="100%">
                         
                          <tr><th>Name</th><td><input id="name" type="text"  size="85"/></td></tr>
                          <tr><th>Description</th><td><input id="description"type="text"  size="85"/></td></tr>
                          <tr><th>LD</th><td><input type="text" id="LD"  size="85"/></td></tr>
                          <tr><th>Starters</th><td><input type="text" id="starters" size="85"/></td></tr>
                          <tr><th>Thali</th><td><input type="text" id="thali"  size="85"/></td></tr>
                          <tr><th>Chappati</th><td><input type="text" id="chappati"  size="85"/></td></tr>
                          <tr><th>Vegetable</th><td><input type="text" id="vegetable" size="85"/></td></tr>
                          <tr><th>Salad&pickle</th><td><input type="text" id="salad"  size="85"/></td></tr>
                          <tr><th>Desert</th><td><input type="text" id="desert"  size="85"/></td></tr>
                          <tr><th>Complementary</th><td><input type="text" id="complementary" size="85"/></td></tr>
                          <tr><th>Dailyprice</th><td><input type="text" id="dailyprice"  size="85"/></td></tr>
                          <tr><th>Weeklyprice</th><td><input type="text" id="weeklyprice"  size="85"/></td></tr>
                          <tr><th>Monthlyprice</th><td><input type="text" id="monthlyprice"  size="85"/></td></tr>
					   </table>  
                       <input type="submit" value="submit"/>
                       </form>
                </div>
            </div>
        </div>

        <script src="{{URL::asset('js/jquery.js')}}"></script>

<script>
 $(document).ready(function(){
    $('form#myform').submit(function(event){
      event.preventDefault();
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
        url: 'api/createfood',
        data: order,
        success: function(elm){

          if(elm.success==0){
            $('#show').append('<p id="para" style="color:red;" >Unable to create,please try again!</p>')
            //alert('error');
          }
          else{
              alert('Successfully Created!')
            window.location="{{url('foods')}}";
            }
         }
      });

    });  
  });


 
    </script>

