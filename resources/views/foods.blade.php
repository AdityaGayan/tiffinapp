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
                	<table width="100%">
						<thead>
							<tr>
                            	<th width="40px"><a href="#">Food ID<img src="img/icons/arrow_down_mini.gif" width="16" height="16" align="absmiddle" /></a></th>
                            	<th width="100px"><a href="#" >Name</a></th>
                                <th width="10px"><a href="#">LD</a></th>
                            </tr>
						</thead>
						<tbody id="foods">
							
						</tbody>
					</table>

                    <script src="{{URL::asset('js/jquery.js')}}"></script>

                    <script>	
                    $(document).ready((function(){
                    var $o = $('#foods');
                    
                    $.ajax({
                    type: 'GET',
                    url: 'api/food',
                    dataType: 'json',
                    success: function(foods){
           
                    $.each(foods.results, function(){
                        
                    $o.append('<tr><td><a href="showfood/'+this.foodid+'">'+this.foodid+'</a></td><td>'+this.name+'</td><td>'+this.LD+'</td></tr>');
               
                     });
                    }
                    });
                    }));
                    </script>
                    
            
                <a href="createfood"><h3>Create food</h3></a>
                