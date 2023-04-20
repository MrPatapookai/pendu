// Définition des variables
let word = "";
let hiddenWord = "";
let attempts = 10;
const wordList = ["ordinateur", "programmation", "javascript", "html", "css", "développeur"];
const hangmanParts = Array.from(document.querySelectorAll("#hangman > *"));

// Cacher toutes les parties du pendu
hangmanParts.forEach(part => part.style.display = "none");

// Sélection d'un mot aléatoire dans la liste
word = wordList[Math.floor(Math.random() * wordList.length)];

// Initialisation du mot caché
for (let i = 0; i < word.length; i++) {
    hiddenWord += "_";
}
document.querySelector(".word").textContent = hiddenWord;

// Gestion de la saisie utilisateur
const letterInput = document.querySelector("#letter-input");
const submitButton = document.querySelector("#submit-button");
const attemptsSpan = document.querySelector("#attempts");
const propositionInput = document.querySelector("#proposition");
const propositionButton = document.querySelector("#valider");
const lettersProposees = [];
const lettersContainer = document.querySelector(".letters-proposed");

submitButton.addEventListener("click", function () {
    const letter = letterInput.value.toLowerCase();

    if (word.includes(letter)) {
        // La lettre est dans le mot
        for (let i = 0; i < word.length; i++) {
            if (word[i] === letter) {
                hiddenWord = hiddenWord.substring(0, i) + letter + hiddenWord.substring(i + 1);
            }
        }
        document.querySelector(".word").textContent = hiddenWord;

        if (!hiddenWord.includes("_")) {
            // Le joueur a gagné
            alert("Bravo, vous avez gagné ! Le mot était : " + word);
            window.location.href = "index.php";
        }

    } else {
        // La lettre n'est pas dans le mot
        attempts--;
        attemptsSpan.textContent = attempts;

        if (attempts === 0) {
            // Le joueur a perdu
            alert("Désolé, vous avez perdu. Le mot était : " + word);
            window.location.href = "index.php";
        } else {
            // Dessin du pendu
            if (attempts === 1) {
                hangmanParts[8].style.display = "block";
            } else {
                hangmanParts[9 - attempts].style.display = "block";
            }
        }
    }

    letterInput.value = "";
});

propositionButton.addEventListener("click", function () {
    const letter = propositionInput.value.toLowerCase();
    lettersProposees.push(letter);
    let letterDiv = document.createElement("div");
    letterDiv.textContent = letter;
    lettersContainer.appendChild(letterDiv);
    propositionInput.value = "";
});

propositionInput.addEventListener("input", function () {
    const letter = propositionInput.value.toLowerCase();
    let dejaProposee = lettersProposees.includes(letter);
    let estLettre = /^[a-z]$/.test(letter);
    if (estLettre && !dejaProposee) {
        propositionButton.disabled = false;
        document.querySelector(".proposed-letter").textContent = letter;
    } else {
        propositionButton.disabled = true;
        document.querySelector(".proposed-letter").textContent = "";
    }
});
