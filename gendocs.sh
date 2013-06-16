#/bin/bash

apigen --source . --destination docs --exclude "*libraries/Imagine/*" --exclude "*docs*" --template-config $HOME/apps/composer/vendor/apigen/apigen/templates/bootstrap/config.neon --title Thumbnails