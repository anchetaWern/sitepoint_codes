<?php
require 'vendor/autoload.php';

//uploading files to server
task('up', function($args){
 
  $host = $args['host'];
  $user = $args['user'];
  $pass = $args['pass'];
  $port = 21; //default ftp port
  $timeout = 60; //timeout for uploading individual files
   
  //connect to server
  $ftp = ftp_connect($host, $port, $timeout);
  ftp_login($ftp, $user, $pass); //login to server
 
  $root_local_dir = $args['local_path'];
  $root_ftp_dir = $args['remote_path'];
  $dir_to_upload = $args['local_path'];
 
  $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir_to_upload), RecursiveIteratorIterator::SELF_FIRST);
 
  //iterate through all the files and folders in the specified directory
  foreach($iterator as $path){
    //if the current path refers to a file
    if($path->isFile()){ 
 
      $current_file = $path->__toString();           
      $dest_file = str_replace($root_local_dir, $root_ftp_dir, $current_file);      
      $result = ftp_nb_put($ftp, $dest_file, $current_file, FTP_BINARY);
       
      //while the end of the file is not yet reached keep uploading
      while($result == FTP_MOREDATA){
        $result = ftp_nb_continue($ftp);
      }
       
      //once the whole file has finished uploading
      if($result == FTP_FINISHED){
        echo "uploaded: " . $current_file . "\n";
      }
             
     }else{
       //if the current path refers to a directory
       $current_dir = $path->__toString();
    
       //if the name of the directory doesn't begin with dot
       if(substr($current_dir, -1) != '.'){ 
         //remove the path to the directory from the current path
         $current_dir = str_replace($root_local_dir, '', $current_dir);
         //remove the beginning slash from current path
         $current_dir = substr($current_dir, 1);
           
         //create the directory in the server
         ftp_mksubdirs($ftp, $root_ftp_dir, $current_dir);
         echo "created dir: " . $current_dir . "\n";
       }
     } 
   }
});


//seeding the database
task('seed_users', function($args){
         
  $rows = 1000;
  if(!empty($args['rows']){
    $rows = $args['rows'];
  }
 
  $host = 'localhost';
  $user = 'user';
  $pass = 'secret';
  $database = 'test';
 
  $db = new Mysqli($host, $user, $pass, $database); 
  $faker = Faker\Factory::create();
 
  for($x = 0; $x <= $rows; $x++){
 
    $email = $faker->email;
    $password = password_hash('secret', PASSWORD_DEFAULT);
    $first_name = $faker->firstName;
    $last_name = $faker->lastName;
    $address = $faker->address;
 
    $db->query("INSERT INTO users SET email = '$email', password = '$password'");
 
    $db->query("INSERT INTO user_info SET first_name = '$first_name', last_name = '$last_name', address = '$address'");
  }
 
  echo "Database was seeded!\n";
});


//syncing data
task('sync_db', function($args){
  $db = $args['db']; //name of the local database
  $user = $args['db_user']; //database user
  $pass = $args['db_pass']; //the user's password
  $host = $args['host']; //domain name of the server you want to connect to
  $ssh_user = $args['ssh_user']; //the user used for logging in
  $remote_db = $args['remote_db']; //the name of the database in the server
  exec("mysqldump $db -u $user -p$pass | ssh $ssh_user@$host mysql $remote_db");
});
