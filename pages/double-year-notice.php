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
  $i=0;

      // SELECT m_category.*,category_details.* FROM m_category INNER JOIN category_details ON m_category.id = category_details.m_category_id where category_details.id = $id
  
  $sql = "SELECT * FROM m_category AS m_C INNER JOIN notice AS noti ON m_C.id = noti.m_category_id WHERE noti.status = '1' AND noti.m_category_id = '$id' ORDER BY noti.order_sort ASC";
  $m_category_query = mysqli_query($connect, $sql);
      // print_r($m_category_query);
  if (mysqli_num_rows($m_category_query) > 0) {
    while ($row = mysqli_fetch_assoc($m_category_query)) {
      $i++;
      // print_r($row); 
      // print_r($m_category_query);
      ?>
      <li data-id='<?php echo $row['m_category_id'] ?>' data-title='<?php echo $row['notice_name']; ?>' data-type='0' data-notice='<?php echo $row['id'] ?>' id="tab-notice" class="hex-grid-demo__item tab" data-v-78854f14>
        <div class="hex-grid-demo__content" data-v-78854f14>
          <?php echo $row['notice_name']; ?>
        </div>
      </li>

      <?php 
    }
  } 

  ?>
</ul>



