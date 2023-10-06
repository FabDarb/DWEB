<?php
require("./../config/config.inc.php");
require(WAY . "/includes/head.inc.php");
?>

<div class="row">
    <div class="header">
        <h3>Autorisations</h3>
    </div>
</div>
<div class="panel with panel-primary class">
    <div class="panel-heading">
        Ajouter une autorisation
    </div>
    <div class="panel-body">
        <form id="autorisation_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group row">
                <label for="nom_aut" class="col-sm-2 col-form-label">Nom</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nom_aut" name="nom_aut" placeholder="Nom de l'autorisation">
                </div>
            </div>
            <div class="form-group row">
                <label for="code_aut" class="col-sm-2 col-form-label">Code de l'autorisation</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="code_aut" name="code_aut" placeholder="XXX">
                </div>
            </div>
            <div class="form-group row">
                <label for="desc_aut_a" class="col-sm-2 col-form-label">Description de l'autorisation pour un administrateur</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="desc_aut_a" name="desc_aut_a" placeholder="Description"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="desc_aut_u" class="col-sm-2 col-form-label">Description de l'autorisation pour un utilisateur</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="desc_aut_u" name="desc_aut_u" placeholder="Description"></textarea>
                </div>
            </div>
            <div class="form-group row col-sm-8 pull-right">
                <input type="button" value="Annuler" id="reset_conf" name="reset_conf" class="col-sm-3 btn btn-warning pull-right">
                <div class="col-sm-1 pull-right"></div>
                <input type="submit" value="Ajouter" class="btn btn-primary col-sm-3 pull-right">
            </div>
        </form>
    </div>
</div>
    <script src="./js/autorisations.js"></script>

</body>
</html>