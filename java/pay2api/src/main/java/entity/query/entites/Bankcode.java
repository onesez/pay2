package entity.query.entites;

import entity.query.Queryable;

public class Bankcode extends Queryable<Bankcode> {
    @entity.query.annotation.PrimaryKey()
    @entity.query.annotation.AutoIncrement()
    @entity.query.annotation.Fieldname(value="id")
    private Short id;

    @entity.query.annotation.Fieldname(value="bankname")
    private String bankname;

    @entity.query.annotation.Fieldname(value="bankcode")
    private String bankcode;

    public Short getId() {
        return id;
    }

    public void setId(Short id) {
        this.id = id;
    }

    public String getBankname() {
        return bankname;
    }

    public void setBankname(String bankname) {
        this.bankname = bankname == null ? null : bankname.trim();
    }

    public String getBankcode() {
        return bankcode;
    }

    public void setBankcode(String bankcode) {
        this.bankcode = bankcode == null ? null : bankcode.trim();
    }
}