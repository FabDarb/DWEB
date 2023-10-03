<?php
require("./../config/config.inc.php");
require(WAY . "/includes/head.inc.php")
?>

    <div class="row">
        <div class="header">
            <h3>Fonctions</h3>
        </div>
    </div>
    <div class="panel with panel-primary class">
        <div class="panel-heading">
            Ajouter une fonction
        </div>
        <div class="panel-body">
            <form id="fonction_form" action="check.php" method="post">
                <div class="form-group row">
                    <label for="nom_fnc" class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nom_fnc" name="nom_fnc" placeholder="Nom de la fonction">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="abr_fnc" class="col-sm-2 col-form-label">Abreviation de la fonction</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="abr_fnc" name="abr_fnc" placeholder="Abreviation">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="desc_fnc" class="col-sm-2 col-form-label">Description de la fonction</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="desc_fnc" name="desc_fnc" placeholder="Abreviation"></textarea>
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
