<?php

namespace App\Repository;

use App\Entity\Corte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Corte|null find($id, $lockMode = null, $lockVersion = null)
 * @method Corte|null findOneBy(array $criteria, array $orderBy = null)
 * @method Corte[]    findAll()
 * @method Corte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CorteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Corte::class);
    }

//    /**
//     * @return Corte[] Returns an array of Corte objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Corte
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
