var searchbarPlaceholder = function () {
     $('#search-bar').attr('placeholder', 'Votre recherche');
 };
 $('#search-bar').focus(searchbarPlaceholder);
 $('#search-button').hover(searchbarPlaceholder);
 
 $('#search-button').click(function(e) {
     /*
      * J'utilise la méthode préventDefault sur l'evenement en paramètre afin que si l'évenement n'est pas traité explicitement,
      * son action par défaut ne soit pas pris en compte
      */
     e.preventDefault();
     /*
      * Je stocke d'abord ce que je veut récupérer dans ma data dans une variable
      * Ici, la valeur entré dans la search-bar
      */
     var search = $('#search-bar').val();
     /*
      * Si la longueur de ce qui  à été entré est suppérieur à 1 caractère
      * Je commence le traitement
      */
     if (search.length > 1) {
         /*
          * Par la méthode post j'initialise le traitement des donées asynchrone 
          * Puis je cible le controleur avec lequel je travail
          */
         $.post("../../controllers/headerFeatures.php",
                 {
                     /*
                      * je déclare ma data en lui passant ma variable préalablement créer
                      */
                     searches: search
                 },
                 /*
                  * Je demarre ensuite ma fonction de callback en lui passant en paramètre la valeur entré
                  * Afin que le retour coincide bien avec ce qui a été récuperer grâce a la méthode post
                  */
                 function (searches) {
                     /*
                      * Je parcours le tableau Json que me renvois le contrôleur grace a la méthode each
                      * qui prend en paramètre la valeur retourné en post
                      * Puisqu'il faut avoir une action en retour, ce seras une fonction, 
                      * qui prend en paramètre un index et une valeur pour le tableau récupérer depuis le contrôleur 
                      */
                     $.each(searches, function (searchArrayPos, profilDetails) {
                         /*
                          * Mon action seras d'append le résultat ( de l'afficher comme dernier enfant du parent selectionné )
                          * Pour cela je cible directement le champs du tableau a afficher grâce au paramètre de valeur.
                          */
                         $('#search-result').append('<a class="btn btn-default btn-block" href="views/userProfil.php?userId=' + profilDetails.id + '">' + profilDetails.lastname + '</a>').slideDown(200);
                     });
                 },
                 /*
                  * le type de donées que l'on récupère du serveur.
                  */
                 "json");              

         $('#search-result').empty();
     }
     $('#search-result').mouseleave(function () {
         $('#search-result').slideUp(400);
     });

 });


