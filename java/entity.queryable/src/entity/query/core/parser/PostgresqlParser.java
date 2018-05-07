package entity.query.core.parser;

public class PostgresqlParser extends MysqlParser {

	public PostgresqlParser() {
		super();
	}

	@Override
	public String getPrefix() {
		return "";
	}
	
	@Override
	public String getSuffix() {
		return "";
	}
}
