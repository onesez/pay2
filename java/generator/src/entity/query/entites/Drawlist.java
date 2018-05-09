package entity.query.entites;

import entity.query.Queryable;
import java.math.BigDecimal;

public class Drawlist extends Queryable<Drawlist> {
    @entity.query.annotation.PrimaryKey()
    @entity.query.annotation.AutoIncrement()
    @entity.query.annotation.Fieldname(value="id")
    private Integer id;

    @entity.query.annotation.Fieldname(value="user_id")
    private Short userId;

    @entity.query.annotation.Fieldname(value="addtime")
    private Integer addtime;

    @entity.query.annotation.Fieldname(value="order_num")
    private String orderNum;

    @entity.query.annotation.Fieldname(value="user_name")
    private String userName;

    @entity.query.annotation.Fieldname(value="mobile")
    private String mobile;

    @entity.query.annotation.Fieldname(value="bank_account")
    private String bankAccount;

    @entity.query.annotation.Fieldname(value="bank")
    private String bank;

    @entity.query.annotation.Fieldname(value="bank_card_num")
    private String bankCardNum;

    @entity.query.annotation.Fieldname(value="amount")
    private BigDecimal amount;

    @entity.query.annotation.Fieldname(value="status")
    private String status;

    @entity.query.annotation.Fieldname(value="reason")
    private String reason;

    @entity.query.annotation.Fieldname(value="pay_time")
    private Integer payTime;

    @entity.query.annotation.Fieldname(value="batch_order_num")
    private String batchOrderNum;

    @entity.query.annotation.Fieldname(value="order_id")
    private Integer orderId;

    @entity.query.annotation.Fieldname(value="platform_order_num")
    private String platformOrderNum;

    @entity.query.annotation.Fieldname(value="platform")
    private String platform;

    @entity.query.annotation.Fieldname(value="success_pay_time")
    private Integer successPayTime;

    @entity.query.annotation.Fieldname(value="success_state")
    private String successState;

    @entity.query.annotation.Fieldname(value="success_result")
    private String successResult;

    @entity.query.annotation.Fieldname(value="fail_state")
    private Short failState;

    @entity.query.annotation.Fieldname(value="fail_amount")
    private BigDecimal failAmount;

    @entity.query.annotation.Fieldname(value="remark")
    private String remark;

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

    public Integer getAddtime() {
        return addtime;
    }

    public void setAddtime(Integer addtime) {
        this.addtime = addtime;
    }

    public String getOrderNum() {
        return orderNum;
    }

    public void setOrderNum(String orderNum) {
        this.orderNum = orderNum == null ? null : orderNum.trim();
    }

    public String getUserName() {
        return userName;
    }

    public void setUserName(String userName) {
        this.userName = userName == null ? null : userName.trim();
    }

    public String getMobile() {
        return mobile;
    }

    public void setMobile(String mobile) {
        this.mobile = mobile == null ? null : mobile.trim();
    }

    public String getBankAccount() {
        return bankAccount;
    }

    public void setBankAccount(String bankAccount) {
        this.bankAccount = bankAccount == null ? null : bankAccount.trim();
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

    public BigDecimal getAmount() {
        return amount;
    }

    public void setAmount(BigDecimal amount) {
        this.amount = amount;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status == null ? null : status.trim();
    }

    public String getReason() {
        return reason;
    }

    public void setReason(String reason) {
        this.reason = reason == null ? null : reason.trim();
    }

    public Integer getPayTime() {
        return payTime;
    }

    public void setPayTime(Integer payTime) {
        this.payTime = payTime;
    }

    public String getBatchOrderNum() {
        return batchOrderNum;
    }

    public void setBatchOrderNum(String batchOrderNum) {
        this.batchOrderNum = batchOrderNum == null ? null : batchOrderNum.trim();
    }

    public Integer getOrderId() {
        return orderId;
    }

    public void setOrderId(Integer orderId) {
        this.orderId = orderId;
    }

    public String getPlatformOrderNum() {
        return platformOrderNum;
    }

    public void setPlatformOrderNum(String platformOrderNum) {
        this.platformOrderNum = platformOrderNum == null ? null : platformOrderNum.trim();
    }

    public String getPlatform() {
        return platform;
    }

    public void setPlatform(String platform) {
        this.platform = platform == null ? null : platform.trim();
    }

    public Integer getSuccessPayTime() {
        return successPayTime;
    }

    public void setSuccessPayTime(Integer successPayTime) {
        this.successPayTime = successPayTime;
    }

    public String getSuccessState() {
        return successState;
    }

    public void setSuccessState(String successState) {
        this.successState = successState == null ? null : successState.trim();
    }

    public String getSuccessResult() {
        return successResult;
    }

    public void setSuccessResult(String successResult) {
        this.successResult = successResult == null ? null : successResult.trim();
    }

    public Short getFailState() {
        return failState;
    }

    public void setFailState(Short failState) {
        this.failState = failState;
    }

    public BigDecimal getFailAmount() {
        return failAmount;
    }

    public void setFailAmount(BigDecimal failAmount) {
        this.failAmount = failAmount;
    }

    public String getRemark() {
        return remark;
    }

    public void setRemark(String remark) {
        this.remark = remark == null ? null : remark.trim();
    }
}