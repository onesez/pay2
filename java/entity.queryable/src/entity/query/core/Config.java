package entity.query.core;

import java.io.FileInputStream;
import java.io.IOException;
import java.net.URL;
import java.util.HashMap;
import java.util.List;
import java.util.Properties;

import org.jdom.Document;
import org.jdom.Element;
import org.jdom.JDOMException;
import org.jdom.input.SAXBuilder;

public final class Config {
	private String default_id;
	public final class DataSource{
		private String connectionString;
		public String getConnectionString() {
			return connectionString;
		}
		public void setConnectionString(String value) {
			connectionString = value;
		}
		
		private String uid;
		public String getUid() {
			return uid;
		}
		public void setUid(String value) {
			uid = value;
		}
		
		private String password;
		public String getPassword() {
			return password;
		}
		public void setPassword(String value) {
			password = value;
		}
		
		private String type;
		public String getType() {
			return type;
		}
		public void setType(String value) {
			type = value;
		}
		
		private String driver;
		public String getDriver() {
			return driver;
		}
		public void setDriver(String value) {
			driver = value;
		}
	}
	
	private static HashMap<String, DataSource> dataSourceMap;
	private Config(String xmlFileName) throws IOException, JDOMException {
		load(xmlFileName);
	}
	
	 private volatile static Config singleton;
	 public static Config getInstance(String xmlFileName) throws IOException, JDOMException {  
		if (singleton == null) {  
			synchronized (Config.class) {  
				if (singleton == null) {  
					singleton = new Config(xmlFileName);  
				}
			}
		}
		
		return singleton;
	 }
	
	/**
	 * 加载db-config.xml文件
	 * @throws IOException, JDOMException
	 */
	@SuppressWarnings({ "unchecked" })
	private void load(String xmlFileName) throws IOException, JDOMException
	{
		if(xmlFileName==null || xmlFileName.isEmpty() || xmlFileName.trim().isEmpty()) {
			xmlFileName = "db-config.xml";
		}
		dataSourceMap = new HashMap<String, DataSource>();
		URL configUrl = Thread.currentThread().getContextClassLoader().getResource(xmlFileName);
		
		Document document = new SAXBuilder().build(configUrl);//获取文件  
		Element root = document.getRootElement(); //获取到xml文件的根节点元素  
		
		Element environments = root.getChild("environments"); //通过根节点获取到它的直属子节点environments元素
		default_id = environments.getAttribute("default").getValue();
		List<Element> list = environments.getChildren();
		
		for(Element item : list) {
			
			DataSource result = new DataSource();
			
			String key = item.getAttribute("id").getValue();
			
			String type = item.getChild("transactionManager").getAttribute("type").getValue();
			result.setType(type);
			
			Element dataSourceEle = item.getChild("dataSource");
			List<Element> datas = dataSourceEle.getChildren();
			
			for(Element child : datas) {
				if("driver".equalsIgnoreCase(child.getAttribute("name").getValue())) {
					String driver = child.getAttribute("value").getValue();
					result.setDriver(driver);
					continue;
				}
				
				if ("url".equalsIgnoreCase(child.getAttribute("name").getValue())) {
					String url = child.getAttribute("value").getValue();
					result.setConnectionString(url);
					continue;
				}
				
				if("username".equalsIgnoreCase(child.getAttribute("name").getValue())) {
					String username = child.getAttribute("value").getValue();
					result.setUid(username);
					continue;
				}
				
				if("password".equalsIgnoreCase(child.getAttribute("name").getValue())) {
					String password = child.getAttribute("value").getValue();
					result.setPassword(password);
					continue;
				}
			}
			
			dataSourceMap.put(key, result);
		}
	}
	
	public DataSource getDataSource(String id) {
		
		if(id==null || id.isEmpty()) {
			id = default_id;
		}
		
		return dataSourceMap.get(id);
	}
	
	/**
	 * 加载xml文件
	 * @param configFileName
	 * @return
	 * @throws IOException
	 */
	public static Properties loadConfigureFileXml(String configFileName) throws IOException {
		Properties props = new Properties();
		FileInputStream inputStream = null;
		try {
			inputStream = new FileInputStream(configFileName);
			props.loadFromXML(inputStream);
		} finally {
			if (inputStream != null)
				inputStream.close();
		}
		return props;
	}

	/**
	 * 加载properties文件
	 * @param configFileName
	 * @return
	 * @throws IOException
	 */
	public static Properties loadConfigureFilePropertie(String configFileName) throws IOException {
		Properties props = new Properties();
		FileInputStream inputStream = null;
		try {
			inputStream = new FileInputStream(configFileName);
			props.load(inputStream);
		} finally {
			if (inputStream != null)
				inputStream.close();
		}
		return props;
	}
}
