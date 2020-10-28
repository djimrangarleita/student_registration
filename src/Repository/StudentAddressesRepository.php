<?php

namespace App\Repository;

use App\Entity\StudentAddresses;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StudentAddresses|null find($id, $lockMode = null, $lockVersion = null)
 * @method StudentAddresses|null findOneBy(array $criteria, array $orderBy = null)
 * @method StudentAddresses[]    findAll()
 * @method StudentAddresses[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudentAddressesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StudentAddresses::class);
    }

    // /**
    //  * @return StudentAddresses[] Returns an array of StudentAddresses objects
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
    public function findOneBySomeField($value): ?StudentAddresses
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
