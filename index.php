<?php

$errors = "";

	// connect to database
	$db = mysqli_connect("localhost", "root", "", "todo");

	// insert a quote if submit button is clicked
	if (isset($_POST['submit'])) {

		if (empty($_POST['task'])) {
			$errors = "You must fill in the task";
		}else{
			$task = $_POST['task'];
			$query = "INSERT INTO tasks (task) VALUES ('$task')";
			mysqli_query($db, $query);
			header('location: index.php');
		}
	}	

?>

<html>
<head>
  <meta charset="UTF-8">
  <title>To-Do List</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <script>
	document.addEventListener('DOMContentLoaded',()=>{
	  document.querySelector('#new-task').onsubmit =() =>{
		const inbox = document.querySelector('.inbox');
		const favourite = document.querySelector('.favourite');
		const li = document.createElement('li'); 
		const starBtn = document.createElement('button');
		const delBtn = document.createElement('button');
		li.innerHTML = document.querySelector('#task').value;
		starBtn.innerHTML = '<i class="fa fa-star"></i>';
		delBtn.innerHTML = '<i class="fa fa-trash"></i>';

	   document.querySelector('#tasks').append(li);
	   li.append(starBtn);
	   li.append(delBtn);
	   starBtn.addEventListener('click', function(){
			  const parent = this.parentNode;
			  parent.remove();
			  favourite.append(parent);
			  starBtn.style.display = 'none';
		  });

		  delBtn.addEventListener('click', function(){
			  const parent = this.parentNode;
			  parent.remove();
		  });
	   document.querySelector('#task').value = '';

	   return false;
	  };
	});
	
	
  </script> 



</head>
<body>
	<div class="jumbotron" style="background-image:url(todo.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="display-3 font-weight-bold">
						Add Your Daily Routine Here !
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="card text-white mb-3 col-12 mt-4" style="background-color:#f0932b ;" >
				<div class="card-header display-4 font-weight-bold">To Do List</div>
				<div class="card-body">
					<form action="index.php" method="POST"  id="new-task">
					<?php if (isset($errors)) { ?>
			            <p><?php echo $errors; ?></p>
		            <?php } ?>
						<input id="task" name="task" class="form-control mb-2"  autocomplete="off" autofocus placeholder="Add New Task" type="text">
						<button type="submit" name="submit" class="btn btn-info font-weight-bold">Submit</button>
					</form>
				  
					 
					  <ul class="inbox" id="tasks">
						  <h1>Inbox</h1>
					  </ul>
					  <ul class="favourite">
						  <h1>Favourite</h1>
					  </ul>
	
				</div>
			</div>
		
		</div>
	
	</div>





	 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	
</body>
</html>