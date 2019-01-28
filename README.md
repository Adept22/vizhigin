# MIREA University homework for methods and means of implementing information technology

## №1 - Database project

Task:
1. Спроектируйте базу данных, состоящую из нескольких таблиц таким образом, чтобы в многотабличной системе были таблицы со связью 1:1, 1:N
2. Отредактируете несколько записей в базе данных.
3. Отсортируйте данные в базе данных по какому-либо признаку или полю, записав результаты сортировки.
4. Составьте вторичный индекс из одного, двух или более полей.

Сведения об ассортименте обуви в магазине. База данных должна содержать следующую информацию: артикул, наименование обуви, количество пар, стоимость одной пары, имеющиеся размеры, название фабрики и срок поставки обуви в магазин.

### Step 1 - Creating tables

Creating table for shoes.
```
CREATE TABLE `shoes_shop`.`shp_shoes` (
     `articul` INT(11) NOT NULL AUTO_INCREMENT,
     `s_name` VARCHAR(255) NOT NULL DEFAULT '',
     `price` INT(11) NOT NULL DEFAULT '0',
     `m_id` INT(11) NULL DEFAULT NULL,
     PRIMARY KEY (`articul`)
) ENGINE = MyISAM CHARSET=utf8 COLLATE utf8_general_ci;
```

Creating table for shoes sizes.
```
CREATE TABLE `shoes_shop`.`shp_shoes_size` (
     `s_id` INT(11) NOT NULL AUTO_INCREMENT,
     `articul` INT(11) NOT NULL DEFAULT '0',
     `s_size` INT(11) DEFAULT NULL,
     `s_count` INT(11) NOT NULL DEFAULT '0',
     `delivered_at` INT(11) NOT NULL DEFAULT '0',
     PRIMARY KEY (`s_id`)
) ENGINE = MyISAM CHARSET=utf8 COLLATE utf8_general_ci;
```

Creating table for shoes manufacturers.
```
CREATE TABLE `shoes_shop`.`shp_manufacturer` (
     `m_id` INT(11) NOT NULL AUTO_INCREMENT,
     `m_name` VARCHAR(255) NOT NULL DEFAULT '',
     PRIMARY KEY (`m_id`)
) ENGINE = MyISAM CHARSET=utf8 COLLATE utf8_general_ci;
```

### Step 2 - Editing data in tables

