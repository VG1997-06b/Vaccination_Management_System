<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
{
   $vaccine=$_POST['vaccine'];
  $sql="insert into tbleventtype(EventType)values(:vaccine)";
  $query=$dbh->prepare($sql);
   $query->bindParam(':vaccine',$vaccine,PDO::PARAM_STR);
  $query->execute();
  $LastInsertId=$dbh->lastInsertId();
  if ($LastInsertId>0) {
    echo '<script>alert(" New Vaccine has been added.")</script>';
  }
  else
  {
   echo '<script>alert("Something Went Wrong. Please try again")</script>';
 }
}
?>
<div class="card-body">
  <h4 class="card-title">Add Vaccine Type</h4>
  <form class="forms-sample" method="post">
    <div class="form-group">
      <label for="exampleInputName1">Vaccine Type</label>
      <input type="text" name="vaccine" class="form-control" id="vaccine" placeholder="Vaccine Type" required>
    </div>
    <button type="submit" name="submit" class="btn btn-primary btn-fw mr-2">Submit</button>
  </form>
</div>