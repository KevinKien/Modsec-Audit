DROP TABLE IF EXISTS `admin`;
CREATE TABLE  `admin` (
  `user` varchar(30) NOT NULL,
  `pass` varchar(60) NOT NULL
);

INSERT INTO `admin` (`user`, `pass`) VALUES
('admin', '4a823245a08c257041938042b728d9f7');

DROP TABLE IF EXISTS `audit_log`;
CREATE TABLE  `audit_log` (
  `AuditLogID` bigint(20) unsigned NOT NULL auto_increment,
  `AuditLogUniqueID` char(32) NOT NULL, 
  `AuditLogDate` date NOT NULL,
  `AuditLogTime` time NOT NULL,
  `SourceIP` char(15) NOT NULL,
  `SourcePort` int unsigned default NULL,
  `DestinationIP` char(15) NOT NULL,
  `DestinationPort` int unsigned default NULL,
  `Referer` varchar(255) default NULL,
  `UserAgent` varchar(255) default NULL,
  `WebAppId` varchar(255) DEFAULT NULL,
  `HttpMethod` tinyint NOT NULL DEFAULT 0,
  `Uri` text,
  `QueryString` text,
  `HttpProtocol` tinyint NOT NULL DEFAULT 0,
  `Host` varchar(255) DEFAULT NULL,
  `HttpStatusCode` tinyint NOT NULL DEFAULT 0,
  `RequestContentType` varchar(255) DEFAULT NULL,
  `ResponseContentType` varchar(255) DEFAULT NULL,
  `Blocked` tinyint NOT NULL DEFAULT 0,
  `Duration` int NOT NULL,
  PRIMARY KEY  (`AuditLogID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `alerts`;
CREATE TABLE  `alerts` (
  `AuditLogUniqueID` char(32) NOT NULL,
  `GeneralMsg` varchar(255) DEFAULT NULL,
  `TechnicalMsg` text,
  `RuleID` int(10) DEFAULT NULL,
  `Rev` varchar(128) DEFAULT NULL,
  `Msg` text,
  `Severity` tinyint DEFAULT 0,
  `Category` tinyint DEFAULT 0,
  `Status` tinyint DEFAULT 0,
  `Resolution` tinyint DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE  `admin` (
  `user` varchar(255) NULL,
  `pass` varchar(255) NULL,
);

INSERT INTO `admin`(`user`, `pass`) VALUES ('admin','4a823245a08c257041938042b728d9f7
');

