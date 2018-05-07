package entity.query.core;

import java.io.IOException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import org.jdom.JDOMException;

import entity.query.annotation.DBConfig;
import entity.query.core.Config.DataSource;

public class ConnectionFactory {
    /*
     * 从xml获取数据库连接
     */
	public static <T> Connection getConnection(Class<T> clazz) throws IOException, JDOMException, SQLException, ClassNotFoundException {
		
		Config conf;
		DataSource ds;
		DBConfig ann = clazz.getAnnotation(DBConfig.class);
		if(ann == null) {
			conf = Config.getInstance(null);
			ds = conf.getDataSource(null);
		}
		
		else {
			if(ann.port() > 0 &&
					!ann.db().isEmpty() &&
					!ann.driverType().isEmpty() && 
					!ann.dbType().isEmpty() && 
					!ann.uid().isEmpty() && 
					!ann.pwd().isEmpty() && 
					!ann.server().isEmpty()) {
				
				String strConn = String.format("%s:%s://%s:%d/%s", ann.driverType(), ann.dbType(), ann.server(), ann.port(), ann.db());
				
				Class.forName(ann.driver());
				
				Connection conn = DriverManager.getConnection(strConn, ann.uid(), ann.pwd());
				
				return conn;
			}
			
			conf = Config.getInstance(ann.path());
			ds = conf.getDataSource(ann.id());
		}
		 
		Class.forName(ds.getDriver());
		
		return DriverManager.getConnection(ds.getConnectionString(), ds.getUid(), ds.getPassword());
	} 
}
