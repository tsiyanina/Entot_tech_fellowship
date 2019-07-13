<html>
    <title>
        Login Page
    </title>
    <head>



<link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="style/css">
    
    <link rel="stylesheet" type="text/css" href="../view/css/addons/document.css">
   
    <!-- <link href="scss/font-awesome.min.css" rel="i"> -->
    <script src="jqmy.js"></script>
    <script src="jquery-3.4.1.js"></script>
    
    </head>
    <body>
        
<div class="sidenav">
         <div class="login-main-text">
            <h2>Addis Ababa University<br> Login Page</h2>
            <p>Welcome To Online Clearance system.</p>
         </div>
      </div>
        
      <div class="main">
         
         <div class="col-md-6 col-sm-12">
             
            <div class="login-form">
                <div>
                <img id="img" src ="css/addons/aal.jpg"
                </div>
               
                <form action="../model/login.php" method="post">
                  <div class="form-group">
                     <label>User Name</label>
                     <input type="text" class="form-control" placeholder="User Name" name="user" required>
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" class="form-control" placeholder="Password" name="pass" required>
                  </div>
                  <button type="submit" class="btn btn-black">Login</button>
                  <button type="submit" class="btn btn-secondary">Register</button>
               </form>
            </div>
         </div>
      </div>
    </body>
</html>