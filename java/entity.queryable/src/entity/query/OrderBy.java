package entity.query;

public final class OrderBy<T> extends QueryAction<T> {

	protected OrderBy() {
		// TODO Auto-generated constructor stub
	}

	public Select<T> select(String exp) {
		Select<T> clause = new Select<T>();
		clause.init(getGenericType(), getEntityObject(), getParser(), getConnection());
		clause.getParser().addSelect(exp);
		
		return clause;
	}
}
