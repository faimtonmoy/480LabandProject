

<html>

<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
   
    </head>


<body>
<nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="companyprofile.php">
          <b><font color="green">Agri-</font>Help</b>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
           aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>

         <div class="col-md-4">
         <br>
            <form action="searchprocess.php" method="post">
            <input type="text" name="search" placeholder="Search Here">
            <input type="submit" value="Search" class="btn btn-success"></form>
          </div>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav ml-auto">
             <li class="nav-item">
               <a class="nav-link" href="home.php">Home</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="companyprofile.php">Profile</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="sign_out.php">Sign out</a>
             </li>
           </ul>
         </div>
     </div>
   </nav><br><br>
</body></html>