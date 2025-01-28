<?php

function printTable(array $stdArray): void{
    if (count($stdArray) == 0){
        echo '<p>Non ci sono elementi da visualizzare</p>';
        return;
    }
    echo '<div class="control-overflow"><table class="table table-hover table-bordered table-striped">';
    foreach ($stdArray[0] as $key => $value){
        echo '<th>' . ucfirst(str_replace("_", " ", $key)) . '</th>';
    }
    foreach ($stdArray as $row){
        echo '<tr>';
        foreach ($row as $value){
            echo '<td>' . $value . '</td>';
        }
        echo '</tr>';
    }
    echo '</table></div>'.PHP_EOL;
}