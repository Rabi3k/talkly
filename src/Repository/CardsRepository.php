<?php

namespace App\Repository;

use App\Entity\Cards;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\VarDumper\VarDumper;

/**
 * @extends ServiceEntityRepository<Cards>
 */
class CardsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cards::class);
    }

    public function findByCategory($categoryId): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.category_id = :categoryId')
            ->setParameter('categoryId', $categoryId)
            ->orderBy('c.id', 'ASC')
            ->getQuery()
            ->getResult();
    }
    public function findOneRandomCard($categoryUuid): ?Cards
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT cr.* FROM cards cr
            LEFT JOIN category c ON cr.category_id = c.id
            WHERE c.uuid = UNHEX(REPLACE(:uuid, "-", ""))
            ORDER BY RAND()
            LIMIT 1';

        $stmt = $conn->prepare($sql);
        $stmt->bindValue('uuid', $categoryUuid);
        $result = $stmt->executeQuery();
     

        $data = $result->fetchAssociative();


        // VarDumper::dump($categoryUuid);
        // VarDumper::dump($stmt);
        // VarDumper::dump($sql);
        // VarDumper::dump($result);
        // VarDumper::dump($data);
        // VarDumper::dump($this->find($data['id']));
        // If no card is found, return null
        
        return $data ? $this->find($data['id']) : new Cards();
    }

//    /**
//     * @return Cards[] Returns an array of Cards objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Cards
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
