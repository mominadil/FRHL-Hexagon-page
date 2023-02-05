<?php 


$id =  $_POST['dataId'];
$dataType =  $_POST['dataType'];
if (isset($_POST['dataNoticeId'])) {
$dataNoticeId =  $_POST['dataNoticeId'];
}

// echo $dataType;

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

      if (isset($dataNoticeId)) {
      // echo $dataNoticeId;
      $sql = "SELECT * FROM m_category AS m_C INNER JOIN year_details AS year_details ON m_C.id = year_details.m_category_id WHERE year_details.status = '1' AND year_details.m_category_id = '$id' AND year_details.notice_id = $dataNoticeId ORDER BY year_details.order_sort ASC";
      } else {
      $sql = "SELECT * FROM m_category AS m_C INNER JOIN year_details AS year_details ON m_C.id = year_details.m_category_id WHERE year_details.status = '1' AND year_details.m_category_id = '$id' ORDER BY year_details.order_sort ASC";

      }
      


      $m_category_query = mysqli_query($connect, $sql);
      if (mysqli_num_rows($m_category_query) > 0) {
        while ($row = mysqli_fetch_assoc($m_category_query)) {
          ?>
    <li data-id='<?php echo $row['id'] ?>' data-title='<?php echo $row['year_details']; ?>' data-type='<?php echo $row['m_category_id'] ?>' id="year-pdf" class="hex-grid-demo__item tab" data-v-78854f14>
        <div class="hex-grid-demo__content" data-v-78854f14>
            <?php echo $row['year_details']; ?>
        </div>
    </li>
    <?php  
      }
  } 

      ?>
</ul>
