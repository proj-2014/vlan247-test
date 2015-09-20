
<?PHP

require_once("http://127.0.0.1:8081/JavaBridge/java/Java.inc");
java_require("calculator.jar");
java_require("rpc.jar");

class JavaHandler{


    function get(){
       echo "hello Java Handler here";
       $CA = new Java("calculator.CalculatorBean");

       $session = java_session();

       if(is_null(java_values($calcinstance=$session->get("calculatorInstance")))) {
           $session->put("calculatorInstance", $calcinstance=new Java("calculator.CalculatorBean"));
       }
       echo "<br>after calcultator";
       echo "<br>session from java = ". java_values($calcinstance=$session->get("calculatorInstance"));
   
       if( eregi( '^/java/rpc/*', $_SERVER['REQUEST_URI']))
       {
           $RPC = new Java("rpc.test.RpcConsumer");
           $RPC->test();     
           echo "<br> RPC Service on 8082 ";  
       }


    }

    function post_xhr(){

       if( eregi( '^/login/*', $_SERVER['REQUEST_URI']))
        {
               
        }
     
   } 
}

?>
