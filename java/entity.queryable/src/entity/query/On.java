package entity.query;

import java.sql.Connection;

import entity.query.core.DBUtil;
import entity.query.core.ISqlParser;
import entity.query.enums.CommandMode;
import entity.query.enums.Condition;

public final class On<T> extends QueryAction<T> {

	protected On(Class<T> clazz, Object obj, ISqlParser ps, Connection conn) {
		super();
		init(clazz, obj, ps, conn);
	}

	public Join<T> where(Condition condition, String exp) {
		Join<T> clause = new Join<T>(getConnection());
		clause.init(getGenericType(), getEntityObject(), getParser());
		clause.getParser().addWhere(condition, exp);
		
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
	
	public <T1> void insertTo(Class<T1> clazz) {
		Object[] args = null;
		String sql = getParser().toString(getGenericType(), "", CommandMode.InsertFrom, getEntityObject(), 0, 0, false);
		DBUtil.execute(getConnection(), getGenericType(), sql, args);
	}
}
