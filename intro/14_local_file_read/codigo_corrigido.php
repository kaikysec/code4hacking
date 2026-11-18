<?php

$teste_vulneravel = "../../../../../etc/passwd";
$teste_basename = basename("../../../../../etc/passwd");

echo "Codigo sem o basename: {$teste_vulneravel}\n";
echo "Codigo com o basename: {$teste_basename}";
