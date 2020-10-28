<?php

namespace App\Repository;

use App\Entity\StudentsRelationships;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StudentsRelationships|null find($id, $lockMode = null, $lockVersion = null)
 * @method StudentsRelationships|null findOneBy(array $criteria, array $orderBy = null)
 * @method StudentsRelationships[]    findAll()
 * @method StudentsRelationships[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudentsRelationshipsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StudentsRelationships::class);
    }

    // /**
    //  * @return StudentsRelationships[] Returns an array of StudentsRelationships objects
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
    public function findOneBySomeField($value): ?StudentsRelationships
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
