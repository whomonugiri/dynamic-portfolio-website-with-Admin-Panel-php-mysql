<?php
include('../../include/db.php');
if(isset($_POST['supdate'])){
    $id=$_POST['id'];
    $skill=mysqli_real_escape_string($db,$_POST['skill']);
    $score=mysqli_real_escape_string($db,$_POST['score']);
    $query="UPDATE skills SET skill='$skill',score='$score' WHERE id='$id'";
    $run=mysqli_query($db,$query);
    if($run){
        header("location:../?editabout=true#skillsection");
    }
}

if(isset($_POST['addskill'])){
    $id=$_POST['id'];
    $skill=mysqli_real_escape_string($db,$_POST['skill']);
    $score=mysqli_real_escape_string($db,$_POST['score']);
    $query="INSERT INTO skills (skill,score) VALUES ('$skill','$score')";
    $run=mysqli_query($db,$query);
    if($run){
        header("location:../?editabout=true#skillsection");
    }
}

if(isset($_GET['del'])){
    $id=$_GET['del'];
    $query="DELETE FROM skills WHERE id='$id'";
    $run=mysqli_query($db,$query);
    if($run){
        header("location:../?editabout=true#skillsection");
    }
}