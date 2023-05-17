<?php
    if (isset($_POST["submit"])) {
        $table = $_POST["table"];
        function countRows($table) {
            $rowCount = 0;
            $rows = $table->getElementsByTagName('tr');
            foreach ($rows as $row) {
                $rowCount++;
            }
            return $rowCount;
        }
        
        echo '<tr>';
        echo '<td>' . countRows($table) . '</td>';
        echo '</tr>';
    }
?>