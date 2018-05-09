package entity.query.entites;

import java.math.BigDecimal;
import java.util.ArrayList;
import java.util.List;

public class RateExample {
    protected String orderByClause;

    protected boolean distinct;

    protected List<Criteria> oredCriteria;

    public RateExample() {
        oredCriteria = new ArrayList<Criteria>();
    }

    public void setOrderByClause(String orderByClause) {
        this.orderByClause = orderByClause;
    }

    public String getOrderByClause() {
        return orderByClause;
    }

    public void setDistinct(boolean distinct) {
        this.distinct = distinct;
    }

    public boolean isDistinct() {
        return distinct;
    }

    public List<Criteria> getOredCriteria() {
        return oredCriteria;
    }

    public void or(Criteria criteria) {
        oredCriteria.add(criteria);
    }

    public Criteria or() {
        Criteria criteria = createCriteriaInternal();
        oredCriteria.add(criteria);
        return criteria;
    }

    public Criteria createCriteria() {
        Criteria criteria = createCriteriaInternal();
        if (oredCriteria.size() == 0) {
            oredCriteria.add(criteria);
        }
        return criteria;
    }

    protected Criteria createCriteriaInternal() {
        Criteria criteria = new Criteria();
        return criteria;
    }

    public void clear() {
        oredCriteria.clear();
        orderByClause = null;
        distinct = false;
    }

    @entity.query.annotation.Tablename(value="rate")
    protected abstract static class GeneratedCriteria {
        protected List<Criterion> criteria;

        protected GeneratedCriteria() {
            super();
            criteria = new ArrayList<Criterion>();
        }

        public boolean isValid() {
            return criteria.size() > 0;
        }

        public List<Criterion> getAllCriteria() {
            return criteria;
        }

        public List<Criterion> getCriteria() {
            return criteria;
        }

        protected void addCriterion(String condition) {
            if (condition == null) {
                throw new RuntimeException("Value for condition cannot be null");
            }
            criteria.add(new Criterion(condition));
        }

        protected void addCriterion(String condition, Object value, String property) {
            if (value == null) {
                throw new RuntimeException("Value for " + property + " cannot be null");
            }
            criteria.add(new Criterion(condition, value));
        }

        protected void addCriterion(String condition, Object value1, Object value2, String property) {
            if (value1 == null || value2 == null) {
                throw new RuntimeException("Between values for " + property + " cannot be null");
            }
            criteria.add(new Criterion(condition, value1, value2));
        }

        public Criteria andIdIsNull() {
            addCriterion("id is null");
            return (Criteria) this;
        }

        public Criteria andIdIsNotNull() {
            addCriterion("id is not null");
            return (Criteria) this;
        }

        public Criteria andIdEqualTo(Integer value) {
            addCriterion("id =", value, "id");
            return (Criteria) this;
        }

        public Criteria andIdNotEqualTo(Integer value) {
            addCriterion("id <>", value, "id");
            return (Criteria) this;
        }

        public Criteria andIdGreaterThan(Integer value) {
            addCriterion("id >", value, "id");
            return (Criteria) this;
        }

        public Criteria andIdGreaterThanOrEqualTo(Integer value) {
            addCriterion("id >=", value, "id");
            return (Criteria) this;
        }

        public Criteria andIdLessThan(Integer value) {
            addCriterion("id <", value, "id");
            return (Criteria) this;
        }

        public Criteria andIdLessThanOrEqualTo(Integer value) {
            addCriterion("id <=", value, "id");
            return (Criteria) this;
        }

        public Criteria andIdIn(List<Integer> values) {
            addCriterion("id in", values, "id");
            return (Criteria) this;
        }

        public Criteria andIdNotIn(List<Integer> values) {
            addCriterion("id not in", values, "id");
            return (Criteria) this;
        }

        public Criteria andIdBetween(Integer value1, Integer value2) {
            addCriterion("id between", value1, value2, "id");
            return (Criteria) this;
        }

        public Criteria andIdNotBetween(Integer value1, Integer value2) {
            addCriterion("id not between", value1, value2, "id");
            return (Criteria) this;
        }

        public Criteria andUserIdIsNull() {
            addCriterion("user_id is null");
            return (Criteria) this;
        }

        public Criteria andUserIdIsNotNull() {
            addCriterion("user_id is not null");
            return (Criteria) this;
        }

        public Criteria andUserIdEqualTo(Short value) {
            addCriterion("user_id =", value, "userId");
            return (Criteria) this;
        }

