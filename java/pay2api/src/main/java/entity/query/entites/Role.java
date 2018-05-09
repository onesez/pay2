package entity.query.entites;

import entity.query.Queryable;

public class Role extends Queryable<Role> {
    @entity.query.annotation.PrimaryKey()
    @entity.query.annotation.AutoIncrement()
    @entity.query.annotation.Fieldname(value="id")
    private Integer id;

    @entity.query.annotation.Fieldname(value="title")
    private String title;

    @entity.query.annotation.Fieldname(value="role_desc")
    private String roleDesc;

    @entity.query.annotation.Fieldname(value="status")
    private Boolean status;

    @entity.query.annotation.Fieldname(value="rules")
    private String rules;

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title == null ? null : title.trim();
    }

    public String getRoleDesc() {
        return roleDesc;
    }

    public void setRoleDesc(String roleDesc) {
        this.roleDesc = roleDesc == null ? null : roleDesc.trim();
    }

    public Boolean getStatus() {
        return status;
    }

    public void setStatus(Boolean status) {
        this.status = status;
    }

    public String getRules() {
        return rules;
    }

    public void setRules(String rules) {
        this.rules = rules == null ? null : rules.trim();
    }
}