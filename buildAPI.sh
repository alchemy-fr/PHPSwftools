#!/bin/bash

rm -Rf docs/source/API/API
composer global require code-lts/doctum:^5.0
/usr/bin/env php $(composer global config home)/vendor/bin/doctum.php update doctum_configuration.php -v
sh -c "cd docs && make clean && make html"
