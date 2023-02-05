<?php
session_start();
if(!isset($_SESSION["login"]))

	header("location:../login/login.php");
include "db_connection.php" ;

?>
<form name="frmQA" method="POST" />
<input type="hidden" name="row_order" id="row_order" />
<ul id="sortable-row">
	<?php
	$query = "SELECT * FROM category_details ORDER BY order_sort ASC";
$result = mysqli_query($connect, $query);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			?>
			<li id=<?php echo $row["id"]; ?>><?php echo $row["name"]; ?></li>
			<?php
		} }
		// $result->free();
	// $mysqli->close();
		?>  
	</ul>
	<input type="submit" class="btnSave" name="submit" value="Save Order"
	onClick="saveOrder();" />
</form>

<?php
if (isset($_POST["submit"])) {
    $id_ary = explode(",", $_POST["row_order"]);
    for ($i = 0; $i < count($id_ary); $i ++) {
    	$sql = "UPDATE category_details SET order_sort = '$i'  WHERE id='$id_ary[$i]' ";
     mysqli_query($connect,$sql);
        // $mysqli->query("UPDATE php_interview_questions SET row_order='" . $i . "' WHERE id=" . $id_ary[$i]);
    }
}
?>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



<script>
 $(function() {
            $("#sortable-row").sortable();
            $("#sortable-row").disableSelection();
        });

function saveOrder() {
	var selectedLanguage = new Array();
	$('ul#sortable-row li').each(function() {
		selectedLanguage.push($(this).attr("id"));
	});
	document.getElementById("row_order").value = selectedLanguage;
}
</script>