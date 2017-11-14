<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CompaniesFixture
 *
 */
class CompaniesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'CompanyID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'LocaleCode' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'CompanyName' => ['type' => 'string', 'length' => 80, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'TaxID' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'CommercialName' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Address' => ['type' => 'string', 'length' => 80, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'AreaCode' => ['type' => 'integer', 'length' => 3, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Phone' => ['type' => 'integer', 'length' => 8, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'FaxAreaCode' => ['type' => 'integer', 'length' => 3, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Fax' => ['type' => 'integer', 'length' => 8, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Email' => ['type' => 'string', 'length' => 60, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ReplyTo' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Logo' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'CompanyUrl' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'CompanyStatus' => ['type' => 'smallinteger', 'length' => 6, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '', 'precision' => null],
        'EmailSubject' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => 'Solcitud de pago', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Entered' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'EnteredBy' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => 'System', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'ModifiedBy' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'CompanyInfo' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'Processor' => ['type' => 'string', 'length' => 25, 'null' => true, 'default' => 'BNCR', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'AcquirerID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'CommerceID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'MallID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'TerminalID' => ['type' => 'string', 'length' => 8, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'HexNumber' => ['type' => 'string', 'length' => 16, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'KeyName' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'BgColor' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => '#FFFFFF', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'BgImage' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'LastInvoiceNo' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'LastReceiptNo' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'InvoiceDays' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => '30', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'DayTypeID' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => '1', 'comment' => '', 'precision' => null],
        'CompanyTypeID' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => '1', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'Locale_Companies_FK' => ['type' => 'index', 'columns' => ['LocaleCode'], 'length' => []],
            'Company_DayType_FK' => ['type' => 'index', 'columns' => ['DayTypeID'], 'length' => []],
            'CompanyType_Company_FK' => ['type' => 'index', 'columns' => ['CompanyTypeID'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['CompanyID'], 'length' => []],
            'CompanyType_Company_FK' => ['type' => 'foreign', 'columns' => ['CompanyTypeID'], 'references' => ['CompanyTypes', 'CompanyTypeID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'Company_DayType_FK' => ['type' => 'foreign', 'columns' => ['DayTypeID'], 'references' => ['DayTypes', 'DayTypeID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'Locale_Companies_FK' => ['type' => 'foreign', 'columns' => ['LocaleCode'], 'references' => ['Locales', 'LocaleCode'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'CompanyID' => 1,
            'LocaleCode' => 'Lorem ip',
            'CompanyName' => 'Lorem ipsum dolor sit amet',
            'TaxID' => 'Lorem ip',
            'CommercialName' => 'Lorem ipsum dolor sit amet',
            'Address' => 'Lorem ipsum dolor sit amet',
            'AreaCode' => 1,
            'Phone' => 1,
            'FaxAreaCode' => 1,
            'Fax' => 1,
            'Email' => 'Lorem ipsum dolor sit amet',
            'ReplyTo' => 'Lorem ipsum dolor sit amet',
            'Logo' => 'Lorem ipsum dolor sit amet',
            'CompanyUrl' => 'Lorem ipsum dolor sit amet',
            'CompanyStatus' => 1,
            'EmailSubject' => 'Lorem ipsum dolor sit amet',
            'Entered' => 1510703321,
            'EnteredBy' => 'Lorem ipsum dolor sit amet',
            'Modified' => '2017-11-14 23:48:41',
            'ModifiedBy' => 'Lorem ipsum dolor sit amet',
            'CompanyInfo' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'Processor' => 'Lorem ipsum dolor sit a',
            'AcquirerID' => 1,
            'CommerceID' => 1,
            'MallID' => 1,
            'TerminalID' => 'Lorem ',
            'HexNumber' => 'Lorem ipsum do',
            'KeyName' => 'Lorem ipsum dolor sit amet',
            'BgColor' => 'Lorem ipsum dolor sit amet',
            'BgImage' => 'Lorem ipsum dolor sit amet',
            'LastInvoiceNo' => 1,
            'LastReceiptNo' => 1,
            'InvoiceDays' => 1,
            'DayTypeID' => 1,
            'CompanyTypeID' => 1
        ],
    ];
}
