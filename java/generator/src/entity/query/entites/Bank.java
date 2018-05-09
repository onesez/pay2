package entity.query.entites;

import entity.query.Queryable;

public class Bank extends Queryable<Bank> {
    @entity.query.annotation.PrimaryKey()
    @entity.query.annotation.AutoIncrement()
    @entity.query.annotation.Fieldname(value="id")
    private Integer id;

    @entity.query.annotation.Fieldname(value="sid")
    private Short sid;

    @entity.query.annotation.Fieldname(value="bank_huming")
    private String bankHuming;

    @entity.query.annotation.Fieldname(value="bankname")
    private String bankname;

    @entity.query.annotation.Fieldname(value="bank_card_num")
    private String bankCardNum;

    @entity.query.annotation.Fieldname(value="address")
    private String address;

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public Short getSid() {
        return sid;
    }

    public void setSid(Short sid) {
        this.sid = sid;
    }

    public String getBankHuming() {
        return bankHuming;
    }

    public void setBankHuming(String bankHuming) {
        this.bankHuming = bankHuming == null ? null : bankHuming.trim();
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

    public String getAddress() {
        return address;
    }

    public void setAddress(String address) {
        this.address = address == null ? null : address.trim();
    }
}