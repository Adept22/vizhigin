<!DOCTYPE html>
<html>
     <head>
          <title>Document</title>
     </head>
     <body>
          <?php include "connect.php"; ?>
          <?php

               $sort_text = false;
               $sort = false;

               if(isset($_GET['sort']) && !empty($_GET['sort'])) {
                    $sort_text = $_GET['sort'];
                    $sort = explode("-", $_GET['sort']);
               };

               $types = [
                    "s_name" => 0,
                    "s_size" => 1,
                    "m_name" => 0
               ];

               $values = [];

               foreach ($_GET as $key => $value) {
                    if(in_array($key, array('s_name', 's_size', 'm_name')) && !empty($value)) {
                         $values[] = "`" . $key . "`" . ($types[$key] == 0 ? " LIKE '%" . $value . "%'" : "= '" . $value . "'");
                    }
               }
          ?>
          <form action="/index3.php" method="get">
               <fieldset>
                    <legend>Фильтр</legend>
                    <input type="text" name="s_name" value="<?php echo (isset($_GET['s_name']) && !empty($_GET['s_name']) ? $_GET['s_name'] : ""); ?>" placeholder="Название обуви" />
                    <label for="s_size">Размер обуви</label>
                    <select class="" name="s_size">
                         <?php if(!isset($_GET['s_size']) || empty($_GET['s_size'])) { ?>
                              <option value="" selected>Все</option>
                         <?php } else { ?>
                              <option value="">Все</option>
                         <?php } ?>
                         <?php
                              $query = $connect->prepare("SELECT s_size FROM `shp_shoes_size` GROUP BY s_size ORDER BY s_size;");
                              $query->execute();

                              if($query) {
                                   while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                        if($row['s_size'] == $_GET['s_size']) {
                                             echo "<option value=\"" . $row['s_size'] . "\" selected>" . $row['s_size'] . "</option>";
                                        } else {
                                             echo "<option value=\"" . $row['s_size'] . "\">" . $row['s_size'] . "</option>";
                                        }
                                   }
                                   $query = null;
                              }
                         ?>
                    </select>
                    <input type="text" name="m_name" value="<?php echo (isset($_GET['m_name']) && !empty($_GET['m_name']) ? $_GET['m_name'] : ""); ?>" placeholder="Название фабрики" />
               </fieldset>
               <fieldset>
                    <legend>Сортировка</legend>
                    <select class="" name="sort">
                         <option value="">По умолчанию</option>
                         <option value="ss.s_name-ASC"<?php echo (isset($_GET['sort']) && $_GET['sort'] == "ss.s_name-ASC" ? " selected" : ""); ?>>Название обуви (По возрастанию)</option>
                         <option value="ss.s_name-DESC"<?php echo (isset($_GET['sort']) && $_GET['sort'] == "ss.s_name-DESC" ? " selected" : ""); ?>>Название обуви (По убыванию)</option>
                         <option value="sss.s_size-ASC"<?php echo (isset($_GET['sort']) && $_GET['sort'] == "sss.s_size-ASC" ? " selected" : ""); ?>>Размер обуви (По возрастанию)</option>
                         <option value="sss.s_size-DESC"<?php echo (isset($_GET['sort']) && $_GET['sort'] == "sss.s_size-DESC" ? " selected" : ""); ?>>Размер обуви (По убыванию)</option>
                    </select>
               </fieldset>
               <button type="submit">Отправить</button>
          </form>
          <p>&nbsp;</p>
          <?php
               $sql = "SELECT ss.articul, sm.m_name, ss.s_name, ss.price, sss.s_size, sss.s_count FROM `shp_shoes` ss LEFT JOIN `shp_manufacturer`sm ON (ss.m_id = sm.m_id) LEFT JOIN `shp_shoes_size` sss ON (ss.articul = sss.articul)";

               $sql .= (!empty($values) ? " WHERE " . implode(" AND ", $values) : "");

               $sql .= " GROUP BY ss.articul, sss.s_id";

               $sql .= (!empty($sort) ? " ORDER BY " . $sort[0] . " " . $sort[1] : "") . ";";
               
               print_r($sql);
          ?>
          <p>&nbsp;</p>
          <?php
               $query = $connect->prepare($sql);
               $query->execute();

               echo "<table style='border-collase: collapse;' border='1'>";
               echo "<tr>";
               echo "<th>№</th>";
               echo "<th>Артикул</th>";
               echo "<th>Производитель</th>";
               echo "<th>Название</th>";
               echo "<th>Размер</th>";
               echo "<th>Количество</th>";
               echo "</tr>";
               if($query) {
                    $i = 1;
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                         echo "<tr>";
                         echo "<td>" . $i . "</td>";
                         echo "<td>" . $row['articul'] . "</td>";
                         echo "<td>" . $row['m_name'] . "</td>";
                         echo "<td>" . $row['s_name'] . "</td>";
                         echo "<td>" . $row['s_size'] . "</td>";
                         echo "<td>" . $row['s_count'] . "</td>";
                         echo "</tr>";
                         $i++;
                    }
                    $query = null;
               }
               echo "</table>";
          ?>
     </body>
</html>
