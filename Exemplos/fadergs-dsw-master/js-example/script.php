<?php

$data = array(
    "Alisson",
    "Anderson",
    "Andressa",
    "Bruna",
    "Daniel",
    "Felipe",
    "Gabriel",
    "Glaiton",
    "Ismael",
    "Italomar",
    "Ivanilso",
    "Julia",
    "Leonardo",
    "Leonardo",
    "Lidiane",
    "Luan",
    "Lucas",
    "Luciano",
    "Luis",
    "Matheus",
    "Pedro",
    "Rodrigo",
    "Roger",
    "Silvio",
    "Suellen",
    "Vanderlei",
    "Vitor",
    "William",
    "William",
    "William"
);

function sorteio() {
    global $data;
    $nome = $data[rand() % count($data)];
    $pontos = rand() % 50;
    return array("nome" => $nome, "pontos" => $pontos);
}

$winners = array_map(sorteio, range(0, 4));

echo json_encode($winners);

?>
