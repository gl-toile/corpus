<?php

namespace App\Repository;

use App\Entity\PhysicalLocation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PhysicalLocation|null find($id, $lockMode = null, $lockVersion = null)
 * @method PhysicalLocation|null findOneBy(array $criteria, array $orderBy = null)
 * @method PhysicalLocation[]    findAll()
 * @method PhysicalLocation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhysicalLocationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PhysicalLocation::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(PhysicalLocation $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(PhysicalLocation $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return PhysicalLocation[] Returns an array of PhysicalLocation objects
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
    public function findOneBySomeField($value): ?PhysicalLocation
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
