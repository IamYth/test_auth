<?php session_start() ?>
<!-- Header -->
<?php include('inc/header.php') ?>
  <body>
    <!-- Static navbar -->
<?php include('inc/navbar.php') ?>
      <ul class="nav navbar-nav navbar-right">
          <li><a href="/">Главная</a></li>
          <li><a href="page1.php">Страница 1</a></li>
          <li class="active"><a href="page2.php">Страница 2</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
</div>

<?php if(isset($_SESSION['name'])): ?>
    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Этот текст только для юзеров</h1>
      </div>
    </div>

    <!-- /container -->
<?php else: ?>
    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1 class="text-error">Вам сюда нельзя!</h1>
      </div>
    </div> <!-- /container -->
<?php endif; ?>

<?php include('inc/footer.php') ?>
