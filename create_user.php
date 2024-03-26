<?php
 
 function validateNames($name) {
    // Check if the name contains only letters
    return preg_match('/^[a-zA-Z]+$/', $name);
}

function validateContactNumber($number) {
    // Check if the number contains only digits and is exactly 10 digits long
    return ctype_digit($number) && strlen($number) === 10;
}

function validateEmail($email) {
    // Check if the email is in a valid format and not empty
    return filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email);
}

function validateBirthdate($birthdate) {
    // Check if the birthdate is a past date
    $today = date("Y-m-d");
    return strtotime($birthdate) < strtotime($today);
}

function validatePassword($password) {
    // Check if the password contains at least one number, one lowercase letter, one uppercase letter, one special character, and has a length between 8 to 12 characters
    return preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()-_=+{};:,<.>]).{8,12}$/', $password);
}
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$code=$_POST["country_code"];
$contact_number = $_POST["contact_num"];
$address= $_POST["address"];
$gender = $_POST["gender"];
$email = $_POST["email"];
$birthdate = $_POST["birthdate"];
$pass1 = $_POST["pass1"];
$Confirm_password = $_POST["confirm_password"];
 
echo "welcome  $first_name .</br>";  
if (!validateNames($first_name)) {
    echo "First name should contain characters only (no spaces, numbers, or special characters)<br>";
} else {
    
}

// Validate last name
if (!validateNames($last_name)) {
    echo "Last name should contain characters only (no spaces, numbers, or special characters)<br>";
} else {
   
}

// Validate contact number
if (empty($contact_number) || !validateContactNumber($contact_number)) {
    echo "Contact number should contain exactly 10 digits and numbers only<br>";
} else {
    
}

// Validate email
if (empty($email) || !validateEmail($email)) {
    echo "Email should be in valid format and not empty<br>";
} else {
    
}

// Validate birthdate
if (empty($birthdate) || !validateBirthdate($birthdate)) {
    echo "Birthdate should be a past date<br>";
} else {
    
}

// Validate password
if (empty($pass1) || !validatePassword($pass1)) {
    echo "Password should contain min 1 number, min 1 lowercase and uppercase letter each, min 1 special character, and length should be between 8 to 12 characters<br>";
} else {
   
}
// echo $_POST["last_name"];
 // Extract day and month from the input date
 $dayMonth = date("d-m", strtotime($birthdate));
    
 // Get the present year
 $presentYear = date("Y");
 
 // Concatenate the present year with the day and month
 $resultDate = $dayMonth . "-" . $presentYear;

 
 // Get today's date
 $currentDate = date("Y-m-d");

 // Convert result date and current date to DateTime objects for comparison
 $resultDateTime = new DateTime($resultDate);
 $currentDateTime = new DateTime($currentDate);

 // Compare result date with today's date
 if ($resultDateTime < $currentDateTime) {
     // Adjust result date to the next year
     $resultDateTime->modify('+1 year');
     
     // Calculate the difference in months and days
     $interval = $resultDateTime->diff($currentDateTime);
     $monthsDiff = $interval->format('%m');
     $daysDiff = $interval->format('%d');
     
     echo "your birthday is $monthsDiff months $daysDiff days away";
 } elseif ($resultDateTime > $currentDateTime) {
     // Calculate the difference in months and days
     $interval = $resultDateTime->diff($currentDateTime);
     $monthsDiff = $interval->format('%m');
     $daysDiff = $interval->format('%d');
     
     echo "your birthday is $monthsDiff months$daysDiff days away.</br>";
 } else {
     echo "Wish you Happy birthday.</br>";
 }


 
$servername = "localhost";  //giving db details to php file to get connected to db
$username = "root";
$password = "";
$db = "php_sessions";
 
$conn = new mysqli($servername, $username, $password, $db);
 
if($conn->connect_error){
    echo "Not connected to the database";     //checking whether db connected or not
 
}else{
    //echo "Connected to the database";
}
 
//inserting the data into the table
 
$sqlQuery = "INSERT INTO user (first_name, last_name, country_code,contact_number,  address, gender, email, birthdate, password)
VALUES ('$first_name', '$last_name', '$code','$contact_number', '$address', '$gender', '$email', '$birthdate', '$pass1')";
 
 
 
echo $sqlQuery."</br>";  //printing the sql query
 
if($conn->query($sqlQuery) == true){
    echo "data inserted successfully";   //getting print message whether the data inserted or not
}else{
    echo "error encountered while inserting data";
}
?>