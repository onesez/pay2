package entity.query;

import java.io.IOException;
import java.sql.Connection;
import java.sql.SQLException;

import org.jdom.JDOMException;

import entity.query.core.ConnectionFactory;
import entity.query.core.ISqlParser;
import entity.query.core.SqlParserFactory;
import entity.query.enums.JoinMode;

public abstract class QueryableBase<T> {
	
	@SuppressWarnings("unchecked")
	protected QueryableBase() {
		genericType = (Class<T>) this.getClass();
	}
	
	@SuppressWarnings({ "unchecked", "rawtypes" })
	protected void init(Class<T> clazz, Object obj, Connection conn) {
		genericType = clazz;
		SqlParserFactory factory = SqlParserFactory.getInstance();
		parser = factory.CreateParser(getGenericType());
		entityObject = obj;
		if(conn != null) {
			connection = conn;
		}
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

	public void setConnection(Connection connection) {
		this.connection = connection;
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

	public Where<T> where(String exp) {
		Where<T> clause = new Where<T>();
		clause.init(getGenericType(), getEntityObject(), getParser(), getConnection());
		clause.getParser().addWhere(exp);
		
		return clause;
	}
	
	public Select<T> select(String exp) {
		Select<T> clause = new Select<T>();
		clause.init(getGenericType(), getEntityObject(), getParser(), getConnection());
		clause.getParser().addSelect(exp);
		
		return clause;
	}
	
	public OrderBy<T> orderby(String exp) {
		OrderBy<T> clause = new OrderBy<T>();
		clause.init(getGenericType(), getEntityObject(), getParser(), getConnection());
		clause.getParser().addOrderBy(exp);
		
		return clause;
	}
	
	public GroupBy<T> groupby(String exp) {
		GroupBy<T> clause = new GroupBy<T>();
		clause.init(getGenericType(), getEntityObject(), getParser(), getConnection());
		clause.getParser().addGroupBy(exp);
		
		return clause;
	}
	
	public <E> Join<T> join(JoinMode mode, Class<E> clazz) {
		return join(mode, clazz, null);
	}
	
	public <E> Join<T> join(JoinMode mode, Class<E> clazz, String alias) {
		Join<T> clause = new Join<T>(getConnection());
		clause.init(getGenericType(), getEntityObject(), getParser());
		clause.getParser().addJoin(mode, clazz, alias);
		
		return clause;
	}
	
	public Join<T> join(JoinMode mode, Queryable<?> q, String alias) {
		Join<T> clause = new Join<T>(getConnection());
		clause.init(getGenericType(), getEntityObject(), getParser());
		clause.getParser().addJoin(mode, q.toString(), alias);
		
		return clause;
	}
}
