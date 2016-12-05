
<div class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      </button>
      <a class="navbar-brand" href="/">Тестовый сайт</a>
    </div>
    <?php if(!empty($_SESSION['name'])): ?>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="dropdown">

          <a href="" class="dropdown-toggle" data-toggle="dropdown"><?php print_r($_SESSION['name']) ?><b class="caret"></b></a>
        <?php endif; ?>
          <ul class="dropdown-menu">
            <!-- <li><a href="#">Редактировать профиль</a></li> -->
            <li><a href="logout.php">Выйти</a></li>
          </ul>
        </li>
      </ul>
