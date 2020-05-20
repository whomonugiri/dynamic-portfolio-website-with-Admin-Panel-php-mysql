<?php
include('../../include/db.php');
if(isset($_POST['addtoresume'])){        
$category=mysqli_real_escape_string($db,$_POST['category']);
$title=mysqli_real_escape_string($db,$_POST['title']);
$ogname=mysqli_real_escape_string($db,$_POST['ogname']);
$year=mysqli_real_escape_string($db,$_POST['year']);
$workdesc=mysqli_real_escape_string($db,$_POST['workdesc']);   
$query="INSERT INTO resume(category,title,ogname,year,workdesc) ";
$query.="VALUES ('$category','$title','$ogname','$year','$workdesc')";    
$queryrun=mysqli_query($db,$query);
if($queryrun){
    header("location:../?editresume=true&msg=updated");
}    

}    
    

if(isset($_POST['rupdate'])){
    $id=$_POST['id'];
    $category=mysqli_real_escape_string($db,$_POST['category']);
$title=mysqli_real_escape_string($db,$_POST['title']);
$ogname=mysqli_real_escape_string($db,$_POST['ogname']);
$year=mysqli_real_escape_string($db,$_POST['year']);
$workdesc=mysqli_real_escape_string($db,$_POST['workdesc']); 
 $query="UPDATE resume SET category='$category',title='$title',ogname='$ogname',year='$year',workdesc='$workdesc' WHERE id='$id'";
    $run=mysqli_query($db,$query);
    if($run){
        header("location:../?editresume=true#rlist");
    }
}

if(isset($_GET['del'])){
    $id=$_GET['del'];
    $query="DELETE FROM resume WHERE id='$id'";
    $run=mysqli_query($db,$query);
    if($run){
        header("location:../?editresume=true#rlist");
    }
}