<?php session_start(); ?>

<?php 
//java_require("./calculator.jar");
//require_once("java/Java.inc");
require_once(http://127.0.0.1:8081/java/Java.inc);
$session = java_session();

if(is_null(java_values($calcinstance=$session->get("calculatorInstance")))) {
  $session->put("calculatorInstance", $calcinstance=new Java("calculator.CalculatorBean"));
}

$result = 0;
$opr = "none";
$term_1 = 0;
$term_2 = 0;

if(isset($_POST['operationName'])) { $opr = $_POST['operationName']; }
if(isset($_POST['term1Name'])) { $term_1 = $_POST['term1Name']; }
if(isset($_POST['term2Name'])) { $term_2 = $_POST['term2Name']; }
 
if(strcmp($opr,"none") != 0)
   {   
   if(strcmp($opr,"+") == 0)
     { $result = java_values($calcinstance->addAB($term_1,$term_2)); }
   
   if(strcmp($opr,"-") == 0)
     { $result = java_values($calcinstance->subAB($term_1,$term_2)); }
     
   if(strcmp($opr,"*") == 0)
     { $result = java_values($calcinstance->mplAB($term_1,$term_2)); }    
     
   if(strcmp($opr,"/") == 0)
     { $result = java_values($calcinstance->divAB($term_1,$term_2)); }  
   } else {
          $result = 0;
          $opr = "none";
          $term_1 = 0;
          $term_2 = 0;
          }   
?>
<html>
 <head>
  <title>Simple Calculator</title>
 </head>

 <script type="text/javascript">
  function numbers(objjs){
  
  if(objjs == "=")
     {
     if(document.getElementById("term2ID").value == 0)
       {document.getElementById("term2ID").value = document.getElementById("valuefieldID").value;}
     document.getElementById("valuefieldID").value = "";      
     document.calcForm.submit(); 
     } else if((objjs == "+")||(objjs == "-")||(objjs == "*")||(objjs == "/"))
                {       
                document.getElementById("operationID").value = objjs;
                if(document.getElementById("valuefieldID").value == "")
                   { document.getElementById("valuefieldID").value = 
                               document.getElementById("term1ID").value; }
                     else { document.getElementById("term1ID").value = 
                               document.getElementById("valuefieldID").value; }
                document.getElementById("term2ID").value = 0;
                document.getElementById("valuefieldID").value = "";     
                } else {
                       if(document.getElementById("valuefieldID").value == 0) { 
                               document.getElementById("valuefieldID").value = ""; }
                       var calcValue = document.getElementById("valuefieldID").value;
                       calcValue = calcValue + objjs;
                       document.getElementById("valuefieldID").value = calcValue;
                       }    
   }
  
  function resetCalc(){
   document.getElementById("valuefieldID").value = "";
   document.getElementById("operationID").value = "none";
   document.getElementById("term1ID").value = 0;
   document.getElementById("term2ID").value = 0;
   document.calcForm.submit(); 
  }
 </script>
 
<body>

<?php
//retrieve session data
echo "session from php calculatorInstance =". $_SESSION['calculatorInstance'];

//require_once("java/Java.inc");
//$session = java_session();

echo "<br>session from java = ". java_values($calcinstance=$session->get("calculatorInstance"));

?>

  <form name="calcForm" action="<?php echo $PHP_SELF ?>" method="post">
   <table>
    <tr>
     <td align="right" colspan="4">
      <input align="right" id="valuefieldID" type="text" value="<?php echo $result; ?>" disabled>
     </td>
    </tr>    
    <tr>
     <td>
      <input type="button" value="1" onclick="numbers(1);">
     </td>
     <td>
      <input type="button" value="2" onclick="numbers(2);">
     </td>
     <td>
      <input type="button" value="3" onclick="numbers(3);">
     </td>
     <td>
      <input type="button" style="background-color:#cc0000;color:#ffffff" 
       value="+" onclick="numbers('+');">
     </td>
    </tr>
    <tr>
     <td>
      <input type="button" value="4" onclick="numbers(4);">
     </td>
     <td>
      <input type="button" value="5" onclick="numbers(5);">
     </td>
     <td>
      <input type="button" value="6" onclick="numbers(6);">
     </td>
     <td>
      <input type="button" style="background-color:#cc0000;color:#ffffff" 
       value="-" onclick="numbers('-');">
     </td>
    </tr> 
    <tr>
     <td>
      <input type="button" value="7" onclick="numbers(7);">
     </td>
     <td>
      <input type="button" value="8" onclick="numbers(8);">
     </td>
     <td>
      <input type="button" value="9" onclick="numbers(9);">
     </td>
     <td>
      <input type="button" style="background-color:#cc0000;color:#ffffff" 
       value="*" onclick="numbers('*');">
     </td>
    </tr> 
    <tr>
     <td>
      <input type="button" value="0" onclick="numbers(0);">
     </td>    
     <td>
      <input type="button" value="=" onclick="numbers('=');">
     </td>
     <td>
      <input type="button" style="background-color:#000000;color:#ffffff" 
       value="C" onclick="resetCalc();">
     </td>
     <td>
      <input type="button" style="background-color:#cc0000;color:#ffffff" 
       value="/" onclick="numbers('/');">
     </td>
    </tr>  
   </table>
   
   <input id="operationID" name="operationName" type="hidden" value="<?php echo $opr; ?>">
   <input id="term1ID" name="term1Name" type="hidden" value="<?php echo $result; ?>">
   <input id="term2ID" name="term2Name" type="hidden" value="<?php echo $term_2; ?>">
  </form> 

</body>
</html>
