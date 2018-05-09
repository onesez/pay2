package entity.query.entites;

import entity.query.Queryable;

public class Platform extends Queryable<Platform> {
    @entity.query.annotation.PrimaryKey()
    @entity.query.annotation.AutoIncrement()
    @entity.query.annotation.Fieldname(value="id")
    private Short id;

    @entity.query.annotation.Fieldname(value="platform")
    private String platform;

    @entity.query.annotation.Fieldname(value="controller")
    private String controller;

    @entity.query.annotation.Fieldname(value="period")
    private String period;

    @entity.query.annotation.Fieldname(value="status")
    private Boolean status;

    @entity.query.annotation.Fieldname(value="is_open")
    private Boolean isOpen;

    public Short getId() {
        return id;
    }

    public void setId(Short id) {
        this.id = id;
    }

    public String getPlatform() {
        return platform;
    }

    public void setPlatform(String platform) {
        this.platform = platform == null ? null : platform.trim();
    }

    public String getController() {
        return controller;
    }

    public void setController(String controller) {
        this.controller = controller == null ? null : controller.trim();
    }

    public String getPeriod() {
        return period;
    }

    public void setPeriod(String period) {
        this.period = period == null ? null : period.trim();
    }

    public Boolean getStatus() {
        return status;
    }

    public void setStatus(Boolean status) {
        this.status = status;
    }

    public Boolean getIsOpen() {
        return isOpen;
    }

    public void setIsOpen(Boolean isOpen) {
        this.isOpen = isOpen;
    }
}