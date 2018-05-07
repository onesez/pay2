package entity.query;

import java.io.IOException;
import java.sql.Connection;
import java.sql.SQLException;
import java.util.List;

import org.jdom.JDOMException;

import entity.query.core.ConnectionFactory;
import entity.query.core.DBUtil;
import entity.query.core.ISqlParser;
import entity.query.enums.CommandMode;

public abstract class QueryAction<T> {

	protected QueryAction() {}
	
	protected void init(Class<T> clazz, Object obj, ISqlParser ps, Connection conn) {
		genericType = clazz;
		parser = ps;
		entityObject = obj;
		if(conn != null) {
			connection = conn;
		}
	}
	
	private Object entityObject;
	public Object getEntityObject() {
		return entityObject;
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
	
	private ISqlParser parser;
	public ISqlParser getParser() {
		return parser;
	}

	protected Class<T> genericType;
	public Class<T> getGenericType(){
		return genericType;
	}
	
	public List<T> query() {
		Object[] args = null;
		String sql = getParser().toString(getGenericType(), "", CommandMode.Select, getEntityObject(), 0, 0, false);
		return DBUtil.query(getConnection(), getGenericType(), sql, false, args, 0, 0);
	}
	
	public <E> List<E> query(Class<E> type){
		Object[] args = null;
		String sql = getParser().toString(getGenericType(), "", CommandMode.Select, getEntityObject(), 0, 0, false);
		return DBUtil.query(getConnection(), type, sql, false, args);
	}
	
	public List<T> query(int skip, int top){
		Object[] args = null;
		String sql = getParser().toString(getGenericType(), "", CommandMode.Select, getEntityObject(), skip, top, false);
		return DBUtil.query(getConnection(), getGenericType(), sql, false, args);
	}
	
	public <E> List<E> query(Class<E> type, int skip, int top){
		Object[] args = null;
		String sql = getParser().toString(getGenericType(), "", CommandMode.Select, getEntityObject(), skip, top, false);
		return DBUtil.query(getConnection(), type, sql, false, args);
	}
	
	public Number count() {
		Object[] args = null;
		String sql = getParser().toString(getGenericType(), "", CommandMode.SelectCount, getEntityObject(), 0, 0, true);
		List<Number> result = DBUtil.query(getConnection(), Number.class, sql, true, args);
		
		if(result == null) {
			return 0;
		}
		
		if(result.size() < 1) {
			return 0;
		}
		
		Number val = (Number)result.get(0);
		
		return val;
	}
	
	public T first() {
		Object[] args = null;
		String sql = getParser().toString(getGenericType(), "", CommandMode.Select, getEntityObject(), 0, 1, false);
		List<T> result = DBUtil.query(getConnection(), getGenericType(), sql, false, args);
		if(result == null) {
			return null;
		}
		
		if(result.size() < 1) {
			return null;
		}
		
		return (T) result.get(0);
	}
	
	public <E> E first(Class<E> type) {
		Object[] args = null;
		String sql = getParser().toString(getGenericType(), "", CommandMode.Select, getEntityObject(), 0, 1, false);
		List<E> result = DBUtil.query(getConnection(), type, sql, false, args);
		if(result == null) {
			return null;
		}
		
		if(result.size() < 1) {
			return null;
		}
		
		return (E) result.get(0);
	}
	
	public List<T> top(int count) {
		Object[] args = null;
		String sql = getParser().toString(getGenericType(), "", CommandMode.Select, getEntityObject(), 0, count, false);
		return DBUtil.query(getConnection(), getGenericType(), sql, false, args);
	}
	
	public <E> List<E> top(Class<E> type, int count){
		Object[] args = null;
		String sql = getParser().toString(getGenericType(), "", CommandMode.Select, getEntityObject(), 0, count, false);
		return DBUtil.query(getConnection(), type, sql, false, args);
	}
	
	public boolean exist() {
		Object[] args = null;
		String sql = getParser().toString(getGenericType(), "", CommandMode.Exist, getEntityObject(), 0, 0, false);
		List<Long> result = DBUtil.query(getConnection(), long.class, sql, true, args);
		if(result == null) {
			return false;
		}
		
		if(result.size() < 1) {
			return false;
		}
		
		return true;
	}
	
	@Override
	public String toString() {
		String sql = getParser().toString(getGenericType(), "", CommandMode.Select, getEntityObject(), 0, 0, false);
		
		return sql.substring(0, sql.length() - 1);
	}
	
	public String toString(CommandMode mode) {
		String sql = getParser().toString(getGenericType(), "", mode, getEntityObject(), 0, 0, false);
		
		return sql.substring(0, sql.length() - 1);
	}
	
	public String toString(CommandMode mode, int skip, int top) {
		String sql = getParser().toString(getGenericType(), "", mode, getEntityObject(), skip, top, false);
		
		return sql.substring(0, sql.length() - 1);
	}
}
