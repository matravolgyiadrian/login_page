<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login page</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <script src="script.js"></script>

  </head>
  <body>
    <div class="modal" id="popup">
      <div class="popup-content">
        <h4>Név:</h4>
        <p>Mátravölgyi Adrián Kálmán</p>
        <h4>Neptun kód:</h4>
        <p>BZNJWP</p>
        <h4>Megcélzott jegy:</h4>
        <p>5</p>
      </div>
    </div>
    <div class="container">
      <h2>Login to reveal the secret</h2>
      <div id="error"></div>
      <a href="#popup" rel="modal:open"><img id="information" src="information.svg" alt="Information" width="25" height="25"></a>
      <form action="index.php" method="post">
        <div>
          <input type="text" name="username" id="username" autocomplete="off" required> <br>
          <label for="username" class="label-name">
            <span class="content-name">Username</span>
          </label>
        </div>
        <div>
          <input type="password" name="password" id="password" required>  <br>
          <label for="password" class="label-name">
            <span class="content-name">Password</span>
          </label>
        </div>
        <div>
          <input type="submit" value="Login" class="submit-btn">
          <span class="btn-hover"></span>
        </div>
        <span class="color color--blue"></span>
        <span class="color color--orange"></span>
        <span class="color color--green"></span>
        <span class="color color--white"></span>
        <span class="color secret"></span>
      </form>
    </div>
  </body>
</html>
