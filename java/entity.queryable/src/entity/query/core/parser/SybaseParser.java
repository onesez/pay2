package entity.query.core.parser;

import entity.query.core.SqlParserBase;

public class SybaseParser extends SqlParserBase {

	public SybaseParser() {
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
