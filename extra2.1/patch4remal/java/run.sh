
#!/bin/sh

# Define constants
PROJ_PATH=/temp/rsync/test/wordpress/extra2.1/patch4remal/java
JAR_PATH=$PROJ_PATH/lib
BIN_PATH=$PROJ_PATH/bin
SERV_PORT=8081

java -Djava.ext.dirs=/usr/b/jvm/java-7-openjdk-i386/jre/lib/ext:/usr/java/packages/lib/ext:$JAR_PATH -jar $JAR_PATH/JavaBridge.jar SERVLET_LOCAL:$SERV_PORT
