<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\TicketMessage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TicketMessage|null find($id, $lockMode = null, $lockVersion = null)
 * @method TicketMessage|null findOneBy(array $criteria, array $orderBy = null)
 * @method TicketMessage[]    findAll()
 * @method TicketMessage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TicketMessageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TicketMessage::class);
    }

    // /**
    //  * @return TicketMessage[] Returns an array of TicketMessage objects
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
    public function findOneBySomeField($value): ?TicketMessage
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
