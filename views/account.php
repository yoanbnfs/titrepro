<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();    
}
require_once '../assets/php/functions.php';
noLogged();
include_once 'header.php';
include '../controllers/accountController.php';
?>

            <div class="row">
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <?php if ($_SESSION['auth']['type'] == 'particulier') { ?>
                            <h2><?= $_SESSION['auth']['lastname'] . ' ' . $_SESSION['auth']['firstname']?></h2>
                            <?php } else { ?>
                            <h2><?= $_SESSION['auth']['name']?></h2><?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <img src="../assets/img/skippy.jpg" height="150" alt="avatar"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <p>Type d'utilisateur : <?= $_SESSION['auth']['type'] ?></p>                                
                            <p>Date d'inscription : <?= $_SESSION['auth']['confirmed_at'] ?></p>                                
                            <form action="#" method="POST">
                                <?php if ($_SESSION['auth']['type'] == 'particulier') { ?>
                                <div id="profil-lastname-control">
                                    <label class="form-labels" for="profil-lastname">Nom : </label>
                                    <input class="form-input account-inputs" type="text" name="profil-lastname" id="profil-lastname" readonly value="<?= $_SESSION['auth']['lastname'] ?>" />                                
                                </div>
                                <div id="profil-firstname-control">
                                    <label class="form-labels" for="profil-firstname">Prenom : </label>
                                    <input class="form-input account-inputs" type="text" name="profil-firstname" id="profil-firstname" readonly value="<?= $_SESSION['auth']['firstname'] ?>" />                                
                                </div>
                                <div id="profil-old-control">
                                    <label class="form-labels" for="profil-birthdate">Age : </label>
                                    <input class="form-input account-inputs" type="text" name="profil-old" id="profil-birthdate" readonly value="<?= $_SESSION['auth']['birthdate'] ?>" />                                
                                </div>
                                <?php } else { ?>
                                <div id="profil-name-control">
                                    <label class="form-labels" for="profil-name">Nom : </label>
                                    <input class="form-input account-inputs" type="text" name="profil-name" id="profil-name" readonly value="<?= $_SESSION['auth']['name'] ?>" />                                   
                                </div>
                                <?php } ?>       
                                <div id="profil-mail-control">
                                    <label class="form-labels" for="profil-mail">adresse mail : </label>
                                    <input class="form-input account-inputs" type="text" name="profil-mail" id="profil-mail" readonly value="<?= $_SESSION['auth']['mail'] ?>" />
                                </div>                                  
                                <?php if (isset($_SESSION['auth']['subType'])){ ?>
                                <div id="profil-subtype-control">
                                    <label class="form-labels" for="profil-subtype">Domaine : </label>
                                    <input class="form-input account-inputs" type="text" name="profil-subtype" id="profil-subtype" readonly value="<?= $_SESSION['auth']['subType'] ?>" />
                                </div>
                                <?php } ?>
                                <div class="profil-submit-control">
                                    <input type="button" name="update" id="profil-update" class="btn btn-info" value="Modifier mes information" />
                                    <input type="submit" name="profil-submit" id="profil-submit" class="btn btn-success hidden" value="valider les changements" />
                                    <input type="button" name="delete" id="profil-delete" class="btn btn-danger hidden" data-toggle="modal" data-target="#confirmation" value="supprimer mon compte" />
                                </div>
                            </form>                           
                            <div id="confirmation" class="modal fade" tabindex="1" role="dialog"><!--INSCRIPTION MODAL-->
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h5 id="login-title">Connexion</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form class="login-form" action="#" method="POST">
                                                <label class="form-labels" for="password-delete">Mot de passe</label>
                                                <input class="form-input" type="password" name="password-delete" id="password-delete" placeholder="nom@domaine.fr" />                                                    
                                                <div id="validation-group">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                    <button type="submit" id="submit" name="submit-connect" class="btn btn-primary">Valider</button>                                    
                                                </div>
                                            </form>
                                        </div>                        
                                    </div>
                                </div>
                            </div><!--INSCRIPTION MODAL FIN-->
                        </div>
                    </div>
                </div>
            </div>
        <script src="../assets/js/updateAccount.js"></script>
        <?php include_once 'footer.php' ?>    
