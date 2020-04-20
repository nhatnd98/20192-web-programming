<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>
            <?php
                $doc_title = 'Business Registration';
                echo "$doc_title\n";
            ?>
        </title>
    </head>
    <body>
        <h1>
            <?= $doc_title ?>
        </h1>

        <?php
            require_once 'DB.php';
            # parameters for connecting to the "business_service" 
            $username = "business_service";
            $password = "123456"; 
            $hostspec = "localhost";
            $database = "business_service";
            // $dbtype = 'pgsql';
            // $dbtype = 'oci8';
            $dbtype = 'mysqli';

            $add_record = $_REQUEST['add_record'];
            $Biz_Name = $_REQUEST['Biz_Name'];
            $Biz_Address = $_REQUEST['Biz_Address'];
            $Biz_City = $_REQUEST['Biz_City'];
            $Biz_Telephone = $_REQUEST['Biz_Telephone'];
            $Biz_URL = $_REQUEST['Biz_URL'];
            $Biz_Categories = $_REQUEST['Biz_Categories'];

            $pick_message = 'Click on one, or control-click on<BR>multiple ';
            $pick_message .= 'categories:';

            if ($add_record == 1) {
                $pick_message = 'Selected category values<br />are highlighted:';
                $sql  = 'INSERT INTO businesses (name, address, city, telephone, ';
                $sql .= ' url) VALUES (?, ?, ?, ?, ?)';
                $params = array($Biz_Name, $Biz_Address, $Biz_City, $Biz_Telephone, $Biz_URL);
                $query = $db->prepare($sql);
                if (DB::isError($query)) die($query->getMessage());
                $resp = $db->execute($query, $params);
                if (DB::isError($resp)) die($resp->getMessage());
                $resp = $db->commit(  );
                if (DB::isError($resp)) die($resp->getMessage());
                echo '<p class="message">Record inserted as shown below.</p>';
                $biz_id = $db->getOne('SELECT max(business_id) FROM businesses');
            }
        ?>

        <form method="post" action="<?= $PHP_SELF ?>">
        <table>
            <tr>
                <td class="picklist"><?= $pick_message ?>
                    <p>
                    <select name="Biz_Categories[]" size="4" multiple>
                        <?php
                            $sql = "SELECT * FROM categories";
                            $result = $db->query($sql);
                            if (DB::isError($result)) die($result->getMessage());
                            while ($row = $result->fetchRow()){
                                if (DB::isError($row)) die($row->getMessage());
                                if ($add_record == 1){
                                    $selected = false;
                                    if (in_array($row[1], $Biz_Categories)) {
                                        $sql  = 'INSERT INTO biz_categories';
                                        $sql .= ' (business_id, category_id)';
                                        $sql .= ' VALUES (?, ?)';
                                        $params = array($biz_id, $row[0]);
                                        $query = $db->prepare($sql);
                                        if (DB::isError($query)) die($query->getMessage());
                                        $resp = $db->execute($query, $params);
                                        if (DB::isError($resp)) die($resp->getMessage());
                                        $resp = $db->commit();
                                        if (DB::isError($resp)) die($resp->getMessage());
                                        echo "<option selected=\"selected\">$row[1]</option>\n";
                                        $selected = true;
                                    }
                                    if ($selected == false) {
                                        echo "<option>$row[1]</option>\n";
                                    }
                                } else {
                                    echo "<option>$row[1]</option>\n";
                                }
                            }
                        ?>
                    </select>
                </td>
                <td class="picklist">
                    <table>
                        <tr><td class="FormLabel">Business Name:</td>
                            <td><input type="text" name="Biz_Name" size="40" maxlength="255"
                                value="<?= $Biz_Name ?>" /></td>
                        </tr>
                        <tr><td class="FormLabel">Address:</td>
                         <td><input type="text" name="Biz_Address" size="40" maxlength="255"
                                value="<?= $Biz_Address ?>" /></td>
                        </tr>
                        <tr><td class="FormLabel">City:</td>
                            <td><input type="text" name="Biz_City" size="40" maxlength="128"
                                value="<?= $Biz_City ?>" /></td>
                        </tr>
                        <tr><td class="FormLabel">Telephone:</td>
                            <td><input type="text" name="Biz_Telephone" size="40" maxlength="64"
                                value="<?= $Biz_Telephone ?>" /></td>
                        </tr>
                        <tr><td class="FormLabel">URL:</TD>
                            <td><input type="text" name="Biz_URL" size="40" maxlength="255"
                                value="<?= $Biz_URL ?>" /></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <p>
            <input type="hidden" name="add_record" value="1" />

            <?php
                if ($add_record == 1){
                   echo '<p><a href="'.$PHP_SELF.'">Add Another Business</a></p>';
                } else {
                    echo '<input type="submit" name="submit" value="Add Business" />';
                }
            ?>
        </p>
    </body>
</html>