<?php

echo "PHP Version: " . phpversion() . "\n";
echo "Loaded Extensions:\n";
echo "- pdo: " . (extension_loaded('pdo') ? 'yes' : 'no') . "\n";
echo "- pdo_pgsql: " . (extension_loaded('pdo_pgsql') ? 'yes' : 'no') . "\n";
echo "- pgsql: " . (extension_loaded('pgsql') ? 'yes' : 'no') . "\n";
echo "- mbstring: " . (extension_loaded('mbstring') ? 'yes' : 'no') . "\n";
echo "- openssl: " . (extension_loaded('openssl') ? 'yes' : 'no') . "\n";
echo "- curl: " . (extension_loaded('curl') ? 'yes' : 'no') . "\n";
echo "- json: " . (extension_loaded('json') ? 'yes' : 'no') . "\n";
echo "- xml: " . (extension_loaded('xml') ? 'yes' : 'no') . "\n";
echo "- tokenizer: " . (extension_loaded('tokenizer') ? 'yes' : 'no') . "\n";
echo "- ctype: " . (extension_loaded('ctype') ? 'yes' : 'no') . "\n";
echo "- fileinfo: " . (extension_loaded('fileinfo') ? 'yes' : 'no') . "\n";
echo "- gd: " . (extension_loaded('gd') ? 'yes' : 'no') . "\n\n";

echo "ENV vars:\n";
echo "- VERCEL_ENV: " . ($_ENV['VERCEL_ENV'] ?? 'not set') . "\n";
echo "- APP_KEY: " . (isset($_ENV['APP_KEY']) ? 'set (length=' . strlen($_ENV['APP_KEY']) . ')' : 'not set') . "\n";
echo "- DB_HOST: " . ($_ENV['DB_HOST'] ?? 'not set') . "\n";
echo "- DB_DATABASE: " . ($_ENV['DB_DATABASE'] ?? 'not set') . "\n";
echo "- DB_USERNAME: " . ($_ENV['DB_USERNAME'] ?? 'not set') . "\n";
echo "- DB_PASSWORD: " . (isset($_ENV['DB_PASSWORD']) ? 'set' : 'not set') . "\n\n";

echo "getenv():\n";
echo "- DB_HOST: " . (getenv('DB_HOST') ?: 'not set') . "\n";
echo "- DB_DATABASE: " . (getenv('DB_DATABASE') ?: 'not set') . "\n";
echo "- DB_USERNAME: " . (getenv('DB_USERNAME') ?: 'not set') . "\n";
echo "- DB_PASSWORD: " . (getenv('DB_PASSWORD') ? 'set' : 'not set') . "\n\n";

echo "POSTGRES_URL: " . (isset($_ENV['POSTGRES_URL']) ? 'set' : 'not set') . "\n";
