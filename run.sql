ALTER TABLE `cms_news`
MODIFY COLUMN `author`  varchar(500) NOT NULL DEFAULT '1' AFTER `campaignimg`;

ALTER TABLE `groups`
DROP COLUMN `bg`,
ADD COLUMN `bg`  text NOT NULL AFTER `privacy`;

CREATE TABLE helptool_tickets
(
id int(11) NOT NULL AUTO_INCREMENT,
user_id int(11) NOT NULL DEFAULT '1',
subject text NOT NULL,
message text NOT NULL,
status enum('green', 'orange', 'red'),
type enum('0', '1', '2','3', '4', '5', '6'),
PRIMARY KEY (id)
)

CREATE TABLE helptool_tickets_reacties
(
id int(11) NOT NULL AUTO_INCREMENT,
ticket_id int(11) NOT NULL DEFAULT '1',
user_id int(11) NOT NULL DEFAULT '1',
salt varchar(500) NOT NULL,
message text NOT NULL,
staff enum('0', '1') DEFAULT '0' NOT NULL,
PRIMARY KEY (id)
)

CREATE TABLE vault
(
  id int(11) AUTO_INCREMENT,
  furniture_id int(11) NOT NULL DEFAULT '0',
  status BOOLEAN DEFAULT '0',
  primary key(id)
)

ALTER TABLE users ADD dj_ses timestamp NOT NULL;