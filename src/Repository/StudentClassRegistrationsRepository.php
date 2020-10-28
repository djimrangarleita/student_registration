<?php

namespace App\Repository;

use App\Entity\StudentClassRegistrations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StudentClassRegistrations|null find($id, $lockMode = null, $lockVersion = null)
 * @method StudentClassRegistrations|null findOneBy(array $criteria, array $orderBy = null)
 * @method StudentClassRegistrations[]    findAll()
 * @method StudentClassRegistrations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudentClassRegistrationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StudentClassRegistrations::class);
    }

    // /**
    //  * @return StudentClassRegistrations[] Returns an array of StudentClassRegistrations objects
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
    public function findOneBySomeField($value): ?StudentClassRegistrations
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
