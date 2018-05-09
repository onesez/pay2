package entity.query.entites;

import entity.query.Queryable;
import java.math.BigDecimal;

public class User extends Queryable<User> {
    @entity.query.annotation.PrimaryKey()
    @entity.query.annotation.AutoIncrement()
    @entity.query.annotation.Fieldname(value="id")
    private Short id;

    @entity.query.annotation.Fieldname(value="user_name")
    private String userName;

    @entity.query.annotation.Fieldname(value="password")
    private String password;

    @entity.query.annotation.Fieldname(value="md5key")
    private String md5key;

    @entity.query.annotation.Fieldname(value="company_name")
    private String companyName;

    @entity.query.annotation.Fieldname(value="truename")
    private String truename;

    @entity.query.annotation.Fieldname(value="id_card_num")
    private String idCardNum;

    @entity.query.annotation.Fieldname(value="mobile")
    private String mobile;

    @entity.query.annotation.Fieldname(value="bank_user")
    private String bankUser;

    @entity.query.annotation.Fieldname(value="bank_card_num")
    private String bankCardNum;

    @entity.query.annotation.Fieldname(value="bank_name")
    private String bankName;

    @entity.query.annotation.Fieldname(value="address")
    private String address;

    @entity.query.annotation.Fieldname(value="add_time")
    private Integer addTime;

    @entity.query.annotation.Fieldname(value="last_login")
    private Integer lastLogin;

    @entity.query.annotation.Fieldname(value="payment_ip")
    private String paymentIp;

    @entity.query.annotation.Fieldname(value="last_login_ip")
    private String lastLoginIp;

    @entity.query.annotation.Fieldname(value="t_balance")
    private BigDecimal tBalance;

    @entity.query.annotation.Fieldname(value="balance")
    private BigDecimal balance;

    @entity.query.annotation.Fieldname(value="platform")
    private Short platform;

    @entity.query.annotation.Fieldname(value="rate")
    private Float rate;

    @entity.query.annotation.Fieldname(value="parent_name")
    private String parentName;

    @entity.query.annotation.Fieldname(value="period")
    private Boolean period;

    @entity.query.annotation.Fieldname(value="is_lock")
    private Boolean isLock;

    @entity.query.annotation.Fieldname(value="lock_ratio")
    private Float lockRatio;

    @entity.query.annotation.Fieldname(value="draw_money_lock")
    private Boolean drawMoneyLock;

    @entity.query.annotation.Fieldname(value="role_id")
    private Short roleId;

    public Short getId() {
        return id;
    }

    public void setId(Short id) {
        this.id = id;
    }

    public String getUserName() {
        return userName;
    }

    public void setUserName(String userName) {
        this.userName = userName == null ? null : userName.trim();
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password == null ? null : password.trim();
    }

    public String getMd5key() {
        return md5key;
    }

    public void setMd5key(String md5key) {
        this.md5key = md5key == null ? null : md5key.trim();
    }

    public String getCompanyName() {
        return companyName;
    }

    public void setCompanyName(String companyName) {
        this.companyName = companyName == null ? null : companyName.trim();
    }

    public String getTruename() {
        return truename;
    }

    public void setTruename(String truename) {
        this.truename = truename == null ? null : truename.trim();
    }

    public String getIdCardNum() {
        return idCardNum;
    }

    public void setIdCardNum(String idCardNum) {
        this.idCardNum = idCardNum == null ? null : idCardNum.trim();
    }

    public String getMobile() {
        return mobile;
    }

    public void setMobile(String mobile) {
        this.mobile = mobile == null ? null : mobile.trim();
    }

    public String getBankUser() {
        return bankUser;
    }

    public void setBankUser(String bankUser) {
        this.bankUser = bankUser == null ? null : bankUser.trim();
    }

    public String getBankCardNum() {
        return bankCardNum;
    }

    public void setBankCardNum(String bankCardNum) {
        this.bankCardNum = bankCardNum == null ? null : bankCardNum.trim();
    }

    public String getBankName() {
        return bankName;
    }

    public void setBankName(String bankName) {
        this.bankName = bankName == null ? null : bankName.trim();
    }

    public String getAddress() {
        return address;
    }

    public void setAddress(String address) {
        this.address = address == null ? null : address.trim();
    }

    public Integer getAddTime() {
        return addTime;
    }

    public void setAddTime(Integer addTime) {
        this.addTime = addTime;
    }

    public Integer getLastLogin() {
        return lastLogin;
    }

    public void setLastLogin(Integer lastLogin) {
        this.lastLogin = lastLogin;
    }

    public String getPaymentIp() {
        return paymentIp;
    }

    public void setPaymentIp(String paymentIp) {
        this.paymentIp = paymentIp == null ? null : paymentIp.trim();
    }

    public String getLastLoginIp() {
        return lastLoginIp;
    }

    public void setLastLoginIp(String lastLoginIp) {
        this.lastLoginIp = lastLoginIp == null ? null : lastLoginIp.trim();
    }

    public BigDecimal gettBalance() {
        return tBalance;
    }

    public void settBalance(BigDecimal tBalance) {
        this.tBalance = tBalance;
    }

    public BigDecimal getBalance() {
        return balance;
    }

    public void setBalance(BigDecimal balance) {
        this.balance = balance;
    }

    public Short getPlatform() {
        return platform;
    }

    public void setPlatform(Short platform) {
        this.platform = platform;
    }

    public Float getRate() {
        return rate;
    }

    public void setRate(Float rate) {
        this.rate = rate;
    }

    public String getParentName() {
        return parentName;
    }

    public void setParentName(String parentName) {
        this.parentName = parentName == null ? null : parentName.trim();
    }

    public Boolean getPeriod() {
        return period;
    }

    public void setPeriod(Boolean period) {
        this.period = period;
    }

    public Boolean getIsLock() {
        return isLock;
    }

    public void setIsLock(Boolean isLock) {
        this.isLock = isLock;
    }

    public Float getLockRatio() {
        return lockRatio;
    }

    public void setLockRatio(Float lockRatio) {
        this.lockRatio = lockRatio;
    }

    public Boolean getDrawMoneyLock() {
        return drawMoneyLock;
    }

    public void setDrawMoneyLock(Boolean drawMoneyLock) {
        this.drawMoneyLock = drawMoneyLock;
    }

    public Short getRoleId() {
        return roleId;
    }

    public void setRoleId(Short roleId) {
        this.roleId = roleId;
    }
}