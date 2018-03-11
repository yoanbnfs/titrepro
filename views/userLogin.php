            <?php 
            if ($_SERVER['PHP_SELF'] == '/index.php'){
                include_once 'controllers/userLoginController.php';            
            } else {
                include_once '../controllers/userLoginController.php';          
            }
            if (isset($_SESSION['auth'])){
                ?>
                <a name="logout-button" class="registration-link"><i class="fas fa-user-circle"></i>Déconnection</a>
                <?php
            } else {
            ?>
            <a type="button" name="login-button" class="registration-link" data-toggle="modal" data-target="#login"><i class="fas fa-key"></i> Connexion</a>
            <?php } ?>

            <div id="login" class="modal fade" tabindex="1" role="dialog"><!--INSCRIPTION MODAL-->
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
                                    <label class="form-labels" for="mail-connect">Adresse e-mail</label>
                                    <input class="form-input" type="text" name="mail-connect" placeholder="nom@domaine.fr" />
                                    <label class="form-labels" for="password-connect">Mot de passe</label>
                                    <input class="form-input" type="password" name="password-connect" placeholder="8 cractères minimum" />
                                <div id="validation-group">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Valider</button>                                    
                                </div>
                            </form>
                        </div>                        
                    </div>
                </div>
            </div><!--INSCRIPTION MODAL FIN-->