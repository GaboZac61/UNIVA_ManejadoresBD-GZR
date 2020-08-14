Microsoft Windows [Versión 10.0.18363.900]
(c) 2019 Microsoft Corporation. Todos los derechos reservados.

C:\Users\gaboz>mysql -P 3307 -u root -p
Enter password: **********
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 11
Server version: 8.0.20 MySQL Community Server - GPL

Copyright (c) 2000, 2020, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> SHOW databases;
+--------------------+
| Database           |
+--------------------+
| information_schema |
| mibd               |
| mysql              |
| nuevabd            |
| operaciones        |
| performance_schema |
| sys                |
| universidad        |
+--------------------+
8 rows in set (0.00 sec)

mysql> use operaciones;
Database changed
mysql> DELIMITER //
mysql> CREATE PROCEDURE suma1(n1 INT, n2 INT)
    -> BEGIN
    -> SELECT n1 AS Numero1, '+' AS '+', n2 AS Numero2, n1+n2 AS Resultado;
    -> END; //
Query OK, 0 rows affected (0.15 sec)

mysql> DELIMITER ;
mysql> SET @num1=7;
Query OK, 0 rows affected (0.00 sec)

mysql> SET @num2=8;
Query OK, 0 rows affected (0.00 sec)

mysql> CALL suma1(@num1, @num2);
+---------+---+---------+-----------+
| Numero1 | + | Numero2 | Resultado |
+---------+---+---------+-----------+
|       7 | + |       8 |        15 |
+---------+---+---------+-----------+
1 row in set (0.00 sec)

Query OK, 0 rows affected (0.00 sec)

mysql> DELIMITER //
mysql> CREATE PROCEDURE resta1(n1 INT, n2 INT)
    -> BEGIN
    -> SELECT n1 AS Numero1, '-' AS '-', n2 AS Numero2, n1-n2 AS Resultado;
    -> END; //
Query OK, 0 rows affected (1.13 sec)

mysql> CREATE PROCEDURE multiplicacion1(n1 INT, n2 INT)
    -> BEGIN
    -> SELECT n1 AS Numero1, '*' AS '*', n2 AS Numero2, n1*n2 AS Resultado;
    -> END; //
Query OK, 0 rows affected (0.13 sec)

mysql> CREATE PROCEDURE division1(n1 INT, n2 INT)
    -> BEGIN
    -> SELECT n1 AS Numero1, '/' AS '/', n2 AS Numero2, n1/n2 AS Resultado;
    -> END; //
Query OK, 0 rows affected (0.20 sec)

mysql> DELIMITER ;
mysql> CALL resta1(9, 6);
+---------+---+---------+-----------+
| Numero1 | - | Numero2 | Resultado |
+---------+---+---------+-----------+
|       9 | - |       6 |         3 |
+---------+---+---------+-----------+
1 row in set (0.00 sec)

Query OK, 0 rows affected (0.01 sec)

mysql> CALL multiplicacion1(@num1, @num2);
+---------+---+---------+-----------+
| Numero1 | * | Numero2 | Resultado |
+---------+---+---------+-----------+
|       7 | * |       8 |        56 |
+---------+---+---------+-----------+
1 row in set (0.00 sec)

Query OK, 0 rows affected (0.01 sec)

mysql> CALL division1(81, 9);
+---------+---+---------+-----------+
| Numero1 | / | Numero2 | Resultado |
+---------+---+---------+-----------+
|      81 | / |       9 |    9.0000 |
+---------+---+---------+-----------+
1 row in set (0.00 sec)

Query OK, 0 rows affected (0.01 sec)
