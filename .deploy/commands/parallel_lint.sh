#!/bin/bash
# Laravel boilerplate githook script

if [[ $CIRCLECI == true ]]
then
    composer run parallel-lint
else
    docker exec fl-assessment composer run parallel-lint
fi


RESULT=$?
[[ $RESULT -eq 0 ]] &&
echo -e "\e[32m\n\t***************************\n\t*  PHP lint check passed  *\n\t***************************\e[m\n\n"

exit $RESULT
