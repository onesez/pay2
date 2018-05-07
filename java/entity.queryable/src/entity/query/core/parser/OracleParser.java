package entity.query.core.parser;

import entity.query.core.SqlParserBase;

public class OracleParser extends SqlParserBase {

	public OracleParser() {
		super();
	}
	
	@Override
	public String getPrefix() {
		return "\"";
	}
	
	@Override
	public String getSuffix() {
		return "\"";
	}
	
	
	@Override
	public <T> String getDeleteSql(Class<T> genericType) {
		
		String where = container.Where.length() > 0 ? String.format("WHERE %s", container.Where.toString()) : "";
		
		return String.format("\nDELETE %s %s\n", getTablename(genericType), where);
	}
	
	@Override
	public <T> String getSelectExistSql(Class<T> clazz) {
		String fromText = container.From.length()>0 ? container.From.toString() : getTablename(clazz);
		String whereText = container.Where.length()>0 ? String.format("WHERE %s", container.Where.toString()) : "";
		
		return String.format("\nSELECT COUNT(1) FROM %s %s LIMIT 0,1 \n", fromText, whereText);
	}
}

