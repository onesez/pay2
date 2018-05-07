package entity.query.core;

import java.io.ByteArrayInputStream;  
import java.io.ByteArrayOutputStream;  
import java.io.FileNotFoundException;  
import java.io.FileOutputStream;  
import java.io.IOException;  
import java.io.ObjectInputStream;  
import java.io.ObjectOutputStream;  
import java.util.Locale;  
  
public class SerializeUtil {  
  
    /** 
     * ������Ķ���ϵ�л��󣬴������stringָ�����ļ����������л���Ķ���ת����ʮ�������ַ������� 
     * @param object �����л��Ķ��� 
     * @param string �洢�ļ��� 
     * @return string ���л���Ķ����ʮ�������ַ��� 
     * @throws FileNotFoundException 
     * @throws IOException 
     */  
    public static String getBase64String(Object object)  
            throws FileNotFoundException, IOException {  
          
        ByteArrayOutputStream baos = new ByteArrayOutputStream();  
        //���ڽ�����ת����byte[]�����ObjectOutputStream  
        ObjectOutputStream oos = new ObjectOutputStream(baos);  
        //������д��ByteArrayOutputStream  
        oos.writeObject(object);  
        byte[] bytes = baos.toByteArray();  
        oos.close();   
        baos.close();  
        return bytesToHexString(bytes);  
  
    }
    
    public static String serialize(Object object, String strFile) throws FileNotFoundException, IOException {
        ByteArrayOutputStream baos = new ByteArrayOutputStream();  
        //���ڽ�����ת����byte[]�����ObjectOutputStream  
        ObjectOutputStream oos = new ObjectOutputStream(baos);  
        //������д��ByteArrayOutputStream  
        oos.writeObject(object);  
        byte[] bytes = baos.toByteArray();  
        //���ڽ�����������ļ���ObjectOutputStream  
        ObjectOutputStream oos2 = new ObjectOutputStream(new FileOutputStream(strFile));  
        //������д��stringָ�����ļ���  
        oos2.writeObject(object);  
        oos.close();  
        oos2.close();  
        baos.close();  
        return bytesToHexString(bytes);  
    }
  
    /** 
     * �����л�������ʮ�������ַ���ʾ�Ķ������л��ɶ��� 
     * @param hexString ���л������ʮ�����Ʊ�ʾ��ʽ���ַ��� 
     * @return �����л����ɵĶ��� 
     * @throws IOException 
     * @throws ClassNotFoundException 
     */  
    public static Object getObject(String hexString) throws IOException,  
            ClassNotFoundException {  
        byte[] bytes = hexStringToBytes(hexString);  
        ByteArrayInputStream bais = new ByteArrayInputStream(bytes);  
        ObjectInputStream ois = new ObjectInputStream(bais);  
        return ois.readObject();  
    }  
  
    /** 
     * �������byte[]����ת����ʮ�����������ַ��� 
     * @param src Ҫת����byte���� 
     * @return ����ʮ�����Ƶ��ַ��� 
     */  
    private static String bytesToHexString(byte[] src) {  
        StringBuilder stringBuilder = new StringBuilder("");  
        if (src == null || src.length <= 0) {  
            return null;  
        }  
        for (int i = 0; i < src.length; i++) {  
            int v = src[i] & 0xFF;  
            //��һ��byte�Ķ�������ת����ʮ�������ַ�  
            String hv = Integer.toHexString(v);  
            //�����������ת����ʮ����������λΪ0�������'0'�ַ�  
            if (hv.length() < 2) {  
                stringBuilder.append(0);  
            }  
            stringBuilder.append(hv);  
        }  
        return stringBuilder.toString();  
    }  
  
    /** 
     * ����������ʮ�����Ʊ�ʾ���ַ���ת����byte���� 
     * @param hexString 
     * @return �����Ʊ�ʾ��byte[]���� 
     */  
    private static byte[] hexStringToBytes(String hexString) {  
        if (hexString == null || hexString.equals("")) {  
            return null;  
        }  
        hexString = hexString.toUpperCase(Locale.getDefault());  
        int length = hexString.length() / 2;  
        //��ʮ�������ַ���ת�����ַ�����  
        char[] hexChars = hexString.toCharArray();  
        byte[] d = new byte[length];  
        for (int i = 0; i < length; i++) {  
            //һ��ȥ�����ַ�  
            int pos = i * 2;  
            //�����ַ�һ����Ӧbyte�ĸ���λһ����Ӧ����λ  
            d[i] = (byte) (charToByte(hexChars[pos]) << 4 | charToByte(hexChars[pos + 1]));  
        }  
        return d;  
    }  
  
    /** 
     * �����������ַ����������ת���ɶ������� 
     * @param c Ҫת�����ַ� 
     * @return ��byte���������ͷ����ַ���������ֵĶ����Ʊ�ʾ��ʽ 
     */  
    private static byte charToByte(char c) {  
        return (byte) "0123456789ABCDEF".indexOf(c);  
    }  
  
}  