<?php
session_start();
if(!isset($_SESSION['submit'])){
//	header("location:index.php");
}
$con=mysqli_connect('localhost','root');
if($con)
{
	echo "success";
}
mysqli_select_db($con,'quizdb');



?>

<!DOCTYPE html>
<html lang="en">
<head>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<title>QuizWorld</title>
</head>
<body>
	<div class="container">
		<br><h1 class="text-center text-primary">DEVELOPER QUIZ</h1><br>
		<h2 style="color: green; text-align: center;">Welcome Shubhi</h2>
		<div class="card">
			<h4 class="text-center card-header">Welcome to quiz world!,you have to select only one answer out of these:)</h4>
		</div>
		<form action="check.php" method="post">
<?php
for($i=1; $i<6;$i++){
$q="select * from questions where qid=$i";
$query=mysqli_query($con,$q);
while ($rows=mysqli_fetch_array($query)) {


?>
<div class="card">
<h4 class="card-header"><?php echo $rows['question']; ?></h4>
<?php
$q="select * from answers where ans_id=$i";
$query=mysqli_query($con,$q);
while ($rows=mysqli_fetch_array($query)) {

?>
<div class="card-body">
	<input type="radio" name="quizcheck[<?php echo $rows['ans_id']; ?>]" value="<?php echo $rows['aid']; ?>">
	<?php



	echo $rows['answer']; 

	?>
</div>

	

<?php
}
}
}
?>
<input type="submit" name="submit" value="submit" class="btn btn-success m-auto d-block">
</form>
</div>


			<br><a href="index.php" class="btn btn-primary m-auto d-block">Logout</a><br>
	</div>


</body>
</html>