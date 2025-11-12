<?php

namespace App\Repository;

use App\Entity\Velo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Velo>
 */
class VeloRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Velo::class);
    }

    //    /**
    //     * @return Velo[] Returns an array of Velo objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('v')
    //            ->andWhere('v.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('v.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Velo
    //    {
    //        return $this->createQueryBuilder('v')
    //            ->andWhere('v.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
    

    /*
        * recupere TOUS les velos
    */
    public function findAllVelo(): array
    {
        return $this->findAll();
    }

    /*
        * recupere le premier velos (votre myBike de votre fixture)
    */
    public function findFirstVelo(): ?Velo
    {
        return $this->findOneBy([], ['id' => 'ASC']);
    }

    /*
        * Recuperer les velos en promotion
    */
    public function findVelosEnPromotion(): array
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.estEnPromotion = :promotion')
            ->setParameter('promotion', true)
            ->orderBy('v.dateAjout', 'DESC')
            ->getQuery()
            ->getResult();
    }

}
