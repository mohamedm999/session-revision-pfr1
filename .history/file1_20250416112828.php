<?php
	
interface ReservableInterface{
  
  public function reserver(Client $client, DateTime $dateDebut, int $nbJours): Reservation;

}

abstract class Vehicule{
  
  protected $id ;
  protected $immatriculation ;
  protected $marque ;
  protected $modele ;
  protected $prixJour ;
  protected $disponible  ;
  
  private static $counter ;
  
  
  public function __construct($immatriculation,$marque,$modele,$prixJour,$disponible = true){
    
    $this->id = self::$counter++ ;
    $this->immatriculation = $immatriculation ;
    $this->marque = $marque ;
    $this->modele = $modele ;
    $this->prixJour = $prixJour ;
    $this->disponible = $disponible ;
    
    
  }
  
  public function afficherDetails(){
    
    echo $this->immatriculation." ".$this->marque." ".$this->modele." ".$this->prixJour." ".$this->disponible ;
    
  }
  
  
  public function calculerPrix(int $jours){
    
    return $this->prixJour * $jours ;
  }
  
  public function estDisponible(){
    
    if ($this->disponible = true ){
      
      echo "it's disponible" ;
      
    }else{
      
      echo "is not disponible " ;
    }
  }
  
  abstract public function  getType() ;
  
  public function getPrixJour(){
    
    return $this->prixJour ;
    
  }
  
}


class Voiture extends Vehicule implements ReservableInterface {
  
     private $nbPortes ;
     private $transmission ;
     
     public function __construct($immatriculation,$marque,$modele,$prixJour,$disponible = true,$nbPortes,$transmission){
       
       parent::__construct($immatriculation,$marque,$modele,$prixJour,$disponible = true) ;
       
       $this->nbPortes = $nbPortes ;
       $this->transmission = $transmission ;
       
     }
     
     public function getType(){
       
       return "Voiture";
       
     }
     
      public function afficherDetails(){
    
        echo $this->immatriculation." ".$this->marque." ".$this->modele." ".$this->prixJour." ".$this->disponible." ".$this->nbPortes." ".$this->transmission ;
    
      }
     
     public function reserver(Client $client, DateTime $dateDebut, int $nbJours){
       
       return new Reservation($client,$this,$dateDebut,$nbJours)  ;
       
     }
}

class Moto extends Vehicule implements ReservableInterface {
  
     private $cylindree ;
     
     public function __construct($immatriculation,$marque,$modele,$prixJour,$disponible = true,$cylindree){
       
       parent::__construct($immatriculation,$marque,$modele,$prixJour,$disponible = true) ;
       
       $this->cylindree = $cylindree ;

     }
     
      public function getType(){
       
       return "Moto";
       
     }
     
      public function afficherDetails(){
    
        echo $this->immatriculation." ".$this->marque." ".$this->modele." ".$this->prixJour." ".$this->disponible." ".$this->cylindree ;
    
      }
     
     public function reserver(Client $client, DateTime $dateDebut, int $nbJours){
       
       return new Reservation($client,$this,$dateDebut,$nbJours)  ;
       
     }
  
}


class Camion extends Vehicule implements ReservableInterface {
  
     private $capaciteTonnage ;
     
     public function __construct($immatriculation,$marque,$modele,$prixJour,$disponible = true,$capaciteTonnage){
       
       parent::__construct($immatriculation,$marque,$modele,$prixJour,$disponible = true) ;
       
       $this->capaciteTonnage = $capaciteTonnage ;

     }
     
      public function getType(){
       
       return "Camion";
       
     }    
     
      public function afficherDetails(){
    
        echo $this->immatriculation." ".$this->marque." ".$this->modele." ".$this->prixJour." ".$this->disponible." ".$this->capaciteTonnage;
    
      }
     
     
      public function reserver(Client $client, DateTime $dateDebut, int $nbJours){
       
       return new Reservation($client,$this,$dateDebut,$nbJours)  ; 
       
     }
  
}



abstract class Personne {
  
  protected $nom ;
  protected $prenom ;
  protected $email ;
  
  public function __construct($nom,$prenom,$email){
    
    $this->nom = $nom ;
    $this->prenom = $prenom ;
    $this->email = $email ;

  }
  
  public function afficherProfil(){
    
    echo " ".$this->nom." ".$this->prenom." ".$this->email." " ;
    
  }
  
}

class Client extends Personne {
  
  private $numeroClient ;
  private $reservations  = [] ;
  
    public function __construct($nom,$prenom,$email,$numeroClient){
    
       parent::__construct($nom,$prenom,$email) ;
       
       $this->numeroClient = $numeroClient ;
       
  }
  
  public function ajouterReservation(Reservation $r){
    
    $this->reservations[] = $r ;
    
  }
  
  public function afficherProfil(){
    
     echo " ".$this->nom." ".$this->prenom." ".$this->email." ".$this->numeroClient ;
    
  }
  
  public function getHistorique(){
    
    foreach( $this->reservations as reservation){
      
      reservation->ReservationDetailes();
      
    }

  }

}

class Agence {
  
  private $nom ;
  private $ville ;
  private $vehicules = [] ; 
  private $clients = [] ;
  
  
  public function __construct($nom,$ville){
    
    $this->nom = $nom ;
    $this->ville = $ville ;
  }
  
  public function ajouterVehicule(Vehicule $v){
    return $this->vehicules[] = $v ;
  }
  
  public function enregistrerClient(Client $c){
    return $this->clients[] = $c ;
  }
  
  public function rechercherVehiculeDisponible($type){
    
    foreach($this->vehicules as vehicule){
      
      if(vehicule->disponible = true && vehicule->getType() = $type ){
        return vehicule->afficherDetails() ;
      }
    }
  }
  
  public function faireReservation(Client $client, Vehicule $v, DateTime $dateDebut, int $nbJours){
    
    return new Reservation($client,$this,$dateDebut,$nbJours)  ;
  }
}
	
	
class Reservation {
  
  private Vehicule $vehicule ;
  private Client $client ;
  private $dateDebut ;
  private $nbJours ;
  private $statut ;
  
  public function __construct(Client $client, Vehicule $v, DateTime $dateDebut, int $nbJours){
    
    $this->client = $client ;
    $this->vehicule = $vehicule ;
    $this->dateDebut = $dateDebut ;
    $this->nbJours = $nbJours ;
  }
  
  
  public function calculerMontant(){
    
    return $this->nbJours * $this->vehicule->getPrixJour() ;
    
  }
  
  public function confirmer(){
    return $this->statut = "confirmer" ;
  }
  
  public function annuler(){
    return $this->statut = "annuler" ;
  }
  
  public function ReservationDetailes(){
    
    echo $this->vehicule->afficherDetails() ;
    echo $this->client->afficherProfil() ;
    echo $this->dateDebut." ".$this->nbJours." ".$this->statut ;
  
  }
  
  
  
  
}	
?>