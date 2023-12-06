<?php

namespace App\Repository;

use App\Entity\Attachement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Attachement>
 *
 * @method Attachement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Attachement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Attachement[]    findAll()
 * @method Attachement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AttachementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Attachement::class);
    }

//    /**
//     * @return Attachement[] Returns an array of Attachement objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Attachement
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
