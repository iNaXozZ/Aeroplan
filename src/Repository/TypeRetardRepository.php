<?php

namespace App\Repository;

use App\Entity\TypeRetard;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeRetard|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeRetard|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeRetard[]    findAll()
 * @method TypeRetard[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeRetardRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeRetard::class);
    }

    // /**
    //  * @return TypeRetard[] Returns an array of TypeRetard objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeRetard
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
