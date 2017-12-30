<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CompanyBanksFixture
 *
 */
class CompanyBanksFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'CompanyBanks';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'CompanyID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'BankID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'CurrencyID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'BankOrder' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'AccountNumber' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'SINPE' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Entered' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'EnteredBy' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => 'System', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ModifiedBy' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'Banks_CompanyBanks_FK' => ['type' => 'index', 'columns' => ['BankID'], 'length' => []],
            'Currencies_CompanyBanks_FK' => ['type' => 'index', 'columns' => ['CurrencyID'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['CompanyID', 'BankID', 'CurrencyID'], 'length' => []],
            'Banks_CompanyBanks_FK' => ['type' => 'foreign', 'columns' => ['BankID'], 'references' => ['Banks', 'BankID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'Company_CompanyBanks_FK' => ['type' => 'foreign', 'columns' => ['CompanyID'], 'references' => ['Companies', 'CompanyID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'Currencies_CompanyBanks_FK' => ['type' => 'foreign', 'columns' => ['CurrencyID'], 'references' => ['Currencies', 'CurrencyID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'BankID' => 1,
            'CurrencyID' => 1,
            'BankOrder' => 1,
            'AccountNumber' => 'Lorem ipsum dolor ',
            'SINPE' => 'Lorem ipsum dolor ',
            'Entered' => 1514673215,
            'EnteredBy' => 'Lorem ipsum dolor sit amet',
            'ModifiedBy' => 'Lorem ipsum dolor sit amet',
            'Modified' => '2017-12-30 22:33:35'
        ],
    ];
}
