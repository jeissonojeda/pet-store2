<?php
include('../config/database.php');
session_start();
if(isset($_session['user_id'])){
    header('refresh:0; URL:http://localhost/pet-store/src/');
}
$email =$_POST['e_mail'];
$passw =$_POST['p_assw'];

//$hashed_password =password_hash($passw,PASSWORD_DEFAULT);
$hashed_password =$passw;
$sql ="
select 
u.id,
count(u.id) as total
from
users u
where 
email = '$email' and 
password ='$hashed_password'
group by
u.id
";
$res =pg_query($conn, $sql);
if($res){
    $row=pg_fetch_assoc($res);
    if($row['total']>0){
        $sql_data="
select 
u.id, u.firstname
count(u.id) as total
from
users u
where 
email = '$email' and 
password ='$hashed_password'
limit 1
";
 $res_data =pg_query($conn, $sql_data);
     $row_data =pg_fetch_assoc($res_data);
     $_session['user_id'] = $row_data['id'];
     $_session['user_name'] = $row_data['firstname'];
        header('refresh:0; URL:http://localhost/pet-store/src/');
    }else{
        echo"<script>alert('lgin  failed !!!');</script>";
        header('refresh:0; URL:http://localhost/pet-store/src/login.html');  
    }
}





?>