package entity.query.entites;

import entity.query.Queryable;
import java.math.BigDecimal;

public class Orderlist extends Queryable<Orderlist> {
    @entity.query.annotation.PrimaryKey()
    @entity.query.annotation.AutoIncrement()
    @entity.query.annotation.Fieldname(value="id")
    private Integer id;

    @entity.query.annotation.Fieldname(value="creat_time")
    private Integer creatTime;

    @entity.query.annotation.Fieldname(value="user_id")
    private String userId;

    @entity.query.annotation.Fieldname(value="md5key")
    private String md5key;

    @entity.query.annotation.Fieldname(value="rote_id")
    private String roteId;

    @entity.query.annotation.Fieldname(value="pay_platform")
    private String payPlatform;

    @entity.query.annotation.Fieldname(value="product_sid")
    private Short productSid;

    @entity.query.annotation.Fieldname(value="pay_date")
    private Integer payDate;

    @entity.query.annotation.Fieldname(value="pay_order_id")
    private String payOrderId;

    @entity.query.annotation.Fieldname(value="pay_product_name")
    private String payProductName;

    @entity.query.annotation.Fieldname(value="pay_amount")
    private BigDecimal payAmount;

    @entity.query.annotation.Fieldname(value="pay_notify_url")
    private String payNotifyUrl;

    @entity.query.annotation.Fieldname(value="pay_return_url")
    private String payReturnUrl;

    @entity.query.annotation.Fieldname(value="pay_remark")
    private String payRemark;

    @entity.query.annotation.Fieldname(value="pay_str")
    private String payStr;

    @entity.query.annotation.Fieldname(value="order_num")
    private String orderNum;

    @entity.query.annotation.Fieldname(value="success_pay_time")
    private Integer successPayTime;

    @entity.query.annotation.Fieldname(value="pay_total")
    private BigDecimal payTotal;

    @entity.query.annotation.Fieldname(value="pay_platform_name")
    private String payPlatformName;

    @entity.query.annotation.Fieldname(value="pay_product")
    private String payProduct;

    @entity.query.annotation.Fieldname(value="pay_platform_rote")
    private BigDecimal payPlatformRote;

    @entity.query.annotation.Fieldname(value="pay_company_rote")
    private BigDecimal payCompanyRote;

    @entity.query.annotation.Fieldname(value="pay_sell_rote")
    private BigDecimal paySellRote;

    @entity.query.annotation.Fieldname(value="pay_platform_fee")
    private BigDecimal payPlatformFee;

    @entity.query.annotation.Fieldname(value="pay_company_fee")
    private BigDecimal payCompanyFee;

    @entity.query.annotation.Fieldname(value="pay_sell_fee")
    private BigDecimal paySellFee;

    @entity.query.annotation.Fieldname(value="pay_to_member")
    private BigDecimal payToMember;

    @entity.query.annotation.Fieldname(value="pay_to_boss")
    private BigDecimal payToBoss;

    @entity.query.annotation.Fieldname(value="profit")
    private BigDecimal profit;

    @entity.query.annotation.Fieldname(value="pre_pay_time")
    private Integer prePayTime;

    @entity.query.annotation.Fieldname(value="pay_time")
    private Integer payTime;

    @entity.query.annotation.Fieldname(value="status")
    private Integer status;

    @entity.query.annotation.Fieldname(value="pay_state")
    private Short payState;

    @entity.query.annotation.Fieldname(value="pay_user")
    private String payUser;

    @entity.query.annotation.Fieldname(value="pay_user_commission")
    private BigDecimal payUserCommission;

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public Integer getCreatTime() {
        return creatTime;
    }

    public void setCreatTime(Integer creatTime) {
        this.creatTime = creatTime;
    }

    public String getUserId() {
        return userId;
    }

    public void setUserId(String userId) {
        this.userId = userId == null ? null : userId.trim();
    }

    public String getMd5key() {
        return md5key;
    }

    public void setMd5key(String md5key) {
        this.md5key = md5key == null ? null : md5key.trim();
    }

    public String getRoteId() {
        return roteId;
    }

    public void setRoteId(String roteId) {
        this.roteId = roteId == null ? null : roteId.trim();
    }

    public String getPayPlatform() {
        return payPlatform;
    }

    public void setPayPlatform(String payPlatform) {
        this.payPlatform = payPlatform == null ? null : payPlatform.trim();
    }

    public Short getProductSid() {
        return productSid;
    }

    public void setProductSid(Short productSid) {
        this.productSid = productSid;
    }

    public Integer getPayDate() {
        return payDate;
    }

    public void setPayDate(Integer payDate) {
        this.payDate = payDate;
    }

    public String getPayOrderId() {
        return payOrderId;
    }

    public void setPayOrderId(String payOrderId) {
        this.payOrderId = payOrderId == null ? null : payOrderId.trim();
    }

