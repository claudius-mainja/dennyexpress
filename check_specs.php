<?php
$db = new SQLite3('database/database.sqlite');
$results = $db->query("SELECT slug, specifications FROM products WHERE specifications IS NOT NULL LIMIT 5");
while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
    echo $row['slug'] . ': ' . $row['specifications'] . PHP_EOL . PHP_EOL;
}
