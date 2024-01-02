<?php 

include 'connection.php';

$req = filter_var(htmlentities($_POST['req']),FILTER_UNSAFE_RAW);


if ($req == "getmessage") {
	$message = filter_var(htmlentities($_POST['message']),FILTER_UNSAFE_RAW);
//$message = "hello";

	$like = '%'.$message.'%';


	$sql = "SELECT * FROM query WHERE query LIKE :message";
	$found = $db_conn->prepare($sql);
	$found->bindParam(':message', $like, PDO::PARAM_STR);
	$found->execute();

	$anwser = $found->fetch(PDO::FETCH_ASSOC);
	if ($found->rowCount() < 1) {
		echo json_encode([
			"notfound" => ' <div class="d-flex align-items-center justify-content-start gap-2">
			<i class="fas fa-robot fs-5 text-primary"></i>
			<p class="incoming">Query not found</p>
			</div>'
		]);
	}else{
		echo json_encode([
			"success" => ' <div class="d-flex align-items-center justify-content-start gap-2">
			<i class="fas fa-robot fs-5 text-primary"></i>
			<p class="incoming">'.$anwser['message'].'</p>
			</div>'
		]);
	}
}


if ($req == "getAutomessage") {
	$message = filter_var(htmlentities($_POST['message']),FILTER_UNSAFE_RAW);


	$sql = "SELECT * FROM query WHERE id = :message";
	$found = $db_conn->prepare($sql);
	$found->bindParam(':message', $message, PDO::PARAM_STR);
	$found->execute();

	$anwser = $found->fetch(PDO::FETCH_ASSOC);
	if ($found->rowCount() < 1) {
		echo ' <div class="d-flex align-items-center justify-content-start gap-2">
		<i class="fas fa-robot fs-5 text-primary"></i>
		<p class="incoming">Query not found</p>
		</div>'
		;
	}else{
		echo ' <div class="d-flex align-items-center justify-content-start gap-2">
		<i class="fas fa-robot fs-5 text-primary"></i>
		<p class="incoming">'.$anwser['message'].'</p>
		</div>';
	}
}

?>