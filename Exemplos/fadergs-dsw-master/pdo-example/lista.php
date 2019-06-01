<?php

include('database_functions.php');

$pdo = connect_to_database("alunos");

$sql = "SELECT * FROM alunos";
$result = $pdo->query($sql);

echo "<!DOCTYPE html><html><body><table border='1'>";
echo "<thead><tr><th>Nome</th><th>M1</th><th>M2</th><th>G2</th></tr><thead>";
echo "<tbody>";

while ($row = $result->fetch()) {
    echo "\n<tr>".
       "<td>".$row['nome']."</td>".
        "<td>".($row['m1'] == NULL ? "-" : $row['m1'])."</td>".
        "<td>".($row['m2'] == NULL ? "-" : $row['m2'])."</td>".
        "<td>".($row['g2'] == NULL ? "-" : $row['g2'])."</td>".
        "</tr>";
}

echo "<tbody>";
echo "</table></body></html>";

?>
