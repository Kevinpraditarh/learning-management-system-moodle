<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'mariadb';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'db_name';
$CFG->dbuser    = 'user';
$CFG->dbpass    = 'password';
$CFG->prefix    = 'cocoon_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => '3306',
  'dbsocket' => '',
  'dbcollation' => 'utf8_general_ci',
);

$CFG->wwwroot   = 'http://localhost/test';
$CFG->dataroot  = '/tmp/moodledata';
$CFG->admin     = 'admin';

// SSL is off-loaded at LB side.
$CFG->sslproxy = false;

$CFG->directorypermissions = 02750;

require_once(__DIR__ . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