    public String getPayProductName() {
        return payProductName;
    }

    public void setPayProductName(String payProductName) {
        this.payProductName = payProductName == null ? null : payProductName.trim();
    }

    public BigDecimal getPayAmount() {
        return payAmount;
    }

    public void setPayAmount(BigDecimal payAmount) {
        this.payAmount = payAmount;
    }

    public String getPayNotifyUrl() {
        return payNotifyUrl;
    }

    public void setPayNotifyUrl(String payNotifyUrl) {
        this.payNotifyUrl = payNotifyUrl == null ? null : payNotifyUrl.trim();
    }

    public String getPayReturnUrl() {
        return payReturnUrl;
    }

    public void setPayReturnUrl(String payReturnUrl) {
        this.payReturnUrl = payReturnUrl == null ? null : payReturnUrl.trim();
    }

    public String getPayRemark() {
        return payRemark;
    }

    public void setPayRemark(String payRemark) {
        this.payRemark = payRemark == null ? null : payRemark.trim();
    }

    public String getPayStr() {
        return payStr;
    }

    public void setPayStr(String payStr) {
        this.payStr = payStr == null ? null : payStr.trim();
    }

    public String getOrderNum() {
        return orderNum;
    }

    public void setOrderNum(String orderNum) {
        this.orderNum = orderNum == null ? null : orderNum.trim();
    }

    public Integer getSuccessPayTime() {
        return successPayTime;
    }

    public void setSuccessPayTime(Integer successPayTime) {
        this.successPayTime = successPayTime;
    }

    public BigDecimal getPayTotal() {
        return payTotal;
    }

    public void setPayTotal(BigDecimal payTotal) {
        this.payTotal = payTotal;
    }

    public String getPayPlatformName() {
        return payPlatformName;
    }

    public void setPayPlatformName(String payPlatformName) {
        this.payPlatformName = payPlatformName == null ? null : payPlatformName.trim();
    }

    public String getPayProduct() {
        return payProduct;
    }

    public void setPayProduct(String payProduct) {
        this.payProduct = payProduct == null ? null : payProduct.trim();
    }

    public BigDecimal getPayPlatformRote() {
        return payPlatformRote;
    }

    public void setPayPlatformRote(BigDecimal payPlatformRote) {
        this.payPlatformRote = payPlatformRote;
    }

    public BigDecimal getPayCompanyRote() {
        return payCompanyRote;
    }

    public void setPayCompanyRote(BigDecimal payCompanyRote) {
        this.payCompanyRote = payCompanyRote;
    }

    public BigDecimal getPaySellRote() {
        return paySellRote;
    }

    public void setPaySellRote(BigDecimal paySellRote) {
        this.paySellRote = paySellRote;
    }

    public BigDecimal getPayPlatformFee() {
        return payPlatformFee;
    }

    public void setPayPlatformFee(BigDecimal payPlatformFee) {
        this.payPlatformFee = payPlatformFee;
    }

    public BigDecimal getPayCompanyFee() {
        return payCompanyFee;
    }

    public void setPayCompanyFee(BigDecimal payCompanyFee) {
        this.payCompanyFee = payCompanyFee;
    }

    public BigDecimal getPaySellFee() {
        return paySellFee;
    }

    public void setPaySellFee(BigDecimal paySellFee) {
        this.paySellFee = paySellFee;
    }

    public BigDecimal getPayToMember() {
        return payToMember;
    }

    public void setPayToMember(BigDecimal payToMember) {
        this.payToMember = payToMember;
    }

    public BigDecimal getPayToBoss() {
        return payToBoss;
    }

    public void setPayToBoss(BigDecimal payToBoss) {
        this.payToBoss = payToBoss;
    }

    public BigDecimal getProfit() {
        return profit;
    }

    public void setProfit(BigDecimal profit) {
        this.profit = profit;
    }

    public Integer getPrePayTime() {
        return prePayTime;
    }

    public void setPrePayTime(Integer prePayTime) {
        this.prePayTime = prePayTime;
    }

    public Integer getPayTime() {
        return payTime;
    }

    public void setPayTime(Integer payTime) {
        this.payTime = payTime;
    }

    public Integer getStatus() {
        return status;
    }

    public void setStatus(Integer status) {
        this.status = status;
    }

    public Short getPayState() {
        return payState;
    }

    public void setPayState(Short payState) {
        this.payState = payState;
    }

    public String getPayUser() {
        return payUser;
    }

    public void setPayUser(String payUser) {
        this.payUser = payUser == null ? null : payUser.trim();
    }

    public BigDecimal getPayUserCommission() {
        return payUserCommission;
    }

    public void setPayUserCommission(BigDecimal payUserCommission) {
        this.payUserCommission = payUserCommission;
    }
}