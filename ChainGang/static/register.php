<?php
include_once("$_SERVER[DOCUMENT_ROOT]/chaingang/private/functions/dbfunctions.php");
DBI::$logError = true;



// Define variables and initialize with empty values
$username = $password = $email  = $name = $gender = $confirm_password = "";
$username_err = $password_err = $email_err  = $name_err = $gender_err =  $age_err = $confirm_password_err = "";
$image = "images/cat1.jpg";
$age = 0;

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{

    // Validate username
    if(empty(trim($_POST["username"])))
    {
        $username_err = "Please enter a username.";
    }
    else
        {
        $resultUN = DBI::queryVoid("SELECT USER_ID FROM allusers WHERE USER_USERNAME = '$username'");

            if ($resultUN == 1) {
                $username_err = "This username is already taken.";
            } else {
                $username = trim($_POST["username"]);
            }


        }


        // Validate email
        if(empty(trim($_POST["email"])))
        {
            $email_err = "Please enter a email.";
        }
        else
            {
            $resultE = DBI::queryVoid("SELECT USER_ID FROM allusers WHERE USER_EMAIL = '$email'");


                if ($resultE == 1) {
                    $email_err = "This Email is already in use.";
                }
                else
                    {
                    $email = trim($_POST["email"]);
                }


            }


            // Validate Age
            if(empty(trim($_POST["age"])))
            {
                $age_err = "Please enter your age.";
            }
            else
            {


                    if(trim($_POST["age"] < 18))
                    {
                        $age_err = "You need to be at least 18 years old";
                    }
                    else
                    {
                        $age = trim($_POST["age"]);
                    }


            }

            //Validate Name
    if(empty(trim($_POST['name'])))
    {
        $name_err = "Please enter a name";
    }
    else
    {
        $name = trim($_POST['name']);
    }

    // Validate Gender
    if(empty(trim($_POST["gender"])))
    {
        $gender_err = "Please enter a gender.";
    }
    else
    {



            if(trim($_POST["gender"] != "M" || "F" || "U"))
            {
                $gender_err = "Please enter: M, F or U";
            }
            else
            {
                $gender = trim($_POST["gender"]);
            }


    }

    // Validate password
    if(empty(trim($_POST["password"])))
    {
        $password_err = "Please enter a password.";
    }
    else
    {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"])))
    {
        $confirm_password_err = "Please confirm password.";
    }
    else
    {
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password))
        {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($name_err) && empty($age_err) && empty($email_err))
    {
        $query = "INSERT INTO allusers (USER_NAME, USER_EMAIL, USER_AGE,USER_GENDER, USER_PASSWORD, USER_USERNAME, USER_IMAGE) VALUES('$name', '$email', $age, '$gender', '$password', '$username', '$image')";
        // Prepare an insert statement
        $result = DBI::queryVoid($query);


        if($result != 0)
        {

                // Redirect to login page
                header("location: login.php");
        }
        else
        {
            echo "Something went wrong. Please try again later.";
        }
    }

}
?>
<style type="text/css">
    .wrapper{ width: 350px; padding: 20px; }
</style>
<div class="wrapper">
    <h2>Sign Up</h2>
    <p>Please fill this form to create an account.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
            <span class="help-block"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
            <label>Email</label>
            <input type="Email" name="email" class="form-control" value="<?php echo $email; ?>">
            <span class="help-block"><?php echo $email_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
            <label>Full name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
            <span class="help-block"><?php echo $name_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($age_err)) ? 'has-error' : ''; ?>">
            <label>Age</label>
            <input type="number" name="age" class="form-control" value="<?php echo $age; ?>">
            <span class="help-block"><?php echo $age_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($gender_err)) ? 'has-error' : ''; ?>">
            <label>Gender</label>
            <input type="text" name="gender" class="form-control" value="<?php echo $gender; ?>">
            <span class="help-block"><?php echo $gender_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label>Password</label>
            <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
            <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
            <span class="help-block"><?php echo $confirm_password_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
            <input type="reset" class="btn btn-default" value="Reset">
        </div>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </form>
</div>