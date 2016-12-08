#!/bin/bash

RUNTIME_DIR=`pwd`/runtime

# kill yii
kill `ps -ef|grep './yii serve --docroot=@app/web --port=8080 127.0.0.1'|head -n1|awk '{print $2}'`
# kill php
kill `ps -ef|grep '\-S 127.0.0.1:8080 \-t'|head -n1|awk '{print $2}'`
# kill gulp
kill `cat $RUNTIME_DIR/run-start-dev-gulp`
# kill browser-sync
kill `ps -ef|grep 'browser-sync start -p 127.0.0.1:8080 -f'|head -n1|awk '{print $2}'`
