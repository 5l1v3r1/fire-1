<header>
    <nav class="container-fluid navbar navbar-default drop-shadow navbar-fixed-top">
        <a href="index.php"><span id="fire">F</span><i class="fa fa-fire fa-2x"></i><span id="fire">RE</span></a>

        <?php
            session_start();
            if($_SESSION['logged'] == false) {
        ?>
        <form id="login" class="form-inline navbar-right" action="oauth.php" method="post">

            <div class="form-group">
                <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email">
                <input type="password" class="form-control" name="inputPassword" id="inputPassword"
                       placeholder="Password">
            </div>

            <input type="submit" class="btn btn-primary fa fa-sign-in" value="Log in">

        </form>
        <?php
            } else {
        ?>
                <input type="submit" class="btn btn-primary fa fa-sign-out" value="Log out">
        <?php
            }
        ?>

    </nav>
</header>
