<?php
include('../../include/db.php');
if(isset($_POST['save'])){        
$heading=mysqli_real_escape_string($db,$_POST['ptitle']);
$subheading=mysqli_real_escape_string($db,$_POST['psubtitle']);
$shortdesc=mysqli_real_escape_string($db,$_POST['shortdesc']);
$longdesc=mysqli_real_escape_string($db,$_POST['longdesc']);  
$dob=mysqli_real_escape_string($db,$_POST['dob']);  
$website=mysqli_real_escape_string($db,$_POST['website']);  
$query="UPDATE aboutus_setup SET ";
$query.="shortdesc='$shortdesc',";
$query.="heading='$heading',";
$query.="subheading='$subheading',";
$query.="dob='$dob',";
$query.="website='$website',";
$query.="longdesc='$longdesc' WHERE 1";
echo $query;    
$queryrun=mysqli_query($db,$query);
if($queryrun){
    header("location:../?editabout=true&msg=updated");
}    

}    
    

