<?php

namespace App\Repository;

use App\Entity\NosServices;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NosServices>
 *
 * @method NosServices|null find($id, $lockMode = null, $lockVersion = null)
 * @method NosServices|null findOneBy(array $criteria, array $orderBy = null)
 * @method NosServices[]    findAll()
 * @method NosServices[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NosServicesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NosServices::class);
    }

    public function save(NosServices $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(NosServices $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function ordre(){
        $service = $this->getEntityManager()
        ->createQuery("SELECT s FROM App\Entity\NosServices s ORDER BY s.titre  DESC")
        ->getResult();

        return $service;
    }

//    /**
//     * @return NosServices[] Returns an array of NosServices objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?NosServices
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
