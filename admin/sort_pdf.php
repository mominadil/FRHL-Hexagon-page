<?php
	include 'db_connection.php';

    if (isset($_POST['update'])) {
        foreach($_POST['positions'] as $position) {
           $index = $position[0];
           $newPosition = $position[1];

           $connect->query("UPDATE category_details SET order_sort = '$newPosition' WHERE id='$index'");
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
    <title>Year Sorting</title>
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
                            $sql = $connect->query("SELECT id, name, order_sort, type FROM m_category  ORDER BY order_sort ASC");
                            while($data = $sql->fetch_array()) {
                                echo '<option data-type="'.$data['type'].'" data-index="'.$data['id'].'" data-position="'.$data['order_sort'].'">'.$data['name'].'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="id_100">
                    <h3>Notice</h3>
                    <select class="col-md-offset-6 col-md mb-2" name="" id="target_notice">
                        <?php
                            $sql = $connect->query("SELECT id, notice_name, order_sort, m_category_id FROM notice ORDER BY order_sort ASC");
                            while($data = $sql->fetch_array()) {
                                echo '<option  data-masterID="'.$data['m_category_id'].'" data-index="'.$data['id'].'" data-position="'.$data['order_sort'].'">'.$data['notice_name'].'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="id_100">
                    <h3>Year details</h3>
                    <select class="col-md-offset-6 col-md mb-2" name="" id="target_year">
                        <?php
                            $sql = $connect->query("SELECT id, year_details, order_sort, m_category_id, notice_id FROM year_details ORDER BY order_sort ASC");
                            while($data = $sql->fetch_array()) {
                                echo '<option  data-noticeID="'.$data['notice_id'].'" data-masterID="'.$data['m_category_id'].'" data-index="'.$data['id'].'" data-position="'.$data['order_sort'].'">'.$data['year_details'].'</option>';
                            }
                        ?>
                    </select>
                </div>
				<table class="table table-stripped table-hover table-bordered">
					<thead>
						<tr>
							<td><h3>PDF details</h3></td>
						</tr>
					</thead>
					<tbody id="pdf_table">
						<?php
							$sql = $connect->query("SELECT id, year_details_id, name, order_sort, m_category_id, notice_id FROM category_details ORDER BY order_sort ASC");
							while($data = $sql->fetch_array()) {
							    echo '
							        <tr data-noticeID="'.$data['notice_id'].'" data-masterID="'.$data['m_category_id'].'" data-index="'.$data['id'].'" data-position="'.$data['order_sort'].'" data-yearID="'.$data['year_details_id'].'">
							            <td>'.$data['name'].'</td>
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
            var service_id_type = $(this).find('option:selected').data('type');

            var service_id = service_id.toString();

            if (service_id_type == '1') {
                $("#target_notice").prop('disabled',false);


                $("#target_notice option").each(function(){
                    var thisOptionValue=$(this).attr('data-masterID');
                    if (service_id == thisOptionValue) {
                        $(this).show();
                        $(this).prop('disabled',false);
                    }
                    else {
                        $(this).hide();
                        
                    }
                });
            } else if (service_id_type == '0') {
                $("#target_notice").prop('disabled',true);
                $("#target_year option").each(function(){
                    var year_masterid = $(this).attr('data-masterID');

                    if (service_id == year_masterid) {
                        $("#target_year option").prop('disabled',false);

                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }
            
        });


        $("#target_notice").change(function(){
            $(this).prop('selected', true);
            var notice_id = $(this).find('option:selected').attr('data-index');
            $("#target_year option").each(function(){
                var noticeid = $(this).attr('data-noticeID');
                if (notice_id == noticeid) {
                    $("#target_year option").prop('disabled',false);

                    $(this).show();
                } else {
                    $(this).hide();
                }
            });

        });



        $("#target_year").change(function(){
            $(this).prop('selected', true);
            var year_id = $(this).find('option:selected').attr('data-index');

            $("#pdf_table tr").each(function(){
                var pdf_yearid = $(this).attr('data-yearID');
                
                if (pdf_yearid == year_id) {
                    $(this).show();
                } else {
                    $(this).hide();

                }
            });

        });


        $(document).ready(function () {

            var m_category_id = $("#target option:first").data('index');
            var m_category_type = $("#target option:first").data('type');

            var m_category_id = m_category_id.toString();
            var m_category_type = m_category_type.toString();

            $("#target_notice option").each(function(){
                var notice_master_id = $(this).attr('data-masterID');
                if (notice_master_id == m_category_id) {
                    $(this).prop('disabled',false); 
                    $(this).prop('selected', true);

                } else if (m_category_type == 0) {
                    $("#target_notice").prop('disabled',true); 

                } else if (notice_master_id !== m_category_id) {
                    $(this).prop('disabled',true); 
                }
            });
            var notice_id = $('#target_notice option:selected').data('index');



            $("#target_year option").each(function(){
                var year_master_id = $(this).attr('data-masterID');
                var year_notice_id = $(this).attr('data-noticeID');

                // console.log(year_notice_id);


                if(year_notice_id == notice_id){

                    $(this).prop('disabled',false); 
                    $(this).prop('selected', true);

                    // console.log(year_notice_id);

                } else if (year_notice_id == '0') {
                    if (year_master_id == m_category_id) {
                        $(this).prop('disabled',false); 
                        $(this).prop('selected', true);

                    } else if (year_master_id !== m_category_id) {
                        $(this).prop('disabled',true); 
                    }
                }
                
            });
            var year_id = $('#target_year option:selected').data('index');

            // console.log(year_id);



            $('#pdf_table tr').each(function() {
                var thisOptionValue = $(this).attr('data-yearID');

                if (thisOptionValue == year_id) {
                    $(this).show();
                } else {
                    $(this).hide();

                }

            });








           $('table tbody').sortable({
            cursor: "move",

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
               url: 'sort_pdf.php',
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