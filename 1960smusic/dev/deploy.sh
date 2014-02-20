#!/bin/bash
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
lessc $DIR/../assets/less/application.less assets/css/application.css
