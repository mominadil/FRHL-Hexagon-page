<?php
include 'admin/db_connection.php';
$sql = "SELECT * FROM m_category WHERE status = '1' ORDER BY order_sort ASC";
$m_category_query = mysqli_query($connect, $sql);
if (mysqli_num_rows($m_category_query) > 0) {
  while ($row = mysqli_fetch_assoc($m_category_query)) {
// print_r($row); 
// print_r($m_category_query);
    ?> 
    <div data-id='<?php echo $row['id'] ?>' data-title='<?php echo $row['name']; ?>' data-type='<?php echo $row['type'] ?>' class='flex-aside-filter-item tab2'>
      <p class="list-text" title="<?php echo $row['name']; ?>"><?php echo substr($row['name'], 0, 40) .((strlen($row['name']) > 40) ? '...' : ''); ?> 
      <div class="hex2"></div>
    </div>

  <?php  }
} 

?>