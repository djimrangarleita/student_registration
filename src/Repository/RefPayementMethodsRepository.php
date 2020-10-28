<?php

namespace App\Repository;

use App\Entity\RefPayementMethods;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RefPayementMethods|null find($id, $lockMode = null, $lockVersion = null)
 * @method RefPayementMethods|null findOneBy(array $criteria, array $orderBy = null)
 * @method RefPayementMethods[]    findAll()
 * @method RefPayementMethods[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RefPayementMethodsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RefPayementMethods::class);
    }

    // /**
    //  * @return RefPayementMethods[] Returns an array of RefPayementMethods objects
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
    public function findOneBySomeField($value): ?RefPayementMethods
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
