<?php

include_once( __DIR__ . '/classes/User.php' );
    
    if (!empty($_POST)) {
        try {
            $user = new User();
            $user->setEmail($_POST['email']);
            $user->setFirstName($_POST['firstName']);
            $user->setLastName($_POST['lastName']);
            $user->setPassword($_POST['password']);
            $user->setSecurityQuestion($_POST['question']);
            $user->setSecurityAwnser($_POST['securityAwnser']);
            $user->save();
            $success = "User saved!";
        } catch (\Throwable $th) {
            $error = $th->getMessage();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign in</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <nav>
        <img class="beginLogo" src="app/frontend/includes/buddyLogo3.png" alt="">
    </nav>
    <form action="" method="post">
        <h1>Create an account</h1>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error ?>
            </div>
        <?php endif; ?>
        <?php if (isset($success)): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success ?>
                <p>You can now log in!</p>
                <a href="login.php" class="btn btn-primary btn-xs">Go to log In</a>
            </div>
        <?php endif; ?>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" placeholder="Email address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">Email must end in @student.thomasmore.be</small>
            <span id="available"></span>
        </div>
        <div class="form-group">
            <label for="firstName">First name</label>
            <input class="form-control" name="firstName" type="text" placeholder="First name" id="firstName">
        </div>
        <div class="form-group">
            <label for="lastName">Last name</label>
            <input class="form-control" name="lastName" type="text" placeholder="Last name" id="lastName">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" id="exampleInputPassword1">
            <small id="passwordHelp" class="form-text text-muted">Password must include at least 1 uppercase, 1 lowercase and a number.</small>
        </div>
        <div class="form-group">
        <label for="security_question">Security question</label>
        <select name="question" id="question" class="form-control">
        <option value="what whas your first pet?">what whas your first pet?</option>
        <option value="What is your favourite book? ">What is your favourite book? </option>
        <option value="What is the name of the road you grew up on?">What is the name of the road you grew up on?</option>
        <option value="What city were you born in?">What city were you born in?</option>
        <option value="Where is your favourite place to vacation?">Where is your favourite place to vacation?</option>
        </select>
        </div>
        <div class="form-group">
        <label for="security_awnser">your answer please</label>
        <input type="text" name="securityAwnser" class="form-control" placeholder="answer here">
        </div>
        <button type="submit" class="btn btn-primary btnu">Submit</button>
        <div>
        <p class="acc">Already have an account?</p>
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <a href = 'login.php' class = 'btn btn-primary btn-xs'>Login</a>
                </div>
            </div>
        </div>
      </div>
    </div>
    </form>
    <script src="js/checkEmail.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>