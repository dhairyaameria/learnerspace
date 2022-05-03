
<?php
   define('HOST',"remotemysql.com");
   define('PWD','o6qvPE6QYx');
   define('USERNAME','JR39swmYmf');
   define('DB','JR39swmYmf');
   
   $connection = mysqli_connect(HOST,USERNAME,PWD,DB);
   if($connection){
       return $connection;
   }else{
       echo "Connect problem".mysqli_connect_error();
   }

?>