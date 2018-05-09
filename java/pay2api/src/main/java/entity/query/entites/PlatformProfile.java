package entity.query.entites;

import entity.query.Queryable;

public class PlatformProfile extends Queryable<PlatformProfile> {
    @entity.query.annotation.PrimaryKey()
    @entity.query.annotation.AutoIncrement()
    @entity.query.annotation.Fieldname(value="id")
    private Short id;

    @entity.query.annotation.Fieldname(value="platform_id")
    private Short platformId;

    @entity.query.annotation.Fieldname(value="product_id")
    private Short productId;

    @entity.query.annotation.Fieldname(value="rote")
    private Float rote;

    @entity.query.annotation.Fieldname(value="sell_rote")
    private Float sellRote;

    @entity.query.annotation.Fieldname(value="is_run")
    private Short isRun;

    public Short getId() {
        return id;
    }

    public void setId(Short id) {
        this.id = id;
    }

    public Short getPlatformId() {
        return platformId;
    }

    public void setPlatformId(Short platformId) {
        this.platformId = platformId;
    }

    public Short getProductId() {
        return productId;
    }

    public void setProductId(Short productId) {
        this.productId = productId;
    }

    public Float getRote() {
        return rote;
    }

    public void setRote(Float rote) {
        this.rote = rote;
    }

    public Float getSellRote() {
        return sellRote;
    }

    public void setSellRote(Float sellRote) {
        this.sellRote = sellRote;
    }

    public Short getIsRun() {
        return isRun;
    }

    public void setIsRun(Short isRun) {
        this.isRun = isRun;
    }
}