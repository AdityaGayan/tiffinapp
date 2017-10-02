
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
                    <li><a href="{{url('foods')}}">Foods</a></li>
                    
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
                	<h3>Users</h3>
                	<table width="100%">
						<thead>
							<tr>
                            	<th width="40px"><a href="#">ID<img src="img/icons/arrow_down_mini.gif" width="16" height="16" align="absmiddle" /></a></th>
                            	<th><a href="#">Full Name</a></th>
                                <th><a href="#">Email</a></th>
                                <th width="50px"><a href="#">Mobile</a></th>
                                <th width="90px"><a href="#">Verified</a></th>
                                <th width="60px"><a href="#">Registered</a></th>
                            </tr>
						</thead>
						<tbody id="users">
							
						</tbody>
					</table>

                    <script src="{{URL::asset('js/jquery.js')}}"></script>

                    <script>	
                    $(document).ready((function(){
                    var $o = $('#users');
   
                    $.ajax({
                    type: 'GET',
                    url: 'api/showusers',
                    dataType: 'json',
                    success: function(users){
           
                    $.each(users.users, function(){
                    $o.append('<tr><td><a href="showuser/'+this.id+'">'+this.id+'</td><td>'+this.name+'</td><td>'+this.email+'</td><td>'+this.mobile+'</td><td>'+this.isVerified+'</td><td>'+this.created_at+'</td><td><a href="showuserbooking/'+this.id+'">'+"Show user orders"+'</a></td></tr>');
               
                     });
                    }
                    });
                    }));
                    </script>
                    
                <br />

                <a href="createuser"><h3>Create user</h3></a>
                
                

                 
	