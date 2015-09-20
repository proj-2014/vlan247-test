#!/bin/bash

# --excludei  .*!\.java$
inotifywait -mr src   -e modify,create,attrib,delete | while read file ; 
do 
     echo $file; 
     javac src/demo/*.java  -classpath $CLASSPATH:webapp/WEB-INF/classes  -d  webapp/WEB-INF/classes
     echo tomcat restart now
     /etc/init.d/tomcat7 restart
done
