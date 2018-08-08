#!/usr/bin/env bash
curl --user ${CIRCLE_TOKEN}: \
    --request POST \
    --form revision=122682ce1b90289c6510eea177799ec756e9b06b \
    --form config=@config.yml \
    --form notify=false \
        https://circleci.com/api/v1.1/project/ github/nmardones/laravel-roles-permissions/tree/master
