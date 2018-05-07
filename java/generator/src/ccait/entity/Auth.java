package ccait.entity;

import entity.query.Queryable;
import java.util.Date;

public class Auth extends Queryable<Auth> {
    /**
     * 
     *
     * @mbggenerated
     */
    @entity.query.annotation.PrimaryKey()
    @entity.query.annotation.AutoIncrement()
    @entity.query.annotation.Fieldname(value="user_id")
    private Integer userId;

    /**
     * 
     *
     * @mbggenerated
     */
    @entity.query.annotation.Fieldname(value="token")
    private String token;

    /**
     * 
     *
     * @mbggenerated
     */
    @entity.query.annotation.Fieldname(value="mac")
    private String mac;

    /**
     * 
     *
     * @mbggenerated
     */
    @entity.query.annotation.Fieldname(value="ip")
    private String ip;

    /**
     * 
     *
     * @mbggenerated
     */
    @entity.query.annotation.Fieldname(value="session_id")
    private String sessionId;

    /**
     * 
     *
     * @mbggenerated
     */
    @entity.query.annotation.Fieldname(value="expire_date")
    private Date expireDate;

    /**
     * 
     *
     * @mbggenerated
     */
    @entity.query.annotation.Fieldname(value="login_time")
    private Date loginTime;

    /**
     * 
     *
     * @mbggenerated
     */
    @entity.query.annotation.Fieldname(value="from")
    private Integer from;

    /**
     * 
     * @return user_id 
     *
     * @mbggenerated
     */
    public Integer getUserId() {
        return userId;
    }

    /**
     * 
     * @param userId 
     *
     * @mbggenerated
     */
    public void setUserId(Integer userId) {
        this.userId = userId;
    }

    /**
     * 
     * @return token 
     *
     * @mbggenerated
     */
    public String getToken() {
        return token;
    }

    /**
     * 
     * @param token 
     *
     * @mbggenerated
     */
    public void setToken(String token) {
        this.token = token == null ? null : token.trim();
    }

    /**
     * 
     * @return mac 
     *
     * @mbggenerated
     */
    public String getMac() {
        return mac;
    }

    /**
     * 
     * @param mac 
     *
     * @mbggenerated
     */
    public void setMac(String mac) {
        this.mac = mac == null ? null : mac.trim();
    }

    /**
     * 
     * @return ip 
     *
     * @mbggenerated
     */
    public String getIp() {
        return ip;
    }

    /**
     * 
     * @param ip 
     *
     * @mbggenerated
     */
    public void setIp(String ip) {
        this.ip = ip == null ? null : ip.trim();
    }

    /**
     * 
     * @return session_id 
     *
     * @mbggenerated
     */
    public String getSessionId() {
        return sessionId;
    }

    /**
     * 
     * @param sessionId 
     *
     * @mbggenerated
     */
    public void setSessionId(String sessionId) {
        this.sessionId = sessionId == null ? null : sessionId.trim();
    }

    /**
     * 
     * @return expire_date 
     *
     * @mbggenerated
     */
    public Date getExpireDate() {
        return expireDate;
    }

    /**
     * 
     * @param expireDate 
     *
     * @mbggenerated
     */
    public void setExpireDate(Date expireDate) {
        this.expireDate = expireDate;
    }

    /**
     * 
     * @return login_time 
     *
     * @mbggenerated
     */
    public Date getLoginTime() {
        return loginTime;
    }

    /**
     * 
     * @param loginTime 
     *
     * @mbggenerated
     */
    public void setLoginTime(Date loginTime) {
        this.loginTime = loginTime;
    }

    /**
     * 
     * @return from 
     *
     * @mbggenerated
     */
    public Integer getFrom() {
        return from;
    }

    /**
     * 
     * @param from 
     *
     * @mbggenerated
     */
    public void setFrom(Integer from) {
        this.from = from;
    }
}