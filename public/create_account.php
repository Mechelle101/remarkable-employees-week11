<?php
require_once('../private/initialize.php');

if(is_post_request()) {
  $subject = [];
  $employee['first_name'] = $_POST['first_name'] ?? '';
  $employee['last_name'] = $_POST['last_name'] ?? '';
  $employee['email'] = $_POST['email'] ?? '';
  $employee['username'] = $_POST['username'] ?? '';
  $employee['password'] = $_POST['password'] ?? '';
  $employee['confirm_password'] = $_POST['confirm_password'] ?? '';

  $result = create_user_account($employee);
  if($result == true) {
    $new_employee = find_employee_by_username($employee['username']);
    log_in_employee($new_employee);
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'You have created your account successfully.';
    if($employee['user_level'] == 'admin') {
      redirect_to(url_for('staff/admin/show.php?employee_id=' . $new_employee['employee_id']));
    } else {
      redirect_to(url_for('staff/show.php?employee_id=' . $new_employee['employee_id']));
    }
  } else {
    $errors = $result;
  }

} else {
  // DISPLAY THE BLANK FORM
  $employee = [];
  $employee['first_name'] = '';
  $employee['last_name'] = '';
  $employee['email'] = '';
  $employee['username'] = '';
  $employee['password'] = '';
  $employee['confirm_password'] = '';

}

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Remarkable Employees: Employee Home Page</title>
    <link href="stylesheets/public-styles.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
    <div id="main-content">
      <header>
        <a href="<?php echo url_for('index.php'); ?>"><img src="images/ppl-logo.png" alt="circle logo" width="100" height="100"></a>
        <div id="header-content">
          <h1>Remarkable Employees</h1>
          <h4>Where We Come Together As A Team</h4>
        </div>
      </header>

      <main id="page-content">
        <aside id="navigation">
          <nav id="main-nav">
            <ul>
              <l1><a href="<?php echo url_for('index.php'); ?>">Home</a></l1>
              <l1><a href="login.php">Login</a></l1>
            </ul>
          </nav>
        </aside>

        <article id="description">
          <div>
            <h2>Create an Account</h2>
            <p>You must be an employee to create an account.</p>
            <p>If you have an account please login.</p>
          </div>
          <hr>
          <div>
          <form action="<?php echo url_for('create_account.php'); ?>" method="post">
            <label for="first_name">First Name</label><br>
            <input type="text" id="first_name" name="first_name" value=""><br>
            <br>
            <label for="last_name">Last Name</label><br>
            <input type="text" id="last_name" name="last_name" value=""><br>
            <br>
            <label for="email">Email</label><br>
            <input type="text" id="email" name="email" value=""><br>
            <br>
            <label for="username">Username</label><br>
            <input type="text" id="username" name="username" value=""><br>
            <p>Password should be at least 8 characters, 
            <br>include at least one uppercase, lowercase, number, and symbol.</p>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" value=""><br>
            <br>
            <label for="password">Confirm Password</label><br>
            <input type="password" id="password" name="confirm_password" value=""><br>
            <br>
            <div id="operations">
              <input type="submit" name="submit" value="Create Account">
            </div>
          </form>
          </div>
        </article> 
      </main>
      <footer>
        &copy; <?php echo date('Y'); ?> Mechelle &#9774; Presnell &hearts;
      </footer>
    </div>
  </body>
</html>
