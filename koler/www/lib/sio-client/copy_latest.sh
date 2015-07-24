#!/bin/bash
path=$( cd "$(dirname "${BASH_SOURCE}")" ; pwd -P )

cd "$path"
cp $path/socket.io-client/socket.io.js $path
