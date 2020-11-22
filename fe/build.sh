#!/bin/sh
docker build --tag frontend:1.0 --no-cache .
docker stop fe
docker rm fe
docker run --publish 8005:8005 --detach --name fe frontend:1.0
docker ps
