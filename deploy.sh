#!/bin/bash

export AWS_BUCKET_NAME="jolysable.fr"
export AWS_DEFAULT_REGION="eu-west-1"

set -o allexport
source .env.local
set +o allexport

# Load nvm (node version manager), install node (version in .nvmrc), and npm install packages
[ -s "$HOME/.nvm/nvm.sh" ] && source "$HOME/.nvm/nvm.sh" && nvm use
# Npm install if not already.
[ ! -d "node_modules" ] && npm install

yarn build --mode=production
gulp deploy
