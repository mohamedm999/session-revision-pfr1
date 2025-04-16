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

    for (let i = 0; i < i < candidatures.length; i++) {
        if (candidatures[i].nom == nom) {
            return candidatures[i] ;
        }
    }    
}

function filtrerParStatut(statut) {
        for (let i = 0; i < i < candidatures.length; i++) {
        if (candidatures[i].statut == statut) {
            return candidatures[i] ;
        }
    }    
}

function statistiques() {

    let Total_candidatures = 0 ;
    let Validees  = 0 ; 
    let Rejetees  = 0 ;
    let En_attente = 0 ;

    for (let i = 0; i < candidatures.length ; i++) {
        Total_candidatures ++ ;
        if (candidatures[i].statut =  "en attente") {
            En_attente++
        }

        if (candidatures[i].statut =  "rejetée") {
            Rejetees++
        }

        if (candidatures[i].statut = "validée" ) {
            Validees++    
        }
        
    }
  console.log(" Total_candidatures : "+Total_candidatures+" en attente : "+En_attente
                   +" rejetée :"+Rejetees+" validée : "+Validees) ;
    
}


console.log(ajouterCandidature("mohamed",14,"js project"))
console.log(ajouterCandidature("yassine",20,"php project"))
console.log(ajouterCandidature("youssef",22,"react project"))

console.log(validerCandidature(2))
console.log(rejeterCandidature(1))

console.log(rechercherCandidat("mohamed"))
console.log(filtrerParStatut("en attente"))
console.log(statistiques());


console.log(afficherToutesLesCandidatures(candidatures)) ;