        public Criteria andUserIdNotEqualTo(Short value) {
            addCriterion("user_id <>", value, "userId");
            return (Criteria) this;
        }

        public Criteria andUserIdGreaterThan(Short value) {
            addCriterion("user_id >", value, "userId");
            return (Criteria) this;
        }

        public Criteria andUserIdGreaterThanOrEqualTo(Short value) {
            addCriterion("user_id >=", value, "userId");
            return (Criteria) this;
        }

        public Criteria andUserIdLessThan(Short value) {
            addCriterion("user_id <", value, "userId");
            return (Criteria) this;
        }

        public Criteria andUserIdLessThanOrEqualTo(Short value) {
            addCriterion("user_id <=", value, "userId");
            return (Criteria) this;
        }

        public Criteria andUserIdIn(List<Short> values) {
            addCriterion("user_id in", values, "userId");
            return (Criteria) this;
        }

        public Criteria andUserIdNotIn(List<Short> values) {
            addCriterion("user_id not in", values, "userId");
            return (Criteria) this;
        }

        public Criteria andUserIdBetween(Short value1, Short value2) {
            addCriterion("user_id between", value1, value2, "userId");
            return (Criteria) this;
        }

        public Criteria andUserIdNotBetween(Short value1, Short value2) {
            addCriterion("user_id not between", value1, value2, "userId");
            return (Criteria) this;
        }

        public Criteria andPlatformIdIsNull() {
            addCriterion("platform_id is null");
            return (Criteria) this;
        }

        public Criteria andPlatformIdIsNotNull() {
            addCriterion("platform_id is not null");
            return (Criteria) this;
        }

        public Criteria andPlatformIdEqualTo(Short value) {
            addCriterion("platform_id =", value, "platformId");
            return (Criteria) this;
        }

        public Criteria andPlatformIdNotEqualTo(Short value) {
            addCriterion("platform_id <>", value, "platformId");
            return (Criteria) this;
        }

        public Criteria andPlatformIdGreaterThan(Short value) {
            addCriterion("platform_id >", value, "platformId");
            return (Criteria) this;
        }

        public Criteria andPlatformIdGreaterThanOrEqualTo(Short value) {
            addCriterion("platform_id >=", value, "platformId");
            return (Criteria) this;
        }

        public Criteria andPlatformIdLessThan(Short value) {
            addCriterion("platform_id <", value, "platformId");
            return (Criteria) this;
        }

        public Criteria andPlatformIdLessThanOrEqualTo(Short value) {
            addCriterion("platform_id <=", value, "platformId");
            return (Criteria) this;
        }

        public Criteria andPlatformIdIn(List<Short> values) {
            addCriterion("platform_id in", values, "platformId");
            return (Criteria) this;
        }

        public Criteria andPlatformIdNotIn(List<Short> values) {
            addCriterion("platform_id not in", values, "platformId");
            return (Criteria) this;
        }

        public Criteria andPlatformIdBetween(Short value1, Short value2) {
            addCriterion("platform_id between", value1, value2, "platformId");
            return (Criteria) this;
        }

        public Criteria andPlatformIdNotBetween(Short value1, Short value2) {
            addCriterion("platform_id not between", value1, value2, "platformId");
            return (Criteria) this;
        }

        public Criteria andDrawModeIsNull() {
            addCriterion("draw_mode is null");
            return (Criteria) this;
        }

        public Criteria andDrawModeIsNotNull() {
            addCriterion("draw_mode is not null");
            return (Criteria) this;
        }

        public Criteria andDrawModeEqualTo(String value) {
            addCriterion("draw_mode =", value, "drawMode");
            return (Criteria) this;
        }

        public Criteria andDrawModeNotEqualTo(String value) {
            addCriterion("draw_mode <>", value, "drawMode");
            return (Criteria) this;
        }

        public Criteria andDrawModeGreaterThan(String value) {
            addCriterion("draw_mode >", value, "drawMode");
            return (Criteria) this;
        }

        public Criteria andDrawModeGreaterThanOrEqualTo(String value) {
            addCriterion("draw_mode >=", value, "drawMode");
            return (Criteria) this;
        }

        public Criteria andDrawModeLessThan(String value) {
            addCriterion("draw_mode <", value, "drawMode");
            return (Criteria) this;
        }

        public Criteria andDrawModeLessThanOrEqualTo(String value) {
            addCriterion("draw_mode <=", value, "drawMode");
            return (Criteria) this;
        }

