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
     `s_count` INT(11) NOT NULL DEFAULT '0',
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
