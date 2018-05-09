package entity.query.entites;

import entity.query.Queryable;

public class OrderUser extends Queryable<OrderUser> {
    @entity.query.annotation.PrimaryKey()
    @entity.query.annotation.AutoIncrement()
    @entity.query.annotation.Fieldname(value="id")
    private Integer id;

    @entity.query.annotation.Fieldname(value="order_id")
    private String orderId;

    @entity.query.annotation.Fieldname(value="bank_huming")
    private String bankHuming;

    @entity.query.annotation.Fieldname(value="p_card")
    private String pCard;

    @entity.query.annotation.Fieldname(value="bankname")
    private String bankname;

    @entity.query.annotation.Fieldname(value="bank_card_num")
    private String bankCardNum;

    @entity.query.annotation.Fieldname(value="mobile")
    private String mobile;

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public String getOrderId() {
        return orderId;
    }

    public void setOrderId(String orderId) {
        this.orderId = orderId == null ? null : orderId.trim();
    }

    public String getBankHuming() {
        return bankHuming;
    }

    public void setBankHuming(String bankHuming) {
        this.bankHuming = bankHuming == null ? null : bankHuming.trim();
    }

    public String getpCard() {
        return pCard;
    }

    public void setpCard(String pCard) {
        this.pCard = pCard == null ? null : pCard.trim();
    }

    public String getBankname() {
        return bankname;
    }

    public void setBankname(String bankname) {
        this.bankname = bankname == null ? null : bankname.trim();
    }

    public String getBankCardNum() {
        return bankCardNum;
    }

    public void setBankCardNum(String bankCardNum) {
        this.bankCardNum = bankCardNum == null ? null : bankCardNum.trim();
    }

    public String getMobile() {
        return mobile;
    }

    public void setMobile(String mobile) {
        this.mobile = mobile == null ? null : mobile.trim();
    }
}