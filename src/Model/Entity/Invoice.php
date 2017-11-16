<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Invoice Entity
 *
 * @property int $InvoiceID
 * @property int $CompanyID
 * @property int $StatusID
 * @property int $ClientID
 * @property string $LocaleCode
 * @property int $TransactionID
 * @property string $DocTypeCode
 * @property int $InvoiceNumber
 * @property string $SaleConditionCode
 * @property \Cake\I18n\FrozenTime $InvoiceDate
 * @property float $Shipping
 * @property float $Tax
 * @property string $Note
 * @property string $EmailSubject
 * @property string $AuthNumber
 * @property \Cake\I18n\FrozenTime $VoidDate
 * @property \Cake\I18n\FrozenTime $PaidDate
 * @property \Cake\I18n\FrozenTime $Entered
 * @property string $EnteredBy
 * @property \Cake\I18n\FrozenTime $Modified
 * @property string $ModifiedBy
 * @property int $CurrencyID
 * @property float $ExchangeRate
 * @property float $TotalSerGravados
 * @property float $TotalSerExtentos
 * @property float $TotalMerGravadas
 * @property float $TotalMerExtentas
 * @property float $TotalGravado
 * @property float $TotalExtento
 * @property float $TotalVenta
 * @property float $Descuentos
 * @property float $TotalVentaNeta
 * @property float $MontoImpConsumo
 * @property float $MontosOtrosImp
 * @property float $TarifaImpuesto
 * @property float $MontoImpVentas
 * @property float $TotalFactura
 * @property float $CreditAmount
 * @property \Cake\I18n\FrozenTime $DueDate
 */
class Invoice extends Entity
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
        'StatusID' => true,
        'ClientID' => true,
        'LocaleCode' => true,
        'TransactionID' => true,
        'DocTypeCode' => true,
        'InvoiceNumber' => true,
        'SaleConditionCode' => true,
        'InvoiceDate' => true,
        'Shipping' => true,
        'Tax' => true,
        'Note' => true,
        'EmailSubject' => true,
        'AuthNumber' => true,
        'VoidDate' => true,
        'PaidDate' => true,
        'Entered' => true,
        'EnteredBy' => true,
        'Modified' => true,
        'ModifiedBy' => true,
        'CurrencyID' => true,
        'ExchangeRate' => true,
        'TotalSerGravados' => true,
        'TotalSerExtentos' => true,
        'TotalMerGravadas' => true,
        'TotalMerExtentas' => true,
        'TotalGravado' => true,
        'TotalExtento' => true,
        'TotalVenta' => true,
        'Descuentos' => true,
        'TotalVentaNeta' => true,
        'MontoImpConsumo' => true,
        'MontosOtrosImp' => true,
        'TarifaImpuesto' => true,
        'MontoImpVentas' => true,
        'TotalFactura' => true,
        'CreditAmount' => true,
        'DueDate' => true
    ];
}
