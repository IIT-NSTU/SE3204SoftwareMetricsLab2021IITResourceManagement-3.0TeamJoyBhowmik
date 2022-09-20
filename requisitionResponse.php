<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Office Assistant's Dashboard</title>

    <script src="https://kit.fontawesome.com/9778dd3679.js" crossorigin="anonymous"></script>

    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<link rel="stylesheet" href="ManageFiles.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

</head>
<body>

 <!-- Navigation Bar Starts -->
 <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="OfficeAssistantPage.html"><img src="./img/logo.png" width="50px" alt="logo"><span class="navbar-brand mr-2">IIT RESOURCE</span></a>
      <h1>Office Assistant's Dashboard</h1> 
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="OfficeAssistantPage.html" style="margin-right: 15px;"><i class="fa-solid fa-house-user"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logInPage.html"><i class="fa-solid fa-right-from-bracket"></i> Log-Out</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>

<!-- Navigation Bar Ends -->
  
  <!-- <div class="header">
    <h1>Office Assistant's Dashboard</h1> 
    <a href="OfficeAssistantPage.html"><p class="home"><i class="fa-solid fa-house-user"></i> Home</p> </a> 
    <a href="logInPage.html"><p class="log-out"><i class="fa-solid fa-right-from-bracket"></i> log out</p> </a>
  </div> -->
    

    <form action="updateRequisitionStatus.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

          <div class="mb-3">
                <label for="YourID" class="col-form-label">Requisition ID:</label>
                <input type="text" class="form-control" id="FileName" name="RequisitionID">
              </div>

            
              <div class="mb-3">
                <label for="YourID" class="col-form-label">Enter Updated Requisition :</label>
                <input type="text" class="form-control" id="FileLocation" name="Status">
              </div>

            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Update" name="Search" id="Search">
          </div>
        </div>
      </div>
    </div>
   </form>
    
    
  <?php
     include('DatabaseConnection.php');
    
  
    
    $sql= "select * from requisition where RequisitionStatus != 'Rejected'";
    $fetchRrequisition= mysqli_query($conn,$sql);
    
    
    
    if(mysqli_num_rows($fetchRrequisition) > 0)
    {
  ?>
  <table>
    <tr>
      <th>Id</th>
      <th>Teacher Name</th>
      <th>Item Name</th>
      <th>Description</th>
      <th>RequisitionStatus</th>
      <th>Actions</th>
    </tr>
  <?php
      while($row= mysqli_fetch_assoc($fetchRrequisition))
      {      
        $id=$row['id'];
        $TeacherName=$row['TeacherName'];
        $ItemName=$row['ItemName'];
        $Description=$row['Description'];
        $requisitionStatus=$row['RequisitionStatus'];
        $Date=$row['date_of_commencement'];
              
  ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $TeacherName; ?> </td>
                    <td><?php echo $ItemName; ?></td>
                    <td><?php echo $Description; ?></td>
                    <td><?php echo $requisitionStatus; ?></td>
                    <td>
                      
                      <a href="acceptRequisition.php?acceptedId=<?php echo $id; ?>" class="delete-button">Accept</a><br><br>
                      <a href="#" class="update-button" data-bs-toggle="modal" data-bs-target="#exampleModal">UpdateStatus</a><br><br>
                      <a href="rejectRequisition.php?rejectId=<?php echo $id; ?>" class="update-button">Reject</a>
                    </td>
                </tr>
      
  <?php   
      }
    }
    else
    {
      echo '<script>alert("No requisition info to show.!");
      </script>';
    }
   
  ?>
    
      
    </table>

    
</body>

<footer class="footer">
  <p>© 2022 Institute of Information Technology, NSTU | All Rights Reserved.</p>
</footer>

</html>