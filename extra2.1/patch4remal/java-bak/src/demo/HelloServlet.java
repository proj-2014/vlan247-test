package demo;

import java.io.IOException;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import java.sql.ResultSet; 
import java.sql.SQLException;  

import demo.DBHelper; 

/**
 * 最简单的Servlet
 * @author Winter Lau
 */
public class HelloServlet extends HttpServlet {
	
	static String sql = null;  
    static DBHelper db1 = null;  
    static ResultSet ret = null;  
    
    String getData(){
    	sql = "select *from user";//SQL语句  
        db1 = new DBHelper(sql);//创建DBHelper对象  
        String re = "" ;
  
        try {  
            ret = db1.pst.executeQuery();//执行语句，得到结果集  
            while (ret.next()) {  
                String uid = ret.getString(1);  
                String ufname = ret.getString(2);  
                String ulname = ret.getString(3);  
                String udate = ret.getString(4);  
                //System.out.println(uid + "\t" + ufname + "\t" + ulname + "\t" + udate );
                re = uid + "\t" + ufname + "\t" + ulname + "\t" + udate ;
            }//显示数据  
            ret.close();  
            db1.close();//关闭连接  
            
        } catch (SQLException e) {  
            e.printStackTrace();  
        }  
        return re;
    }
  

	@Override
	protected void service(HttpServletRequest req, HttpServletResponse res)
			throws ServletException, IOException {
		String data = getData();
		res.getWriter().println(data);
		res.getWriter().println("Hello World! 2222");
	}

}
