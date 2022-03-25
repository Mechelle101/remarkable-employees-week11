<?php 
require_once('../../../private/initialize.php'); 
require_login();
is_admin();
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Remarkable Employee Announcements</title>
    <link href="../../stylesheets/public-styles.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="../../images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <!-- Main header -->
  <body>
    <div id="main-content">
      <header>
        <a href="<?php echo url_for( '/staff/admin/index.php'); ?>"><img src="../../images/ppl-logo.png" alt="circle logo" width="100" height="100"></a>
        <div id="header-content">
          <h1>Remarkable Employees</h1>
          <h4>Where We Come Together As A Team</h4>
        </div>
        <div id="user-info">
          <p>Welcome <?php echo $_SESSION['username']; ?></p>
          <p>You are logged in as - <?php echo $_SESSION['user_level']; ?></p>
        </div>
      </header>
      <!-- Navigation -->
      <main id="page-content">
        <aside id="navigation">
          <nav id="main-nav">
            <ul>
              <l1><a href="index.php">Admin Home</a></l1>
              <l1><a href="announcements.php">Announcements</a></l1>
              <l1><a href="images.php">Images</a></l1>
              <l1><a href="employee_list.php">Employees</a></l1>
              <l1><a href="<?php echo url_for('../public/logout.php') ?>">Logout <?php echo $_SESSION['username']; ?></a></l1>
            </ul>
          </nav>
        </aside>
        
        <!--  Main body -->  
        <article id="description">
          <div>
            <?php echo display_session_message(); ?>
            <h1>Reminders &amp; Announcements</h1>
            <p>The announcement will show above or below the input field</p>

            <form action="<?php echo url_for('staff/admin/announcements.php'); ?>" method="post">
              <label for="announcement">Announcement</label><br>
              <textarea id="announcement" name="announcement" rows="5" cols="">
              </textarea>
              <br>
              <input type="submit" name="submit" value="Post"><br>
            </form>
          </div>
          <hr>
          <div>
            <h1>The live calendar goes here</h1>
            <p>--------------------------------</p>
            <p>--------------------------------</p>
            <p>--------------------------------</p>
            <p>--------------------------------</p>
            <p>--------------------------------</p>
          </div>
        </article> 
      </main>

      <!-- PAGE FOOTER -->
      <footer>
        &copy; <?php echo date('Y'); ?> Mechelle &#9774; Presnell &hearts;
      </footer>
    </div>
  </body>
</html>
