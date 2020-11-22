#!/bin/sh
docker-compose build --no-cache
docker stop bb
docker rm bb
docker-compose up -d
docker ps
