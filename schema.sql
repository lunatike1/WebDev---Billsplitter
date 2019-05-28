DROP TABLE user;
CREATE TABLE user (
id INTEGER  PRIMARY KEY,
fullname VARCHAR(30),
email VARCHAR(60),
password VARCHAR(30),
salt VARCHAR(30));

DROP TABLE bill;
CREATE TABLE bill (
billid INTEGER  PRIMARY KEY,
userid INTEGER,
billname VARCHAR(100),
FOREIGN KEY (userid) REFERENCES user(id));

DROP TABLE billuser;
CREATE TABLE billuser (
billuserid INTEGER  PRIMARY KEY,
billid INTEGER,
userid INTEGER,
amount INTEGER,
done boolean,
FOREIGN KEY (userid) REFERENCES user(id),
FOREIGN KEY (billid) REFERENCES bill(billid));
