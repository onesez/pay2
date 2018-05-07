package entity.query;

import entity.query.enums.JoinMode;

public final class GroupBy<T> extends QueryAction<T> {

	protected GroupBy() {
		// TODO Auto-generated constructor stub
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

	public Join<T> join(JoinMode mode, Queryable<?> q, String alias) {
		Join<T> clause = new Join<T>(getConnection());
		clause.init(getGenericType(), getEntityObject(), getParser());
		clause.getParser().addJoin(mode, q.toString(), alias);
		
		return clause;
	}
}