        public Criteria andDrawModeLike(String value) {
            addCriterion("draw_mode like", value, "drawMode");
            return (Criteria) this;
        }

        public Criteria andDrawModeNotLike(String value) {
            addCriterion("draw_mode not like", value, "drawMode");
            return (Criteria) this;
        }

        public Criteria andDrawModeIn(List<String> values) {
            addCriterion("draw_mode in", values, "drawMode");
            return (Criteria) this;
        }

        public Criteria andDrawModeNotIn(List<String> values) {
            addCriterion("draw_mode not in", values, "drawMode");
            return (Criteria) this;
        }

        public Criteria andDrawModeBetween(String value1, String value2) {
            addCriterion("draw_mode between", value1, value2, "drawMode");
            return (Criteria) this;
        }

        public Criteria andDrawModeNotBetween(String value1, String value2) {
            addCriterion("draw_mode not between", value1, value2, "drawMode");
            return (Criteria) this;
        }

        public Criteria andProductSidIsNull() {
            addCriterion("product_sid is null");
            return (Criteria) this;
        }

        public Criteria andProductSidIsNotNull() {
            addCriterion("product_sid is not null");
            return (Criteria) this;
        }

        public Criteria andProductSidEqualTo(Short value) {
            addCriterion("product_sid =", value, "productSid");
            return (Criteria) this;
        }

        public Criteria andProductSidNotEqualTo(Short value) {
            addCriterion("product_sid <>", value, "productSid");
            return (Criteria) this;
        }

        public Criteria andProductSidGreaterThan(Short value) {
            addCriterion("product_sid >", value, "productSid");
            return (Criteria) this;
        }

        public Criteria andProductSidGreaterThanOrEqualTo(Short value) {
            addCriterion("product_sid >=", value, "productSid");
            return (Criteria) this;
        }

        public Criteria andProductSidLessThan(Short value) {
            addCriterion("product_sid <", value, "productSid");
            return (Criteria) this;
        }

        public Criteria andProductSidLessThanOrEqualTo(Short value) {
            addCriterion("product_sid <=", value, "productSid");
            return (Criteria) this;
        }

        public Criteria andProductSidIn(List<Short> values) {
            addCriterion("product_sid in", values, "productSid");
            return (Criteria) this;
        }

        public Criteria andProductSidNotIn(List<Short> values) {
            addCriterion("product_sid not in", values, "productSid");
            return (Criteria) this;
        }

        public Criteria andProductSidBetween(Short value1, Short value2) {
            addCriterion("product_sid between", value1, value2, "productSid");
            return (Criteria) this;
        }

        public Criteria andProductSidNotBetween(Short value1, Short value2) {
            addCriterion("product_sid not between", value1, value2, "productSid");
            return (Criteria) this;
        }

        public Criteria andPlatformRoteIsNull() {
            addCriterion("platform_rote is null");
            return (Criteria) this;
        }

        public Criteria andPlatformRoteIsNotNull() {
            addCriterion("platform_rote is not null");
            return (Criteria) this;
        }

        public Criteria andPlatformRoteEqualTo(BigDecimal value) {
            addCriterion("platform_rote =", value, "platformRote");
            return (Criteria) this;
        }

        public Criteria andPlatformRoteNotEqualTo(BigDecimal value) {
            addCriterion("platform_rote <>", value, "platformRote");
            return (Criteria) this;
        }

        public Criteria andPlatformRoteGreaterThan(BigDecimal value) {
            addCriterion("platform_rote >", value, "platformRote");
            return (Criteria) this;
        }

        public Criteria andPlatformRoteGreaterThanOrEqualTo(BigDecimal value) {
            addCriterion("platform_rote >=", value, "platformRote");
            return (Criteria) this;
        }

        public Criteria andPlatformRoteLessThan(BigDecimal value) {
            addCriterion("platform_rote <", value, "platformRote");
            return (Criteria) this;
        }

        public Criteria andPlatformRoteLessThanOrEqualTo(BigDecimal value) {
            addCriterion("platform_rote <=", value, "platformRote");
            return (Criteria) this;
        }

        public Criteria andPlatformRoteIn(List<BigDecimal> values) {
            addCriterion("platform_rote in", values, "platformRote");
            return (Criteria) this;
        }

        public Criteria andPlatformRoteNotIn(List<BigDecimal> values) {
            addCriterion("platform_rote not in", values, "platformRote");
            return (Criteria) this;
        }

