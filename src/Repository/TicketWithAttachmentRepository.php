<?php

namespace App\Repository;

use App\Entity\TicketWithAttachment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TicketWithAttachment|null find($id, $lockMode = null, $lockVersion = null)
 * @method TicketWithAttachment|null findOneBy(array $criteria, array $orderBy = null)
 * @method TicketWithAttachment[]    findAll()
 * @method TicketWithAttachment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TicketWithAttachmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TicketWithAttachment::class);
    }

    // /**
    //  * @return TicketWithAttachment[] Returns an array of TicketWithAttachment objects
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
    public function findOneBySomeField($value): ?TicketWithAttachment
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
