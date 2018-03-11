            <?php 
            if ($_SERVER['PHP_SELF'] == '/index.php'){
                include_once 'controllers/userRegController.php';            
            } else {
                include_once '../controllers/userRegController.php';          
            }
            
            if (isset($_SESSION['auth'])){
                ?>
                <a name="account-button" class="registration-link"><i class="fas fa-user-circle"></i>Profil</a>
                <?php
            } else {
            ?>
                <a name="registration-button" class="registration-link" data-toggle="modal" data-target="#registration"><i class="fas fa-lock"></i> Inscription</a>
            <?php } ?>
            <div id="registration" class="modal fade" tabindex="1" role="dialog"><!--INSCRIPTION MODAL-->
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h5 id="registration-title">Inscription</h5>
                        </div>
                        <div class="modal-body">
                            <form class="registration-form" action="#" method="POST">
                                <fieldset class="login form-inputs">
                                    <legend>Informations de connexion</legend>
                                    <div id="mail-control">
                                        <label class="form-labels" for="mail">Adresse e-mail</label>
                                        <input class="form-input" type="text" name="mail" placeholder="nom@domaine.fr" />
                                    </div>
                                    <div id="password-control">
                                        <label class="form-labels" for="password">Mot de passe</label>
                                        <input class="form-input" type="password" name="password" placeholder="8 cractères minimum" />
                                    </div>
                                    <p><i id="show-password" class="fas fa-eye"></i>Voir le mot de passe</p>
                                </fieldset>   
                                <fieldset id="civil-status row">
                                    <legend>Etat Civil</legend>
                                    <div id="lastname-control">
                                        <label class="form-labels" for="lastname">Nom</label>
                                        <input class="form-input" type="text" name="lastname" placeholder="Nom de famille" />                                        
                                    </div>
                                    <div id="firstname-control">
                                        <label class="form-labels" for="lastname">Prénom</label>
                                        <input class="form-input" type="text" name="firstname" placeholder="Prénom" />                                        
                                    </div>
                                    <label class="form-labels" for="birthdate">Date de naissance</label>
                                    <input class="form-input" id="datepicker" type="date" name="birthdate" data-toggle="datepicker"/>
                                </fieldset>
                                <div id="validation-group">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Valider</button>                                    
                                </div>
                            </form>
                        </div>                        
                    </div>
                </div>
            </div><!--INSCRIPTION MODAL FIN-->
