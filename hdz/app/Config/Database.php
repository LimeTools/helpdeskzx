<?php namespace Config;

use CodeIgniter\Database\Config;

/**
 * Database Configuration
 *
 * @package Config
 */

class Database extends Config
{
	/**
	 * The directory that holds the Migrations
	 * and Seeds directories.
	 *
	 * @var string
	 */
	public $filesPath = APPPATH . 'Database/';

	/**
	 * Lets you choose which connection group to
	 * use if no other is specified.
	 *
	 * @var string
	 */
	public $defaultGroup = 'default';

    /**
     * The default database connection.
     *
     * @var array
     */
    public $default = [
        'DSN'      => '',
        'hostname' => 'localhost',
        'username' => '',
        'password' => '',
        'database' => '',
        'DBDriver' => 'MySQLi',
        'DBPrefix' => '',
        'pConnect' => false,
        'DBDebug'  => (ENVIRONMENT !== 'production'),
        'charset'  => 'utf8',
        'DBCollat' => 'utf8_general_ci',
        'swapPre'  => '',
        'encrypt'  => false,
        'compress' => false,
        'strictOn' => false,
        'failover' => [],
        'port'     => 3306,
    ];

    /**
     * This database connection is used when
     * running PHPUnit database tests.
     *
     * @var array
     */
    public $tests = [
        'DSN'      => '',
        'hostname' => '127.0.0.1',
        'username' => '',
        'password' => '',
        'database' => ':memory:',
        'DBDriver' => 'SQLite3',
        'DBPrefix' => 'db_',  // Needed to ensure we're working correctly with prefixes live. DO NOT REMOVE FOR CI DEVS
        'pConnect' => false,
        'DBDebug'  => (ENVIRONMENT !== 'production'),
        'charset'  => 'utf8',
        'DBCollat' => 'utf8_general_ci',
        'swapPre'  => '',
        'encrypt'  => false,
        'compress' => false,
        'strictOn' => false,
        'failover' => [],
        'port'     => 3306,
    ];

    public $sportance = [

    ];

	//--------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();

		// Ensure that we always set the database group to 'tests' if
		// we are currently running an automated test suite, so that
		// we don't overwrite live data on accident.
        if (ENVIRONMENT === 'testing')
        {
            $this->defaultGroup = 'tests';
        }


		$this->default['hostname'] = Helpdesk::DB_HOST;
		$this->default['username'] = Helpdesk::DB_USER;
		$this->default['password'] = Helpdesk::DB_PASSWORD;
        $this->default['database'] = Helpdesk::DB_NAME;
        $this->default['DBPrefix'] = Helpdesk::DB_PREFIX;
        $this->default['port'] = Helpdesk::DB_PORT;

        $this->sportance = $this->default;

        $this->sportance['hostname'] = Helpdesk::DB_SPORTANCE_HOST;
        $this->sportance['username'] = Helpdesk::DB_SPORTANCE_USER;
        $this->sportance['password'] = Helpdesk::DB_SPORTANCE_PASSWORD;
        $this->sportance['database'] = Helpdesk::DB_SPORTANCE_NAME;
        $this->sportance['DBPrefix'] = Helpdesk::DB_SPORTANCE_PREFIX;
        $this->sportance['port'] = Helpdesk::DB_SPORTANCE_PORT;

	}

	//--------------------------------------------------------------------

}
