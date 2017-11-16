<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InvoicesFixture
 *
 */
class InvoicesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'InvoiceID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'CompanyID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'StatusID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ClientID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'LocaleCode' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'TransactionID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'DocTypeCode' => ['type' => 'string', 'length' => 2, 'null' => true, 'default' => '01', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'InvoiceNumber' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'SaleConditionCode' => ['type' => 'string', 'length' => 2, 'null' => true, 'default' => '01', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'InvoiceDate' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'Shipping' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'Tax' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'Note' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'EmailSubject' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'AuthNumber' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'VoidDate' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'PaidDate' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'Entered' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'EnteredBy' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => 'System', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'ModifiedBy' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'CurrencyID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ExchangeRate' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '1.00', 'comment' => ''],
        'TotalSerGravados' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'TotalSerExtentos' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'TotalMerGravadas' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'TotalMerExtentas' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'TotalGravado' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'TotalExtento' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'TotalVenta' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'Descuentos' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'TotalVentaNeta' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'MontoImpConsumo' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'MontosOtrosImp' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'TarifaImpuesto' => ['type' => 'decimal', 'length' => 10, 'precision' => 3, 'unsigned' => false, 'null' => true, 'default' => '0.130', 'comment' => ''],
        'MontoImpVentas' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'TotalFactura' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'CreditAmount' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'DueDate' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'Clients_Invoices_FK' => ['type' => 'index', 'columns' => ['ClientID'], 'length' => []],
            'Companies_Invoices_FK' => ['type' => 'index', 'columns' => ['CompanyID'], 'length' => []],
            'Currency_Invoices_FK' => ['type' => 'index', 'columns' => ['CurrencyID'], 'length' => []],
            'Invoices_Locale_FK' => ['type' => 'index', 'columns' => ['LocaleCode'], 'length' => []],
            'Status_Invoices_FK' => ['type' => 'index', 'columns' => ['StatusID'], 'length' => []],
            'CompanyCurrencies_Invoices_FK' => ['type' => 'index', 'columns' => ['CompanyID', 'CurrencyID'], 'length' => []],
            'DocType_Invoice' => ['type' => 'index', 'columns' => ['DocTypeCode'], 'length' => []],
            'SaleCondition_Invoice_FK' => ['type' => 'index', 'columns' => ['SaleConditionCode'], 'length' => []],
            'Transactions_Invoices_FK' => ['type' => 'index', 'columns' => ['TransactionID'], 'length' => []],
            'InvoiceNumber_IX' => ['type' => 'index', 'columns' => ['InvoiceNumber'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['InvoiceID'], 'length' => []],
            'Clients_Invoices_FK' => ['type' => 'foreign', 'columns' => ['ClientID'], 'references' => ['Clients', 'ClientID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'Companies_Invoices_FK' => ['type' => 'foreign', 'columns' => ['CompanyID'], 'references' => ['Companies', 'CompanyID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'CompanyCurrencies_Invoices_FK' => ['type' => 'foreign', 'columns' => ['CompanyID', 'CurrencyID'], 'references' => ['CompanyCurrencies', '1' => ['CompanyID', 'CurrencyID']], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'Currency_Invoices_FK' => ['type' => 'foreign', 'columns' => ['CurrencyID'], 'references' => ['Currencies', 'CurrencyID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'DocType_Invoice' => ['type' => 'foreign', 'columns' => ['DocTypeCode'], 'references' => ['DocTypes', 'DocTypeCode'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'Invoices_Locale_FK' => ['type' => 'foreign', 'columns' => ['LocaleCode'], 'references' => ['Locales', 'LocaleCode'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'SaleCondition_Invoice_FK' => ['type' => 'foreign', 'columns' => ['SaleConditionCode'], 'references' => ['SaleConditions', 'SaleConditionCode'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'Status_Invoices_FK' => ['type' => 'foreign', 'columns' => ['StatusID'], 'references' => ['Status', 'StatusID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'Transactions_Invoices_FK' => ['type' => 'foreign', 'columns' => ['TransactionID'], 'references' => ['Transactions', 'TransactionID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'InvoiceID' => 1,
            'CompanyID' => 1,
            'StatusID' => 1,
            'ClientID' => 1,
            'LocaleCode' => 'Lorem ip',
            'TransactionID' => 1,
            'DocTypeCode' => '',
            'InvoiceNumber' => 1,
            'SaleConditionCode' => '',
            'InvoiceDate' => '2017-11-16 00:29:48',
            'Shipping' => 1.5,
            'Tax' => 1.5,
            'Note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'EmailSubject' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'AuthNumber' => 'Lorem ipsum dolor sit amet',
            'VoidDate' => '2017-11-16 00:29:48',
            'PaidDate' => '2017-11-16 00:29:48',
            'Entered' => 1510792188,
            'EnteredBy' => 'Lorem ipsum dolor sit amet',
            'Modified' => '2017-11-16 00:29:48',
            'ModifiedBy' => 'Lorem ipsum dolor sit amet',
            'CurrencyID' => 1,
            'ExchangeRate' => 1.5,
            'TotalSerGravados' => 1.5,
            'TotalSerExtentos' => 1.5,
            'TotalMerGravadas' => 1.5,
            'TotalMerExtentas' => 1.5,
            'TotalGravado' => 1.5,
            'TotalExtento' => 1.5,
            'TotalVenta' => 1.5,
            'Descuentos' => 1.5,
            'TotalVentaNeta' => 1.5,
            'MontoImpConsumo' => 1.5,
            'MontosOtrosImp' => 1.5,
            'TarifaImpuesto' => 1.5,
            'MontoImpVentas' => 1.5,
            'TotalFactura' => 1.5,
            'CreditAmount' => 1.5,
            'DueDate' => '2017-11-16 00:29:48'
        ],
    ];
}
