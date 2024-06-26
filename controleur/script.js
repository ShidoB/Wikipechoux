const mot=document.querySelector('#mot');
mot.addEventListener('keyup',selectMot);

function selectMot(event) {
  // annulation de l'évènement par défaut
  event.preventDefault();
  let searchText = $(this).val();
  console.log(searchText);
  if (searchText != "") {
    $.ajax({
      url: "modele/suggestion.php",
      method: "post",
      data: {
        query: searchText,
      },
      success: function (response) {
        displaySuggestions(response);
        //$("#showList").html(response);
       //$("#suggestionsContainer").html(response);
      },
    });
  } else {
    $("#suggestionsContainer").html("");
  }
}

function displaySuggestions(suggestionsText) {
  //suggestionsContainer.innerHTML = '';

  showList.innerHTML='';
  try {
      // Analyser le texte JSON
      var suggestions = JSON.parse(suggestionsText);

      if (suggestions.length > 0) {
          // Afficher chaque suggestion sous la barre de recherche
          suggestions.forEach(function (suggestion) {
              var p = document.createElement('p');
              p.textContent = suggestion.libelle;

              // Ajouter la classe et le style au p
              p.classList.add('suggestion-item');
              p.style.cursor = 'pointer'; // Ajouter le curseur pointer pour indiquer que c'est cliquable

              // Ajouter le style au survol du p
              p.addEventListener('mouseover', function () {
                  p.style.backgroundColor = '#00000037'; // Changer la couleur au survol
              });

              // Remettre la couleur initiale lorsque le survol se termine
              p.addEventListener('mouseout', function () {
                  p.style.backgroundColor = '';
              });

              p.addEventListener('click', function () {
                  // Mettre la suggestion sélectionnée dans le champ de recherche
                  mot.value = suggestion.libelle;
                  // Réinitialiser les suggestions
                  showList.innerHTML='';
                  //suggestionsContainer.innerHTML = '';
              });
              showList.appendChild(p);
              //suggestionsContainer.appendChild(p);
          });
      } else {
          // Aucune suggestion trouvée
          var p = document.createElement('p');
          p.textContent = 'Aucune suggestion trouvée.';
          showList.appendChild(p);
          //suggestionsContainer.appendChild(p);
      }
  } catch (error) {
      console.error('Erreur lors de l\'analyse JSON :', error);
  }
}
// $(document).ready(function () {
//   // Send Search Text to the server
//   console.log("test");
//   $("#mot").keyup(function () {
//     let searchText = $(this).val();
//     console.log("test1");
    // if (searchText != "") {
    //   $.ajax({
    //     url: "modele/suggestion.php",
    //     method: "post",
    //     data: {
    //       query: searchText,
    //     },
    //     success: function (response) {
    //       console.log(response);
    //       $("#suggestionsContainer").html(response);
    //     },
    //   });
    // } else {
    //   $("#suggestionsContainer").html("");
    // }
//   });
//   // Set searched text in input field on click of search button
//   $(document).on("click", "a", function () {
//     $("#mot").val($(this).text());
//     $("#suggestionsContainer").html("");
//   });
// });
