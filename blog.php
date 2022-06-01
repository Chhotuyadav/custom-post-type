<?php include 'config.php' ;


$url=  $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

$parts = explode('/', $url);
$new_url1 = $parts[3];
$new_url2 = $parts[4];


$qur = "select * from postdata WHERE title='$new_url1' or id='$new_url2' ";
$res = mysqli_query($conn, $qur);
$count = mysqli_num_rows($res);
if($count>0){

?>


        <?php  
         
    $qur = "select * from postdata WHERE title='$new_url1' or id='$new_url2' ";
         
         //echo $qur;
        
          $res = mysqli_query($conn, $qur);
          $row = mysqli_fetch_assoc($res);
          $title= $row['title'];
          $file= $row['file'];
          $descripton= $row['descripton'];
          $date = $row[date];
          
          $da =explode(" ",$date);
         
   

?>



<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
* {
  box-sizing: border-box;
}
.main-img {
    width:80%;
    margin:0px auto;
    border: 1px solid black;
    padding: 10px;
}
.main-img img{
    width:100%;
}
.main-img h2 {
    font-size: 32px;
    text-transform: uppercase;
    font-family: sans-serif;
    color:red;
}
.main-img p {
    font-size: 18px;
    line-height: 1.2;
    font-family: sans-serif;
    color:#233adf;
    border-bottom: 1px solid;
    padding-bottom: 16px;
}
.comment-section {
    border-top: 1px solid black;
    margin-top: 16px;
}
.comment-section h3 {
    font-size: 18px;
    font-style: italic;
    color: blue;
}
.comment-section h4 {
    font-size: 18px;
    font-style: italic;
    color: red;
    float: right;
}
.comment-section p {
    font-size: 16px;
    color: gray;
    font-style: italic;
    padding-top: 12px;
    padding-left: 40px;
}
.comment-section h2 {
    color: brown;
    font-size: 15px;
}








</style>
</head>

<body>
    <div class="container">
      <div class="row">
         <div class="main-img">
             <img src ="https://lagnamandapam.com/post/profile/<?php echo $row['file'] ?>" >
             <h2><?php echo $title ?></h2>
             <h3><i><?php echo $da['0'] ?></i></h3>
             <p><?php echo $descripton ?></p>
             
             <div style="width:60%;">
                 <h2>Leave a Reply</h2>
                 <form  action="https://lagnamandapam.com/post/function.php" method="post">
                     
                     <input type="hidden" name="id" value="<?php echo $id ?>">
                     
                     <div class="form-group">
                        <label for="email">Name:</label>
                        <input type="text" class="form-control" name="name" required >
                      </div>
                      
                      <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" name="email" required>
                      </div>
                     
                      <div class="form-group">
                        <label for="email">Message:</label><br>
                        <textarea class="form-control"  name="message" rows="4" cols="50"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary" name="csubmit">SUBMIT</button>
                 </form>          
             </div>
             <div class="comment-section">
                 
                  <?php  
         
         $qur = "select * from comment WHERE blog_id='$id'";
        
                     $ress = mysqli_query($conn, $qur);
                     $count= mysqli_num_rows($ress);
                      echo "<h2> $count Comments</h2>";
                      while($rows = mysqli_fetch_assoc($ress)){;
                      $cname= $rows['name'];
                      $cmess= $rows['message'];
                      
                     
                     ?>
                 
                 
                 
                 <h3><?php echo $cname  ?></h3>
                 <h4>reply</h4>
                 <p><?php echo $cmess ?></p>
                 
                 <?php
                  }
                  
                  
}
else{
    
    header('Location: https://lagnamandapam.com/404page.php');
}
                  ?>
             </div>
         </div>
      </div>
    </div>
</body>
</html>

