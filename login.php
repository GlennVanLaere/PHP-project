<?php
 spl_autoload_register();
  $failedAtt = 0; 
 

  if (!empty($_POST)) {
    try {
      $user = new classes\User();
      $user->setCurrentEmail($_POST["email"]);
      $user->setCurrentPassword($_POST["password"]);
      $canLogin = $user->canLogin();
      $currentAttempts = $user->currentAttempts();
      $question = $user->secQuestion();

      if($currentAttempts <= 2){
        if ($canLogin) {
              $complete = $user->checkComplete();
              $user->login($complete);
            } else {
              $error = "We couldn't log you in";
              $CEmail = $_POST["email"];
              $failedAtt = $user->cannotLogin($CEmail);
            }
          }
      if($currentAttempts >= 3){
        if(!empty($_POST["awnser"])){
          $awnser = $_POST["awnser"];
        }
          else{
            $awnser = "nothing";
          }
            $question = $user->secQuestion();
            $correctAwnser = $user->awnserCheck($awnser);
           
            
        if ($canLogin && $correctAwnser) {
              $complete = $user->checkComplete();
              $user->login($complete);
        } 
        else {
              $error = "We couldn't log you in";
              $CEmail = $_POST["email"];
              $failedAtt = $user->cannotLogin($CEmail);
            }
          }
        }
        catch (\Throwable $th) {
          $error = $th->getMessage();
      
      
          }
      }

if ( !empty( $_POST ) ) {
    try {
        $user = new classes\User();
        $user->setCurrentEmail( $_POST['email'] );
        $user->setCurrentPassword( $_POST['password'] );
        $canLogin = $user->canLogin();
        if ( $canLogin ) {
            $complete = $user->checkComplete();
            $user->login( $complete );
        } else {
            $error = "We couldn't log you in";
        }

    } catch ( \Throwable $th ) {
        $error = $th->getMessage();
    }
}
?>
<!doctype html>
<html lang = 'en'>
<head>
    <meta charset = 'UTF-8'>
    <meta name = 'viewport' content = 'width=device-width, initial-scale=1.0, shrink-to-fit=no'>
    <link rel = 'stylesheet' href = 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' integrity = 'sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin = 'anonymous'>
    <link rel = 'stylesheet' href = 'css/style.css' />
    <title>Login</title>
</head>
<body>
    <nav>
        <p>👫 Buddy Project</p>
    </nav>
    <?php if ( isset( $error ) ): ?>
    <div class = 'alert alert-danger' role = 'alert'>
        <?php echo $error ?>
    </div>
    <?php endif; ?>

    <form action="" method="post">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" placeholder="Enter email" name="email" id="email" class="form-control">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" placeholder="Password" name="password" id="password" class="form-control">
      </div>
      <?php if($failedAtt >2 ): ?>
      <h2>To many login attempts pleas fill in the extra security</h2>
      <label for="securityQuestion"> Security Question</label>
      <h2> <?php echo $question ?></h2>
    
      <label for="answerSec">Please awnser the question here</label>
      <input type="text" placeholder="awnser" name="awnser" id="awnser" class="form-control">
      <?php else:?>
      <h2> <?php echo "" ?> </h2>
      <?php endif; ?>
      <div>
      <input type="submit" value="Sign in" class="btn btn-primary btnu">
      <p class = 'acc'>Want to register?</p>
      <a href = 'index.php' class = 'btn btn-primary btn-xs btnu'>Create account</a>
      </div>
    </form>
    <script src = 'https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity = 'sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin = 'anonymous'></script>
    <script src = 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity = 'sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin = 'anonymous'></script>
    <script src = 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity = 'sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin = 'anonymous'></script>
</body>
</html>