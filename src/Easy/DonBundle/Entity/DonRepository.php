<?php

namespace Easy\DonBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * DonRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DonRepository extends EntityRepository
{
    /*
     * Renvoie la moyenne des dons pour un utilisateur
     */
    public function selectAvgCountUtilisateur($utilisateur)
    {
        $requete = $this->createQueryBuilder('d')
                    ->select('AVG(d.montant) AS Montant')
                    ->where('d.utilisateur='.$utilisateur->getId())
                    ->getQuery()
                    ->getSingleResult();
        
        return $requete;
    }
    
   /*
     * 
     */
    public function findTotalDonsMois()
    {      
        /*$req_mois = '';
        foreach (Don::$mois as $key => $mois) 
        {
            $req_mois .= 'SUM(CASE WHEN month(d.date)='.$key.' THEN d.montant ELSE 0 END) AS '.$mois;
        }
        $requete = $this->createQueryBuilder('d')
                    ->select('u.username,'.$req_mois)
                    ->join('Utilisateur', 'u')
                    ->groupBy('u.id')
                    ->getQuery()
                    ->getResult();
        
        print_r($requete);
        exit(0);*/
    } 
    
    /*
     * Statistiques
     */
    public function selectStatistiquesGlobales()
    {
        
    }
}
