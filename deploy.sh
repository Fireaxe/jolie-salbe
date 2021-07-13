#!/bin/bash

export AWS_BUCKET_NAME="jolysable.fr"
export AWS_CLOUDFRONT="E12GJ1VPN87VGT"
export AWS_ACCESS_KEY_ID="AKIAI5QVSGKSXRLYOUSQ"
export AWS_SECRET_ACCESS_KEY="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"
export AWS_DEFAULT_REGION="eu-west-1"

# Load nvm (node version manager), install node (version in .nvmrc), and npm install packages
[ -s "$HOME/.nvm/nvm.sh" ] && source "$HOME/.nvm/nvm.sh" && nvm use
# Npm install if not already.
[ ! -d "node_modules" ] && npm install

yarn build --mode=production
gulp deploy
