# Modsec Audit v1.0

## Introduce
* This is a small php app for parse modsec_audit.log.
* Modsec_audit.log auto push to database.

## Overview
Dashboard:
![alt text](https://github.com/KevinKien/Modsec-Audit/blob/master/img/Dashboard.png "Dashboard")

Analytics:
![alt text](https://github.com/KevinKien/Modsec-Audit/blob/master/img/Analytics.png)

## Install Modsec Audit v1.0

### Config Modsec audit
* in control/config.php update mysql db/user/password pairs that you just created
```
$db_host = "localhost";
$db_name    = 'modsecdb';
$db_username    = 'modsecuser'; 
$db_password    = 'modsecpass';
```

* http://[ipserver]/modsec
* Login user/pass: admin/kma123

### Config MSALParser
* In mlogc.conf
```
CollectorRoot "/var/log/mlogc"
ConsoleURI "http://[serverip]/MSALParser/web/rpc.php"
LogStorageDir "data"
```

* In modsecurity.conf
```
#SecAuditLogType Serial
SecAuditLogType Concurrent
#SecAuditLog logs/modsec_logs/modsec_audit.log
#SecAuditLogStorageDir logs/modsec_logs/modsec_audit
SecAuditLogStorageDir /var/log/mlogc/data
SecAuditLog "|/usr/local/bin/mlogc /etc/mlogc.conf"
#MSALParser doesn't understant part K for now
#SecAuditLogParts "ABIFHKZ"
SecAuditLogParts "ABIFHZ"
```

* create modsecurity_crs_16_customrules.conf in modsecurity configuration directory and add
```
SecRule REQUEST_URI "^/MSALParser\.php" "chain,deny,log,auditlog,status:404,msg:'Unauthenticated access attempt to admin gui',id:'70000',severity:'2'"
SecRule REMOTE_ADDR "!^(192\.168.+|127\.0\.0\.1)$"

SecRule REQUEST_URI "^/MSALParser\.php" phase:1,nolog,allow
```

* In the target server that will host MSALParser
⋅⋅* Make sure php is installed/compiled with mysqli extension
⋅⋅* Create a db/user/password give related privileges for the user on the db 
⋅⋅* Login with the user/password into mysql and run /doc/msaldbschema.sql in order to create needed tables. Make sure they are created 
⋅⋅* in /persistent/MSALDB.php update mysql db/user/password pairs that you just created

```
private static $server = "127.0.0.1";
private static $dbname = "msaldb";
private static $dbuser = "msaluser";
private static $dbpass = "msalpass";
```
* in httpd.conf
```
Script PUT /MSALParser/web/rpc.php
```

* in php.ini
```
include_path=".;classes;..\classes;persistent;..\persistent"
```
