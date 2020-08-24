#!/bin/bash

rm -Rf docs/build/API/API
rm -Rf docs/source/API/API
git add -A docs/
git commit -m "Removed documentation"
composer global require code-lts/doctum:^5.0
/usr/bin/env php $(composer global config home)/vendor/bin/doctum.php update doctum_configuration.php -v
mv docs/build/API/API docs/source/API/API
sh -c "cd docs && make clean && make html"
git add -A docs/
git commit -m "Updated documentation" --amend