        public Criteria andPlatformRoteBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("platform_rote between", value1, value2, "platformRote");
            return (Criteria) this;
        }

        public Criteria andPlatformRoteNotBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("platform_rote not between", value1, value2, "platformRote");
            return (Criteria) this;
        }

        public Criteria andCompanyRoteIsNull() {
            addCriterion("company_rote is null");
            return (Criteria) this;
        }

        public Criteria andCompanyRoteIsNotNull() {
            addCriterion("company_rote is not null");
            return (Criteria) this;
        }

        public Criteria andCompanyRoteEqualTo(BigDecimal value) {
            addCriterion("company_rote =", value, "companyRote");
            return (Criteria) this;
        }

        public Criteria andCompanyRoteNotEqualTo(BigDecimal value) {
            addCriterion("company_rote <>", value, "companyRote");
            return (Criteria) this;
        }

        public Criteria andCompanyRoteGreaterThan(BigDecimal value) {
            addCriterion("company_rote >", value, "companyRote");
            return (Criteria) this;
        }

        public Criteria andCompanyRoteGreaterThanOrEqualTo(BigDecimal value) {
            addCriterion("company_rote >=", value, "companyRote");
            return (Criteria) this;
        }

        public Criteria andCompanyRoteLessThan(BigDecimal value) {
            addCriterion("company_rote <", value, "companyRote");
            return (Criteria) this;
        }

        public Criteria andCompanyRoteLessThanOrEqualTo(BigDecimal value) {
            addCriterion("company_rote <=", value, "companyRote");
            return (Criteria) this;
        }

        public Criteria andCompanyRoteIn(List<BigDecimal> values) {
            addCriterion("company_rote in", values, "companyRote");
            return (Criteria) this;
        }

        public Criteria andCompanyRoteNotIn(List<BigDecimal> values) {
            addCriterion("company_rote not in", values, "companyRote");
            return (Criteria) this;
        }

        public Criteria andCompanyRoteBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("company_rote between", value1, value2, "companyRote");
            return (Criteria) this;
        }

        public Criteria andCompanyRoteNotBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("company_rote not between", value1, value2, "companyRote");
            return (Criteria) this;
        }

        public Criteria andSellRoteIsNull() {
            addCriterion("sell_rote is null");
            return (Criteria) this;
        }

        public Criteria andSellRoteIsNotNull() {
            addCriterion("sell_rote is not null");
            return (Criteria) this;
        }

        public Criteria andSellRoteEqualTo(BigDecimal value) {
            addCriterion("sell_rote =", value, "sellRote");
            return (Criteria) this;
        }

        public Criteria andSellRoteNotEqualTo(BigDecimal value) {
            addCriterion("sell_rote <>", value, "sellRote");
            return (Criteria) this;
        }

        public Criteria andSellRoteGreaterThan(BigDecimal value) {
            addCriterion("sell_rote >", value, "sellRote");
            return (Criteria) this;
        }

        public Criteria andSellRoteGreaterThanOrEqualTo(BigDecimal value) {
            addCriterion("sell_rote >=", value, "sellRote");
            return (Criteria) this;
        }

        public Criteria andSellRoteLessThan(BigDecimal value) {
            addCriterion("sell_rote <", value, "sellRote");
            return (Criteria) this;
        }

        public Criteria andSellRoteLessThanOrEqualTo(BigDecimal value) {
            addCriterion("sell_rote <=", value, "sellRote");
            return (Criteria) this;
        }

        public Criteria andSellRoteIn(List<BigDecimal> values) {
            addCriterion("sell_rote in", values, "sellRote");
            return (Criteria) this;
        }

        public Criteria andSellRoteNotIn(List<BigDecimal> values) {
            addCriterion("sell_rote not in", values, "sellRote");
            return (Criteria) this;
        }

        public Criteria andSellRoteBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("sell_rote between", value1, value2, "sellRote");
            return (Criteria) this;
        }

        public Criteria andSellRoteNotBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("sell_rote not between", value1, value2, "sellRote");
            return (Criteria) this;
        }

        public Criteria andPlatformNameIsNull() {
            addCriterion("platform_name is null");
            return (Criteria) this;
        }

        public Criteria andPlatformNameIsNotNull() {
            addCriterion("platform_name is not null");
            return (Criteria) this;
        }

        public Criteria andPlatformNameEqualTo(String value) {
            addCriterion("platform_name =", value, "platformName");
            return (Criteria) this;
        }

        public Criteria andPlatformNameNotEqualTo(String value) {
            addCriterion("platform_name <>", value, "platformName");
            return (Criteria) this;
        }

        public Criteria andPlatformNameGreaterThan(String value) {
            addCriterion("platform_name >", value, "platformName");
            return (Criteria) this;
        }

        public Criteria andPlatformNameGreaterThanOrEqualTo(String value) {
            addCriterion("platform_name >=", value, "platformName");
            return (Criteria) this;
        }

        public Criteria andPlatformNameLessThan(String value) {
            addCriterion("platform_name <", value, "platformName");
            return (Criteria) this;
        }

        public Criteria andPlatformNameLessThanOrEqualTo(String value) {
            addCriterion("platform_name <=", value, "platformName");
            return (Criteria) this;
        }

        public Criteria andPlatformNameLike(String value) {
            addCriterion("platform_name like", value, "platformName");
            return (Criteria) this;
        }

        public Criteria andPlatformNameNotLike(String value) {
            addCriterion("platform_name not like", value, "platformName");
            return (Criteria) this;
        }

        public Criteria andPlatformNameIn(List<String> values) {
            addCriterion("platform_name in", values, "platformName");
            return (Criteria) this;
        }

        public Criteria andPlatformNameNotIn(List<String> values) {
            addCriterion("platform_name not in", values, "platformName");
            return (Criteria) this;
        }

        public Criteria andPlatformNameBetween(String value1, String value2) {
            addCriterion("platform_name between", value1, value2, "platformName");
            return (Criteria) this;
        }

        public Criteria andPlatformNameNotBetween(String value1, String value2) {
            addCriterion("platform_name not between", value1, value2, "platformName");
            return (Criteria) this;
        }

        public Criteria andProductNameIsNull() {
            addCriterion("product_name is null");
            return (Criteria) this;
        }

        public Criteria andProductNameIsNotNull() {
            addCriterion("product_name is not null");
            return (Criteria) this;
        }

        public Criteria andProductNameEqualTo(String value) {
            addCriterion("product_name =", value, "productName");
            return (Criteria) this;
        }

        public Criteria andProductNameNotEqualTo(String value) {
            addCriterion("product_name <>", value, "productName");
            return (Criteria) this;
        }

        public Criteria andProductNameGreaterThan(String value) {
            addCriterion("product_name >", value, "productName");
            return (Criteria) this;
        }

        public Criteria andProductNameGreaterThanOrEqualTo(String value) {
            addCriterion("product_name >=", value, "productName");
            return (Criteria) this;
        }

        public Criteria andProductNameLessThan(String value) {
            addCriterion("product_name <", value, "productName");
            return (Criteria) this;
        }

        public Criteria andProductNameLessThanOrEqualTo(String value) {
            addCriterion("product_name <=", value, "productName");
            return (Criteria) this;
        }

        public Criteria andProductNameLike(String value) {
            addCriterion("product_name like", value, "productName");
            return (Criteria) this;
        }

        public Criteria andProductNameNotLike(String value) {
            addCriterion("product_name not like", value, "productName");
            return (Criteria) this;
        }

        public Criteria andProductNameIn(List<String> values) {
            addCriterion("product_name in", values, "productName");
            return (Criteria) this;
        }

        public Criteria andProductNameNotIn(List<String> values) {
            addCriterion("product_name not in", values, "productName");
            return (Criteria) this;
        }

        public Criteria andProductNameBetween(String value1, String value2) {
            addCriterion("product_name between", value1, value2, "productName");
            return (Criteria) this;
        }

        public Criteria andProductNameNotBetween(String value1, String value2) {
            addCriterion("product_name not between", value1, value2, "productName");
            return (Criteria) this;
        }

        public Criteria andPeriodIsNull() {
            addCriterion("period is null");
            return (Criteria) this;
        }

        public Criteria andPeriodIsNotNull() {
            addCriterion("period is not null");
            return (Criteria) this;
        }

        public Criteria andPeriodEqualTo(Integer value) {
            addCriterion("period =", value, "period");
            return (Criteria) this;
        }

        public Criteria andPeriodNotEqualTo(Integer value) {
            addCriterion("period <>", value, "period");
            return (Criteria) this;
        }

        public Criteria andPeriodGreaterThan(Integer value) {
            addCriterion("period >", value, "period");
            return (Criteria) this;
        }

        public Criteria andPeriodGreaterThanOrEqualTo(Integer value) {
            addCriterion("period >=", value, "period");
            return (Criteria) this;
        }

        public Criteria andPeriodLessThan(Integer value) {
            addCriterion("period <", value, "period");
            return (Criteria) this;
        }

        public Criteria andPeriodLessThanOrEqualTo(Integer value) {
            addCriterion("period <=", value, "period");
            return (Criteria) this;
        }

        public Criteria andPeriodIn(List<Integer> values) {
            addCriterion("period in", values, "period");
            return (Criteria) this;
        }

        public Criteria andPeriodNotIn(List<Integer> values) {
            addCriterion("period not in", values, "period");
            return (Criteria) this;
        }

        public Criteria andPeriodBetween(Integer value1, Integer value2) {
            addCriterion("period between", value1, value2, "period");
            return (Criteria) this;
        }

        public Criteria andPeriodNotBetween(Integer value1, Integer value2) {
            addCriterion("period not between", value1, value2, "period");
            return (Criteria) this;
        }

        public Criteria andIsUseIsNull() {
            addCriterion("is_use is null");
            return (Criteria) this;
        }

        public Criteria andIsUseIsNotNull() {
            addCriterion("is_use is not null");
            return (Criteria) this;
        }

        public Criteria andIsUseEqualTo(Boolean value) {
            addCriterion("is_use =", value, "isUse");
            return (Criteria) this;
        }

        public Criteria andIsUseNotEqualTo(Boolean value) {
            addCriterion("is_use <>", value, "isUse");
            return (Criteria) this;
        }

        public Criteria andIsUseGreaterThan(Boolean value) {
            addCriterion("is_use >", value, "isUse");
            return (Criteria) this;
        }

        public Criteria andIsUseGreaterThanOrEqualTo(Boolean value) {
            addCriterion("is_use >=", value, "isUse");
            return (Criteria) this;
        }

        public Criteria andIsUseLessThan(Boolean value) {
            addCriterion("is_use <", value, "isUse");
            return (Criteria) this;
        }

        public Criteria andIsUseLessThanOrEqualTo(Boolean value) {
            addCriterion("is_use <=", value, "isUse");
            return (Criteria) this;
        }

        public Criteria andIsUseIn(List<Boolean> values) {
            addCriterion("is_use in", values, "isUse");
            return (Criteria) this;
        }

        public Criteria andIsUseNotIn(List<Boolean> values) {
            addCriterion("is_use not in", values, "isUse");
            return (Criteria) this;
        }

        public Criteria andIsUseBetween(Boolean value1, Boolean value2) {
            addCriterion("is_use between", value1, value2, "isUse");
            return (Criteria) this;
        }

        public Criteria andIsUseNotBetween(Boolean value1, Boolean value2) {
            addCriterion("is_use not between", value1, value2, "isUse");
            return (Criteria) this;
        }
    }

    @entity.query.annotation.Tablename(value="rate")
    public static class Criteria extends GeneratedCriteria {

        protected Criteria() {
            super();
        }
    }

    @entity.query.annotation.Tablename(value="rate")
    public static class Criterion {
        private String condition;

        private Object value;

        private Object secondValue;

        private boolean noValue;

        private boolean singleValue;

        private boolean betweenValue;

        private boolean listValue;

        private String typeHandler;

        public String getCondition() {
            return condition;
        }

        public Object getValue() {
            return value;
        }

        public Object getSecondValue() {
            return secondValue;
        }

        public boolean isNoValue() {
            return noValue;
        }

        public boolean isSingleValue() {
            return singleValue;
        }

        public boolean isBetweenValue() {
            return betweenValue;
        }

        public boolean isListValue() {
            return listValue;
        }

        public String getTypeHandler() {
            return typeHandler;
        }

        protected Criterion(String condition) {
            super();
            this.condition = condition;
            this.typeHandler = null;
            this.noValue = true;
        }

        protected Criterion(String condition, Object value, String typeHandler) {
            super();
            this.condition = condition;
            this.value = value;
            this.typeHandler = typeHandler;
            if (value instanceof List<?>) {
                this.listValue = true;
            } else {
                this.singleValue = true;
            }
        }

        protected Criterion(String condition, Object value) {
            this(condition, value, null);
        }

        protected Criterion(String condition, Object value, Object secondValue, String typeHandler) {
            super();
            this.condition = condition;
            this.value = value;
            this.secondValue = secondValue;
            this.typeHandler = typeHandler;
            this.betweenValue = true;
        }

        protected Criterion(String condition, Object value, Object secondValue) {
            this(condition, value, secondValue, null);
        }
    }
}