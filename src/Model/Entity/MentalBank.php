<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MentalBank Entity
 *
 * @property string $id
 * @property string $current_contract_id
 * @property float $balance
 * @property string $user_id
 *
 * @property \App\Model\Entity\Contract[] $contracts
 * @property \CakeDC\Users\Model\Entity\User $user
 */
class MentalBank extends Entity
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
        'current_contract_id' => true,
        'balance' => true,
        'user_id' => true,
        'contracts' => true,
        'user' => true
    ];
}
