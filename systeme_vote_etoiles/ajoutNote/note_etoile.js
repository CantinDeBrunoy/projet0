const allEtoiles = document.querySelectorAll('.fa-star'); //récupère toutes les éléments avec la classe "fa-star"
const note = document.querySelector('.note');

init();

function init() {
    allEtoiles.forEach(etoile => { //parcourt tous les éléments qui ont été récupéré dans la variable constante "allEtoiles"
        etoile.addEventListener("click", saveNote) //quand clique se produit, go dans la fonction saveNote
        etoile.addEventListener("mouseover", addCSS); //quand la souris se trouve sur une des étoiles, on va à la fonction addCSS
        etoile.addEventListener("mouseleave", removeCSS); //quand la souris ne se trouve plus sur une des étoiles, on va à la fonction removeCSS
    })
}

function saveNote(e) {
    //console.log(e.target.dataset); //recupère la donnée stockée dans data-etoile de l'event
    //console.log(e.target.nodeName, e.target.nodeType); //recupère le nom ou le type de la balise de l'event (1 dans notre cas)
    removeEventListenerToAllEtoiles(e);

    /*
    ******************************************************
    ICI QUE L'ON RECUPERE LA NOTE QUE L'UTILISATEUR ENTRE
    DONC FAIRE LE GET ... /!\ ICI /!\
    ******************************************************
    */

    note.innerText = `${e.target.dataset.etoile}/10`;
    //note.setAttribute('data-note', e.target.dataset.etoile);
    //penser à le mettre en hidden quand on ne voudra plus l'afficher en front
    //window.location = "http://localhost/p/systeme_vote_etoiles/addNote.php?test=1"
    $.ajax({
        type: "POST",
        url: "addNote.php",
        data: {
            note: e.target.dataset.etoile,
        },
        success: console.log("data send")
        })
}

function removeEventListenerToAllEtoiles() {
    allEtoiles.forEach(etoile => {
        etoile.removeEventListener("click", saveNote);
        etoile.removeEventListener("mouseover", addCSS);
        etoile.removeEventListener("mouseleave", removeCSS);
    });
}

function addCSS(e, css="checked") {
    const etoileSurvole = e.target;
    etoileSurvole.classList.add(css);
    //on ajoute à la balise de l'étoile en question la classe "checked"
    const previousSiblings = getPreviousSiblings(etoileSurvole);
    previousSiblings.forEach(element => element.classList.add(css));

}

function removeCSS(e, css="checked") {
    const etoileSurvole = e.target;
    etoileSurvole.classList.remove(css); 
    //Récupérer toutes les classes de la balise en question et enlever la classe nommée "checked"
    const previousSiblings = getPreviousSiblings(etoileSurvole);
    previousSiblings.forEach(element => element.classList.remove(css));
}

function getPreviousSiblings(element) { //fonction qui récupère tous les éléments qui sont précédés par l'élément actuel
    //console.log("element.previousSibling", element.previousSibling); 
    //renvoie le nœud (node) précédant immédiatement le nœud courant dans la liste childNodes de son parent, ou null s'il s'agit du premier nœud de la liste.
    //https://developer.mozilla.org/fr/docs/Web/API/Node/previousSibling
    let siblings = [];
    const iNodeType = 1;

    while(element = element.previousSibling) {
        if(element.nodeType === iNodeType) {
            siblings.push(element);
        }
    }
    return siblings;
}