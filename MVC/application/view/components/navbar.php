<nav>
  <div class="container">
    <ul>
      <li>
        <a href="http://mvc-task.com/userControl">Home</a>
      </li>
      <li>
        <a href="http://mvc-task.com/userControl/userSignup">Register</a>
      </li>
      <li>
        <?php
          if(isset($_SESSION['logged_in'])){
            echo '<a href="http://mvc-task.com/userControl/userLogout">Logout</a>';
          }
          else{
            echo '<a href="http://mvc-task.com/userControl">Login</a>';
          }
        ?>
      </li>
      <li>
        <a href="http://mvc-task.com/userControl/userProfile">Profile</a>
      </li>
    </ul>
  </div>
</nav>