<?php
/**
 * Created by PhpStorm.
 * Date: 29/03/2018
 * Time: 11:34
 */

namespace Opticity\GestionBundle\service;


use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;

class BaseService
{
    protected $em;
    //private $container;

    //public function __construct(EntityManager $entityManager, Container $container)
    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
        //$this->container = $container;
    }
}