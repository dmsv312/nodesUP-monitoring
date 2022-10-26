#!/bin/bash

# Install frontend part
docker run --rm -v "$PWD/../www/frontend:/usr/src/app" -w /usr/src/app node:lts-alpine /bin/sh -c "apk update && apk add --no-cache git && npm install --location=global npm@latest && npm install"

# Install backend part
docker-compose --file ../docker-compose.yml run --rm php ./install.sh

# Stop all containers
./stop.sh
