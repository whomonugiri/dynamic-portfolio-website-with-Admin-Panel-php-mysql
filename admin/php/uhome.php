<?php
include('../../include/db.php');
include('checkupload.php');
$query="SELECT * FROM personal_setup";

$queryrun=mysqli_query($db,$query);
$data=mysqli_fetch_array($queryrun);

$target_dir = "../../assets/img/";

if(isset($_POST['save'])){
    
$profilepic=$_FILES['profile']['name'];    
$homewallpaper=$_FILES['cover']['name'];
    
if($profilepic==""){
    $profilepic=$data['profilepic'];
}else{
    $pdone = Upload('profile',$target_dir);
}
    
if($homewallpaper==""){
    $homewallpaper=$data['homewallpaper'];
}else{
    $cdone = Upload('cover',$target_dir);
}
    
    
$name=mysqli_real_escape_string($db,$_POST['name']);
$email=mysqli_real_escape_string($db,$_POST['email']);
$twitter=mysqli_real_escape_string($db,$_POST['twitter']);
$facebook=mysqli_real_escape_string($db,$_POST['facebook']);
$skype=mysqli_real_escape_string($db,$_POST['skype']);
$linkedin=mysqli_real_escape_string($db,$_POST['linkedin']);
$github=mysqli_real_escape_string($db,$_POST['github']);
$instagram=mysqli_real_escape_string($db,$_POST['instagram']);
$address=mysqli_real_escape_string($db,$_POST['address']);
$mobile=mysqli_real_escape_string($db,$_POST['mobile']);
$profession=mysqli_real_escape_string($db,$_POST['profession']);   

    


    
if($pdone=="error"){
    header("location:../?edithome=true&msg=error");
}else if($cdone=="error"){
    header("location:../?edithome=true&msg=error");
}else{
$query="UPDATE personal_setup SET ";
$query.="profilepic='$profilepic',";
$query.="name='$name',";
$query.="twitter='$twitter',";
$query.="facebook='$facebook',";
$query.="instagram='$instagram',";
$query.="skype='$skype',";
$query.="linkedin='$linkedin',";
$query.="github='$github',";
$query.="homewallpaper='$homewallpaper',";
$query.="professions='$profession',";
$query.="location='$address',";
$query.="mobile='$mobile',";
$query.="emailid='$email' WHERE 1";
echo $query;    
$queryrun=mysqli_query($db,$query);
if($queryrun){
    header("location:../?edithome=true&msg=updated");
}    

}    
    
}
