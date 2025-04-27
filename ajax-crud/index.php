<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
    
<div class="container">
    <div class="alert alert-info text-center">
        <h2>Crud operation php with ajax</h2>
    </div>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float:right">
    Add New
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="" method="POST" id="frm">
            <input type="hidden" name="emp_id" id="emp_id">
            <div class="form-group">
                <label for="form-name">  Name:</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="form-name"> Email:</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email">
            </div>

            <div class="form-group">
                <label for="form-name">  Password:</label>
                <input type="text" class="form-control" name="password" id="password" placeholder="Enter Pasword">
            </div>

            <div class="form-group">
                <label for="form-name">  Company Name:</label>
                <input type="text" class="form-control" name="com_name" id="com_name" placeholder="Enter Name">
            </div>

            <div class="form-group mt-1">
            <button type="button" id="btnAddEmployee"  class="btn btn-primary"id="vid" value="">Add Employee</button>
            <button type="button" id="btnEditEmployee"  class="btn btn-primary" value="">Update Employee</button>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>

    <!-- show data  -->
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Company Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="crud.js"></script>

</body>
</html>