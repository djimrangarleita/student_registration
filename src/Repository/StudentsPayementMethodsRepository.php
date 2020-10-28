<?php

namespace App\Repository;

use App\Entity\StudentsPayementMethods;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StudentsPayementMethods|null find($id, $lockMode = null, $lockVersion = null)
 * @method StudentsPayementMethods|null findOneBy(array $criteria, array $orderBy = null)
 * @method StudentsPayementMethods[]    findAll()
 * @method StudentsPayementMethods[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudentsPayementMethodsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StudentsPayementMethods::class);
    }

    // /**
    //  * @return StudentsPayementMethods[] Returns an array of StudentsPayementMethods objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StudentsPayementMethods
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
