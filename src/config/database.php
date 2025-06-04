<?php   
//Supabase db connecttion
$host = 'aws-0-us-east-1.pooler.supabase.com';
$port = '5432';
$dbname = 'postgres';
$username = 'postgres.ihxbvczkmuxyafflyeku';
$password = 'unicesmag@@';

 /*Settings database
$host = 'localhost';
$port = '5432';
$dbname = 'petstore';
$username = 'postgres';
$password = 'unicesmag';
*/
// Connection string
// Connection string
$data_connection = "
    host=$host
    port=$port
    dbname=$dbname
    user=$username
    password=$password
";

$conn = pg_connect($data_connection);

if (!$conn) {
    echo "Connection failed: " . preg_last_error($conn);

}

else{
    echo "succes!!";
}

?>
