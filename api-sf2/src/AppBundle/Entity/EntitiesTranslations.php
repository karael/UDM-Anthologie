<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntitiesTranslations
 *
 * @ORM\Table(name="entities_translations")
 * @ORM\Entity
 */
class EntitiesTranslations
{
    use ORMBehaviors\SoftDeletable\SoftDeletable,
        ORMBehaviors\Timestampable\Timestampable
    ;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="text_translated", type="string", length=45, nullable=true)
     */
    private $textTranslated;

    /**
     * @ManyToOne(targetEntity="Entities", inversedBy="entity")
     * @JoinColumn(name="entity_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $entityTranslations;

    /**
     * @ManyToOne(targetEntity="Languages")
     * @JoinColumn(name="language_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $language;
}

