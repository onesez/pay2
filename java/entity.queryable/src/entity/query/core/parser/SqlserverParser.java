package entity.query.core.parser;

import entity.query.core.SqlParserBase;

public class SqlserverParser extends SqlParserBase {

	public SqlserverParser() {
		super();
	}
	
	@Override
	protected String filter(String exp) {
		return exp;
	}
}

