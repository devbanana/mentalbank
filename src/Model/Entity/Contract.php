<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contract Entity
 *
 * @property string $id
 * @property \Cake\I18n\FrozenDate $date
 * @property float $goal
 * @property string $user_id
 * @property string $mental_bank_id
 *
 * @property \CakeDC\Users\Model\Entity\User $user
 * @property \App\Model\Entity\MentalBank $mental_bank
 * @property \App\Model\Entity\ValueEvent[] $value_events
 */
class Contract extends Entity
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
        'date' => true,
        'goal' => true,
        'user_id' => true,
        'mental_bank_id' => true,
        'user' => true,
        'mental_bank' => true,
        'value_events' => true
    ];
}
