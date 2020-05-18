<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AJAX login/register</title>
  <style>
body {
  margin: 2em 10%;
}
hr {
  border: none;
  border-bottom: 1px solid gray;
}
  </style>
</head>
<body>
  <h1>AJAX login/register</h1>

  <hr/>

  <form id="login-form">
    <fieldset>
      <legend>Connection</legend>

      <label for="login-email"></label>
      <input type="email" id="login-email" placeholder="Adresse email" />

      <label for="login-keypass"></label>
      <input type="password" id="login-keypass" placeholder="Mot de passe" />

      <input type="submit"  id="login-submit" value="Connection" />
    </fieldset>
  </form>

  <hr/>

  <form id="register-form">
    <fieldset>
      <legend>Inscription</legend>

      <label for="register-email"></label>
      <input type="email" id="register-email" placeholder="Adresse email" />

      <label for="register-keypass"></label>
      <input type="password" id="register-keypass" placeholder="Mot de passe" />

      <input type="submit"  id="register-submit" value="Inscription" />
    </fieldset>
  </form>
  

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script>

// connection
$('#login-form').submit(event => {
  event.preventDefault();
  $.ajax({
    url: 'ajax.php',
    method: 'GET',
    dataType: 'json',
    data: {
      email: $('#login-email').val(),
      keypass: $('#login-keypass').val()
    },
    success(data) {
      if (!data.success){ this.error(); }
      else {
        window.location.replace('home.php');
      }
    },
    error() {
      alert('Impossible de se connecter avec ces identifiants.');
    }
  });
});

// inscription
$('#register-form').submit(event => {
  event.preventDefault();
  $.ajax({
    url: 'ajax.php',
    method: 'POST',
    dataType: 'json',
    data: {
      email: $('#register-email').val(),
      keypass: $('#register-keypass').val()
    },
    success(data) {
      if (!data.success){ this.error(); }
      else {
        alert('L\'inscription s\'est déroulée sans problème.');
      }
    },
    error() {
      alert('Une erreur est survenue lors de l\'inscription.');
    }
  });
});

  </script>

</body>
</html>
