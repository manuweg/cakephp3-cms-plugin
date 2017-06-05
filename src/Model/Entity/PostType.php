<?php
namespace Cms\Model\Entity;

use Cake\ORM\Entity;

/**
 * PostType Entity
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $body
 * @property string $metadescription
 * @property string $metakeywords
 *
 * @property \Cms\Model\Entity\Category[] $categories
 */
class PostType extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
