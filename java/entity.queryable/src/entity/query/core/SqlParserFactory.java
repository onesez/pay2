package entity.query.core;

import java.io.IOException;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

import org.jdom.JDOMException;

import entity.query.annotation.DBConfig;
import entity.query.core.parser.DB2Parser;
import entity.query.core.parser.MysqlParser;
import entity.query.core.parser.OdbcParser;
import entity.query.core.parser.OracleParser;
import entity.query.core.parser.PostgresqlParser;
import entity.query.core.parser.SqLiteParser;
import entity.query.core.parser.SqlserverParser;
import entity.query.core.parser.SybaseParser;

public class SqlParserFactory<T> {
	
	private SqlParserFactory() {
		
	}
	
	@SuppressWarnings("rawtypes")
	private volatile static SqlParserFactory singleton;
	
	@SuppressWarnings("rawtypes")
	public static SqlParserFactory getInstance() {  
		if (singleton == null) {  
			synchronized (Config.class) {  
				if (singleton == null) {  
					singleton = new SqlParserFactory();  
				}
			}
		}
		
		return singleton;
	}
	
	public ISqlParser CreateParser(Class<T> clazz) {
		
		String type = null;
		DBConfig ann = clazz.getAnnotation(DBConfig.class);
		if(ann == null) {
			try {
				Config conf = Config.getInstance(null);
				String url = conf.getDataSource(null).getConnectionString();
				Pattern pattern = Pattern.compile("(?i)(oracle|sqlserver|mysql|postgresql|sybase|db2|odbc)");
				Matcher matcher = pattern.matcher(url);
				if(matcher.find()) {
					type = matcher.group(1);
				}
			} catch (IOException e) {
				e.printStackTrace();
			} catch (JDOMException e) {
				e.printStackTrace();
			}
		}
		
		else {
			if(ann.dbType().isEmpty()) {
				if(!ann.id().isEmpty()) {
					try {
						Config conf = Config.getInstance(ann.path());
						String url = conf.getDataSource(ann.id()).getConnectionString();
						Pattern pattern = Pattern.compile("(?i)(oracle|sqlserver|mysql|postgresql|sybase|db2|odbc)");
						Matcher matcher = pattern.matcher(url);
						if(matcher.find()) {
							type = matcher.group(1);
						}
					} catch (IOException e) {
						e.printStackTrace();
					} catch (JDOMException e) {
						e.printStackTrace();
					}
				}
			} else {
				type = ann.dbType();
			}
		}
		
		if(type.isEmpty()) {
			return null;
		}
		
		if("mysql".equalsIgnoreCase(type.trim())) {
			return new MysqlParser();
		}
		
		if("oracle".equalsIgnoreCase(type.trim())) {
			return new OracleParser();
		}
		
		if("db2".equalsIgnoreCase(type.trim())) {
			return new DB2Parser();
		}
		
		if("odbc".equalsIgnoreCase(type.trim())) {
			return new OdbcParser();
		}
		
		if("postgresql".equalsIgnoreCase(type.trim())) {
			return new PostgresqlParser();
		}
		
		if("sqlserver".equalsIgnoreCase(type.trim())) {
			return new SqlserverParser();
		}
		
		if("sybase".equalsIgnoreCase(type.trim())) {
			return new SybaseParser();
		}
		
		if("sqlite".equalsIgnoreCase(type.trim())) {
			return new SqLiteParser();
		}
		
		return null;
	}
}
