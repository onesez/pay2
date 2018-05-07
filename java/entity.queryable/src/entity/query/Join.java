package entity.query;

import java.io.IOException;
import java.sql.Connection;
import java.sql.SQLException;

import org.jdom.JDOMException;

import entity.query.core.ConnectionFactory;
import entity.query.core.ISqlParser;

public final class Join<T> {
	
	protected Join(Connection conn) {
		connection = conn;
	}
	
	private Connection connection;
	
	public Connection getConnection() {
		
		if(connection == null) {
			try {
				setConnection(ConnectionFactory.getConnection(getGenericType()));
			} catch (ClassNotFoundException e) {
				e.printStackTrace();
			} catch (IOException e) {
				e.printStackTrace();
			} catch (JDOMException e) {
				e.printStackTrace();
			} catch (SQLException e) {
				e.printStackTrace();
			}
		}
		
		return connection;
	}
	
	private void setConnection(Connection connection) {
		this.connection = connection;
	}
	
	protected void init(Class<T> clazz, Object obj, ISqlParser ps) {
		genericType = clazz;
		entityObject = obj;
		parser = ps;
	}
	
	private Object entityObject;
	public Object getEntityObject() {
		return entityObject;
	}

	private ISqlParser parser;
	public ISqlParser getParser() {
		return parser;
	}

	protected Class<T> genericType;
	public Class<T> getGenericType(){
		return genericType;
	}
	
	public On<T> on(String exp) {
		On<T> clause = new On<T>(getGenericType(), getEntityObject(), getParser(), getConnection());
		clause.init(getGenericType(), getEntityObject(), getParser(), getConnection());
		clause.getParser().addOn(exp);
		
		return clause;
	}
}
