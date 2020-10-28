<?php

namespace App\Repository;

use App\Entity\RefAddressTypes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RefAddressTypes|null find($id, $lockMode = null, $lockVersion = null)
 * @method RefAddressTypes|null findOneBy(array $criteria, array $orderBy = null)
 * @method RefAddressTypes[]    findAll()
 * @method RefAddressTypes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RefAddressTypesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RefAddressTypes::class);
    }

    // /**
    //  * @return RefAddressTypes[] Returns an array of RefAddressTypes objects
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
    public function findOneBySomeField($value): ?RefAddressTypes
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
