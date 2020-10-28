<?php

namespace App\Repository;

use App\Entity\RefRelationshipTypes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RefRelationshipTypes|null find($id, $lockMode = null, $lockVersion = null)
 * @method RefRelationshipTypes|null findOneBy(array $criteria, array $orderBy = null)
 * @method RefRelationshipTypes[]    findAll()
 * @method RefRelationshipTypes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RefRelationshipTypesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RefRelationshipTypes::class);
    }

    // /**
    //  * @return RefRelationshipTypes[] Returns an array of RefRelationshipTypes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RefRelationshipTypes
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
