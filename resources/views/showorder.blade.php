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
                	<li ><a href="{{url('users')}}">Users</a></li>
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
                	<h3>Order details</h3>
                    <form id="myform">
                    <table id="table">
                         
                    </table>
                    <input type="submit" value="Update Order"/>
                    </form>

                
                	
                    
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

                    <script>	
                    $(document).ready((function(){
                    var $o = $('#table');
                    var a={{$bookingid}};
                    
                    
                    $.ajax({
                    type: 'GET',
                    url: '../api/showbookings',
                    dataType: 'json',
                    success: function(bookings){
                        
                    $.each(bookings.bookings, function(){
                        
                        if(this.bookingid==a){
                        $o.append('<tr><th>'+"Booking ID"+'</th><td><input type="text" id="bookingid" value="'+this.bookingid+'"/></td></tr><tr><th>'
                                            +"Name"+'</th><td><input type="text" id="name" value="'+this.name+'"/></td></tr><tr><th>'
                                            +"Address"+'</th><td><input type="text" id="address" value="'+this.address+'"/></td></tr><tr><th>'
                                            +"L"+'</th><td><input type="text" id="L" value="'+this.L+'"/></td></tr><tr><th>'
                                            +"D"+'</th><td><input type="text" id="D" value="'+this.D+'"/></td></tr><tr><th>'
                                            +"User Mobile"+'</th><td><input type="text" id="usermobile" value="'+this.usermobile+'"/></td></tr><tr><th>'
                                            +"Delivery Mobile"+'</th><td><input type="text" id="deliverymobile" value="'+this.deliverymobile+'"/></td></tr><tr><th>'
                                            +"Booking Option"+'</th><td><input type="text" id="bookingoption" value="'+this.bookingoption+'"/></td></tr><tr><th>'
                                            +"Starting Date"+'</th><td><input type="text" id="starting_date" value="'+this.starting_date+'"/></td></tr><tr><th>'
                                            +"Items"+'</th><td><input type="text" id="no_of_subscriptions" value="'+this.no_of_subscriptions+'"/></td></tr><tr><th>'
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
                        var bookingid=$('#bookingid').val();
                        var name=$('#name').val();
                        var address=$('#address').val();
                        var L=$('#L').val();
                        var D=$('#D').val();
                        var usermobile=$('#usermobile').val();
                        var deliverymobile=$('#deliverymobile').val();
                        var bookingoption=$('#bookingoption').val();
                        var starting_date=$('#starting_date').val();
                        var no_of_subscriptions=$('#no_of_subscriptions').val();

                    var order={
                        bookingid: bookingid,
                        name: name,
                        address: address,
                        L: L,
                        D: D,
                        usermobile: usermobile,
                        deliverymobile: deliverymobile,
                        bookingoption: bookingoption,
                        starting_date: starting_date,
                        no_of_subscriptions: no_of_subscriptions,
                    };
    

            $.ajax({
                 type: 'POST',
                url: '../api/updatebooking',
                data: order,
                success: function(elm){

                if(elm.success==0){
                    $('#show').append('<p id="para" style="color:red;" >Unable to update,please try again!</p>')
            //alert('error');
            }
                else{
                    alert('Successfully Updated!')
                    window.location="{{url('orders')}}";
                }
            }
        });
                        
            });  
        });
                    </script> 
                    
                
                