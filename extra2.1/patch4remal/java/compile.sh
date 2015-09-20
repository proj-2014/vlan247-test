

#! /bin/sh

# Defin constants
PROJ_PATH=/temp/rsync/test/wordpress/extra2.1/patch4remal/java
JAR_PATH=$PROJ_PATH/lib
BIN_PATH=$PROJ_PATH/bin
SRC_PATH=$PROJ_PATH/src


# remove the source.list if it exists and create new one
rm -f $SRC_PATH/sources.list
find $SRC_PATH/  -name *.java > $SRC_PATH/sources.list

# remove the bin directory if it exists and create new one 
rm -rf $BIN_PATH/
mkdir $BIN_PATH/

# compile the project
javac -d $BIN_PATH/  -classpath  $CLASSPATH:$BIN_PATH:$JAR_PATH -encoding utf8  @$SRC_PATH/sources.list
cd $BIN_PATH
jar -cvf calculator.jar calculator/
jar -cvf rpc.jar  rpc/
cd ..

# mv jar to lib
mv $BIN_PATH/*.jar   $JAR_PATH/

