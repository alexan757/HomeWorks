<?php

error_reporting(E_ALL);

$configFile = 'config.yaml';
$config = yaml_parse_file($configFile);
$databaseServer = $config['data']['database_url'];

$secretFIle = 'secret.yaml';
$secret = yaml_parse_file($secretFIle);
$databaseUsername = base64_decode($secret['data']['username']);
$databasePassword = base64_decode($secret['data']['password']);

$link = mysqli_connect($databaseServer, $databaseUsername, $databasePassword, "hotel_db");

if (mysqli_connect_errno()) {
    printf("No connection to Database", mysqli_connect_error());
    exit();
}
//phpinfo();

$data = '';

if ($result = mysqli_query($link, "SELECT * FROM user_list")) {
    while ($row = $result->fetch_assoc()) {
        //echo $row['id'].' - '.$row['name'].' - '.$row['surname'].'<br>';
        $data.= "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['surname']."</td></tr>";

    }
}
$html = '
    <style>.users { padding: 0; marging: 0 auto; border: 3px solid #000; color: #000; border-collapse: collapse; } .users th { text-align: left; } .users td { padding: 4px; font-size: 15px; }</style>
    <h1 style="text-align: center;">Hotel guests</h1>
    <table class="users" padding="0" cellspacing="0"><tr><th width="100">ID</th><th width="250">NAME</th><th width="350">SURNAME</th></tr>'.$data.'</table>
';

echo($html);
//phpinfo();
?>
