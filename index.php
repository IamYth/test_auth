<?php
session_start();
require 'inc/connection.php';

//ВХОД
if (isset($_POST['signin'])) {
  $name = $_POST['name'];
  $password= $_POST['password'];
  $email= $_POST['email'];

  $select = $pdo->prepare("SELECT * FROM users WHERE name='$name'");
  $select->execute();

  while ($row = $select->fetch(PDO::FETCH_ASSOC))
  {
    if((password_verify($password, $row['password'])) && ($_SESSION["email"] = $email))  {
      $_SESSION["name"] = $name;
      header("location:index.php");
      }else{
        echo '<script>alert("Не корректно введены данные")</script';
      }
    }
}

//РЕГИСТРАЦИЯ
if(isset($_POST['signup']) ):

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password= $_POST['password'];
  $hash = password_hash($password, PASSWORD_DEFAULT);

  $insert = $pdo->prepare("INSERT INTO users (name, email, password)
  VALUES (:name, :email, :password) ");
  $insert->bindParam(':name', $name);
  $insert->bindParam(':email', $email);
  $insert->bindParam(':password', $hash);
  $insert->execute();

  $_SESSION["name"] = $name;
  header("location:index.php");
endif;?>
<?php include('inc/header.php') ?>

  <body>

    <!-- Static navbar -->
<?php include('inc/navbar.php') ?>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="/">Главная</a></li>
            <li><a href="page1.php">Страница 1</a></li>
            <li><a href="page2.php">Страница 2</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

<!-- КОНТЕЙНЕР -->
<?php if(empty($_SESSION['name'])): ?>
    <div class="container">
      <form class="form-horizontal" role="form" method="post">

          <div class="form-group">
            <label for="login" class="col-sm-3 control-label">Имя</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="name" placeholder="Login">
            </div>
          </div>

          <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Электронная почта</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="email" placeholder="Email">
            </div>
          </div>

        <div class="form-group">
          <label for="password" class="col-sm-3 control-label">Пароль</label>
          <div class="col-sm-5">
            <input type="password" class="form-control" name="password" placeholder="Password">
          </div>
        </div>

      <!-- <div class="form-group">
        <div class="col-sm-offset-3 col-sm-5">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="$formcheckbox"> Запомнить меня

            </label>
          </div>
        </div>
      </div> -->

      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-5">
          <button type="submit" name="signin" class="btn btn-default">Войти</button>
          <button type="submit" name="signup" class="btn btn-default">Зарегистрироваться</button>
        </div>
      </div>
<?php else: ?>

  <div class="container">
    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
      <h1>Поздравляем,<?php print_r($_SESSION['name']) ?>! Вы вошли! </h1>
    </div>
  </div> <!-- /container -->
<?php endif; ?>
    </form>
    </div>
    <!-- /КОНЕЦ КОНТЕЙНЕРА -->

<?php include('inc/footer.php') ?>
