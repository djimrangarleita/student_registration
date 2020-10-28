<?php

namespace App\Repository;

use App\Entity\PropertyOwners;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PropertyOwners|null find($id, $lockMode = null, $lockVersion = null)
 * @method PropertyOwners|null findOneBy(array $criteria, array $orderBy = null)
 * @method PropertyOwners[]    findAll()
 * @method PropertyOwners[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertyOwnersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PropertyOwners::class);
    }

    // /**
    //  * @return PropertyOwners[] Returns an array of PropertyOwners objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PropertyOwners
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
