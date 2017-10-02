<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>MakeMyMeals Admin Login</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  
 
  <link rel="stylesheet" type="text/css" href="{{URL::asset('css/adminpanellogin.css')}}" />

  
</head>

<body>
  <div class="form">
      
      <ul class="tab-group">
        
        <li class="tab active"><a href="">Log In to MakeMyMeals Admin Panel</a></li>
      </ul>
      
        
        <div > 
           
          <h1>Welcome Back!</h1>
          <div id="show"> </div>
          <form method="post" action="" id="myform" >  
            <input type="text" style="padding:10px;" required placeholder="Username" id="user" name="username"/>

            <input type="password"style="padding:10px;" required placeholder="Password" id="pass" name="password"/>
          
            <input type="submit"  value="login" />
          
          </form>

        </div>
      
</div> <!-- /form -->
<script src="{{URL::asset('js/jquery.js')}}"></script>

<script>
 $(document).ready(function(){
    $('form#myform').submit(function(event){
      event.preventDefault();
      var user=$('#user').val();
      var pass=$('#pass').val();

      var order={
                        username: user,
                        password: pass,
                };
    

      $.ajax({
        type: 'POST',
        url: 'api/verifyadmin',
        data: order,
        success: function(elm){
          console.log(elm.success);

          if(elm.success==0){
            $('#show').append('<p id="para" style="color:red;" >Input Correct Credentials</p>')
            //alert('error');
          }
          else{
            window.location="{{url('')}}";
            }
         }
      });

    });  
  });


 
    </script>

</body>
</html>
