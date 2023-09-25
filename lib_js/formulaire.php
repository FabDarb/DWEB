<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>inscription</title>

    <!-- css de bootatrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <!-- JQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- JQuery validate -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


</head>
<body>
    <div class="container">
        <div class="row">
            <div class="header">
                <h3>Inscription</h3>
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
                            <input type="password" class="form-control" id="a" name="password" placeholder="votre mot de passe">
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
                            <input type="checkbox" id="news_letter" name="news_letter" value="1">
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
    </div>
    <script src="./js/inscription.js"></script>
</body>
</html>