In first i'm create some data in all tables.
```
INSERT INTO `shp_manufacturer` (`m_id`, `m_name`) VALUES (1, 'CALVIN KLEIN');
INSERT INTO `shp_manufacturer` (`m_id`, `m_name`) VALUES (2, 'KISS MOON');
INSERT INTO `shp_manufacturer` (`m_id`, `m_name`) VALUES (3, 'ERNESTO DOLANI');
INSERT INTO `shp_manufacturer` (`m_id`, `m_name`) VALUES (4, 'GIOVANNI FABIANI');
```
```
INSERT INTO `shp_shoes` (`articul`, `s_name`, `price`, `m_id`) VALUES (475321,'Women\'s sneakers', 8990, 1);
INSERT INTO `shp_shoes` (`articul`, `s_name`, `price`, `m_id`) VALUES (475154,'Women\'s uggs', 7190, 2);
INSERT INTO `shp_shoes` (`articul`, `s_name`, `price`, `m_id`) VALUES (475872,'Women\'s shoes', 13790, 3);
INSERT INTO `shp_shoes` (`articul`, `s_name`, `price`, `m_id`) VALUES (475956,'Woman\'s pils', 17490, 4);
```
```
INSERT INTO `shp_shoes_size` (`articul`, `s_size`, `s_count`, `delivered_at`) VALUES (475321, 34, 10, 0);
INSERT INTO `shp_shoes_size` (`articul`, `s_size`, `s_count`, `delivered_at`) VALUES (475321, 35, 15, 0);
INSERT INTO `shp_shoes_size` (`articul`, `s_size`, `s_count`, `delivered_at`) VALUES (475321, 36, 12, 0);
INSERT INTO `shp_shoes_size` (`articul`, `s_size`, `s_count`, `delivered_at`) VALUES (475321, 37, 1, 0);
INSERT INTO `shp_shoes_size` (`articul`, `s_size`, `s_count`, `delivered_at`) VALUES (475321, 38, 5, 0);
INSERT INTO `shp_shoes_size` (`articul`, `s_size`, `s_count`, `delivered_at`) VALUES (475321, 39, 26, 0);
INSERT INTO `shp_shoes_size` (`articul`, `s_size`, `s_count`, `delivered_at`) VALUES (475321, 40, 32, 0);
INSERT INTO `shp_shoes_size` (`articul`, `s_size`, `s_count`, `delivered_at`) VALUES (475154, 34, 11, 0);
INSERT INTO `shp_shoes_size` (`articul`, `s_size`, `s_count`, `delivered_at`) VALUES (475154, 35, 21, 0);
INSERT INTO `shp_shoes_size` (`articul`, `s_size`, `s_count`, `delivered_at`) VALUES (475154, 36, 8, 0);
INSERT INTO `shp_shoes_size` (`articul`, `s_size`, `s_count`, `delivered_at`) VALUES (475154, 37, 7, 0);
INSERT INTO `shp_shoes_size` (`articul`, `s_size`, `s_count`, `delivered_at`) VALUES (475154, 38, 10, 0);
INSERT INTO `shp_shoes_size` (`articul`, `s_size`, `s_count`, `delivered_at`) VALUES (475154, 39, 24, 0);
INSERT INTO `shp_shoes_size` (`articul`, `s_size`, `s_count`, `delivered_at`) VALUES (475154, 40, 20, 0);
INSERT INTO `shp_shoes_size` (`articul`, `s_size`, `s_count`, `delivered_at`) VALUES (475872, 34, 79, 0);
INSERT INTO `shp_shoes_size` (`articul`, `s_size`, `s_count`, `delivered_at`) VALUES (475872, 35, 24, 0);
INSERT INTO `shp_shoes_size` (`articul`, `s_size`, `s_count`, `delivered_at`) VALUES (475872, 36, 16, 0);
INSERT INTO `shp_shoes_size` (`articul`, `s_size`, `s_count`, `delivered_at`) VALUES (475872, 37, 18, 0);
INSERT INTO `shp_shoes_size` (`articul`, `s_size`, `s_count`, `delivered_at`) VALUES (475872, 38, 3, 0);
INSERT INTO `shp_shoes_size` (`articul`, `s_size`, `s_count`, `delivered_at`) VALUES (475872, 39, 39, 0);
INSERT INTO `shp_shoes_size` (`articul`, `s_size`, `s_count`, `delivered_at`) VALUES (475872, 40, 46, 0);
INSERT INTO `shp_shoes_size` (`articul`, `s_size`, `s_count`, `delivered_at`) VALUES (475956, 34, 2, 0);
INSERT INTO `shp_shoes_size` (`articul`, `s_size`, `s_count`, `delivered_at`) VALUES (475956, 35, 5, 0);
INSERT INTO `shp_shoes_size` (`articul`, `s_size`, `s_count`, `delivered_at`) VALUES (475956, 36, 11, 0);
INSERT INTO `shp_shoes_size` (`articul`, `s_size`, `s_count`, `delivered_at`) VALUES (475956, 37, 0, 86400000);
INSERT INTO `shp_shoes_size` (`articul`, `s_size`, `s_count`, `delivered_at`) VALUES (475956, 38, 3, 0);
INSERT INTO `shp_shoes_size` (`articul`, `s_size`, `s_count`, `delivered_at`) VALUES (475956, 39, 7, 0);
INSERT INTO `shp_shoes_size` (`articul`, `s_size`, `s_count`, `delivered_at`) VALUES (475956, 40, 14, 0);
```
