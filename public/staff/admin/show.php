<?php
require_once('../../../private/initialize.php');
require_login();
is_admin();

// Get the value and assign it to a local variable
$id = $_GET['employee_id'] ?? '1';

$subject = find_employee_by_id($id);
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Remarkable Employee Info</title>
    <link href="../../stylesheets/public-styles.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="../../images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
    <div id="main-content">
      <header>
        <a href="<?php echo url_for( 'staff/admin/index.php'); ?>"><img src="../../images/ppl-logo.png" alt="circle logo" width="100" height="100"></a>
        <div id="header-content">
          <h1>Remarkable Employees</h1>
          <h4>Where We Come Together As A Team</h4>
        </div>
        <div id="user-info">
          <p>Welcome <?php echo $_SESSION['username']; ?></p>
          <p>You are logged in as - <?php echo $_SESSION['user_level']; ?></p>
        </div>
      </header>

      <main id="page-content">
        <aside id="navigation">
          <nav id="main-nav">
            <ul>
              <l1><a href="<?php echo url_for( '/staff/admin/index.php'); ?>">Admin Home</a></l1>
              <l1><a href="announcements.php">Announcements</a></l1>
              <l1><a href="images.php">Images</a></l1>
              <l1><a href="employee_list.php">Employee</a></l1>
              <l1><a href="<?php echo url_for('../public/logout.php'); ?>">Logout <?php echo $_SESSION['username']; ?></a></l1>
            </ul>
          </nav>
        </aside>
        
        <article id="description">
          <div>
            <?php echo display_session_message(); ?>
            <h1>Employee Information</h1>
          </div>
          <hr>
          <div>
            <h2>Employee <?php echo h($subject['first_name']) . " " . h($subject['last_name']); ?></h2>
            <div>
              <div class="attributes">
                <dl>
                  <dt>First Name</dt>
                  <dd><?php echo h($subject['first_name']); ?></dd>
                </dl>
                <dl>
                  <dt>Last Name</dt>
                  <dd><?php echo h($subject['last_name']); ?></dd>
                </dl>
                <dl>
                  <dt>User Type</dt>
                  <dd><?php echo h($subject['user_level']); ?></dd>
                </dl>
                <dl>
                  <dt>Department</dt>
                  <dd><?php echo h($subject['department_initial']); ?></dd>
                </dl>
                <dl>
                  <dt>Email</dt>
                  <dd><?php echo h($subject['email']); ?></dd>
                </dl>
              </div>
          </div>
        </article> 
      </main>
      <footer>
        &copy; <?php echo date('Y'); ?> Mechelle &#9774; Presnell &hearts;
      </footer>
    </div>
  </body>
</html>

