
package demo.rpc.test;  
  
import demo.rpc.framework.RpcFramework;  
  
/** 
 * RpcConsumer 
 *  
 * @author william.liangf 
 */  
public class RpcConsumer2 {  
      
    public static void hello(String[] args) throws Exception {  
        HelloService service = RpcFramework.refer(HelloService.class, "127.0.0.1", 1234);  
        for (int i = 0; i < Integer.MAX_VALUE; i ++) {  
            String hello = service.hello("World" + i);  
            System.out.println(hello);  
            Thread.sleep(1000);  
        }  
    }  
      
}  
