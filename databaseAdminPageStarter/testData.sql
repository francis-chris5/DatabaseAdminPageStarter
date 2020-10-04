

/*
 * Just some test data to get started with. Many domain hosts
 * will create the database for you and remove the ability for users
 * so be sure to comment out or remove line 12 if you don't need it on
 * your chosen domain hosting site.
 */


/*REMOVE NEXT LINE IF HOST DOES NOT ALLOW*/
CREATE DATABASE admin_test;

CREATE TABLE testTable(testID INTEGER PRIMARY KEY AUTO_INCREMENT, TestWords VARCHAR(32), TestNumber FLOAT(16));

INSERT INTO testTable(TestWords, TestNumber) VALUES('PI', 3.14);

