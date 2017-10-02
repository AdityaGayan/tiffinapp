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
                	<h3>User details</h3>
                    <form id="myform">
                    <table id="table">
                         
                    </table>
                    <input type="submit" value="Update User"/>
                    </form>

                
                	
                    
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

                    <script>	
                    $(document).ready((function(){
                    var $o = $('#table');
                    var a={{$id}};
                    
                    
                    $.ajax({
                    type: 'GET',
                    url: '../api/showusers',
                    dataType: 'json',
                    success: function(users){
           
                    $.each(users.users, function(){
                        
                        if(this.id==a){
                        $o.append('<tr><th>'+"ID"+'</th><td><input type="text" id="id" value="'+this.id+'"/></td></tr><tr><th>'
                                            +"Name"+'</th><td><input type="text" id="name" value="'+this.name+'"/></td></tr><tr><th>'
                                            +"Email"+'</th><td><input type="text" id="email" value="'+this.email+'"/></td></tr><tr><th>'
                                            +"Mobile"+'</th><td><input type="text" id="mobile" value="'+this.mobile+'"/></td></tr><tr><th>'
                                            +"Verification status"+'</th><td><input type="text" id="isVerified" value="'+this.isVerified+'"/></td></tr><tr><th>'
                                            +"Created At"+'</th><td><input type="text" id="created_at" value="'+this.created_at+'"/></td></tr><tr><th>'
                                            +"Updated At"+'</th><td><input type="text" id="updated_at" value="'+this.updated_at+'"/></td></tr>');
                        }
                        
                        
                     });
                    }
                    });
                    }));

                    $(document).ready(function(){
                      $('form#myform').submit(function(event){
                        event.preventDefault();
                        var id=$('#id').val();
                        var name=$('#name').val();
                        var email=$('#email').val();
                        var mobile=$('#mobile').val();
                        var isVerified=$('#isVerified').val();
                         

                    var order={
                        id: id,
                        name: name,
                        email: email,
                        mobile: mobile,
                        isVerified: isVerified,

                    };
    

            $.ajax({
                 type: 'POST',
                url: '../api/updateuser',
                data: order,
                success: function(elm){

                if(elm.success==0){
                    $('#show').append('<p id="para" style="color:red;" >Unable to update,please try again!</p>')
            //alert('error');
            }
                else{
                    alert('Successfully Updated!')
                    window.location="{{url('users')}}";
                }
            }
        });

            });  
        });
                    </script> 
                    
                
                <form id="myform1">
                     <input type="hidden" id="id" value={{$id}} />
                     <input type="submit" value="Delete user"/>

                 </form>
                 <script>
                $(document).ready(function(){
                      $('form#myform1').submit(function(event){
                        event.preventDefault();
                        var id=$('#id').val();
                        

                    var order={
                        id: id,
                        

                    };
    

            $.ajax({
                 type: 'POST',
                url: '../api/deleteuser',
                data: order,
                success: function(elm){

                if(elm.success==1){
                    $('#show').append('<p id="para" style="color:red;" >Unable to delete,please try again!</p>')
            //alert('error');
            }
                else{
                    alert('Successfully Deleted!')
                    window.location="{{url('users')}}";
                }
            }
        });

        });  
        });
                    </script> 