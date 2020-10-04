<?php
		// connection details for the particular database: domain host will give you values to fill in the blank one here
    require_once("connectionDetails.php");

		// the value hooked (?) onto the AJAX request for this script
    $query = $_REQUEST['query'];

    try{
			/*
			 * 15.) new PHPDatabaseObject for a MySQL database -change the type of host in this line to work with any relational database.
			 * 16.) prepare the query that was passed in from the html text-area element
			 * 17.) execute the query
			 * 18.) put the results of the query into an associative array
			 */
        $conn = new PDO("mysql:host=$DBHost;dbname=$DBName", $DBUsername, $DBPassword);
        $select = $conn->prepare($query);
        $select->execute();
        $data = $select->fetchAll(PDO::FETCH_ASSOC);

			// echo meta data from database columns to html table elements
				// all the echo statements will be concatenated and returned to the JavaScript as 'responseText'
        echo "<table border='1'>";
        echo "<tr class='tableHeaders'>";
        for($i = 0; $i < $select->columnCount(); $i++){
            echo "<td>".$select->getColumnMeta($i)['name']."</td>";
        }
        echo "</tr>";


			// echo results of the query to html table elements
				/*
				 * Can't predict all possible associative array element names so
				 * enhanced for loop to walk through arrays and then an enhanced for
				 * loop to loop through elements in each array
				 */
        foreach($data as $row){
            echo "<tr>";
            foreach($row as $item){
                echo "<td>".$item."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
		
			// close the connection to the database
        $conn = null;
    }
    catch(PDOException $e){
			// handle any errors that occur
        echo "could not query database: ".$e->getMessage();
    }
?>