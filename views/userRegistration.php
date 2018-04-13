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
                                            <label class="form-radio" for="private-reg">Particulier</label>
                                            <input type="radio" id="private-reg" name="registerType" checked value="1" />
                                            <label class="form-radio" for="professional-reg">Professionnel</label>
                                            <input type="radio" id="professional-reg" name="registerType" value="2" />
                                            <fieldset class="user-login form-inputs">
                                                <legend>Informations de connexion</legend>
                                                <div id="mail-control">
                                                    <label class="form-labels" for="mail">Adresse e-mail</label>
                                                    <input class="form-input" type="text" name="mail" placeholder="nom@domaine.fr" />
                                                </div>
                                                <div id="password-control">
                                                    <label class="form-labels" for="password">Mot de passe</label>
                                                    <input class="form-input" type="password" name="password" id="password" placeholder="8 cractères minimum" />
                                                </div>
                                                <p style="padding-top: 20px;"><i id="show-password" class="fas fa-eye"></i>Voir le mot de passe</p>
                                                <div id="confirm-password-control">
                                                    <label class="form-labels" for="confirm-password">Confirmation du mot de passe</label>
                                                    <input class="form-input" type="password" name="confirm-password" placeholder="Confirmez votre mot de passe" />
                                                </div>
                                            </fieldset>   
                                            <fieldset id="user-civil-status">
                                                <legend>Etat Civil</legend>
                                                <div id="lastname-control">
                                                    <label class="form-labels" for="lastname">Nom</label>
                                                    <input class="form-input" type="text" name="lastname" placeholder="Nom de famille" />                                        
                                                </div>
                                                <div id="firstname-control">
                                                    <label class="form-labels" for="lastname">Prénom</label>
                                                    <input class="form-input" type="text" name="firstname" placeholder="Prénom" />                                        
                                                </div>
                                                <div id="name-control">
                                                    <label class="form-labels" for="name">Nom</label>
                                                    <input class="form-input" type="text" name="name" placeholder="Nom ou raison sociale de l'entreprise" />                                        
                                                </div>
                                                <div id="birthdate-control">
                                                    <label class="form-labels" for="birthdate">Date de naissance</label>
                                                    <input class="form-input" id="datepicker" type="date" name="birthdate" data-toggle="datepicker"/>                            
                                                </div>
                                                <div id="subtypes-control">
                                                    <label class="form labels" for="sutypes">Domaine de compétences</label>
                                                    <select id="subtypes" name="subtypes">
                                                        <option></option>
                                                    </select>
                                                </div>
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
