  
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>E-Lakip BKD Kab. Bolaang Mongondow</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url()?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url()?>/assets/css/signin.css" rel="stylesheet">
    <script src="<?= base_url()?>/assets/js/jquery.js"></script>
  </head>
  
  <body class="text-center">
  <div class="col-md-12">
    <div class="col-md-4 offset-4" id="msg">
      <?= (isset($message)) ? $message : ''; ?>
    </div>
    <form class="form-signin" method="post" action="<?= base_url('index.php/user/loginAction') ?>">
      <img class="mb-4" src="<?= base_url('assets/brand/logo.png') ?>" alt="" width="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputUsername" class="sr-only">Username</label>
      <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
      <select class="form-control" name="tahun">
        <?php for ($i=0; $i < 6 ; $i++) { ?>
          <option value="<?= date("Y")+$i; ?>"><?= date("Y")+$i; ?></option>
        <?php } ?>
      </select>
      <div class="checkbox mb-3">
        <label>
          <input  type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; E-Lakip BKD Kab. Bolaang Mongondow Versi   1.0</p>
    </form>
  </div>
  </body>
      <script>
            $(document).ready(function(){
                  $('#msg').fadeOut(3000);
            })
      </script>
 </body>
</html>