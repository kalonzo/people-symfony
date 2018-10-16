<?php

namespace App\Repository;

use App\Entity\Orp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Orp|null find($id, $lockMode = null, $lockVersion = null)
 * @method Orp|null findOneBy(array $criteria, array $orderBy = null)
 * @method Orp[]    findAll()
 * @method Orp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrpRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Orp::class);
    }

//    /**
//     * @return Orp[] Returns an array of Orp objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Orp
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
