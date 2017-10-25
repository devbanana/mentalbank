<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use CakeDC\Users\Model\Table\UsersTable as MyUsersTable;

/**
 * Users Model
 *
 * @property |\Cake\ORM\Association\HasMany $Contracts
 * @property |\Cake\ORM\Association\HasMany $MentalBanks
 * @property \CakeDC\Users\Model\Table\SocialAccountsTable|\Cake\ORM\Association\HasMany $SocialAccounts
 */
class UsersTable extends MyUsersTable
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('username');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Contracts', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('MentalBanks', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('SocialAccounts', [
            'foreignKey' => 'user_id'
        ]);
    }

}
