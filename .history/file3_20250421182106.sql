USE freelance_platform;


-- Afficher les freelances qui parlent l’anglais (langues.nom = 'Anglais') avec un niveau avancé.
select nom from utilisateurs u inner join profils p on u.id = p.utilisateur_id inner join profil_langue pl on p.id = pl.profil_id
where u.role = "freelance" and pl.niveau = "avancé" ;

-- Lister les freelances ayant plus de 3 compétences.
select nom,count(competence_id) as number_competence from utilisateurs u inner join profils p on u.id = p.utilisateur_id inner join profil_competence pc
on p.id = pc.profil_id  where u.role = "freelance" having number_competence > 3  ;

-- Afficher les freelances disponibles, leur tarif horaire et leur ville.
select nom,tarif_horaire,disponible from utilisateurs u inner join profils p on u.id = p.utilisateur_id ;

-- Lister tous les utilisateurs qui ne possèdent pas encore de profil.
select nom from utilisateurs u inner join profils p on u.id = p.utilisateur_id where p.id is null ;

-- Afficher les clients qui n'ont jamais publié de projet.
select nom  from utilisateurs u inner join  Projets p on u.id = p.client_id where p.id is null ;

-- Afficher les projets ouverts avec leur budget et leur nombre total d’offres reçues.
-- select titre,budget from projets p inner join  where p.statut = "ouvert" 

-- Lister les offres envoyées par des freelances dont le tarif horaire est inférieur à 100 MAD
select o.* from utilisateurs u inner join profils p on u.id = p.utilisateur_id inner join offres o where  u.role = "freelance" and p.tarif_horaire < 100 ;

-- Afficher les projets qui ont reçu au moins 3 offres.
select p.*,count(o.id) as Number_offres from  projets p inner join offres o on p.id = o.projet_id having Number_offres >= 3 ;

-- Afficher les freelances qui ont postulé sur plus de 5 projets différents.
select u.nom,count(p.id) as number_project from utilisateurs u inner join  Projets p on u.id = p.client_id  
group by p.titre having u.role = "freelance" and number_project > 5 ;

-- Afficher les projets terminés avec les dates de début et de fin des missions associées.
select * from projets p inner join offres o on p.id = o.projet_id inner join missions m on o.id = m.offre_id where p.statut = "terminé"  ; 

--  Lister les factures payées avec le nom du freelance, le montant, et le moyen de paiement.
select f.*,u.nom,avg(montant) from factures f inner join missions m on f.mission_id = m.id inner join offres o on o.id = m.offre_id inner join 
utilisateurs u on o.freelance_id = u.id where u.role = "freelance" and f.paye = true ;









