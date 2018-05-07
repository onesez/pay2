package entity.query.core.parser;

import java.lang.reflect.Field;
import java.util.ArrayList;
import java.util.List;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

import entity.query.annotation.Fieldname;
import entity.query.annotation.PrimaryKey;
import entity.query.core.SqlParserBase;

public class MysqlParser extends SqlParserBase {

	public MysqlParser() {
		super();
	}
	
	@Override
	public String getPrefix() {
		return "`";
	}
	
	@Override
	public String getSuffix() {
		return "`";
	}
	
	@Override
	public <T> String getSelectSql(Class<T> clazz, int skip, int top, Boolean isCount) {
		Field[] flds = clazz.getDeclaredFields();
		String primaryKey = "";
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

		String sql = "";
		if(!primaryKey.isEmpty() && container.From.length()==0 && skip>0) {
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
				selectText = selectText.replaceAll("[\\[`\"]?\\s*([\\w\\d_]+)\\s*[\\]`\"]?\\s*(,?)", String.format("%s%s%s.%s$1%s$2", getPrefix(), fromText, getSuffix(), getPrefix(), getSuffix()));
				selectText = selectText.replaceAll("\\?", "%s");
				selectText = String.format(selectText, list.toArray());
				selectText = selectText.replaceAll("\\(\\s*[`\"\\[]?\\s*([^(.)\\s`\"\\]\\[]+)\\s*[`\"\\]]?\\s*\\)", String.format("(%s%s%s.%s$1%s)", getPrefix(), fromText, getSuffix(), getPrefix(), getSuffix()));
			}
			sql = String.format("\nSELECT %s FROM %s %s %s %s LIMIT %s,%s \n", primaryKey, fromText, joinText, whereText, groupByText, skip, top);
			sql = String.format("\nSELECT %s FROM %s LEFT JOIN (%s) AS a ON a.%s=%s.%s %s\n", selectText, fromText, sql, primaryKey, alias, primaryKey, orderByText);
		} else {
			sql = String.format("\nSELECT %s FROM %s %s %s %s %s", selectText, fromText, joinText, whereText, groupByText, orderByText);
			if(skip > 0 || top > 0) {
				sql = String.format("%s LIMIT %s,%s", sql, skip, top);
			}
		}
		
		if(container.Union.length() > 0) {
			sql = String.format("(%s) \n UNION \n %s", sql, container.Union.toString());
		}
		
		return String.format("%s;\n", sql);
	}

}
