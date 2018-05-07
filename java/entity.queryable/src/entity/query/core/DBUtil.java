package entity.query.core;

import java.io.FileNotFoundException;
import java.io.IOException;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.ResultSetMetaData;
import java.sql.SQLException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class DBUtil {

    public static <T> Boolean execute(Connection conn, Class<T> clazz, String sql, Object... args) {  
        
        PreparedStatement preparedstatement = null;  
        Boolean rs = null;  
        
        try {  
    	    
        	//sql = sql.replaceAll(RegexUtil.Args, "?");
        	
        	if(conn == null) {
        		conn = ConnectionFactory.getConnection(clazz);
        	}
              
            preparedstatement = conn.prepareStatement(sql);  
            
            // ͨ��sql������ж�ѡ������Щ��  
            /*for (int i = 0; i < args.length; i++) {  
                preparedstatement.setObject(i + 1, args[i]);  
            }*/
            // ����sql��ѯ��ȡ�����  
            // ���÷��䴴��ʵ����Ķ���  
            // ��ȡ����ֵı���Stud_id ��ȡJDBC��Ԫ����  
            // ��ȡ�����ÿһ�е�ֵ�������һ���õ�һ��Map��ֵ��  
            // �����еı��� ֵ���е�ֵ  
            // �����÷����ʵ�����������Ը�ֵ  
            // ����ΪMap�ļ� ֵΪMap��ֵ  
            rs = preparedstatement.execute();  

            return rs;
  
        } catch (Exception e) {  
            e.printStackTrace();  
        }
        finally {
			try {
				if(!conn.isClosed()) {
					conn.close();
				}
			} catch (SQLException e) {
				e.printStackTrace();
			}
        }

        return false;
    }
    
    @SuppressWarnings("unchecked")
	public static <T> List<T> query(Connection conn, Class<T> clazz, String sql, Boolean isScalar, Object... args) {  
        
        PreparedStatement preparedstatement = null;  
        ResultSet rs = null;  
        List<T> list = new ArrayList<T>();  
        T obj = null;
        
        try {  
    	    
        	//sql = sql.replaceAll(RegexUtil.Args, "?");

            preparedstatement = conn.prepareStatement(sql);  
            
            // ͨ��sql������ж�ѡ������Щ��  
            /*for (int i = 0; i < args.length; i++) {  
                preparedstatement.setObject(i + 1, args[i]);  
            } */ 
            // ����sql��ѯ��ȡ�����  
            // ���÷��䴴��ʵ����Ķ���  
            // ��ȡ����ֵı���Stud_id ��ȡJDBC��Ԫ����  
            // ��ȡ�����ÿһ�е�ֵ�������һ���õ�һ��Map��ֵ��  
            // �����еı��� ֵ���е�ֵ  
            // �����÷����ʵ�����������Ը�ֵ  
            // ����ΪMap�ļ� ֵΪMap��ֵ  
            rs = preparedstatement.executeQuery();  
            // ��ȡԪ����  
            ResultSetMetaData rsmd = rs.getMetaData();  
            Map<String, Object> mapMetaData = new HashMap<String, Object>();  
            // ��ӡһ�е�����  
  
            while (rs.next()) {
            	int columnCount = rsmd.getColumnCount(); 
            	Boolean singleNumberValue = false;
                //��ȡ���ݱ�������Ҫ���һ�����ݣ�������Map��  
                for (int i = 0; i < columnCount; i++) {  
                    String columnLabel = rsmd.getColumnLabel(i + 1);  
                    Object columnValue = rs.getObject(columnLabel);  
                    // System.out.println(columnLabel);  
                    mapMetaData.put(columnLabel, columnValue);  
                    if(columnCount == 1 && columnValue instanceof Number) {
                    	singleNumberValue = true;
                    }
                }  
                //��Map�е�����ͨ�������ʼ��T���Ͷ���  
                if (mapMetaData.size() > 0) {  
                    
                	if(isScalar && singleNumberValue) {
                        for (Map.Entry<String, Object> entry : mapMetaData.entrySet()) {  
                            Object fieldvalue = entry.getValue();  
                            list.add((T) fieldvalue);
                        }  
                		break;
                	}
                	
                	else {
                        obj = ReflectionUtil.getInstance(clazz);
                        for (Map.Entry<String, Object> entry : mapMetaData.entrySet()) {  
                            String fieldkey = entry.getKey();  
                            Object fieldvalue = entry.getValue();  
                            // System.out.println(fieldkey + ":" + fieldvalue);  
                            //ͨ�����丳ֵ 
                            ReflectionUtil.setFieldValue(clazz, obj, fieldkey, fieldvalue);  
                        }                  		
                	}
                }  
                //������װ��list����  
                list.add(obj);  
            }  
  
        } catch (Exception e) {  
            e.printStackTrace();
        }  
  
    	try {
			if(!conn.isClosed()) {
				conn.close();
			}
		} catch (SQLException e) {
			e.printStackTrace();
		}
    	
        return list;  
    }
    
	public static String getSql(String sql, Object... args) {
	    
		sql = sql.replaceAll(RegexUtil.Args, "%s");
		for(int i=0;i<args.length;i++) {
			Object arg = args[i];
			if(arg instanceof String) {
				args[i] = String.format("'%s'", getSqlInjValue(arg));
				continue;
			}
			
			if(arg instanceof Boolean) {
				if((Boolean)arg) {
					args[i] = 1;
				}
				
				else {
					args[i] = 0;
				}
				continue;
			}
			
			if(arg instanceof java.util.Date) {
				String val = (new SimpleDateFormat("yyyy-MM-dd HH:mm:ss.SSS")).format((java.util.Date)arg);
				args[i] = String.format("'%s'", val);
				continue;
			}
			
			if(arg instanceof java.sql.Date) {
				String val = (new SimpleDateFormat("yyyy-MM-dd HH:mm:ss.SSS")).format((java.sql.Date)arg);
				args[i] = String.format("'%s'", val);
				continue;
			}
			

			if(arg instanceof Object) {
				try {
					args[i] = getSqlInjValue(SerializeUtil.getBase64String(arg));
				} catch (FileNotFoundException e) {
					e.printStackTrace();
				} catch (IOException e) {
					e.printStackTrace();
				}
				continue;
			}
			
			args[i] = getSqlInjValue(arg);
		}
		
		sql = String.format(sql, args);
		
		return sql;
	}
	
	private static String getSqlInjValue(Object arg) {
		return arg.toString().replaceAll("'","''");
	}
}
