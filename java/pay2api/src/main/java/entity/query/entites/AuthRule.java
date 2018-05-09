package entity.query.entites;

import entity.query.Queryable;

public class AuthRule extends Queryable<AuthRule> {
    @entity.query.annotation.PrimaryKey()
    @entity.query.annotation.AutoIncrement()
    @entity.query.annotation.Fieldname(value="id")
    private Integer id;

    @entity.query.annotation.Fieldname(value="pid")
    private Integer pid;

    @entity.query.annotation.Fieldname(value="name")
    private String name;

    @entity.query.annotation.Fieldname(value="title")
    private String title;

    @entity.query.annotation.Fieldname(value="type")
    private Boolean type;

    @entity.query.annotation.Fieldname(value="status")
    private Boolean status;

    @entity.query.annotation.Fieldname(value="ismenu")
    private Boolean ismenu;

    @entity.query.annotation.Fieldname(value="condition")
    private String condition;

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public Integer getPid() {
        return pid;
    }

    public void setPid(Integer pid) {
        this.pid = pid;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name == null ? null : name.trim();
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title == null ? null : title.trim();
    }

    public Boolean getType() {
        return type;
    }

    public void setType(Boolean type) {
        this.type = type;
    }

    public Boolean getStatus() {
        return status;
    }

    public void setStatus(Boolean status) {
        this.status = status;
    }

    public Boolean getIsmenu() {
        return ismenu;
    }

    public void setIsmenu(Boolean ismenu) {
        this.ismenu = ismenu;
    }

    public String getCondition() {
        return condition;
    }

    public void setCondition(String condition) {
        this.condition = condition == null ? null : condition.trim();
    }
}