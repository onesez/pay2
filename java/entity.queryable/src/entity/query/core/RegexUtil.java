package entity.query.core;

public class RegexUtil {
	
	public static final String PrefixAndSuffix = "\\[\\s*([_\\d\\w]+)\\s*\\]";
	
	public static final String PrefixAndSuffixForChar = "'[^']*\\\\[\\\\s*([_\\\\d\\\\w]+)\\\\s*\\\\][^']*'";
	
	public static final String Args = "#\\{([^\\{\\}]+)\\}";
}
