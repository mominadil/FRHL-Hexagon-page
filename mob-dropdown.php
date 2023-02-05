<!-- select tabs for mobile section start -->
<section id="select-tabs-wrap" class="select-tabs-wrapper">
    <div class="select-tabs-title-wrap">
        <div class="selection-tabs-wrap-item">
            <select id="select-tabs" class="select-tabs">
              <option selected disabled>CHOOSE AN OPTION</option>
              <?php
              include 'admin/db_connection.php';
              $sql = "SELECT * FROM m_category WHERE status = '1' ORDER BY order_sort ASC";
              $m_category_query = mysqli_query($connect, $sql);
              if (mysqli_num_rows($m_category_query) > 0) {
                while ($row = mysqli_fetch_assoc($m_category_query)) {
                  // print_r($row); 
                  // print_r($m_category_query);
                  ?> 
                  <option value="<?php echo $row['id'] ?>" data-title='<?php echo $row['name']; ?>' data-id='<?php echo $row['id'] ?>' data-type='<?php echo $row['type'] ?>'><?php echo $row['name']; ?></option>

                <?php  }
              } 

              ?>
            </select>
        </div>
    </div>
</section>
<!-- select tabs for mobile section end -->



  