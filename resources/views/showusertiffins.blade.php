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
                    <li class="current"><a href="{{url('orders')}}">Orders</a></li>
                	<li><a href="{{url('users')}}">Users</a></li>
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
                	<h3>Tiffins</h3>
                	<table width="100%">
						<thead>
							<tr>
                            	<th width="40px"><a href="#">Tiffin ID<img src="img/icons/arrow_down_mini.gif" width="16" height="16" align="absmiddle" /></a></th>
                            	<th width="30px"><a href="#" >L</a></th>
                                <th width="30px"><a href="#" >D</a></th>
                                <th width="10px"><a href="#">Booking ID</a></th>
								<th width="10px"><a href="#">Customer ID</a></th>
                                <th width="100px"><a href="#">Booking Option</a></th>
								<th width="30px"><a href="#">Quantity</a></th>
                                <th width="60px"><a href="#">Date</a></th>
								<th width="50px"><a href="#">Status</a></th>
								<th width="50px"><a href="#">Type of meal</a></th>
								<th width="30px"><a href="#">Charges</a></th>
                            </tr>
						</thead>
						<tbody id="tiffins">
							
						</tbody>
					</table>

                
                	
                    
                    <script src="{{URL::asset('js/jquery.js')}}"></script>

                    <script>	
                    $(document).ready((function(){
                    var $o = $('#tiffins');
                    var $a={{$id}};
                    var $b={{$bookingid}};
                    
                
                    var order={
                        id: $a,
                        bookingid: $b,
                    };
                    $.ajax({
                    type: 'POST',
                    url: '../../../api/showusertiffins',
                    data: order,
                    success: function(tiffins){
                      
                    $.each(tiffins.tiffins, function(){
                      console.log(this);
                    
                    $o.append('<tr><td>'+this.tiffinid+'</td><td>'+this.L+'</td><td>'+this.D+'</td><td>'+this.bookingid+'</td><td>'+this.customerid+'</td><td>'+this.bookingoption+'</td><td>'+this.no_of_subscriptions+'</td><td>'+this.date+'</td><td>'+this.status+'</td><td>'+this.typemeal+'</td><td>'+this.Charges+'</td></tr>');
                        
                        
                        
                     });
                    }
                   });
                    }));
                    </script> 
                    
                </div>
            
                <a href=""><h3>Update food</h3></a>
                <a href=""><h3>Delete food</h3></a>

    
		 


