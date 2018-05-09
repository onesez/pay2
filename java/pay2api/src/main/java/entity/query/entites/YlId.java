package entity.query.entites;

import entity.query.Queryable;

public class YlId extends Queryable<YlId> {
    @entity.query.annotation.PrimaryKey()
    @entity.query.annotation.AutoIncrement()
    @entity.query.annotation.Fieldname(value="id")
    private Short id;

    @entity.query.annotation.Fieldname(value="yl_id")
    private String ylId;

    @entity.query.annotation.Fieldname(value="yl_key")
    private String ylKey;

    @entity.query.annotation.Fieldname(value="yl_random")
    private String ylRandom;

    @entity.query.annotation.Fieldname(value="yl_use")
    private Short ylUse;

    @entity.query.annotation.Fieldname(value="yl_type")
    private String ylType;

    public Short getId() {
        return id;
    }

    public void setId(Short id) {
        this.id = id;
    }

    public String getYlId() {
        return ylId;
    }

    public void setYlId(String ylId) {
        this.ylId = ylId == null ? null : ylId.trim();
    }

    public String getYlKey() {
        return ylKey;
    }

    public void setYlKey(String ylKey) {
        this.ylKey = ylKey == null ? null : ylKey.trim();
    }

    public String getYlRandom() {
        return ylRandom;
    }

    public void setYlRandom(String ylRandom) {
        this.ylRandom = ylRandom == null ? null : ylRandom.trim();
    }

    public Short getYlUse() {
        return ylUse;
    }

    public void setYlUse(Short ylUse) {
        this.ylUse = ylUse;
    }

    public String getYlType() {
        return ylType;
    }

    public void setYlType(String ylType) {
        this.ylType = ylType == null ? null : ylType.trim();
    }
}