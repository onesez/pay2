package entity.query.core;

import java.lang.reflect.Field;
import java.util.ArrayList;
import java.util.List;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

import entity.query.annotation.AutoIncrement;
import entity.query.annotation.Fieldname;
import entity.query.annotation.PrimaryKey;
import entity.query.annotation.Tablename;
import entity.query.enums.CommandMode;
import entity.query.enums.Condition;
import entity.query.enums.JoinMode;

public abstract class SqlParserBase implements ISqlParser {
	protected SqlContainer container;
	
	public SqlParserBase() {
		container = new SqlContainer();
	}

	@Override
	public void addWhere(String exp) {
		
		if(exp.isEmpty()) {
			return;
		}
		
		container.Where.setLength(0);
		container.Where.append(filter(exp));
	}

	@Override
	public void addWhere(Condition condition, String exp) {
		
		if(exp.isEmpty()) {
			return;
		}
		
		if(condition == Condition.AND) {
			container.Where.append(String.format(" AND %s ", filter(exp)));
		}
		
		else if(condition == Condition.OR) {
			container.Where.append(String.format(" OR %s ", filter(exp)));
		}
	}

	@Override
	public void addSelect(String exp) {
		if(exp.isEmpty()) {
			return; 
		}
		
		if(container.Select.length() > 0) {
			container.Select.append(", ");
		}
		container.Select.append(filter(exp));
		
	}

	@Override
	public void addOrderBy(String exp) {
		if(exp.isEmpty()) {
			return;
		}
		
		container.OrderBy.setLength(0);
		container.OrderBy.append(filter(exp));
	}

	@Override
	public void addGroupBy(String exp) {
		if(exp.isEmpty()) {
			return;
		}
		
		container.GroupBy.setLength(0);
		container.GroupBy.append(filter(exp));
	}

	@Override
	public void addJoin(JoinMode mode, String exp, String alias) {
		
		if(alias.isEmpty() || exp.isEmpty()) {
			return;
		}
		container.Join.add(String.format(" %s JOIN (%s) AS %s ", mode.toString(), filter(exp.substring(0, exp.length()-2)), alias));
	}

	@Override
	public <T> void addJoin(JoinMode mode, Class<T> clazz) {
		addJoin(mode, clazz, "");
		
	}


	@Override
	public <T> void addJoin(JoinMode mode, Class<T> clazz, String alias) {
		Tablename table = clazz.getAnnotation(Tablename.class);
		if(table == null) {
			return;
		}
		String tablename = table.value();
		
		if(alias.isEmpty()) {
			container.Join.add(String.format(" %s JOIN [%s] ", mode.toString(), tablename));
			return;
		}
		
		container.Join.add(String.format(" %s JOIN [%s] AS %s ", mode.toString(), tablename, alias));
	}

	@Override
	public void addFrom(String exp, String alias) {
		
		if(exp.isEmpty() || alias.isEmpty()) {
			return; 
		}
		
		container.From.append(String.format(" (%s) AS %s ", filter(exp.substring(0, exp.length() - 1)), alias));
	}

	@Override
	public void addUnioin(String selectSql) {
		
		selectSql = selectSql.substring(0, selectSql.length() - 2);
		if(container.Union.length() > 0) {
			container.Union.append(String.format(" UNION (%s)", filter(selectSql)));
		} else {
			container.Union.append(String.format("(%s)", filter(selectSql)));
		}
	}

	@Override
	public void addOn(String exp) {
		
		if(exp.isEmpty()) {
			return;
		}
		
		container.On.add(filter(exp));
	}
	
	@Override
	public <T> Object[] getArgs(Class<T> clazz, String sql, Object obj) {
		
		if(clazz == null) {
			return null;
		}
		
	    Pattern p = Pattern.compile(RegexUtil.Args);
	    Matcher m = p.matcher(sql);
	    List<Object> result = new ArrayList<Object>();
	    while (m.find()) {
	    	String fieldName = m.group(1);
	    	Object value = ReflectionUtil.getFieldValue(clazz, obj, fieldName);
	    	result.add(value);
	    }
	    
	    return result.toArray();
	}

	protected final <T> String getTablename(Class<T> clazz) {
		String val = "";
		Tablename ann = clazz.getAnnotation(Tablename.class);
		if(ann == null || ann.value().isEmpty()) {
			val = clazz.getName().substring(clazz.getName().lastIndexOf('.')+1);
		}
		
		else {
			val = ann.value();
		}
		
		if(val.isEmpty()) {
			return val;
		}
		
		return getPrefix() + val + getSuffix();
	}
	
