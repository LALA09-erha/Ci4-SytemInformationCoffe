<html>
  <head>
    <link rel="stylesheet" type="text/css" href="<?= base_url(
        'assets/css/main.css'
    ) ?>" />
    <title><?= $title ?></title>
  </head>
  <body>
    <div class="container">
      <div class="wraper">
        <div class="image--container" style="background: url(<?= base_url(
            'assets/img/productivity.jpg'
        ) ?>); background-position:center; background-size:cover;"></div>
            <div class="login-container__main">
          <div class="login-container__title">login</div>
          <form class="login-form" action="/proseslogin" method="POST">
            <?= csrf_field() ?>
            <div class="login-form__input-email">
              <label for="email">email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Your Cafe Email" required/>
            </div>
            <div class="login-form__input-password">
              <label for="password">password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Your Cafe Password" required/>
            </div>
            <?php if (session()->getFlashdata('pesan') ) {
                echo '<p style="text-align:center; color:white;">';
                echo session()->getFlashdata('pesan');
                echo '</p>';
            } ?>
            <button class="login-form__button" type="submit">LOGIN</button>
            <div class="newuser__sign-in">Need an account?<a href="/regist"> Sign up</a></div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
