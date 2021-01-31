<?php
session_start();  // to begin a new session
if(isset($_SESSION['error'])){ 
    ?>
    <div class="error-message">
        <strong>Error!</strong>
        <?php echo $_SESSION['error'];?>
    </div>
    <?php } 
unset($_SESSION['error']);

if(isset($_SESSION['success'])){ ?>
    <div class="success">
        <strong>Success!</strong>
        <?php echo $_SESSION['success'];?>
    </div>
  <?php  }
  unset($_SESSION['success']);
  
  ?>