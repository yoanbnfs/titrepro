var searchbarPlaceholder = function () {
     $('#search-bar').attr('placeholder', 'Votre recherche');
 };
 $('#search-bar').focus(searchbarPlaceholder);
 $('#search-button').hover(searchbarPlaceholder);
 $('#search-button').click(function(e) {
     e.preventDefault();
     var search = $('#search-bar').val();
     if (search.length > 1) {
         $.post("../../controllers/headerFeatures.php",
                 {
                     searches: search
                 },
                 function (searches) {
                     $.each(searches, function (searchArrayPos, profilDetails) {
                         $('#search-result').append('<a class="btn btn-default btn-block" href="views/userProfil.php?userId=' + profilDetails.id + '">' + profilDetails.lastname + '</a>').slideDown(200);
                     });
                 },
                 "json");              

         $('#search-result').empty();
     }
     $('#search-result').mouseleave(function () {
         $('#search-result').slideUp(400);
     });

 });


