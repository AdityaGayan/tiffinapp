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
                	<li class="current"><a href="{{url('')}}" >Dashboard</a></li>
                    <li><a href="{{url('orders')}}" id="orders">Orders</a></li>
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
          
          
     

    
		 
	<div id="infobox">
        <h5>Tiffins on date</h5>
        <p>Date: <input type="text" id="date"></p>
        <button id="go" >GO!</button>
        
        <h3>Tiffins</h3> -->
              <table width="100%">
			    <thead>
					<tr>
                        <th width="40px"><a href="#">Tiffinid<img src="img/icons/arrow_down_mini.gif" width="16" height="16" align="absmiddle" /></a></th>
                        <th width="100px"><a href="#">L</th>
                        <th width="150px"><a href="#">D</th>
                        <th width="10px"><a href="#">Booking ID</th>
                        <th  width="10px"><a href="#">Customer ID</th>
                        <th width="30px"><a href="#">Booking Option</th>
                        <th width="30px"><a href="#">Quantity</th>
                        <th  width="20px"><a href="#">Date</th>
                        <th  width="5px"><a href="#">Status</th>
                        <th width="20px"><a href="#">Type of Meal</th>
                        <th width="20px"><a href="#">Charges</th>
                    </tr>
				</thead>
				<tbody id="tiffinson">
						  
				</tbody>
            </table>  

                    <!-- <table width="100%">
                        <thead>
							<tr>
                            	<th><a href="#">Name of Meals<img src="img/icons/arrow_down_mini.gif" width="16" height="16" align="absmiddle" /></a></th>
                            	<th><a href="#" >No of Meals</a></th>
                            </tr>
                        </thead>
                        <tbody id="tiffins">
                        
                        </tbody>
					</table>
             -->
                  </div>
                  

                    <script src="{{URL::asset('js/jquery.js')}}"></script>
				  
                  
                <script>
            $(function(){
                // $tiffins.append('<tr><td>'+"Veg Value Meal"+'</td></tr><tr><td>'
                //                           +"Non Veg Value Meal"+'</td></tr><tr><td>'
                //                           +"Regular Veg Meal"+'</td></tr><tr><td>'
                //                           +"Regular Non-Veg Meal"+'</td></tr><tr><td>'
                //                           +"Shahi Veg Meal"+'</td></tr><tr><td>'
                //                           +"Shahi Non-Veg Meal"+'</td></tr><tr><td>'
                //                           +"Catering(Veg)"+'</td></tr><tr><td>'
                //                           +"Catering(Non-Veg)"+'</td></tr>');
                var $tiffins= $('#tiffinson');
                var $date=$('#date');
                $('#go').on('click', function(){
                    var order={
                        date: $date.val(),

                    };
                    $.ajax({
                        type: 'POST',
                        url: 'api/showtiffinson',
                        data: order,
                        success: function(tiffins){
                            
                            $.each(tiffins.tiffins, function(){
                            $tiffins.append('<tr><td>'+this.tiffinid+'</td><td>'+this.L+'</td><td>'+this.D+'</td><td>'+this.bookingid+'</td><td>'+this.customerid+'</td><td>'+this.bookingoption+'</td><td>'+this.quantity+'</td><td>'+this.status+'</td><td>'+this.typemeal+'</td><td>'+this.charges+'</td></tr>');
                        });
                    }
                });
                    
                });
                });
        </script>              
                  </div>

				  
			 


        



				  
 </body>
			