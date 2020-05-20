<?php
include('../../include/db.php');
include('checkupload.php');
$query="SELECT * FROM basic_setup";

$queryrun=mysqli_query($db,$query);
$data=mysqli_fetch_array($queryrun);

$target_dir = "../../assets/img/";

if(isset($_POST['seo'])){    
$siteicon=$_FILES['siteicon']['name'];        
if($siteicon==""){
    $siteicon=$data['icon'];
}else{
    $pdone = Upload('siteicon',$target_dir);
}
    
    
$title=mysqli_real_escape_string($db,$_POST['title']);
$keyword=mysqli_real_escape_string($db,$_POST['keywords']);
$desc=mysqli_real_escape_string($db,$_POST['description']);
  
 
if($pdone=="error"){
    header("location:../?editseo=true&msg=error");
}else{
$query="UPDATE basic_setup SET ";
$query.="icon='$siteicon',";
$query.="title='$title',";
$query.="keyword='$keyword',";
$query.="description='$desc' WHERE 1";
echo $query;    
$queryrun=mysqli_query($db,$query);
if($queryrun){
    header("location:../?editseo=true&msg=updated");
}    

}    
    
}

