<nav>
  <div class="container">
    <ul>
      <li>
        <?php
          if(isset($_SESSION['logged_in'])) {
            echo '<a href="/afterLogin">Home</a>';
          }
          else{
            echo '<a href="/userControl">Home</a>';
          }
        ?>
      </li>
      <li>
        <?php
          if(isset($_SESSION['logged_in'])) {
            echo '<a href="/afterLogin/userPosts">Account</a>';
          }
          else{
            echo '<a href="/userControl">Account</a>';
          }
        ?>
      </li>
      <li>
        <?php
          if(isset($_SESSION['logged_in'])) {
            echo '<a href="/afterLogin/userProfile">Edit profile</a>';
          }
          else{
            echo '<a href="/userControl/userSignup">Register</a>';
          }
        ?>
      </li>
      <li>
        <?php
          if(isset($_SESSION['logged_in'])) {
            echo '<a href="/afterLogin/userLogout">Logout</a>';
          }
          else{
            echo '<a href="/userControl">Login</a>';
          }
        ?>
      </li>
      <li class="form-check form-switch">
        <button class="btn btn-link p-1 mt-2" onclick="darkMode()" name="switchToDark" id="switchToDark">Switch Mode</button>
      </li>
      <!-- <li class="">
        <button class="btn btn-link p-1 mt-2" onclick="allowCookies()" name="cookies-policy" id="cookies-policy">Cookies Policy</button>
      </li> -->
    </ul>
  </div>
</nav>
