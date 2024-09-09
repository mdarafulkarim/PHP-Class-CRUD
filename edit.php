<?php include 'header.php'; ?>

<div id="main-content">
    <h2>Update Record</h2>
    <?php
        include_once('config.php');
        $sid = $_GET['sid'];
        $sql = "SELECT * FROM student WHERE sid = {$sid}";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
    ?>
    <form class="post-form" action="updatedata.php" method="post">
      <div class="form-group">
          <label>Name</label>
          <input type="hidden" name="sid" value="<?php echo $row['sid']; ?>"/>
          <input type="text" name="sname" value="<?php echo $row['sname']; ?>"/>
      </div>
      <div class="form-group">
          <label>Address</label>
          <input type="text" name="saddress" value="<?php echo $row['saddress']; ?>"/>
      </div>
      <div class="form-group">
          <label>Class</label>

          <select name="sclass">
              <option value="" selected disabled>Select Class</option>
                <?php
                    $sql2 = "SELECT * FROM studentclass";
                    $result2 = mysqli_query($conn, $sql2);

                    while($row2 = mysqli_fetch_assoc($result2)){
                        if($row2['cid'] == $row['sclass']){
                          $select = "selected";
                        }else {
                            $select = "";
                        }
                ?>
                <option <?php echo $select; ?> value="<?php echo $row2['cid']; ?>"><?php echo $row2['cname']; ?></option>
                <?php } ?>
          </select>
      </div>
      <div class="form-group">
          <label>Phone</label>
          <input type="text" name="sphone" value="<?php echo $row['sphone']; ?>"/>
      </div>
      <input class="submit" type="submit" value="Update"/>
    </form>
    <?php }} ?>
</div>
</div>
</body>
</html>
