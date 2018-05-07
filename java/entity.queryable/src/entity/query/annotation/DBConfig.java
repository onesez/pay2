package entity.query.annotation;

import static java.lang.annotation.ElementType.TYPE;
import static java.lang.annotation.RetentionPolicy.RUNTIME;

import java.lang.annotation.Retention;
import java.lang.annotation.Target;

@Retention(RUNTIME)
@Target(TYPE)

public @interface DBConfig {
	public String id() default "";
	public String server() default "";
	public String uid() default "";
	public String pwd() default "";
	public String db() default "";
	public String charset() default "";
	public String dbType() default "";
	public String driverType() default "jdbc";
	public String driver() default "";
	public String path() default "";
	public int port() default 3306;
}
