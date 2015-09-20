

package rpc.test;

import rpc.framework.RpcFramework;

/**
 * RpcProvider
 * 
 */
public class RpcProvider {

    public static void main(String[] args) throws Exception {
        HelloService service = new HelloServiceImpl();
        RpcFramework.export(service, 8082);
    }

}

