package entity.query;

import java.io.IOException;
import java.sql.SQLException;
import org.jdom.JDOMException;

import entity.query.core.ConnectionFactory;
import entity.query.core.DBUtil;
import entity.query.enums.CommandMode;

public abstract class Queryable<T> extends QueryableBase<T> {

	@SuppressWarnings("unchecked")
	public Queryable() {
		
		super();
		try {
			setConnection(ConnectionFactory.getConnection(getGenericType()));
		} catch (ClassNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (JDOMException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		init((Class<T>)this.getClass(), this, getConnection());
	}
	
	public From<T> from(QueryAction<T> queryable, String alias) {
		From<T> clause = new From<T>();
		clause.init(getGenericType(), getEntityObject(), getConnection());
		clause.getParser().addFrom(queryable.toString(), alias);
		 
		return clause;
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
	
	public void insert() {
		Object[] args = null;
		String sql = getParser().toString(getGenericType(), "", CommandMode.Insert, getEntityObject(), 0, 0, false);
		DBUtil.execute(getConnection(), getGenericType(), sql, args);
		
	}
	
	public void delete() {
		Object[] args = null;
		String sql = getParser().toString(getGenericType(), "", CommandMode.Delete, getEntityObject(), 0, 0, false);
		DBUtil.execute(getConnection(), getGenericType(), sql, args);
	}
	
	public void update() {
		Object[] args = null;
		String sql = getParser().toString(getGenericType(), "", CommandMode.Update, getEntityObject(), 0, 0, false);
		DBUtil.execute(getConnection(), getGenericType(), sql, args);
	}
}
