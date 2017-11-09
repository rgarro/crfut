<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Client Entity
 *
 * @property int $ClientID
 * @property int $CompanyID
 * @property string $Email
 * @property string $ExtraEmails
 * @property int $ClientStatus
 * @property string $CommercialName
 * @property \Cake\I18n\FrozenTime $Entered
 * @property string $EnteredBy
 * @property \Cake\I18n\FrozenTime $Modified
 * @property string $ModifiedBy
 * @property string $CedulaJuridica
 * @property string $ForeginTaxID
 * @property string $ClientName
 * @property string $Address
 * @property string $AreaCode
 * @property string $Phone
 * @property string $ForeginPhone
 */
class Client extends Entity
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
        'CompanyID' => true,
        'Email' => true,
        'ExtraEmails' => true,
        'ClientStatus' => true,
        'CommercialName' => true,
        'Entered' => true,
        'EnteredBy' => true,
        'Modified' => true,
        'ModifiedBy' => true,
        'CedulaJuridica' => true,
        'ForeginTaxID' => true,
        'ClientName' => true,
        'Address' => true,
        'AreaCode' => true,
        'Phone' => true,
        'ForeginPhone' => true
    ];
}
