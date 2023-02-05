<ul class="hex-grid-demo__list" data-v-78854f14>
    <?php
    include 'admin/db_connection.php';
    $i=0;
    $sql = "SELECT * FROM m_category WHERE status = '1' ORDER BY order_sort ASC";
    $m_category_query = mysqli_query($connect, $sql);
    if (mysqli_num_rows($m_category_query) > 0) {
      while ($row = mysqli_fetch_assoc($m_category_query)) {
        $i++;
          // print_r($row); 
          // print_r($m_category_query);
        ?>
    <li data-id='<?php echo $row['id'] ?>' data-type='
        <?php echo $row['type'] ?>' data-title='<?php echo $row['name']; ?>' class="hex-grid-demo__item tab" data-v-78854f14>
        <div class="hex-grid-demo__content" data-v-78854f14>
            <?php echo $row['name']; ?>
        </div>
    </li>
    <?php  }
    } 

    ?>
</ul>