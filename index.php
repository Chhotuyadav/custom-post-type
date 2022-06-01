<?php include 'config.php' ;


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
      .inner-blog{
        border: 1px solid #40b573;
        padding: 10px;
        margin: 10px;
        width: 100%;
       
      }
      .inner-blog img {
       width: 100%;
     }
     .inner-blog h3{
         text-transform:uppercase;
         font-size:24px;
         color:red;
     }
     .inner-blog p{
         color: #2c0ed5;
     }
     .img-blog {
        height: 240px;
        overflow: hidden;
   }
  </style>
</head>
<body>
 
<div class="container">
  <div class="row">
      
   
        
        <?php  
         
         $qur = "select * from postdata ";
          $res= mysqli_query($conn,$qur);
          if($res){
              while($row= mysqli_fetch_assoc($res)){
                  $title= $row['title'];
            ?>
             <div class="col-sm-4 blog" >
                 <div class="inner-blog">
        <div class="img-blog">
           <img src="profile/<?php echo $row['file'] ?>">
        </div>
      <h3><?php echo $row['title']; ?></h3>
      
    <?php
           $string = $row['descripton'];
           if (strlen($string) > 150) {
               $stringCut = substr($string, 0,100);
               $endPoint = strrpos($stringCut, ' ');
               $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
               


               
               
           
               $arr = array($title);
               $main=implode("-",$arr);
                
               
                $page = "blog.php/".$main.'/'.$row['id'];
            
            $string .= '...<br><br><a  href='.$page.' class="btn btn-primary">Read More</a>';
           }
           
           echo "<p>$string</p>";
           
     ?>
       
       </div>
      
    </div>
    
    <?php
              }
          }
        ?>
        
        
        
        
   
  </div>
</div>

</body>
</html>
