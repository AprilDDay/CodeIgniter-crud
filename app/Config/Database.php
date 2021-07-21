<?php

namespace Config;

//use CodeIgniter\Database\Config;

/**
 * Database Configuration
 * @package Config
 */

//class Database extends Config
class Database extends \CodeIgniter\Database\Config
{
	/**
	 * The directory that holds the Migrations
	 * and Seeds directories.
	 *
	 * @var string
	 */
	//public $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;
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
		//'username' => '',
		'username' => 'root',
		'password' => '',
		//'database' => '',
		'database' => 'codeigniter-crud',
		'DBDriver' => 'MySQLi',
		'DBPrefix' => '',
		'pConnect' => false,
		'DBDebug'  => (ENVIRONMENT !== 'production'),
		'cacheOn' => false, //was added on none in original default config
		'cacheDir' => '', //was added none in original default config
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
		'cacheOn' => false, //added not in original default config
		'cacheDir' => '', //added not in original default config
		'charset'  => 'utf8',
		'DBCollat' => 'utf8_general_ci',
		'swapPre'  => '',
		'encrypt'  => false,
		'compress' => false,
		'strictOn' => false,
		'failover' => [],
		'port'     => 3306,
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

			//all the following was added to test multiple databases
			//travis-cli is required
			if($group =getenv('DB'))
				{
					if(is_file(TESTPATH . 'travis/Database.php'))
						{
							require TESTPATH . 'travis/Database.php';

							if(! empty($dbconfig) && array_key_exists($group, $dbconfig))
								{
									$this->tests = $dbconfig[$group];
								}
						}
				}
		}
	}

	//--------------------------------------------------------------------

}
