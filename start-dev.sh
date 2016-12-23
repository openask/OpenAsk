#!/bin/bash

RUNTIME_DIR=`pwd`/runtime

./yii serve --docroot=@app/web --port=8080 127.0.0.1 &
echo $! > $RUNTIME_DIR/run-start-dev-yii

cd themes/sf/media
gulp
gulp watch &
echo $! > $RUNTIME_DIR/run-start-dev-gulp

browser-sync start -p 127.0.0.1:8080  -f '*.css' &
echo $! > $RUNTIME_DIR/run-start-dev-browser-sync
