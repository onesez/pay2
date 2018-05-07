package entity.query;

import entity.query.enums.CommandMode;
import entity.query.enums.JoinMode;

public final class Select<T> extends QueryAction<T> {

	protected Select() {
		// TODO Auto-generated constructor stub
	}

	public Join<T> join(JoinMode mode, Queryable<?> q, String alias) {
		Join<T> clause = new Join<T>(getConnection());
		clause.init(getGenericType(), getEntityObject(), getParser());
		clause.getParser().addJoin(mode, q.toString(), alias);
		
		return clause;
	}
	
	public <E> Select<E> union(Select<E> clause) {
		
		clause.getParser().addUnioin(getParser().toString(getGenericType(), "", CommandMode.Select, getEntityObject(), 0, 0, false));
		
		return clause;
	}
}
