## Framework used

- Codeigniter2
- Bootstrap 3.3.7

## Server Requirements

- PHP >= 5.6

## Supported Database
MySQL (5.1+) via the mysql (棄用), mysqli and pdo drivers

Oracle via the oci8 and pdo drivers

PostgreSQL via the postgre and pdo drivers

MS SQL via the mssql, sqlsrv (version 2005 and above only) and pdo drivers

SQLite via the sqlite (version 2), sqlite3 (version 3) and pdo drivers

CUBRID via the cubrid and pdo drivers

Interbase/Firebird via the ibase and pdo drivers

ODBC via the odbc and pdo drivers (you should know that ODBC is actually an abstraction layer)

## How to Start

- Change following lines in `application/config/config.php`
      $config['base_url']
      
  `assets/controller.js` and `assets/script.js`
      baseUrl
      
 - Then open your Apache or Nginx
 
 - Import `forumDB.sql` to mysql
 
 - Visit `http://localhost/folder`(Same as baseUrl)
