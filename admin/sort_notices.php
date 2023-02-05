<?php
	include 'db_connection.php';

    if (isset($_POST['update'])) {
        foreach($_POST['positions'] as $position) {
           $index = $position[0];
           $newPosition = $position[1];

           $connect->query("UPDATE notice SET order_sort = '$newPosition' WHERE id='$index'");
        }

        exit('success');
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notice Sorting</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="margin-top: 100px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-6">
                <div class="id_100">
                    <h3>Master category</h3>
                    <select class="col-md-offset-6 col-md mb-2" name="" id="target">
                        <?php
                            $sql = $connect->query("SELECT id, name, order_sort FROM m_category WHERE type = '1' ORDER BY order_sort");
                            while($data = $sql->fetch_array()) {
                                echo '<option data-index="'.$data['id'].'" data-position="'.$data['order_sort'].'">'.$data['name'].'</option>';
                            }
                        ?>
                    </select>
                </div>
				<table class="table table-stripped table-hover table-bordered">
					<thead>
						<tr>
							<td><h3>Notices Name</h3></td>
						</tr>
					</thead>
					<tbody id="notice_table">
						<?php
							$sql = $connect->query("SELECT id, notice_name, order_sort, m_category_id  FROM notice ORDER BY order_sort");
							while($data = $sql->fetch_array()) {
							    echo '
							        <tr data-masterID="'.$data['m_category_id'].'" data-index="'.$data['id'].'" data-position="'.$data['order_sort'].'">
							            <td>'.$data['notice_name'].'</td>
							        </tr>
							    ';
                            }
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

    <script
            src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script
            src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
            crossorigin="anonymous"></script>

    <script type="text/javascript">


        $("#target").change(function(){
            var service_id = $(this).find('option:selected').data("index");
            var service_id = service_id.toString();
            $("#notice_table tr").each(function(){
                var thisOptionValue=$(this).attr('data-masterID');
                if (service_id == thisOptionValue) {
                    $(this).show();
                }
                else {
                    $(this).hide();
                }
            });
        });

        $(document).ready(function () {

            var m_category_id = $("#target option:first").data('index');
            var m_category_id = m_category_id.toString();
            $("#notice_table tr").each(function(){
                var thisOptionValue = $(this).attr('data-masterID');
                if (m_category_id == thisOptionValue) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });






           $('table tbody').sortable({
               update: function (event, ui) {
                   $(this).children().each(function (index) {
                        if ($(this).attr('data-position') != (index+1)) {
                            $(this).attr('data-position', (index+1)).addClass('updated');
                        }
                   });

                   saveNewPositions();
               }
           });
        });

        function saveNewPositions() {
            var positions = [];
            $('.updated').each(function () {
               positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
               $(this).removeClass('updated');
            });

            $.ajax({
               url: 'sort_notices.php',
               method: 'POST',
               dataType: 'text',
               data: {
                   update: 1,
                   positions: positions
               }, success: function (response) {
                    console.log(response);
               }
            });
        }
    </script>





</body>
</html>