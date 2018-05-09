package entity.query.entites;

import entity.query.Queryable;

public class Client extends Queryable<Client> {
    @entity.query.annotation.PrimaryKey()
    @entity.query.annotation.AutoIncrement()
    @entity.query.annotation.Fieldname(value="id")
    private Integer id;

    @entity.query.annotation.Fieldname(value="create_date")
    private String createDate;

    @entity.query.annotation.Fieldname(value="name")
    private String name;

    @entity.query.annotation.Fieldname(value="mobile")
    private String mobile;

    @entity.query.annotation.Fieldname(value="id_card_num")
    private String idCardNum;

    @entity.query.annotation.Fieldname(value="bank_card_num")
    private String bankCardNum;

    @entity.query.annotation.Fieldname(value="amount")
    private String amount;

    @entity.query.annotation.Fieldname(value="pass_begin")
    private String passBegin;

    @entity.query.annotation.Fieldname(value="pass_end")
    private String passEnd;

    @entity.query.annotation.Fieldname(value="url1")
    private String url1;

    @entity.query.annotation.Fieldname(value="url2")
    private String url2;

    @entity.query.annotation.Fieldname(value="url3")
    private String url3;

    @entity.query.annotation.Fieldname(value="url4")
    private String url4;

    @entity.query.annotation.Fieldname(value="url5")
    private String url5;

    @entity.query.annotation.Fieldname(value="status")
    private String status;

    @entity.query.annotation.Fieldname(value="handler_id")
    private Short handlerId;

    @entity.query.annotation.Fieldname(value="handler")
    private String handler;

    @entity.query.annotation.Fieldname(value="description")
    private String description;

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public String getCreateDate() {
        return createDate;
    }

    public void setCreateDate(String createDate) {
        this.createDate = createDate == null ? null : createDate.trim();
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name == null ? null : name.trim();
    }

    public String getMobile() {
        return mobile;
    }

    public void setMobile(String mobile) {
        this.mobile = mobile == null ? null : mobile.trim();
    }

    public String getIdCardNum() {
        return idCardNum;
    }

    public void setIdCardNum(String idCardNum) {
        this.idCardNum = idCardNum == null ? null : idCardNum.trim();
    }

    public String getBankCardNum() {
        return bankCardNum;
    }

    public void setBankCardNum(String bankCardNum) {
        this.bankCardNum = bankCardNum == null ? null : bankCardNum.trim();
    }

    public String getAmount() {
        return amount;
    }

    public void setAmount(String amount) {
        this.amount = amount == null ? null : amount.trim();
    }

    public String getPassBegin() {
        return passBegin;
    }

    public void setPassBegin(String passBegin) {
        this.passBegin = passBegin == null ? null : passBegin.trim();
    }

    public String getPassEnd() {
        return passEnd;
    }

    public void setPassEnd(String passEnd) {
        this.passEnd = passEnd == null ? null : passEnd.trim();
    }

    public String getUrl1() {
        return url1;
    }

    public void setUrl1(String url1) {
        this.url1 = url1 == null ? null : url1.trim();
    }

    public String getUrl2() {
        return url2;
    }

    public void setUrl2(String url2) {
        this.url2 = url2 == null ? null : url2.trim();
    }

    public String getUrl3() {
        return url3;
    }

    public void setUrl3(String url3) {
        this.url3 = url3 == null ? null : url3.trim();
    }

    public String getUrl4() {
        return url4;
    }

    public void setUrl4(String url4) {
        this.url4 = url4 == null ? null : url4.trim();
    }

    public String getUrl5() {
        return url5;
    }

    public void setUrl5(String url5) {
        this.url5 = url5 == null ? null : url5.trim();
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status == null ? null : status.trim();
    }

    public Short getHandlerId() {
        return handlerId;
    }

    public void setHandlerId(Short handlerId) {
        this.handlerId = handlerId;
    }

    public String getHandler() {
        return handler;
    }

    public void setHandler(String handler) {
        this.handler = handler == null ? null : handler.trim();
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description == null ? null : description.trim();
    }
}