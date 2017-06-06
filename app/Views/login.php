<div class="col-md-4 col-sm-12 center col-md-offset-4" style="margin-top: 250px">
    <div class="content-box">
        <div class="content">
            <div class="text-center">
                <img class="logo-login" src="../../assets/img/logo.png">
            </div>
            <form class="form-login" method="POST" action="ETNA_my_phpmyadmin/login">
                <div class="form-group">
                    <input type="text" class="form-control" name="login" placeholder="login">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="password">
                </div>
                <div class="form-group">
                    <input type="submit" class="submit-login" name="login-submit" value="Login">
                </div>
            </form>
            <?php if (isset($this->array["error"]) == true) { ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Erreur !</strong> Identifiant inconnu
            </div>
            <?php } ?>
        </div>
    </div>
</div>
