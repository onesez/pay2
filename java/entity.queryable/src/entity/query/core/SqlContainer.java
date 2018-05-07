package entity.query.core;

import java.util.ArrayList;

public final class SqlContainer {
	
	public SqlContainer() {
		Where = new StringBuilder();
		Join = new ArrayList<String>();
		OrderBy = new StringBuilder();
		GroupBy = new StringBuilder();
		Select = new StringBuilder();
		Union = new StringBuilder();
		From = new StringBuilder();
		On = new ArrayList<String>();
	}
	
	public StringBuilder Where;
	public ArrayList<String> Join;
	public StringBuilder OrderBy;
	public StringBuilder GroupBy;
	public StringBuilder Select;
	public StringBuilder Union;
	public StringBuilder From;
	public ArrayList<String> On;
}
