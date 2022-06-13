<?php
    $error = '';
            $name = '';
            $email = '';
            $dob = '';
            $gender = '';
            $country = '';

    function clean_text($string)
    {
            $string = trim($string);
            $string = stripcslashes($string);
            $string = htmlspecialchars($string);
            return $string;
    }

    if(isset($_POST['submit']))
    {
        if(empty($_POST['name'])){
            $error .= '<p><label class="text-danger">Please Enter Your Name</label></p>';
        }
        else{
            $name = clean_text($_POST['name']);
        
        }
        if(empty($_POST['email']))
        {
            $error .= '<p><label class="text-danger">Please Enter Your Name</label></p>';
        }
        else{

            $email = clean_text($_POST['email']);
        
        }
        if(empty($_POST['dob']))
        {
            $error .= '<p><label class="text-danger">Please Enter Your DOB</label></p>';
        }
        else{
            $subject = clean_text($_POST['dob']);
        }
            //mobile
        if(empty($_POST['gender']))
        {
            $error .= '<p><label class="text-danger">Please Enter Your GENDER</label></p>';
        }
        else{
            $mobile = clean_text($_POST['gender']);
        
        }
            //message
        if(empty($_POST['country']))
        {
            $error .= '<p><label class="text-danger">Please Enter Your COUNTRY</label></p>';
        }
        else{
            $message = clean_text($_POST['country']);

        }
        if($error == '')
        
        {
            $file_open = fopen("user_data.csv", "a");
            $no_rows = count(file("user_data.csv"));

            if($no_row > 1){
                $no_rows = ($no_rows - 1) + 1;
            }

            $form_data = array(
                
                "sr_no" => $no_row,
                "name" => $name,
                "email" => $email,
                "dob" => $dob,
                "gender" => $gender,
                "country" => $country);
            fputcsv($file_open,$form_data);
            $error = '<label  class="text-success">YOU ARE WRITING NONSENSE</label>';

            $name = '';
            $email = '';
            $dob = '';
            $gender = '';
            $country = '';
        
        }
    }
    

   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
    <title>php-csv/php file</title>
</head>
<body>
    <div class="container"> 
        <h2 align = "center">USER SIGNUP</h2>
        <div class="col-md-6" style="margin: 0 auto; float:none">
        <form action="" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Enter Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Enter Email</label>
    <input type="email" class="form-control" id="exampleInputPassword1" name="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Enter Dob</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="mobile">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Enter Gender</label>
    <input type="radio" class="form-control" id="exampleInputPassword1" name="subject">male
    <input type="radio" class="form-control" id="exampleInputPassword1" name="subject">female
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Enter Country</label>
    <textarea name="message" class="form-control"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        </div>
    </div>
</body>
</html>