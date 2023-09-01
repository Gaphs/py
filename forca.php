<?php
include_once('conexao.php');
  $tema = $_POST['radio'];
  $sql = "SELECT palavra, dica FROM palavras p  WHERE p.tipo = $tema order by RAND() limit 1;";
  $query = mysql_query($sql);
  $row = mysql_fetch_array($query);

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Jogo da Forca</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="pirata.css">
  <link rel="stylesheet" href="forca.css">

</head>

<body>
  <img src="letras.png" alt="" class="letras">

  <button id="btn-dica">Dica</button>
  <div id="dica-content">
    <p id="dica-text"></p>
  </div>

  <a href="tela_tema.html"><button id="voltar">Voltar</button></a>


  <div id="guessesContainer"></div> <!-- Um contêiner vazio onde as tentativas do jogador serão exibidas. -->

  <div id="wordContainer"></div> <!-- Um contêiner vazio onde as letras da palavra a ser adivinhada serão exibidas. -->

  <div id="message"></div>

  <div class="quadro">
    <img src="jack.png" class="img" width="100%">
    <div class="perna1">
      <br><br>
      <img src="pernadojack.png" width="100%" class="img">
    </div>
    <div class="perna2">
      <br><br>
      <img src="pernadojack.png" width="100%" class="img">
    </div>
  </div>
  <script src="dica.js"></script>

  <script>
    var pernaum = document.querySelector(".perna1");
    var pernadois = document.querySelector(".perna2");
    var quadro = document.querySelector(".quadro");
    var words[palavra = <?=$row['palavra']?>, dica = <?=$row['dica']?>, tentativas = 5];
    var word;
    var maxWrongGuesses;
    var guesses = [];
    var remainingWords = [];
    function objetos() {
      if (remainingWords.length === 0) {
        remainingWords = words.slice(); // Faz uma cópia das palavras
      }
      if (remainingWords.length > 0) {
        var randomIndex = Math.floor(Math.random() * remainingWords.length);
        var wordData = remainingWords.splice(randomIndex, 1)[0];
        word = wordData.palavra;
        maxWrongGuesses = wordData.tentativas;
        guesses = [];
        displayWord();
        displayGuesses();
        displayMessage("");
        var dicaElement = document.getElementById('dica-text');
        dicaElement.textContent = " " + wordData.dica;
        document.removeEventListener("keydown", handleGuess);
        document.addEventListener("keydown", handleGuess);
      }
    }
    function displayWord() {
      var wordContainer = document.getElementById("wordContainer");
      wordContainer.innerHTML = "";
      for (var i = 0; i < word.length; i++) {
        var letter = word[i];
        var letterSpan = document.createElement("span");
        if (guesses.includes(letter) || !isLetter(letter)) {
          letterSpan.textContent = letter;
        } else {
          letterSpan.textContent = "_";
        }
        wordContainer.appendChild(letterSpan);
      }
    }
    function displayGuesses() {
      var guessesContainer = document.getElementById("guessesContainer");
      guessesContainer.textContent = " " + guesses.join(", ");
    }
    function displayMessage(message) {
      var messageElement = document.getElementById("message");
      messageElement.textContent = message;
    }
    function isLetter(str) {
      return str.length === 1 && str.match(/[a-z]/i);
    }
    function checkWin() {
      if (
        word.split("").every(function (letter) {
          return guesses.includes(letter) || !isLetter(letter);
        })
      ) {
        document.removeEventListener("keydown", handleGuess);
        setTimeout(() => {
                window.location.assign("ganhou.html")
              }, 3000);
      }

    }
    function checkLose() {
      var wrongGuesses = guesses.filter(function (guess) {
        return !word.includes(guess);
      }).length;
      if (wrongGuesses >= maxWrongGuesses) {
        document.removeEventListener("keydown", handleGuess);
      }
    }
    function handleGuess(event) {
      var guess = event.key.toLowerCase();
      if (!guesses.includes(guess)) {
        if (word.includes(guess)) {
          guesses.push(guess);
          displayWord();
          displayGuesses();
          checkWin();
        } else {
          if (!isLetter(guess)) {
            return; // Ignora tentativas inválidas (não são letras)
          }
          guesses.push(guess);
          displayGuesses();
          checkLose();
          pernaum.style.animation = "passo 1s linear 10";
          pernadois.style.animation = "passo 1s linear 0.5s 9";
          quadro.classList.add("andar");
          var andas = document.querySelector(".andar");
          quadro.style.animationPlayState = "running";
          pernaum.addEventListener("animationend", reiniciar);
          pernadois.addEventListener("animationend", reiniciar);
          quadro.addEventListener("animationend", reiniciar);

          tempo = setTimeout(function () {
            andas.style.animationPlayState = "paused";
            pernadois.style.animationPlayState = "paused";
            pernaum.style.animationPlayState = "paused";
          }, 2000)
          function reiniciar() {
            clearTimeout(tempo);
            quadro.classList.remove("andar");
            quadro.classList.add("cair");
            console.log("finalizou");
            setTimeout(() => {
              window.location.assign("perdeu.html")
            }, 3000);
          }
        }
      }
    }
    objetos();
  </script>

</body>

</html>