package entity.query.entites;

import entity.query.Queryable;

public class AdminLog extends Queryable<AdminLog> {
    @entity.query.annotation.PrimaryKey()
    @entity.query.annotation.AutoIncrement()
    @entity.query.annotation.Fieldname(value="log_id")
    private Short logId;

    @entity.query.annotation.Fieldname(value="user_id")
    private Short userId;

    @entity.query.annotation.Fieldname(value="log_info")
    private String logInfo;

    @entity.query.annotation.Fieldname(value="log_ip")
    private String logIp;

    @entity.query.annotation.Fieldname(value="log_url")
    private String logUrl;

    @entity.query.annotation.Fieldname(value="log_time")
    private Integer logTime;

    public Short getLogId() {
        return logId;
    }

    public void setLogId(Short logId) {
        this.logId = logId;
    }

    public Short getUserId() {
        return userId;
    }

    public void setUserId(Short userId) {
        this.userId = userId;
    }

    public String getLogInfo() {
        return logInfo;
    }

    public void setLogInfo(String logInfo) {
        this.logInfo = logInfo == null ? null : logInfo.trim();
    }

    public String getLogIp() {
        return logIp;
    }

    public void setLogIp(String logIp) {
        this.logIp = logIp == null ? null : logIp.trim();
    }

    public String getLogUrl() {
        return logUrl;
    }

    public void setLogUrl(String logUrl) {
        this.logUrl = logUrl == null ? null : logUrl.trim();
    }

    public Integer getLogTime() {
        return logTime;
    }

    public void setLogTime(Integer logTime) {
        this.logTime = logTime;
    }
}