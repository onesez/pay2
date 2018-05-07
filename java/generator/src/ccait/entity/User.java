package ccait.entity;

import entity.query.Queryable;
import java.util.Date;

public class User extends Queryable<User> {
    /**
     * 
     *
     * @mbggenerated
     */
    @entity.query.annotation.PrimaryKey()
    @entity.query.annotation.AutoIncrement()
    @entity.query.annotation.Fieldname(value="id")
    private Integer id;

    /**
     * 
     *
     * @mbggenerated
     */
    @entity.query.annotation.Fieldname(value="name")
    private String name;

    /**
     * 
     *
     * @mbggenerated
     */
    @entity.query.annotation.Fieldname(value="account")
    private String account;

    /**
     * 
     *
     * @mbggenerated
     */
    @entity.query.annotation.Fieldname(value="password")
    private String password;

    /**
     * 
     *
     * @mbggenerated
     */
    @entity.query.annotation.Fieldname(value="qq")
    private String qq;

    /**
     * 
     *
     * @mbggenerated
     */
    @entity.query.annotation.Fieldname(value="wechat")
    private String wechat;

    /**
     * 
     *
     * @mbggenerated
     */
    @entity.query.annotation.Fieldname(value="mobile")
    private String mobile;

    /**
     * 
     *
     * @mbggenerated
     */
    @entity.query.annotation.Fieldname(value="email")
    private String email;

    /**
     * 
     *
     * @mbggenerated
     */
    @entity.query.annotation.Fieldname(value="head_image")
    private String headImage;

    /**
     * 
     *
     * @mbggenerated
     */
    @entity.query.annotation.Fieldname(value="description")
    private String description;

    /**
     * 
     *
     * @mbggenerated
     */
    @entity.query.annotation.Fieldname(value="apple_id")
    private String appleId;

    /**
     * 
     *
     * @mbggenerated
     */
    @entity.query.annotation.Fieldname(value="weixin_token")
    private String weixinToken;

    /**
     * 
     *
     * @mbggenerated
     */
    @entity.query.annotation.Fieldname(value="access_token")
    private String accessToken;

    /**
     * 
     *
     * @mbggenerated
     */
    @entity.query.annotation.Fieldname(value="sign_id")
    private String signId;

    /**
     * 
     *
     * @mbggenerated
     */
    @entity.query.annotation.Fieldname(value="app_id")
    private String appId;

    /**
     * 
     *
     * @mbggenerated
     */
    @entity.query.annotation.Fieldname(value="create_on")
    private Date createOn;

    /**
     * 
     * @return id 
     *
     * @mbggenerated
     */
    public Integer getId() {
        return id;
    }

    /**
     * 
     * @param id 
     *
     * @mbggenerated
     */
    public void setId(Integer id) {
        this.id = id;
    }

    /**
     * 
     * @return name 
     *
     * @mbggenerated
     */
    public String getName() {
        return name;
    }

    /**
     * 
     * @param name 
     *
     * @mbggenerated
     */
    public void setName(String name) {
        this.name = name == null ? null : name.trim();
    }

    /**
     * 
     * @return account 
     *
     * @mbggenerated
     */
    public String getAccount() {
        return account;
    }

    /**
     * 
     * @param account 
     *
     * @mbggenerated
     */
    public void setAccount(String account) {
        this.account = account == null ? null : account.trim();
    }

    /**
     * 
     * @return password 
     *
     * @mbggenerated
     */
    public String getPassword() {
        return password;
    }

    /**
     * 
     * @param password 
     *
     * @mbggenerated
     */
    public void setPassword(String password) {
        this.password = password == null ? null : password.trim();
    }

    /**
     * 
     * @return qq 
     *
     * @mbggenerated
     */
    public String getQq() {
        return qq;
    }

    /**
     * 
     * @param qq 
     *
     * @mbggenerated
     */
    public void setQq(String qq) {
        this.qq = qq == null ? null : qq.trim();
    }

    /**
     * 
     * @return wechat 
     *
     * @mbggenerated
     */
    public String getWechat() {
        return wechat;
    }

    /**
     * 
     * @param wechat 
     *
     * @mbggenerated
     */
    public void setWechat(String wechat) {
        this.wechat = wechat == null ? null : wechat.trim();
    }

    /**
     * 
     * @return mobile 
     *
     * @mbggenerated
     */
    public String getMobile() {
        return mobile;
    }

    /**
     * 
     * @param mobile 
     *
     * @mbggenerated
     */
    public void setMobile(String mobile) {
        this.mobile = mobile == null ? null : mobile.trim();
    }

    /**
     * 
     * @return email 
     *
     * @mbggenerated
     */
    public String getEmail() {
        return email;
    }

    /**
     * 
     * @param email 
     *
     * @mbggenerated
     */
    public void setEmail(String email) {
        this.email = email == null ? null : email.trim();
    }

    /**
     * 
     * @return head_image 
     *
     * @mbggenerated
     */
    public String getHeadImage() {
        return headImage;
    }

    /**
     * 
     * @param headImage 
     *
     * @mbggenerated
     */
    public void setHeadImage(String headImage) {
        this.headImage = headImage == null ? null : headImage.trim();
    }

    /**
     * 
     * @return description 
     *
     * @mbggenerated
     */
    public String getDescription() {
        return description;
    }

    /**
     * 
     * @param description 
     *
     * @mbggenerated
     */
    public void setDescription(String description) {
        this.description = description == null ? null : description.trim();
    }

    /**
     * 
     * @return apple_id 
     *
     * @mbggenerated
     */
    public String getAppleId() {
        return appleId;
    }

    /**
     * 
     * @param appleId 
     *
     * @mbggenerated
     */
    public void setAppleId(String appleId) {
        this.appleId = appleId == null ? null : appleId.trim();
    }

    /**
     * 
     * @return weixin_token 
     *
     * @mbggenerated
     */
    public String getWeixinToken() {
        return weixinToken;
    }

    /**
     * 
     * @param weixinToken 
     *
     * @mbggenerated
     */
    public void setWeixinToken(String weixinToken) {
        this.weixinToken = weixinToken == null ? null : weixinToken.trim();
    }

    /**
     * 
     * @return access_token 
     *
     * @mbggenerated
     */
    public String getAccessToken() {
        return accessToken;
    }

    /**
     * 
     * @param accessToken 
     *
     * @mbggenerated
     */
    public void setAccessToken(String accessToken) {
        this.accessToken = accessToken == null ? null : accessToken.trim();
    }

    /**
     * 
     * @return sign_id 
     *
     * @mbggenerated
     */
    public String getSignId() {
        return signId;
    }

    /**
     * 
     * @param signId 
     *
     * @mbggenerated
     */
    public void setSignId(String signId) {
        this.signId = signId == null ? null : signId.trim();
    }

    /**
     * 
     * @return app_id 
     *
     * @mbggenerated
     */
    public String getAppId() {
        return appId;
    }

    /**
     * 
     * @param appId 
     *
     * @mbggenerated
     */
    public void setAppId(String appId) {
        this.appId = appId == null ? null : appId.trim();
    }

    /**
     * 
     * @return create_on 
     *
     * @mbggenerated
     */
    public Date getCreateOn() {
        return createOn;
    }

    /**
     * 
     * @param createOn 
     *
     * @mbggenerated
     */
    public void setCreateOn(Date createOn) {
        this.createOn = createOn;
    }
}