package entity.query.entites;

import entity.query.Queryable;

public class Deduct extends Queryable<Deduct> {
    @entity.query.annotation.PrimaryKey()
    @entity.query.annotation.AutoIncrement()
    @entity.query.annotation.Fieldname(value="id")
    private Short id;

    @entity.query.annotation.Fieldname(value="addtime")
    private Integer addtime;

    @entity.query.annotation.Fieldname(value="amount")
    private String amount;

    @entity.query.annotation.Fieldname(value="payment_name")
    private String paymentName;

    @entity.query.annotation.Fieldname(value="payment_mobile")
    private String paymentMobile;

    @entity.query.annotation.Fieldname(value="payment_id_card")
    private String paymentIdCard;

    @entity.query.annotation.Fieldname(value="bank")
    private String bank;

    @entity.query.annotation.Fieldname(value="bank_card_num")
    private String bankCardNum;

    @entity.query.annotation.Fieldname(value="status")
    private String status;

    @entity.query.annotation.Fieldname(value="description")
    private String description;

    @entity.query.annotation.Fieldname(value="action_time")
    private Integer actionTime;

    @entity.query.annotation.Fieldname(value="close_state")
    private String closeState;

    @entity.query.annotation.Fieldname(value="close_amount")
    private Float closeAmount;

    @entity.query.annotation.Fieldname(value="pre_close_time")
    private Integer preCloseTime;

    @entity.query.annotation.Fieldname(value="close_time")
    private Integer closeTime;

    @entity.query.annotation.Fieldname(value="deductor_id")
    private Short deductorId;

    @entity.query.annotation.Fieldname(value="deductor_name")
    private String deductorName;

    public Short getId() {
        return id;
    }

    public void setId(Short id) {
        this.id = id;
    }

    public Integer getAddtime() {
        return addtime;
    }

    public void setAddtime(Integer addtime) {
        this.addtime = addtime;
    }

    public String getAmount() {
        return amount;
    }

    public void setAmount(String amount) {
        this.amount = amount == null ? null : amount.trim();
    }

    public String getPaymentName() {
        return paymentName;
    }

    public void setPaymentName(String paymentName) {
        this.paymentName = paymentName == null ? null : paymentName.trim();
    }

    public String getPaymentMobile() {
        return paymentMobile;
    }

    public void setPaymentMobile(String paymentMobile) {
        this.paymentMobile = paymentMobile == null ? null : paymentMobile.trim();
    }

    public String getPaymentIdCard() {
        return paymentIdCard;
    }

    public void setPaymentIdCard(String paymentIdCard) {
        this.paymentIdCard = paymentIdCard == null ? null : paymentIdCard.trim();
    }

    public String getBank() {
        return bank;
    }

    public void setBank(String bank) {
        this.bank = bank == null ? null : bank.trim();
    }

    public String getBankCardNum() {
        return bankCardNum;
    }

    public void setBankCardNum(String bankCardNum) {
        this.bankCardNum = bankCardNum == null ? null : bankCardNum.trim();
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status == null ? null : status.trim();
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description == null ? null : description.trim();
    }

    public Integer getActionTime() {
        return actionTime;
    }

    public void setActionTime(Integer actionTime) {
        this.actionTime = actionTime;
    }

    public String getCloseState() {
        return closeState;
    }

    public void setCloseState(String closeState) {
        this.closeState = closeState == null ? null : closeState.trim();
    }

    public Float getCloseAmount() {
        return closeAmount;
    }

    public void setCloseAmount(Float closeAmount) {
        this.closeAmount = closeAmount;
    }

    public Integer getPreCloseTime() {
        return preCloseTime;
    }

    public void setPreCloseTime(Integer preCloseTime) {
        this.preCloseTime = preCloseTime;
    }

    public Integer getCloseTime() {
        return closeTime;
    }

    public void setCloseTime(Integer closeTime) {
        this.closeTime = closeTime;
    }

    public Short getDeductorId() {
        return deductorId;
    }

    public void setDeductorId(Short deductorId) {
        this.deductorId = deductorId;
    }

    public String getDeductorName() {
        return deductorName;
    }

    public void setDeductorName(String deductorName) {
        this.deductorName = deductorName == null ? null : deductorName.trim();
    }
}