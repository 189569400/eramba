<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DocumentationRelationsFixture
 */
class DocumentationRelationsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'documentation_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'related_documentation_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'documentation_id' => ['type' => 'index', 'columns' => ['documentation_id'], 'length' => []],
            'related_documentation_id' => ['type' => 'index', 'columns' => ['related_documentation_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'documentation_relations_ibfk_1' => ['type' => 'foreign', 'columns' => ['documentation_id'], 'references' => ['documentations', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'documentation_relations_ibfk_2' => ['type' => 'foreign', 'columns' => ['related_documentation_id'], 'references' => ['documentations', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'documentation_id' => 1,
                'related_documentation_id' => 1
            ],
        ];
        parent::init();
    }
}
