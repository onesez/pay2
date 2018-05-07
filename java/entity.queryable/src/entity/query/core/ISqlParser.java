package entity.query.core;

import entity.query.enums.CommandMode;
import entity.query.enums.Condition;
import entity.query.enums.JoinMode;

public interface ISqlParser {

	void addWhere(String exp);
	
	void addWhere(Condition condition, String exp);

	void addSelect(String exp);

	void addOrderBy(String exp);

	void addGroupBy(String exp);

	void addJoin(JoinMode mode, String exp, String alias);
	
	<T> void addJoin(JoinMode mode, Class<T> clazz);
	
	<T> void addJoin(JoinMode mode, Class<T> clazz, String alias);
	
	void addOn(String exp);

	void addFrom(String string, String alias);
	
	void addUnioin(String selectSql);
	
	<T> Object[] getArgs(Class<T> genericType, String sql, Object obj);

	<T> String getInsertSql(Class<T> genericType);

	<T> String getDeleteSql(Class<T> genericType);

	<T> String getUpdateSql(Class<T> genericType);
	
	<T> String getUpdateSql(Class<T> genericType, String exp);

	<T> String getInsertToSql(Class<T> clazz);

	<T> String getSelectSql(Class<T> clazz);

	<T> String getSelectSql(Class<T> clazz, int skip, int top, Boolean isCount);

	<T> String getSelectExistSql(Class<T> clazz);
	
	<T> String toString(Class<T> clazz, String exp, CommandMode cmdMode, Object obj, int skip, int top, Boolean isCount);
}