	@Override
	public <T> String getInsertSql(Class<T> clazz) {
		
		String tablename = getTablename(clazz);
		
		String names = "";
		String values = "";
		Field[] flds = clazz.getDeclaredFields();
		for(Field fld : flds) {
			AutoIncrement ai = fld.getAnnotation(AutoIncrement.class);
			if(ai != null) {
				continue;
			}
			
			Fieldname name = fld.getAnnotation(Fieldname.class);
			if(name != null) {
				names += "," + name.value();
				values += "," + String.format("#{%s}", name.value());
			}
			
			else {
				names += "," + fld.getName();
				values += "," + String.format("#{%s}", fld.getName());
			}
		}
		if(names.isEmpty()) {
			return "";
		}
		
		names = names.substring(1);
		values = values.substring(1);
		
		return String.format("\nINSERT INTO %s (%s) VALUES (%s);\n", tablename, names, values);
	}

	@Override
	public <T> String getDeleteSql(Class<T> clazz) {
		
		String where = container.Where.length() > 0 ? String.format("WHERE %s", container.Where.toString()) : "";
		
		return String.format("\nDELETE FROM %s %s\n", getTablename(clazz), where);
	}

	@Override
	public <T> String getUpdateSql(Class<T> clazz) {
		String tablename = getTablename(clazz);
		
		String settor = "";
		Field[] flds = clazz.getDeclaredFields();
		for(Field fld : flds) {
			AutoIncrement ai = fld.getAnnotation(AutoIncrement.class);
			if(ai != null) {
				continue;
			}
			
			Fieldname name = fld.getAnnotation(Fieldname.class);
			if(name != null) {
				settor += String.format(",%s=#{%s}", name.value(), name.value());
			}
			
			else {
				settor += String.format(",%s=#{%s}", fld.getName(), fld.getName());
			}
		}
		if(settor.isEmpty()) {
			return "";
		}
		
		settor = settor.substring(1);
		
		return String.format("\nUPDATE %s SET %s\n", tablename, settor);
	}

	@Override
	public <T> String getUpdateSql(Class<T> clazz, String exp) {
		String tablename = getTablename(clazz);
		String where = container.Where.length()>0 ? String.format("WHERE %s", container.Where.toString()) : "";
		
		return String.format("\nUPDATE %s SET %s %s \n", tablename, exp, where);
	}

	@Override
	public <T> String getInsertToSql(Class<T> clazz) {
		String sql = getSelectSql(clazz);
		if(sql.isEmpty()) {
			return "";
		}
		
		sql = sql.substring(0, sql.length() - 2);
		
		String tablename = getTablename(clazz);
		
		String names = "";
		Field[] flds = clazz.getDeclaredFields();
		for(Field fld : flds) {
			AutoIncrement ai = fld.getAnnotation(AutoIncrement.class);
			if(ai != null) {
				continue;
			}
			
			Fieldname name = fld.getAnnotation(Fieldname.class);
			if(name != null) {
				names += "," + name.value();
			}
			
			else {
				names += "," + fld.getName();
			}
		}
		if(names.isEmpty()) {
			return "";
		}
		
		names = names.substring(1);
		
		return String.format("\nINSERT INTO %s (%s) %s;\n", tablename, names, sql);
	}

