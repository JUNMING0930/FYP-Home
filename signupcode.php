<?php include("dataconnection.php");?>
<?php
if(isset($_POST['signupbtn']))
{
    $User_Fname = $_POST['fname'];
    $User_Lname = $_POST['lname'];
    $User_Email = $_POST['email'];
    $User_Password = $_POST['password'];
    $User_Gender = $_POST['User_Gender'];
    $User_Status = '1';

    $Signup = "INSERT INTO user (User_Email,User_Password,User_First_Name,User_Last_Name,User_Gender,User_Status) VALUES ('$User_Email','$User_Password','$User_Fname','$User_Lname','$User_Gender','$User_Status')";
    $Signup_run = mysqli_query($userconnection,$Signup);

    if($Signup_run)
    {
        header("Location: login.php");
    }
    else
    {
    }
}
?>