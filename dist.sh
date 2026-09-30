#!/bin/bash

PLUGIN_SLUG="simple-shibboleth"

mkdir -p build/"$PLUGIN_SLUG"
rsync -a --exclude-from=.distignore --exclude=build ./ build/"$PLUGIN_SLUG"/

cd build
zip -r "$PLUGIN_SLUG.zip" "$PLUGIN_SLUG"
unzip -l "$PLUGIN_SLUG.zip"

cd ..
rm -rf build/"$PLUGIN_SLUG"
echo "Distribution package created: build/$PLUGIN_SLUG.zip"
