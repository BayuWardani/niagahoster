#!/bin/bash 
sudo docker container prune
sudo docker container ls -a
sudo docker image prune
sudo docker image ls

