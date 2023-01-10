<?php include("dataconnection.php");?>
<?php
if(isset($_POST['saveprobtn']))
{
    $User_ID = $_POST['user_id'];
    $User_Fname = $_POST['fname'];
    $User_Lname = $_POST['lname'];
    $User_Email = $_POST['email'];
    $User_Password = $_POST['pass'];
    $User_Gender = $_POST['gender'];
    $User_Status = '1';

    $Editprofile = "UPDATE user SET User_Email='$User_Email',User_Password = '$User_Password',User_First_Name='$User_Fname',User_Last_Name='$User_Lname',User_Gender='$User_Gender',User_Status='$User_Status' WHERE ID = $User_ID";
    $Editprofile_run = mysqli_query($userconnection,$Editprofile);
    if($Editprofile)
    {
        $_SESSION['msg'] = "Profile Edited Successfully";
        header("Location: profile.php?id=$User_ID");
    }
    else
    {
        $_SESSION['msg'] = "Profile Edited Unsuccessfully";
        header("Location: editprofile.php?id=$User_ID");
    }
}
?>