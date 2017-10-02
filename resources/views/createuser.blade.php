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
                	<li class="current"><a href="{{url('users')}}">Users</a></li>
                    <li ><a href="{{url('foods')}}">Foods</a></li>
                    
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
                	<h3>Create User</h3>

                     <form id="myform">
                	  <table width="100%">
                         
                          <tr><th>Name</th><td><input type="text" id="name" size="85"/></td></tr>
                          <tr><th>Email</th><td><input type="text" id="email" size="85"/></td></tr>
                          <tr><th>Mobile</th><td><input type="text" id="mobile" size="85"/></td></tr>
                          <tr><th>Password</th><td><input type="text" id="password" size="85"/></td></tr>
					   </table>  
                       <input type="submit" value="submit"/>
                       </form>
                </div>
            </div>

            <script src="{{URL::asset('js/jquery.js')}}"></script>

<script>
 $(document).ready(function(){
    $('form#myform').submit(function(event){
      event.preventDefault();
      var name=$('#name').val();
      var email=$('#email').val();
      var mobile=$('#mobile').val();
      var password=$('#password').val();

      var order={
                        name: name,
                        email: email,
                        mobile: mobile,
                        password:password,
                };
    

      $.ajax({
        type: 'POST',
        url: 'api/createuser',
        data: order,
        success: function(elm){

          if(elm.success==0){
            $('#show').append('<p id="para" style="color:red;" >Unable to create,please try again!</p>')
            //alert('error');
          }
          else{
              alert('Successfully Created!')
            window.location="{{url('users')}}";
            }
         }
      });

    });  
  });


 
    </script>

    