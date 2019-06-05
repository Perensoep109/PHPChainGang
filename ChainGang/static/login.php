<?php


include_once("$_SERVER[DOCUMENT_ROOT]/chaingang/private/functions/dbfunctions.php");
DBI::$logError = true;


// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{

    // Check if username is empty
    if(empty(trim($_POST["username"])))
    {
        $username_err = "Please enter username.";
    }
    else
        {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"])))
    {
        $password_err = "Please enter your password.";
    } else
        {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err))
    {
        // Prepare a select statement
        $sqlU = "SELECT * FROM allusers WHERE USER_USERNAME = '$username' LIMIT 1";

        $user = DBI::queryUsers($sqlU)[0];
                // Check if username exists, if yes then verify password
                if($user != null)
                {

                        if($password == $user->getPassword())
                        {
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $user->getDbIndex();
                            $_SESSION["username"] = $username;

                        }
                        else
                            {
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }

                }
                else
                    {
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            }
            else
                {
                echo "Oops! Something went wrong. Please try again later.";
            }


}
?>

    <style type="text/css">
        .wrapper{ width: 350px; padding: 20px; }
    </style>
<div class="wrapper">
    <h2>Login</h2>
    <p>Please fill in your credentials to login.</p>
    <form action="login.php" method="post">
        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
            <span class="help-block"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
            <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Login" >
        </div>
    </form>
</div>