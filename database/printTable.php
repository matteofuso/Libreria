<?php

function printTable(array $headings, array $stdArray, bool $actions = false): void
{
    echo '<div class="control-overflow"><table class="table table-hover table-bordered table-striped">';
    echo '<tr>';
    foreach ($headings as $heading) {
        echo '<th>' . $heading . '</th>';
    }
    echo '</tr>';
    foreach ($stdArray as $row) {
        echo "<tr>";
        foreach ($row as $value) {
            echo '<td>' . $value . '</td>';
        }
        if ($actions) {
            echo '
                <td class="table-fit">
                    <button class="btn btn-primary btn-sm d-inline-flex align-items-center">
                        <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
                            <use href="#edit"></use>
                        </svg>
                    </button>
                    <button class="btn btn-danger btn-sm d-inline-flex align-items-center">
                        <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
                            <use href="#delete"></use>
                        </svg>
                    </button>
                </td>';
        }
        echo '</tr>';
    }
    echo '</table></div>' . PHP_EOL;
}