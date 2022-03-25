
<?php require_once('../private/initialize.php'); ?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Remarkable Employees: Public Home</title>
    <link href="stylesheets/public-styles.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
    <div id="main-content">
      <header>
        <a href="index.php"><img src="images/ppl-logo.png" alt="circle logo" width="100" height="100"></a>
        <div id="header-content">
          <h1>Remarkable Employees</h1>
          <h4>Where We Come Together As A Team</h4>
        </div>
      </header>

      <main id="page-content">
        <aside id="navigation">
          <nav id="main-nav">
            <ul>
              <l1><a href="create_account.php">Create Account</a></l1>
              <l1><a href="login.php">Login</a></l1>
            </ul>
          </nav>
        </aside>

        <article id="description">
          <div>
            <h2>Remarkable Employees</h2>
            <p>This page is intended for employees exclusively. You may create an account if you are employed with the company.</p>
          </div>
          <hr>
          <div>
            <p>This page is intended for the employees.</p>
            <p></p>
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
