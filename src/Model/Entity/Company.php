<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Company Entity
 *
 * @property int $CompanyID
 * @property string $LocaleCode
 * @property string $CompanyName
 * @property string $TaxID
 * @property string $CommercialName
 * @property string $Address
 * @property int $AreaCode
 * @property int $Phone
 * @property int $FaxAreaCode
 * @property int $Fax
 * @property string $Email
 * @property string $ReplyTo
 * @property string $Logo
 * @property string $CompanyUrl
 * @property int $CompanyStatus
 * @property string $EmailSubject
 * @property \Cake\I18n\FrozenTime $Entered
 * @property string $EnteredBy
 * @property \Cake\I18n\FrozenTime $Modified
 * @property string $ModifiedBy
 * @property string $CompanyInfo
 * @property string $Processor
 * @property int $AcquirerID
 * @property int $CommerceID
 * @property int $MallID
 * @property string $TerminalID
 * @property string $HexNumber
 * @property string $KeyName
 * @property string $BgColor
 * @property string $BgImage
 * @property int $LastInvoiceNo
 * @property int $LastReceiptNo
 * @property int $InvoiceDays
 * @property int $DayTypeID
 * @property int $CompanyTypeID
 */
class Company extends Entity
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
        'LocaleCode' => true,
        'CompanyName' => true,
        'TaxID' => true,
        'CommercialName' => true,
        'Address' => true,
        'AreaCode' => true,
        'Phone' => true,
        'FaxAreaCode' => true,
        'Fax' => true,
        'Email' => true,
        'ReplyTo' => true,
        'Logo' => true,
        'CompanyUrl' => true,
        'CompanyStatus' => true,
        'EmailSubject' => true,
        'Entered' => true,
        'EnteredBy' => true,
        'Modified' => true,
        'ModifiedBy' => true,
        'CompanyInfo' => true,
        'Processor' => true,
        'AcquirerID' => true,
        'CommerceID' => true,
        'MallID' => true,
        'TerminalID' => true,
        'HexNumber' => true,
        'KeyName' => true,
        'BgColor' => true,
        'BgImage' => true,
        'LastInvoiceNo' => true,
        'LastReceiptNo' => true,
        'InvoiceDays' => true,
        'DayTypeID' => true,
        'CompanyTypeID' => true
    ];
}
