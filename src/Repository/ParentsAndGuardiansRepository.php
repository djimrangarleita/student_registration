<?php

namespace App\Repository;

use App\Entity\ParentsAndGuardians;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ParentsAndGuardians|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParentsAndGuardians|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParentsAndGuardians[]    findAll()
 * @method ParentsAndGuardians[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParentsAndGuardiansRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ParentsAndGuardians::class);
    }

    // /**
    //  * @return ParentsAndGuardians[] Returns an array of ParentsAndGuardians objects
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
    public function findOneBySomeField($value): ?ParentsAndGuardians
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
