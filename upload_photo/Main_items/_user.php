<?php

// $admins = fetch_admin(null);

?>

<!-- dash-items -->
  <div class="update-profile">

    <?php
    $sql = "SELECT * FROM `user_data`";
    $select = $mysqli->query($sql);

    if (mysqli_num_rows($select) > 0) {
      $fetch = mysqli_fetch_assoc($select);
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
     <div class="image">
      <?php
      if ($fetch['user_Image'] == '') {
        echo '<img src="/default-avatar.png">';
      } else {
        echo '<img src="' . $fetch['user_Image'] . '">';
      }
      if (isset($message)) {
        foreach ($message as $message) {
          echo '<div class="message">' . $message . '</div>';
        }
      }
      ?></div>
      <div class="flex">
        <div class="inputBox">
          <span>username :</span>
          <input type="text" name="update_name" value="<?php echo $fetch['username']; ?>" class="box" disabled>
          <span>your email :</span>
          <input type="email" name="update_email" value="<?php echo $fetch['emailId']; ?>" class="box" disabled>
          <span>Account Created On :</span>
          <input type="email" name="update_email" value="<?php echo $fetch['date']; ?>" class="box" disabled>
          
        </div>
      </div>
      <!-- <div class="form-input-group">
        <button type="submit" value="sumbit" name="update_profile" class="form-input form-btn">Update Profile</button>
      </div> -->
  </div>
  </form>

  </div>