	@Override
	public <T> String getSelectSql(Class<T> clazz) {
		
		return getSelectSql(clazz, 0, 0, false);
	}

	
	@Override
	public <T> String getSelectSql(Class<T> clazz, int skip, int top, Boolean isCount) {
		Field[] flds = clazz.getDeclaredFields();
		String primaryKey = null;
		for(Field fld : flds) {
			PrimaryKey pk = fld.getAnnotation(PrimaryKey.class);
			if(pk != null) {
				Fieldname name = fld.getAnnotation(Fieldname.class);
				if(name != null) {
					primaryKey = name.value();
				}
				
				else {
					primaryKey = fld.getName();
				}
			}
		}
		 
		String selectText = "*";
		if(isCount) {
			selectText = primaryKey.isEmpty() ? "COUNT(*)" : String.format("COUNT(%s)", primaryKey);
		} else {
			selectText = container.Select.length()>0 ? container.Select.toString() : "*";
		}
		
		String fromText = container.From.length()>0 ? container.From.toString() : getTablename(clazz);
		String alias = "";
		if(container.From.length()>0) {
			String[] arr = container.From.toString().toLowerCase().split("as");
			alias = arr[arr.length - 1];
		}
		
		else{
			alias = getTablename(clazz);
		}
		String whereText = container.Where.length()>0 ? String.format("WHERE %s", container.Where.toString()) : "";
		String joinText = "";
		for(int i=0; i<container.Join.size(); i++) {
			joinText += String.format(" %s ", container.Join.get(i));
			if(container.On.size() - 1 >= i) {
				joinText += String.format(" ON %s", container.On.get(i));
			}
		}
		String groupByText = container.GroupBy.length()>0 ? String.format(" GROUP BY %s", container.GroupBy.toString()) : "";
		String orderByText = container.OrderBy.length()>0 ? String.format(" ORDER BY %s", container.OrderBy.toString()) : "";

		String topText = top>0 ? String.format("TOP %s", top) : "";
		String skipText = skip>0 ? String.format("WHERE ROWNUM>%s", skip) : "";
		
		String sql = "";
		if(!primaryKey.isEmpty() && skip>0) {
			if(selectText.equals("*")) {
				selectText = fromText + ".*";
			}
			
			else {
				String regex = "([`\"\\[]?\\s*[\\w\\d_]+[`\"\\]]?\\.[`\"\\[]?[\\w\\d_]+\\s*[`\"\\]]?| AS\\s+[`\"\\[]?\\s*[\\w\\d_]+\\s*[`\"\\]]?|[\\w\\d_]+\\([\\w\\d_]+\\))";
			    Pattern p = Pattern.compile(regex);
			    Matcher m = p.matcher(selectText);
			    List<String> list = new ArrayList<String>();
			    while (m.find()) {
			    	list.add(m.group(0));
			    }
			    selectText = selectText.replaceAll(regex, "?");
			    selectText = selectText.replaceAll("[\\[`\"]?\\s*([\\w\\d_]+)\\s*[\\]`\"]?[^\\.?]\\s*,?", String.format("%s%s%s.%s$1%s", getPrefix(), fromText, getSuffix(), getPrefix(), getSuffix()));
				selectText = selectText.replaceAll("\\?", "%s");
				selectText = String.format(selectText, list.toArray());
				selectText = selectText.replaceAll("\\(\\s*[`\"\\[]?\\s*([^(.)\\s`\"\\]\\[]+)\\s*[`\"\\]]?\\s*\\)", String.format("(%s%s%s.%s$1%s)", getPrefix(), fromText, getSuffix(), getPrefix(), getSuffix()));
			}
			
			sql = String.format("\nSELECT %s %s, ROW_NUMBER() OVER(%s %s) AS ROWNUM FROM %s %s %s \n", ((top + skip)>0 ? String.format("TOP %s", (top + skip)) : ""), primaryKey, groupByText, orderByText, fromText, joinText, whereText);
			sql = String.format("\nSELECT %s %s FROM %s LEFT JOIN (%s) AS a ON a.%s=%s.%s %s WHERE ROWNUM>%s \n", topText, selectText, fromText, sql, primaryKey, alias, primaryKey, orderByText, skip);
		} else {
			sql = String.format("\nSELECT %s FROM %s %s %s\n", selectText, fromText, joinText, whereText);
			
			if(skip>0 && top>0) {
				sql = String.format("SELECT %s * FROM (SELECT a.*, ROW_NUMBER() OVER(%s %s) AS ROWNUM FROM (%s) AS a) AS a %s", topText, groupByText, orderByText, sql, skipText);
			}
			
			else if(skip>0) {
				sql = String.format("SELECT * FROM (SELECT a.*, ROW_NUMBER() OVER(%s %s) AS ROWNUM FROM (%s) AS a) AS a %s", groupByText, orderByText, sql, skipText);
			}
			
			else if(top>0) {
				sql = String.format("SELECT %s * FROM (%s) AS a %s %s", topText, sql, groupByText, orderByText);
			} else {
				sql = String.format("%s %s %s", sql, groupByText, orderByText);
			}
		}
		
		if(container.Union.length() > 0) {
			sql = String.format("(%s) \n UNION \n %s", sql, container.Union.toString());
		}
		
		return String.format("%s;", sql);
	}

	@Override
	public <T> String getSelectExistSql(Class<T> clazz) {
		String sql = getSelectSql(clazz, 0, 1, true);
		return String.format("SELECT 1 FROM (%s) AS a", sql.substring(0, sql.length() - 2));
	}

	@Override
	public <T> String toString(Class<T> clazz, String exp, CommandMode cmdMode, Object obj, int skip, int top, Boolean isCount) {
		String sql = "";
		switch(cmdMode) {
		case Insert:
			sql = getInsertSql(clazz);
			break;
		case Update:
			sql = getUpdateSql(clazz);
			break;
		case InsertFrom:
			sql = getInsertToSql(clazz);
			break;
		case UpdateFrom:
			sql = getUpdateSql(clazz, exp);
			break;
		case Delete:
			sql = getDeleteSql(clazz);
			break;
		case Exist:
			sql = getSelectExistSql(clazz);
			break;
		default:
			sql = getSelectSql(clazz, skip, top, isCount);
			break;
		}
		
		Object[] args = getArgs(clazz, sql, obj);
		
		sql = DBUtil.getSql(sql, args);
		
		return sql;
	}
	
	public String getPrefix() {
		return "[";
	}
	
	public String getSuffix() {
		return "]";
	}
	
	protected String filter(String exp) {
	    Pattern p = Pattern.compile(RegexUtil.PrefixAndSuffixForChar);
	    Matcher m = p.matcher(exp);
	    List<String> list = new ArrayList<String>();
	    while (m.find()) {
	    	list.add(m.group(0));
	    }
	    
		exp = exp.replaceAll(RegexUtil.PrefixAndSuffixForChar, "%s");
		exp = exp.replaceAll(RegexUtil.PrefixAndSuffix, String.format("%s$1%s", getPrefix(), getSuffix()));
		exp = String.format(exp, list.toArray());
		
		return exp;
	};
}
