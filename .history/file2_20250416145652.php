let candidatures = [] ;
let counter = 0 ;


function ajouterCandidature(nom, age, projet) {
    
    let candidature = {
          id: counter++ ,
          nom: nom,
         age: age,
         projet: projet,
         statut: "en attente" 
    }

    candidatures.push(candidature) ;

    return candidature ;
}

function afficherToutesLesCandidatures(candidatures){

    for (let i = 0; i < candidatures.length ; i++) {
        console.log( " id : "+candidatures[i].id+" name : "+candidatures[i].nom+" age : "
            +candidatures[i].age+" projet : "+candidatures[i].projet+" status : "+candidatures[i].statut+"\n \n")
    }
}

function validerCandidature(id){
    // console.log(id)
    for (let i = 0; i < candidatures.length; i++) {
        if (candidatures[i].id == id ) {
            candidatures[i].statut = "validée"  ;
            return " status changed"
        }
    }
}

function rejeterCandidature(id) {
    // console.log(id)
    for (let i = 0; i < candidatures.length; i++) {
        if (candidatures[i].id == id ) {
            candidatures[i]. statut = "rejetée"  ;
            return " status changed"
        }
    }      
}

function rechercherCandidat(nom){

    
    
}
console.log(ajouterCandidature("mohamed",14,"js project"))
console.log(ajouterCandidature("yassine",20,"php project"))
console.log(ajouterCandidature("youssef",22,"react project"))

console.log(validerCandidature(2))
console.log(rejeterCandidature(1))


console.log(afficherToutesLesCandidatures(candidatures)) ;





