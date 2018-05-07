package entity.query;

import entity.query.core.DBUtil;
import entity.query.enums.CommandMode;
import entity.query.enums.Condition;
import entity.query.enums.JoinMode;

public final class Where<T> extends QueryAction<T> {

	protected Where() {
		super();
	}

	public Where<T> where(Condition condition, String exp) {
		Where<T> clause = new Where<T>();
		clause.init(getGenericType(), getEntityObject(), getParser(), getConnection());
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
	
	public Join<T> join(JoinMode mode, Queryable<?> q, String alias) {
		Join<T> clause = new Join<T>(getConnection());
		clause.init(getGenericType(), getEntityObject(), getParser());
		clause.getParser().addJoin(mode, q.toString(), alias);
		
		return clause;
	}
	
	public <T1> void insertTo(Class<T1> clazz) {
		Object[] args = null;
		String sql = getParser().toString(getGenericType(), "", CommandMode.InsertFrom, getEntityObject(), 0, 0, false);
		DBUtil.execute(getConnection(), getGenericType(), sql, args);
	}

	public void delete() {
		Object[] args = null;
		String sql = getParser().toString(getGenericType(), "", CommandMode.Delete, getEntityObject(), 0, 0, false);
		DBUtil.execute(getConnection(), getGenericType(), sql, args);
	}
	
	public void update(String exp) {
		Object[] args = null;
		String sql = getParser().toString(getGenericType(), exp, CommandMode.UpdateFrom, getEntityObject(), 0, 0, false);
		DBUtil.execute(getConnection(), getGenericType(), sql, args);
	}
}
