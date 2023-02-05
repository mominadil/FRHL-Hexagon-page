<div class="hexagon-wrapper hex-grid-demo toggle" data-v-78854f14="">
  <ul class="hex-grid-demo__list" data-v-78854f14="">

    <?php
    include 'admin/db_connection.php';
    $sql = "SELECT * FROM m_category WHERE status = '1' ORDER BY order_sort ASC";
    $m_category_query = mysqli_query($connect, $sql);
    if (mysqli_num_rows($m_category_query) > 0) {
      while ($row = mysqli_fetch_assoc($m_category_query)) {
          // print_r($row);
          echo $row['type']; 
          // print_r($m_category_query);
        ?> 
        <li class="hex-grid-demo__item tab" data-id='<?php echo $row['id'] ?>' data-title='<?php echo $row['name']; ?>'  data-type='<?php echo $row['type'] ?>' data-v-78854f14="">
          <div class="hex-grid-demo__content" data-v-78854f14="">
            <?php echo $row['name']; ?>
          </div>
        </div>

        <?php  
      }
    } 
    ?>
  </ul>
</div>
