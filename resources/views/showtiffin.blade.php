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
                	<h3>Tiffin details</h3>
                    <form id="myform">
                    <table id="table">
                         
                    </table>
                    <input type="submit" value="Update Tiffin"/>
                    </form>

                
                	
                    
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

                    <script>	
                    $(document).ready((function(){
                    var $o = $('#table');
                    var a={{$tiffinid}};
                    
                    
                    $.ajax({
                    type: 'GET',
                    url: '../api/showtiffins',
                    dataType: 'json',
                    success: function(tiffins){
                        
                    $.each(tiffins.tiffins, function(){
                        
                        if(this.tiffinid==a){
                        $o.append('<tr><th>'+"Tiffin ID"+'</th><td><input type="text" id="tiffinid" value="'+this.tiffinid+'"/></td></tr><tr><th>'
                                            +"L"+'</th><td><input type="text" id="L" value="'+this.L+'"/></td></tr><tr><th>'
                                            +"D"+'</th><td><input type="text" id="D" value="'+this.D+'"/></td></tr><tr><th>'
                                            +"Booking ID"+'</th><td><input type="text" id="bookingid" value="'+this.bookingid+'"/></td></tr><tr><th>'
                                            +"Customer ID"+'</th><td><input type="text" id="customerid" value="'+this.customerid+'"/></td></tr><tr><th>'
                                            +"Booking Option"+'</th><td><input type="text" id="bookingoption" value="'+this.bookingoption+'"/></td></tr><tr><th>'
                                            +"Quantity"+'</th><td><input type="text" id="quantity" value="'+this.quantity+'"/></td></tr><tr><th>'
                                            +"Date"+'</th><td><input type="text" id="date" value="'+this.date+'"/></td></tr><tr><th>'
                                            +"Status"+'</th><td><input type="text" id="status" value="'+this.status+'"/></td></tr><tr><th>'
                                            +"Meal Name"+'</th><td><input type="text" id="typemeal" value="'+this.typemeal+'"/></td></tr><tr><th>'
                                            +"Charges"+'</th><td><input type="text" id="charges" value="'+this.charges+'"/></td></tr>');
                        }
                        
                        
                     });
                    }
                    });
                    }));

                    $(document).ready(function(){
                      $('form#myform').submit(function(event){
                        event.preventDefault();
                        var tiffinid=$('#tiffinid').val();
                        var L=$('#L').val();
                        var D=$('#D').val();
                        var bookingid=$('#bookingid').val();
                        var customerid=$('#customerid').val();
                        var bookingoption=$('#bookingoption').val();
                        var quantity=$('#quantity').val();
                        var date=$('#date').val();
                        var status=$('#status').val();
                        var typemeal=$('#typmeal').val();
                        var charges=$('#charges').val();

                    var order={
                        tiffinid: tiffinid,
                        L: L,
                        D: D,
                        bookingid: bookingid,
                        customerid: customerid,
                        bookingoption: bookingoption,
                        quantity: quantity,
                        date: date,
                        status: status,
                        typemeal: typemeal,
                        charges: charges,
                    };
    

            $.ajax({
                 type: 'POST',
                url: '../api/updatetiffin',
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
                    
                
                