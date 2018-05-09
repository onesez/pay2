package entity.query.entites;

import entity.query.Queryable;
import java.math.BigDecimal;

public class Closelist extends Queryable<Closelist> {
    @entity.query.annotation.PrimaryKey()
    @entity.query.annotation.AutoIncrement()
    @entity.query.annotation.Fieldname(value="id")
    private Integer id;

    @entity.query.annotation.Fieldname(value="addtime")
    private Integer addtime;

    @entity.query.annotation.Fieldname(value="username")
    private String username;

    @entity.query.annotation.Fieldname(value="order_num")
    private String orderNum;

    @entity.query.annotation.Fieldname(value="amount")
    private BigDecimal amount;

    @entity.query.annotation.Fieldname(value="pay_fee")
    private BigDecimal payFee;

    @entity.query.annotation.Fieldname(value="real_amount")
    private BigDecimal realAmount;

    @entity.query.annotation.Fieldname(value="remark")
    private String remark;

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public Integer getAddtime() {
        return addtime;
    }

    public void setAddtime(Integer addtime) {
        this.addtime = addtime;
    }

    public String getUsername() {
        return username;
    }

    public void setUsername(String username) {
        this.username = username == null ? null : username.trim();
    }

    public String getOrderNum() {
        return orderNum;
    }

    public void setOrderNum(String orderNum) {
        this.orderNum = orderNum == null ? null : orderNum.trim();
    }

    public BigDecimal getAmount() {
        return amount;
    }

    public void setAmount(BigDecimal amount) {
        this.amount = amount;
    }

    public BigDecimal getPayFee() {
        return payFee;
    }

    public void setPayFee(BigDecimal payFee) {
        this.payFee = payFee;
    }

    public BigDecimal getRealAmount() {
        return realAmount;
    }

    public void setRealAmount(BigDecimal realAmount) {
        this.realAmount = realAmount;
    }

    public String getRemark() {
        return remark;
    }

    public void setRemark(String remark) {
        this.remark = remark == null ? null : remark.trim();
    }
}