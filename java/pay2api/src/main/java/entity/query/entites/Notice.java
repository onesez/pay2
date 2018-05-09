package entity.query.entites;

import entity.query.Queryable;

public class Notice extends Queryable<Notice> {
    @entity.query.annotation.PrimaryKey()
    @entity.query.annotation.AutoIncrement()
    @entity.query.annotation.Fieldname(value="id")
    private Short id;

    @entity.query.annotation.Fieldname(value="create_date")
    private Integer createDate;

    @entity.query.annotation.Fieldname(value="title")
    private String title;

    @entity.query.annotation.Fieldname(value="content")
    private String content;

    @entity.query.annotation.Fieldname(value="status")
    private Integer status;

    public Short getId() {
        return id;
    }

    public void setId(Short id) {
        this.id = id;
    }

    public Integer getCreateDate() {
        return createDate;
    }

    public void setCreateDate(Integer createDate) {
        this.createDate = createDate;
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title == null ? null : title.trim();
    }

    public String getContent() {
        return content;
    }

    public void setContent(String content) {
        this.content = content == null ? null : content.trim();
    }

    public Integer getStatus() {
        return status;
    }

    public void setStatus(Integer status) {
        this.status = status;
    }
}