<?php
function __autoload($class){
  require_once "classes/$class.php";
}
  //require_once "classes/database.php";
  //require_once "classes/crud.php";


if (isset($_GET['id'])) {

  $uid = $_GET['id'];

  $crud = new Crud();

  $result = $crud->selectOne($uid);

  # code...
}


if (isset($_POST['submit'])) {
  # code...
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $number = $_POST['number'];


$fields = [
  'first_name'=>$first_name,
  'last_name'=>$last_name,
  'number'=>$number,
];

$id = $_POST['id'];

$crud = new Crud();

$crud->update($fields,$id);

}

?>

<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>CRUD</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<body>
	<!--Navbar-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">CRUD</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add.php">Add</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
	<!--CRUD Container-->
	<div class="container mt-4">
  	<div class="row">
    	<div class="col">
      		<div class="jumbotron">
      			<h4>Edit player</h4>
      			
            <form action="" method="post">
              <input type="hidden" name="id" value="<?php echo $result['id'];?>">
                <div class="form-group">
                  <label for="first_name">First Name:</label>
                  <input type="text" class="form-control" name="first_name" placeholder="Enter Name" value="<?php echo $result['first_name'];?>">
                </div>
                <div class="form-group">
                  <label for="last_name">Last Name:</label>
                  <input type="text" class="form-control" name="last_name" placeholder="Enter Surname" value="<?php echo $result['last_name'];?>">
                </div>
                <div class="form-group">
                  <label for="number">Number:</label>
                  <input type="text" class="form-control" name="number" placeholder="Enter Number" value="<?php echo $result['number'];?>">
                </div>
                <input type="submit" name="submit" class="btn btn-primary">
            </form>
    	</div>
  	</div>
  </div>
</div>
</body>
</html>