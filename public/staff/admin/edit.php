<?php 
require_once('../../../private/initialize.php'); 
require_login();
is_admin();

//I DO NOT KNOW WHY THIS IS NOT WORKING!
if(!isset($_GET['employee_id'])) {
  redirect_to(url_for('/staff/admin/employee_list.php'));
}
  
// Get the value and assign it to a local variable
$id = $_GET['employee_id'];
$employee['first_name'] = '';

if(is_post_request()) {
  // Handle form values sent by new.php
  $employee = [];
  $employee['employee_id'] = $id;
  $employee['first_name'] = $_POST['first_name'] ?? '';
  $employee['last_name'] = $_POST['last_name'] ?? '';
  $employee['user_level'] = $_POST['user_level'] ?? '';
  $employee['department_initial'] = $_POST['department_initial'] ?? '';
  $employee['email'] = $_POST['email'] ?? '';
  $employee['username'] = $_POST['username'] ?? '';
  $employee['password'] = $_POST['password'] ?? '';
  $employee['confirm_password'] = $_POST['confirm_password'] ?? '';

  $result = update_employee($employee);
  if($result === true) {
    $_SESSION['message'] = 'The employee was updated successfully.';
    redirect_to(url_for('staff/admin/show.php?employee_id=' . $employee['employee_id']));
  } else {
    $errors = $result;
  }

} else {
  $subject = find_employee_by_id($id);
}

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Edit Employee</title>
    <link href="../../stylesheets/public-styles.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="../../images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <!-- Header -->
  <body>
    <div id="main-content">
      <header>
        <a href="<?php echo url_for('staff/admin/index.php'); ?>"><img src="../../images/ppl-logo.png" alt="circle logo" width="100" height="100"></a>
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
              <l1><a href="<?php echo url_for('/staff/admin/index.php'); ?>">Admin Home</a></l1>
              <l1><a href="announcements.php">Announcements</a></l1>
              <l1><a href="images.php">Images</a></l1>
              <l1><a href="employee_list.php">Employees</a></l1>
              <l1><a href="<?php echo url_for('../public/logout.php'); ?>">Logout <?php echo $_SESSION['username']; ?></a></l1>
            </ul>
          </nav>
        </aside>
        <!-- Main body -->
        <article id="description">
          <div>
            <?php echo display_session_message(); ?>
            <h1>Edit The Employee</h1>
          </div>
          <hr>
          <div>
            <form action="<?php echo url_for('/staff/admin/edit.php?employee_id=' . h(u($id))); ?>" method="post">
              <label for="first_name">First Name</label><br>
              <input type="text" id="first_name" name="first_name" value="<?php echo h($employee['first_name']); ?>"><br>
              <br>
              <label for="last_name">Last Name</label><br>
              <input type="text" id="last_name" name="last_name" value="<?php echo h($employee['last_name']); ?>"><br>
              <br>
              <label for="user_level">Account Type (admin or employee)</label><br>
              <input type="text" id="user_level" name="user_level" value="<?php echo h($employee['user_level']); ?>"><br>
              <br>
              <label for="department_initial">Department (initial)</label><br>
              <input type="text" id="department_initial" name="department_initial" value="<?php echo h($employee['department_initial']); ?>"><br>
              <br>
              <label for="email">Email</label><br>
              <input type="text" id="email" name="email" value="<?php echo h($employee['email']); ?>"><br>
              <br>
              <label for="username">Username</label><br>
              <input type="text" id="username" name="username" value="<?php echo h($employee['username']); ?>"><br>
              <br>
              <!-- <label for="password">Password</label><br>
              <input type="password" id="password" name="password" value=""><br>
              <br>
              <label for="password">Confirm Password</label><br>
              <input type="password" id="password" name="confirm_password" value=""><br>
              <p>Password should be at least 8 characters.  
                <br>Include at least one of the following:
                <br>Uppercase, Lowercase, Number, and Symbol
              </p> -->
              <div id="operations">
                <input type="submit" name="submit" value="Edit Employee">
              </div>
            </form>
          </div>
        </article> 
      </main>

      <!-- Putt the below in the staff_footer page later and style it with staff_footer.css -->
      <!-- PAGE FOOTER -->
      <footer>
        &copy; <?php echo date('Y'); ?> Mechelle &#9774; Presnell &hearts;
      </footer>
    </div>
  </body>
</html>

