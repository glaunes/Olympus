<?php

namespace Easy\DispoBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * EvenementRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EvenementRepository extends EntityRepository
{
    public function selectProchainsEvenements()
    {
        $requete = $this->createQueryBuilder('e')
                    ->select('e')
                    ->where('e.dateDebut >=\''.date('Y-m-d').'\'')
                    ->setFirstResult(0 )
                    ->setMaxResults(3)
                    ->getQuery()
                    ->getResult();
        
        return $requete;
    }
}