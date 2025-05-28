<?php

namespace App\Repository;

use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Category>
 */
class CategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    public function getActive(): array
    {
        $sql = "SELECT cr.* 
                FROM `category` cr 
                LEFT JOIN `cards` ca on ca.category_id = cr.id
                GROUP BY cr.id
                HAVING COUNT(ca.id) > 0 and cr.active = 1;";
        $conn = $this->getEntityManager()->getConnection();
        $stmt = $conn->prepare($sql);
        $q = $stmt->executeQuery();
        $data = $q->fetchAllAssociative();
        $categories = [];
        foreach ($data as $row) {
            $category = $this->find($row['id']);
            if ($category) {
                $categories[] = $category;
            }
        }
        return $categories;
    }

    //    /**
    //     * @return Category[] Returns an array of Category objects
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

    //    public function findOneBySomeField($value): ?Category
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
