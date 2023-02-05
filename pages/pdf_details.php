<?php 


$id =  $_POST['dataId'];
$dataType =  $_POST['dataType'];

// $response["type"] = $_POST['dataType'];
// $response["id"] = $_POST['dataId'];
// $response["file"] = $_FILES;
// Return response
// echo json_encode($response);

?>
<ul class="hex-grid-demo__list single-year-notice" data-v-78854f14>
  <?php
  include '../admin/db_connection.php';


      // SELECT m_category.*,category_details.* FROM m_category INNER JOIN category_details ON m_category.id = category_details.m_category_id where category_details.id = $id
      // $sql = "SELECT * FROM m_category AS m_C INNER JOIN category_details AS category_details ON m_C.id = category_details.m_category_id WHERE category_details.status = '1' AND category_details.m_category_id = '$id'";





  $sql = "SELECT * FROM  category_details  WHERE status = '1' AND m_category_id = '$dataType' AND year_details_id = '$id' ORDER BY order_sort ASC";




  $m_category_query = mysqli_query($connect, $sql);
      // print_r($sql);
  if (mysqli_num_rows($m_category_query) > 0) {
    while ($row = mysqli_fetch_assoc($m_category_query)) {
          // print_r($row); 
          // print_r($m_category_query);
      ?>


      <li class="hex-grid-demo__item tab" data-v-78854f14>
        <div class="hex-grid-demo__content" data-v-78854f14>
          <div class="content-wrapper-text">
            <p><?php echo $row['name']; ?></p>
            <a class="reports-download-pdf" href="./doc/<?php echo $row['file_name']; ?>" target="_blank">Download</a>
          </div>
        </div>
      </li>
      <?php  
    }
  } 

  ?>
</ul>