<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CompanyBank Entity
 *
 * @property int $CompanyID
 * @property int $BankID
 * @property int $CurrencyID
 * @property int $BankOrder
 * @property string $AccountNumber
 * @property string $SINPE
 * @property \Cake\I18n\FrozenTime $Entered
 * @property string $EnteredBy
 * @property string $ModifiedBy
 * @property \Cake\I18n\FrozenTime $Modified
 */
class CompanyBank extends Entity
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
        'BankOrder' => true,
        'AccountNumber' => true,
        'SINPE' => true,
        'Entered' => true,
        'EnteredBy' => true,
        'ModifiedBy' => true,
        'Modified' => true
    ];
}
