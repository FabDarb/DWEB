<?php
require("./config/config.inc.php");
require(WAY . "/includes/head.inc.php");
?>
        <div class="row">
            <div class="header">
                <h3>Inscription Qwer1234@</h3>
            </div>
        </div>
        <div class="panel with panel-primary class">
            <div class="panel-heading">
                Inscription au portail de jeux
            </div>
            <div class="panel-body">
                <form id="inscription_form" action="check.php" method="post">
                    <div class="form-group row">
                        <label for="nom_per" class="col-sm-2 col-form-label">Nom</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nom_per" name="nom_per" placeholder="votre nom">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="prenom_per" class="col-sm-2 col-form-label">Prénom</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="prenom_per" name="prenom_per" placeholder="votre prénom">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email_per" class="col-sm-2 col-form-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email_per" name="email_per" placeholder="votre adresse e-mail">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Mot de passe</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password" placeholder="votre mot de passe">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password_conf" class="col-sm-2 col-form-label">Password<br>(confirmation)</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password_conf" name="password_conf" placeholder="Saisissez votre mot de passe une seconde fois">
                        </div>
                    </div>
                    <div class="form-group row col-sm-7">
                        <div class="col-sm-3"></div>
                        <label for="news_letter" class="col-sm-8">
                            <input type="checkbox" id="news_letter" name="news_letter" value="0">
                            la formation d'informaticien m'interesse</label>
                    </div>
                    <div class="form-group row col-sm-8 pull-right">
                        <input type="button" value="Annuler" id="reset_conf" name="reset_conf" class="col-sm-3 btn btn-warning pull-right">
                        <div class="col-sm-1 pull-right"></div>
                        <input type="submit" value="S'inscrire" class="btn btn-primary col-sm-3 pull-right">
                    </div>
                </form>
            </div>
            <div class="panel-footer">
            </div>
        </div>

    <script src="./js/inscription.js"></script>

</body>
</html>