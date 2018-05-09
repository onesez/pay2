package entity.query.entites;

import entity.query.Queryable;

public class AuthGroupAccess extends Queryable<AuthGroupAccess> {
    @entity.query.annotation.Fieldname(value="uid")
    private Integer uid;

    @entity.query.annotation.Fieldname(value="group_id")
    private Integer groupId;

    public Integer getUid() {
        return uid;
    }

    public void setUid(Integer uid) {
        this.uid = uid;
    }

    public Integer getGroupId() {
        return groupId;
    }

    public void setGroupId(Integer groupId) {
        this.groupId = groupId;
    }
}