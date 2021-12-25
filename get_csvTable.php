<?php
    function get_csvTable($table_name,$columns,$columns_names){
        require_once("config.php");
        $connection = new mysqli($servername, $username, $password, $dbname);
        $sql = "SELECT * from $table_name ORDER BY id DESC;";
        $result = $connection -> query($sql);
        $Table = '<table id="myTable">';
        
        $Table = $Table . '<tr>';
        foreach($columns_names as $col){
            $Table = $Table . '<th>' . $col . '</th>';
        }
        $Table = $Table . '</tr>';

        while($row = $result -> fetch_assoc()){
            $Table = $Table . '<tr>';
            foreach($columns as $col){
                $Table = $Table . '<td>' . $row[$col] . '</td>';
            }
            $Table = $Table . '</tr>';
        }
        $Table = $Table . '</table>';
        $Table = $Table . '<script>
        function htmlToCSV(filename) {
            var data = [];
            var rows = document.querySelectorAll("table tr");
                    
            for (var i = 0; i < rows.length; i++) {
                var row = [], cols = rows[i].querySelectorAll("td, th");
                        
                for (var j = 0; j < cols.length; j++) {
                        row.push(cols[j].innerText);
                }
                        
                data.push(row.join(",")); 		
            }
        
            downloadCSVFile(data.join("\n"), filename);
        }
        function downloadCSVFile(csv, filename) {
            var csv_file, download_link;
        
            csv_file = new Blob([csv], {type: "text/csv"});
        
            download_link = document.createElement("a");
        
            download_link.download = filename;
        
            download_link.href = window.URL.createObjectURL(csv_file);
        
            download_link.style.display = "none";
        
            document.body.appendChild(download_link);
        
            download_link.click();
        }
        </script>';
        return $Table;
    }