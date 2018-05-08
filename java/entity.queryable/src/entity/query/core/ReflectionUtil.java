package entity.query.core;

import java.lang.reflect.Field;
import java.lang.reflect.Modifier;
import java.util.HashMap;
import com.esotericsoftware.reflectasm.ConstructorAccess;
import com.esotericsoftware.reflectasm.MethodAccess;

public class ReflectionUtil {

	private volatile static HashMap<String, MethodAccess> methodMap = new HashMap<String, MethodAccess>();
	private volatile static HashMap<String, ConstructorAccess<?>> objMap = new HashMap<String, ConstructorAccess<?>>();
	private static <T> MethodAccess getMethodAccess(Class<T> clazz) {  
		
		if (!methodMap.containsKey(clazz.getName())) {  
			synchronized (methodMap) {  
				if (!methodMap.containsKey(clazz.getName())) {  
					methodMap.put(clazz.getName(), MethodAccess.get(clazz));  
				}
			}
		}
		
		Object obj = methodMap.get(clazz.getName());
		
		if(null == obj) {
			return null;
		}
		
		return (MethodAccess)obj;
	}
	
  
	@SuppressWarnings("unchecked")
	private static <T> ConstructorAccess<T> getConstructorAccess(Class<T> clazz){
		if (!objMap.containsKey(clazz.getName())) {  
			synchronized (objMap) {  
				if (!objMap.containsKey(clazz.getName())) {  
					objMap.put(clazz.getName(), ConstructorAccess.get(clazz));  
				}
			}
		}
		
		return (ConstructorAccess<T>) objMap.get(clazz.getName());
	}
	
	public static <T> T getInstance(Class<T> clazz) {
		ConstructorAccess<T> access = getConstructorAccess(clazz);
		return access.newInstance();
	}
	
    private static String getMethodName(String fieldname, String method) {
    	String result = "";
    	String[] arr = fieldname.split("_");
    	for(String item : arr) {
    		result += item.substring(0, 1).toUpperCase() + item.substring(1);
    	}
    	result = String.format("%s%s", method, result);
    	
		return result;
	}
    
    public static Object getFieldValue(Class<?> clazz, Object obj, String fieldname) {
    	MethodAccess access = getMethodAccess(clazz);
    	String[] names = access.getMethodNames();
    	Boolean hasMethod = false;
    	String method = getMethodName(fieldname, "get");
    	for(String name : names) {
    		if(name.equals(method)) {
    			hasMethod = true;
    		}
    	}
    	
    	if(hasMethod) {
        	Object value = access.invoke(obj, method);
        	
        	return value;
    	}
    	
    	return null;
    }

	public static void setFieldValue(Class<?> clazz, Object obj, String fieldname, Object value) {
    	MethodAccess access = getMethodAccess(clazz);
    	String[] names = access.getMethodNames();
    	Boolean hasMethod = false;
    	String method = getMethodName(fieldname, "set");
    	for(String name : names) {
    		if(name.equals(method)) {
    			hasMethod = true;
    		}
    	}
    	
    	if(hasMethod) {
    		access.invoke(obj, method, value);
    	}
    }
	
	//��ȡ���������  
    public static Object getFieldValue(Object obj, String fieldName){  
        Field field=getDeclaredField(obj, fieldName);  
        if(field==null){  
            throw new IllegalArgumentException("Could not find field["+  
        fieldName+"] on target ["+obj+"]");  
        }  
          
        makeAccessiable(field);  
        
        Object result = null;
        try{
        	result = field.get(obj);  
        }catch(IllegalAccessException e){  
            System.out.println("ReflectionUtil Error:" + e.getMessage());  
        }
		return result;  
    }
    
	//���ö��������  
    public static void setFieldValue(Object obj, String fieldName, Object value){  
        Field field=getDeclaredField(obj, fieldName);  
        if(field==null){  
            throw new IllegalArgumentException("Could not find field["+  
        fieldName+"] on target ["+obj+"]");  
        }  
          
        makeAccessiable(field);  
        try{
            field.set(obj, value);  
        }catch(IllegalAccessException e){  
            System.out.println("ReflectionUtil Error:" + e.getMessage());  
        }  
          
    }
      
    //�ж�field�����η��Ƿ���public,���ݴ˸ı�field�ķ���Ȩ��  
    public static void makeAccessiable(Field field){  
        if(!Modifier.isPublic(field.getModifiers())){  
            field.setAccessible(true);  
        }  
    }  
      
    //��ȡfield���ԣ������п����ڸ����м̳�  
    public static Field getDeclaredField(Object obj, String fieldName){  
    	
        for(Class<?> clazz=obj.getClass(); clazz!=Object.class; clazz=clazz.getSuperclass()){  
            try{  
                return clazz.getDeclaredField(fieldName);  
            }catch(Exception e){  
                  
            }  
        }  
        return null;  
    }  
}
