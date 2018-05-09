package entity.query.entites;

import entity.query.Queryable;
import java.math.BigDecimal;

public class Rate extends Queryable<Rate> {
    @entity.query.annotation.PrimaryKey()
    @entity.query.annotation.AutoIncrement()
    @entity.query.annotation.Fieldname(value="id")
    private Integer id;

    @entity.query.annotation.Fieldname(value="user_id")
    private Short userId;

    @entity.query.annotation.Fieldname(value="platform_id")
    private Short platformId;

    @entity.query.annotation.Fieldname(value="draw_mode")
    private String drawMode;

    @entity.query.annotation.Fieldname(value="product_sid")
    private Short productSid;

    @entity.query.annotation.Fieldname(value="platform_rote")
    private BigDecimal platformRote;

    @entity.query.annotation.Fieldname(value="company_rote")
    private BigDecimal companyRote;

    @entity.query.annotation.Fieldname(value="sell_rote")
    private BigDecimal sellRote;

    @entity.query.annotation.Fieldname(value="platform_name")
    private String platformName;

    @entity.query.annotation.Fieldname(value="product_name")
    private String productName;

    @entity.query.annotation.Fieldname(value="period")
    private Integer period;

    @entity.query.annotation.Fieldname(value="is_use")
    private Boolean isUse;

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public Short getUserId() {
        return userId;
    }

    public void setUserId(Short userId) {
        this.userId = userId;
    }

    public Short getPlatformId() {
        return platformId;
    }

    public void setPlatformId(Short platformId) {
        this.platformId = platformId;
    }

    public String getDrawMode() {
        return drawMode;
    }

    public void setDrawMode(String drawMode) {
        this.drawMode = drawMode == null ? null : drawMode.trim();
    }

    public Short getProductSid() {
        return productSid;
    }

    public void setProductSid(Short productSid) {
        this.productSid = productSid;
    }

    public BigDecimal getPlatformRote() {
        return platformRote;
    }

    public void setPlatformRote(BigDecimal platformRote) {
        this.platformRote = platformRote;
    }

    public BigDecimal getCompanyRote() {
        return companyRote;
    }

    public void setCompanyRote(BigDecimal companyRote) {
        this.companyRote = companyRote;
    }

    public BigDecimal getSellRote() {
        return sellRote;
    }

    public void setSellRote(BigDecimal sellRote) {
        this.sellRote = sellRote;
    }

    public String getPlatformName() {
        return platformName;
    }

    public void setPlatformName(String platformName) {
        this.platformName = platformName == null ? null : platformName.trim();
    }

    public String getProductName() {
        return productName;
    }

    public void setProductName(String productName) {
        this.productName = productName == null ? null : productName.trim();
    }

    public Integer getPeriod() {
        return period;
    }

    public void setPeriod(Integer period) {
        this.period = period;
    }

    public Boolean getIsUse() {
        return isUse;
    }

    public void setIsUse(Boolean isUse) {
        this.isUse = isUse;
    }
}