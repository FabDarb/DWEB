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
        <form id="autorisation_form" action="check.php" method="post">
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
                <label for="desc_aut" class="col-sm-2 col-form-label">Description de l'autorisation pour un administrateur</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="desc_aut" name="desc_aut" placeholder="Description"></textarea>
                </div>
            </div>
        </form>
    </div>
</div>