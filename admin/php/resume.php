<h2>Edit Resume Section</h2>
         <?php
         if(isset($_GET['msg'])){
             
  if($_GET['msg']=='updated'){
      ?>
      <div class="alert alert-success text-center" role="alert">
  Successfully Added !
</div>
      <?php
  }  
 } 
?> 
         <form action="php/uresume.php" method="post">
                 <div class="form-row">
                   <div class="form-group col-md-4">
                   <label>Select Category</label>
                    <select name="category" class="custom-select">
  <option value="e" selected>Education</option>
  <option value="pe">Pofessional Experience</option>
</select></div>
                     <div class="form-group col-md-8">
    <label for="sn">Course/Position Name</label>
    <input type="text" name="title" class="form-control" id="website" placeholder="Bacheolrs Of Computer Application" required>
  </div>
   <div class="form-group col-md-8">
    <label for="website">Institute or Company Name</label>
    <input type="text" name="ogname" class="form-control" id="website" placeholder="Working at Hedkey India Pvt. Ltd. , New Delhi" required>
  </div>
   <div class="form-group col-md-4">
    <label for="website">Duration or Time Period</label>
    <input type="text" name="year" class="form-control" id="website" placeholder="2018-2019" required>
  </div>
  <div class="form-group col-md-12">
    <label for="exampleFormControlTextarea1">Description (leave blank if you dont want to)</label>
    <textarea class="form-control" name="workdesc" id="exampleFormControlTextarea1" rows="3" placeholder="I am ambitious and driven. I thrive on challenge and constantly set goals for myself, so I have something to strive towards. I'm not comfortable with settling, and I'm always looking for an opportunity to do better and achieve greatness. In my previous role, I was promoted three times in less than two years."></textarea>
  </div>
   <div class="form-group col-md-2 ml-auto">
<!--     <label class="text-white">submi</label>-->
      <input type="submit" name="addtoresume" class="btn btn-primary form-control" value="Add To Resume"> 
   </div>
                
                 </div>
             </form>
         
         <table id="rlist" class="table table-striped table-sm .table-responsive ">
          <thead>
            <tr>
              <th>Id</th>
              <th>Category</th>
              <th>Course/Position</th>
              <th>Duration</th>
              <th>Institution/Company</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
         <?php
$query2="SELECT * FROM resume";
$queryrun2=mysqli_query($db,$query2);
$count=1;         
while($data2=mysqli_fetch_array($queryrun2)){
    $cat = $data2['category']=='e'?$cat="Education":$cat="Experience";
    ?>
     <tr>
         <div class="modal fade" id="modal<?=$data2['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Edit</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="skilleditbox">
       <form action="php/uresume.php" method="post">
                <input type="hidden" name="id" value="<?=$data2['id']?>">
                 <div class="form-row">
                   <div class="form-group col-md-4">
                   <label>Select Category</label>
                    <select name="category" class="custom-select">
                    <?php 
                        if($data2['category']=='e'){ ?>
                           <option value="e" selected>Education</option>
  <option value="pe">Pofessional Experience</option> 
                      <?php  }else{ ?>
                            <option value="e">Education</option>
  <option value="pe" selected>Pofessional Experience</option>
                    <?php    }
                        ?>
 
   
</select></div>
                     <div class="form-group col-md-8">
    <label for="sn">Course/Position Name</label>
    <input type="text" name="title" value="<?=$data2['title']?>" class="form-control" id="website" placeholder="Bacheolrs Of Computer Application" required>
  </div>
   <div class="form-group col-md-8">
    <label for="website">Institute or Company Name</label>
    <input type="text" name="ogname" value="<?=$data2['ogname']?>" class="form-control" id="website" placeholder="Working at Hedkey India Pvt. Ltd. , New Delhi" required>
  </div>
   <div class="form-group col-md-4">
    <label for="website">Duration or Time Period</label>
    <input type="text" name="year" value="<?=$data2['year']?>" class="form-control" id="website" placeholder="2018-2019" required>
  </div>
  <div class="form-group col-md-12">
    <label for="exampleFormControlTextarea1">Description (leave blank if you dont want to)</label>
    <textarea class="form-control" name="workdesc" id="exampleFormControlTextarea1" rows="3" placeholder="I am ambitious and driven. I thrive on challenge and constantly set goals for myself, so I have something to strive towards. I'm not comfortable with settling, and I'm always looking for an opportunity to do better and achieve greatness. In my previous role, I was promoted three times in less than two years."><?=$data2['workdesc']?></textarea>
  </div>
   
                
                 </div>
             
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="rupdate" value="Update">
    
      </div>
          </form>
    </div>
  </div>
</div>   
          <td>#<?=$count?></td>
              <td><?=$cat?></td>
         <td><?=$data2['title']?></td>
         <td><?=$data2['year']?></td>
         <td><?=$data2['ogname']?></td>
         
         <td>
         <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal<?=$data2['id']?>">
  Edit
</button> <a href="php/uresume.php?del=<?=$data2['id']?>"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
  Delete
             </button></a></td>
            </tr>            
         <?php $count++;
} ?>
             </tbody></table>