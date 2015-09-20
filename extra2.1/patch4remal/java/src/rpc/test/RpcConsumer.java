
package rpc.test;  
  
import rpc.framework.RpcFramework;  
  
/* 
 * RpcConsumer 
 *  
 */  
public class RpcConsumer {  
      
    public void test() throws Exception {  
        HelloService service = RpcFramework.refer(HelloService.class, "127.0.0.1", 8082);  
        for (int i = 0; i < 10; i ++) {  
            String hello = service.hello("World" + i);  
            System.out.println(hello);  
            Thread.sleep(1000);  
        }  
    }  
      
}  
