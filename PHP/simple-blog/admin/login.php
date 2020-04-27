<?php
$username = $_POST['username'];
$password = $_POST['password'];
$errors = '';

if(isset($_POST['submit']))
{

if (($username == "thomas") && ($password == "pass")) 
{
    $errors = "\n<div class=\"alert alert-danger\" role=\"alert\">";
    session_start(); 
    // Starts a session, or continues an existing session.
    // MUST be here when using sessions
    $_SESSION['ad537f2997ea8064d232adbbfa15b5fdc'] = session_id(); 
    header("Location:insert.php"); 
    // Redirects user to insert page
}
    else
    {   
        $errors .= "incorrect login, please try again";
    } 


}


?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Simple Blog
        </title>
        <!-- These must be in place to use Bootstrap ! -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
        </script>
    </head>

    <body>
        <div class="container">
            <div class="banner">
                <h1>Sign In</h1>
                <form name="loginform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label for="username">User Name:
                        </label>
                        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:
                        </label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <?php if($errors){
                            echo $errors;
                        } ?>
                    </div> 
                    <button type="submit" name="submit"class="btn btn-primary">Submit
                    </button>

                </form>
            </div>
        </div>
    </body>

    </html>