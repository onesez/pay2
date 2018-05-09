package entity.query.entites;

import java.math.BigDecimal;
import java.util.ArrayList;
import java.util.List;

public class OrderlistExample {
    protected String orderByClause;

    protected boolean distinct;

    protected List<Criteria> oredCriteria;

    public OrderlistExample() {
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

    @entity.query.annotation.Tablename(value="orderlist")
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

        public Criteria andCreatTimeIsNull() {
            addCriterion("creat_time is null");
            return (Criteria) this;
        }

        public Criteria andCreatTimeIsNotNull() {
            addCriterion("creat_time is not null");
            return (Criteria) this;
        }

        public Criteria andCreatTimeEqualTo(Integer value) {
            addCriterion("creat_time =", value, "creatTime");
            return (Criteria) this;
        }

        public Criteria andCreatTimeNotEqualTo(Integer value) {
            addCriterion("creat_time <>", value, "creatTime");
            return (Criteria) this;
        }

        public Criteria andCreatTimeGreaterThan(Integer value) {
            addCriterion("creat_time >", value, "creatTime");
            return (Criteria) this;
        }

        public Criteria andCreatTimeGreaterThanOrEqualTo(Integer value) {
            addCriterion("creat_time >=", value, "creatTime");
            return (Criteria) this;
        }

        public Criteria andCreatTimeLessThan(Integer value) {
            addCriterion("creat_time <", value, "creatTime");
            return (Criteria) this;
        }

        public Criteria andCreatTimeLessThanOrEqualTo(Integer value) {
            addCriterion("creat_time <=", value, "creatTime");
            return (Criteria) this;
        }

        public Criteria andCreatTimeIn(List<Integer> values) {
            addCriterion("creat_time in", values, "creatTime");
            return (Criteria) this;
        }

        public Criteria andCreatTimeNotIn(List<Integer> values) {
            addCriterion("creat_time not in", values, "creatTime");
            return (Criteria) this;
        }

        public Criteria andCreatTimeBetween(Integer value1, Integer value2) {
            addCriterion("creat_time between", value1, value2, "creatTime");
            return (Criteria) this;
        }

        public Criteria andCreatTimeNotBetween(Integer value1, Integer value2) {
            addCriterion("creat_time not between", value1, value2, "creatTime");
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

        public Criteria andUserIdEqualTo(String value) {
            addCriterion("user_id =", value, "userId");
            return (Criteria) this;
        }

        public Criteria andUserIdNotEqualTo(String value) {
            addCriterion("user_id <>", value, "userId");
            return (Criteria) this;
        }

        public Criteria andUserIdGreaterThan(String value) {
            addCriterion("user_id >", value, "userId");
            return (Criteria) this;
        }

        public Criteria andUserIdGreaterThanOrEqualTo(String value) {
            addCriterion("user_id >=", value, "userId");
            return (Criteria) this;
        }

        public Criteria andUserIdLessThan(String value) {
            addCriterion("user_id <", value, "userId");
            return (Criteria) this;
        }

        public Criteria andUserIdLessThanOrEqualTo(String value) {
            addCriterion("user_id <=", value, "userId");
            return (Criteria) this;
        }

        public Criteria andUserIdLike(String value) {
            addCriterion("user_id like", value, "userId");
            return (Criteria) this;
        }

        public Criteria andUserIdNotLike(String value) {
            addCriterion("user_id not like", value, "userId");
            return (Criteria) this;
        }

        public Criteria andUserIdIn(List<String> values) {
            addCriterion("user_id in", values, "userId");
            return (Criteria) this;
        }

        public Criteria andUserIdNotIn(List<String> values) {
            addCriterion("user_id not in", values, "userId");
            return (Criteria) this;
        }

        public Criteria andUserIdBetween(String value1, String value2) {
            addCriterion("user_id between", value1, value2, "userId");
            return (Criteria) this;
        }

        public Criteria andUserIdNotBetween(String value1, String value2) {
            addCriterion("user_id not between", value1, value2, "userId");
            return (Criteria) this;
        }

        public Criteria andMd5keyIsNull() {
            addCriterion("md5key is null");
            return (Criteria) this;
        }

        public Criteria andMd5keyIsNotNull() {
            addCriterion("md5key is not null");
            return (Criteria) this;
        }

        public Criteria andMd5keyEqualTo(String value) {
            addCriterion("md5key =", value, "md5key");
            return (Criteria) this;
        }

        public Criteria andMd5keyNotEqualTo(String value) {
            addCriterion("md5key <>", value, "md5key");
            return (Criteria) this;
        }

        public Criteria andMd5keyGreaterThan(String value) {
            addCriterion("md5key >", value, "md5key");
            return (Criteria) this;
        }

        public Criteria andMd5keyGreaterThanOrEqualTo(String value) {
            addCriterion("md5key >=", value, "md5key");
            return (Criteria) this;
        }

        public Criteria andMd5keyLessThan(String value) {
            addCriterion("md5key <", value, "md5key");
            return (Criteria) this;
        }

        public Criteria andMd5keyLessThanOrEqualTo(String value) {
            addCriterion("md5key <=", value, "md5key");
            return (Criteria) this;
        }

        public Criteria andMd5keyLike(String value) {
            addCriterion("md5key like", value, "md5key");
            return (Criteria) this;
        }

        public Criteria andMd5keyNotLike(String value) {
            addCriterion("md5key not like", value, "md5key");
            return (Criteria) this;
        }

        public Criteria andMd5keyIn(List<String> values) {
            addCriterion("md5key in", values, "md5key");
            return (Criteria) this;
        }

        public Criteria andMd5keyNotIn(List<String> values) {
            addCriterion("md5key not in", values, "md5key");
            return (Criteria) this;
        }

        public Criteria andMd5keyBetween(String value1, String value2) {
            addCriterion("md5key between", value1, value2, "md5key");
            return (Criteria) this;
        }

        public Criteria andMd5keyNotBetween(String value1, String value2) {
            addCriterion("md5key not between", value1, value2, "md5key");
            return (Criteria) this;
        }

        public Criteria andRoteIdIsNull() {
            addCriterion("rote_id is null");
            return (Criteria) this;
        }

        public Criteria andRoteIdIsNotNull() {
            addCriterion("rote_id is not null");
            return (Criteria) this;
        }

        public Criteria andRoteIdEqualTo(String value) {
            addCriterion("rote_id =", value, "roteId");
            return (Criteria) this;
        }

        public Criteria andRoteIdNotEqualTo(String value) {
            addCriterion("rote_id <>", value, "roteId");
            return (Criteria) this;
        }

        public Criteria andRoteIdGreaterThan(String value) {
            addCriterion("rote_id >", value, "roteId");
            return (Criteria) this;
        }

        public Criteria andRoteIdGreaterThanOrEqualTo(String value) {
            addCriterion("rote_id >=", value, "roteId");
            return (Criteria) this;
        }

        public Criteria andRoteIdLessThan(String value) {
            addCriterion("rote_id <", value, "roteId");
            return (Criteria) this;
        }

        public Criteria andRoteIdLessThanOrEqualTo(String value) {
            addCriterion("rote_id <=", value, "roteId");
            return (Criteria) this;
        }

        public Criteria andRoteIdLike(String value) {
            addCriterion("rote_id like", value, "roteId");
            return (Criteria) this;
        }

        public Criteria andRoteIdNotLike(String value) {
            addCriterion("rote_id not like", value, "roteId");
            return (Criteria) this;
        }

        public Criteria andRoteIdIn(List<String> values) {
            addCriterion("rote_id in", values, "roteId");
            return (Criteria) this;
        }

        public Criteria andRoteIdNotIn(List<String> values) {
            addCriterion("rote_id not in", values, "roteId");
            return (Criteria) this;
        }

        public Criteria andRoteIdBetween(String value1, String value2) {
            addCriterion("rote_id between", value1, value2, "roteId");
            return (Criteria) this;
        }

        public Criteria andRoteIdNotBetween(String value1, String value2) {
            addCriterion("rote_id not between", value1, value2, "roteId");
            return (Criteria) this;
        }

        public Criteria andPayPlatformIsNull() {
            addCriterion("pay_platform is null");
            return (Criteria) this;
        }

        public Criteria andPayPlatformIsNotNull() {
            addCriterion("pay_platform is not null");
            return (Criteria) this;
        }

        public Criteria andPayPlatformEqualTo(String value) {
            addCriterion("pay_platform =", value, "payPlatform");
            return (Criteria) this;
        }

        public Criteria andPayPlatformNotEqualTo(String value) {
            addCriterion("pay_platform <>", value, "payPlatform");
            return (Criteria) this;
        }

        public Criteria andPayPlatformGreaterThan(String value) {
            addCriterion("pay_platform >", value, "payPlatform");
            return (Criteria) this;
        }

        public Criteria andPayPlatformGreaterThanOrEqualTo(String value) {
            addCriterion("pay_platform >=", value, "payPlatform");
            return (Criteria) this;
        }

        public Criteria andPayPlatformLessThan(String value) {
            addCriterion("pay_platform <", value, "payPlatform");
            return (Criteria) this;
        }

        public Criteria andPayPlatformLessThanOrEqualTo(String value) {
            addCriterion("pay_platform <=", value, "payPlatform");
            return (Criteria) this;
        }

        public Criteria andPayPlatformLike(String value) {
            addCriterion("pay_platform like", value, "payPlatform");
            return (Criteria) this;
        }

        public Criteria andPayPlatformNotLike(String value) {
            addCriterion("pay_platform not like", value, "payPlatform");
            return (Criteria) this;
        }

        public Criteria andPayPlatformIn(List<String> values) {
            addCriterion("pay_platform in", values, "payPlatform");
            return (Criteria) this;
        }

        public Criteria andPayPlatformNotIn(List<String> values) {
            addCriterion("pay_platform not in", values, "payPlatform");
            return (Criteria) this;
        }

        public Criteria andPayPlatformBetween(String value1, String value2) {
            addCriterion("pay_platform between", value1, value2, "payPlatform");
            return (Criteria) this;
        }

        public Criteria andPayPlatformNotBetween(String value1, String value2) {
            addCriterion("pay_platform not between", value1, value2, "payPlatform");
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

        public Criteria andPayDateIsNull() {
            addCriterion("pay_date is null");
            return (Criteria) this;
        }

        public Criteria andPayDateIsNotNull() {
            addCriterion("pay_date is not null");
            return (Criteria) this;
        }

        public Criteria andPayDateEqualTo(Integer value) {
            addCriterion("pay_date =", value, "payDate");
            return (Criteria) this;
        }

        public Criteria andPayDateNotEqualTo(Integer value) {
            addCriterion("pay_date <>", value, "payDate");
            return (Criteria) this;
        }

        public Criteria andPayDateGreaterThan(Integer value) {
            addCriterion("pay_date >", value, "payDate");
            return (Criteria) this;
        }

        public Criteria andPayDateGreaterThanOrEqualTo(Integer value) {
            addCriterion("pay_date >=", value, "payDate");
            return (Criteria) this;
        }

        public Criteria andPayDateLessThan(Integer value) {
            addCriterion("pay_date <", value, "payDate");
            return (Criteria) this;
        }

        public Criteria andPayDateLessThanOrEqualTo(Integer value) {
            addCriterion("pay_date <=", value, "payDate");
            return (Criteria) this;
        }

        public Criteria andPayDateIn(List<Integer> values) {
            addCriterion("pay_date in", values, "payDate");
            return (Criteria) this;
        }

        public Criteria andPayDateNotIn(List<Integer> values) {
            addCriterion("pay_date not in", values, "payDate");
            return (Criteria) this;
        }

        public Criteria andPayDateBetween(Integer value1, Integer value2) {
            addCriterion("pay_date between", value1, value2, "payDate");
            return (Criteria) this;
        }

        public Criteria andPayDateNotBetween(Integer value1, Integer value2) {
            addCriterion("pay_date not between", value1, value2, "payDate");
            return (Criteria) this;
        }

        public Criteria andPayOrderIdIsNull() {
            addCriterion("pay_order_id is null");
            return (Criteria) this;
        }

        public Criteria andPayOrderIdIsNotNull() {
            addCriterion("pay_order_id is not null");
            return (Criteria) this;
        }

        public Criteria andPayOrderIdEqualTo(String value) {
            addCriterion("pay_order_id =", value, "payOrderId");
            return (Criteria) this;
        }

        public Criteria andPayOrderIdNotEqualTo(String value) {
            addCriterion("pay_order_id <>", value, "payOrderId");
            return (Criteria) this;
        }

        public Criteria andPayOrderIdGreaterThan(String value) {
            addCriterion("pay_order_id >", value, "payOrderId");
            return (Criteria) this;
        }

        public Criteria andPayOrderIdGreaterThanOrEqualTo(String value) {
            addCriterion("pay_order_id >=", value, "payOrderId");
            return (Criteria) this;
        }

        public Criteria andPayOrderIdLessThan(String value) {
            addCriterion("pay_order_id <", value, "payOrderId");
            return (Criteria) this;
        }

        public Criteria andPayOrderIdLessThanOrEqualTo(String value) {
            addCriterion("pay_order_id <=", value, "payOrderId");
            return (Criteria) this;
        }

        public Criteria andPayOrderIdLike(String value) {
            addCriterion("pay_order_id like", value, "payOrderId");
            return (Criteria) this;
        }

        public Criteria andPayOrderIdNotLike(String value) {
            addCriterion("pay_order_id not like", value, "payOrderId");
            return (Criteria) this;
        }

        public Criteria andPayOrderIdIn(List<String> values) {
            addCriterion("pay_order_id in", values, "payOrderId");
            return (Criteria) this;
        }

        public Criteria andPayOrderIdNotIn(List<String> values) {
            addCriterion("pay_order_id not in", values, "payOrderId");
            return (Criteria) this;
        }

        public Criteria andPayOrderIdBetween(String value1, String value2) {
            addCriterion("pay_order_id between", value1, value2, "payOrderId");
            return (Criteria) this;
        }

        public Criteria andPayOrderIdNotBetween(String value1, String value2) {
            addCriterion("pay_order_id not between", value1, value2, "payOrderId");
            return (Criteria) this;
        }

        public Criteria andPayProductNameIsNull() {
            addCriterion("pay_product_name is null");
            return (Criteria) this;
        }

        public Criteria andPayProductNameIsNotNull() {
            addCriterion("pay_product_name is not null");
            return (Criteria) this;
        }

        public Criteria andPayProductNameEqualTo(String value) {
            addCriterion("pay_product_name =", value, "payProductName");
            return (Criteria) this;
        }

        public Criteria andPayProductNameNotEqualTo(String value) {
            addCriterion("pay_product_name <>", value, "payProductName");
            return (Criteria) this;
        }

        public Criteria andPayProductNameGreaterThan(String value) {
            addCriterion("pay_product_name >", value, "payProductName");
            return (Criteria) this;
        }

        public Criteria andPayProductNameGreaterThanOrEqualTo(String value) {
            addCriterion("pay_product_name >=", value, "payProductName");
            return (Criteria) this;
        }

        public Criteria andPayProductNameLessThan(String value) {
            addCriterion("pay_product_name <", value, "payProductName");
            return (Criteria) this;
        }

        public Criteria andPayProductNameLessThanOrEqualTo(String value) {
            addCriterion("pay_product_name <=", value, "payProductName");
            return (Criteria) this;
        }

        public Criteria andPayProductNameLike(String value) {
            addCriterion("pay_product_name like", value, "payProductName");
            return (Criteria) this;
        }

        public Criteria andPayProductNameNotLike(String value) {
            addCriterion("pay_product_name not like", value, "payProductName");
            return (Criteria) this;
        }

        public Criteria andPayProductNameIn(List<String> values) {
            addCriterion("pay_product_name in", values, "payProductName");
            return (Criteria) this;
        }

        public Criteria andPayProductNameNotIn(List<String> values) {
            addCriterion("pay_product_name not in", values, "payProductName");
            return (Criteria) this;
        }

        public Criteria andPayProductNameBetween(String value1, String value2) {
            addCriterion("pay_product_name between", value1, value2, "payProductName");
            return (Criteria) this;
        }

        public Criteria andPayProductNameNotBetween(String value1, String value2) {
            addCriterion("pay_product_name not between", value1, value2, "payProductName");
            return (Criteria) this;
        }

        public Criteria andPayAmountIsNull() {
            addCriterion("pay_amount is null");
            return (Criteria) this;
        }

        public Criteria andPayAmountIsNotNull() {
            addCriterion("pay_amount is not null");
            return (Criteria) this;
        }

        public Criteria andPayAmountEqualTo(BigDecimal value) {
            addCriterion("pay_amount =", value, "payAmount");
            return (Criteria) this;
        }

        public Criteria andPayAmountNotEqualTo(BigDecimal value) {
            addCriterion("pay_amount <>", value, "payAmount");
            return (Criteria) this;
        }

        public Criteria andPayAmountGreaterThan(BigDecimal value) {
            addCriterion("pay_amount >", value, "payAmount");
            return (Criteria) this;
        }

        public Criteria andPayAmountGreaterThanOrEqualTo(BigDecimal value) {
            addCriterion("pay_amount >=", value, "payAmount");
            return (Criteria) this;
        }

        public Criteria andPayAmountLessThan(BigDecimal value) {
            addCriterion("pay_amount <", value, "payAmount");
            return (Criteria) this;
        }

        public Criteria andPayAmountLessThanOrEqualTo(BigDecimal value) {
            addCriterion("pay_amount <=", value, "payAmount");
            return (Criteria) this;
        }

        public Criteria andPayAmountIn(List<BigDecimal> values) {
            addCriterion("pay_amount in", values, "payAmount");
            return (Criteria) this;
        }

        public Criteria andPayAmountNotIn(List<BigDecimal> values) {
            addCriterion("pay_amount not in", values, "payAmount");
            return (Criteria) this;
        }

        public Criteria andPayAmountBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("pay_amount between", value1, value2, "payAmount");
            return (Criteria) this;
        }

        public Criteria andPayAmountNotBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("pay_amount not between", value1, value2, "payAmount");
            return (Criteria) this;
        }

        public Criteria andPayNotifyUrlIsNull() {
            addCriterion("pay_notify_url is null");
            return (Criteria) this;
        }

        public Criteria andPayNotifyUrlIsNotNull() {
            addCriterion("pay_notify_url is not null");
            return (Criteria) this;
        }

        public Criteria andPayNotifyUrlEqualTo(String value) {
            addCriterion("pay_notify_url =", value, "payNotifyUrl");
            return (Criteria) this;
        }

        public Criteria andPayNotifyUrlNotEqualTo(String value) {
            addCriterion("pay_notify_url <>", value, "payNotifyUrl");
            return (Criteria) this;
        }

        public Criteria andPayNotifyUrlGreaterThan(String value) {
            addCriterion("pay_notify_url >", value, "payNotifyUrl");
            return (Criteria) this;
        }

        public Criteria andPayNotifyUrlGreaterThanOrEqualTo(String value) {
            addCriterion("pay_notify_url >=", value, "payNotifyUrl");
            return (Criteria) this;
        }

        public Criteria andPayNotifyUrlLessThan(String value) {
            addCriterion("pay_notify_url <", value, "payNotifyUrl");
            return (Criteria) this;
        }

        public Criteria andPayNotifyUrlLessThanOrEqualTo(String value) {
            addCriterion("pay_notify_url <=", value, "payNotifyUrl");
            return (Criteria) this;
        }

        public Criteria andPayNotifyUrlLike(String value) {
            addCriterion("pay_notify_url like", value, "payNotifyUrl");
            return (Criteria) this;
        }

        public Criteria andPayNotifyUrlNotLike(String value) {
            addCriterion("pay_notify_url not like", value, "payNotifyUrl");
            return (Criteria) this;
        }

        public Criteria andPayNotifyUrlIn(List<String> values) {
            addCriterion("pay_notify_url in", values, "payNotifyUrl");
            return (Criteria) this;
        }

        public Criteria andPayNotifyUrlNotIn(List<String> values) {
            addCriterion("pay_notify_url not in", values, "payNotifyUrl");
            return (Criteria) this;
        }

        public Criteria andPayNotifyUrlBetween(String value1, String value2) {
            addCriterion("pay_notify_url between", value1, value2, "payNotifyUrl");
            return (Criteria) this;
        }

        public Criteria andPayNotifyUrlNotBetween(String value1, String value2) {
            addCriterion("pay_notify_url not between", value1, value2, "payNotifyUrl");
            return (Criteria) this;
        }

        public Criteria andPayReturnUrlIsNull() {
            addCriterion("pay_return_url is null");
            return (Criteria) this;
        }

        public Criteria andPayReturnUrlIsNotNull() {
            addCriterion("pay_return_url is not null");
            return (Criteria) this;
        }

        public Criteria andPayReturnUrlEqualTo(String value) {
            addCriterion("pay_return_url =", value, "payReturnUrl");
            return (Criteria) this;
        }

        public Criteria andPayReturnUrlNotEqualTo(String value) {
            addCriterion("pay_return_url <>", value, "payReturnUrl");
            return (Criteria) this;
        }

        public Criteria andPayReturnUrlGreaterThan(String value) {
            addCriterion("pay_return_url >", value, "payReturnUrl");
            return (Criteria) this;
        }

        public Criteria andPayReturnUrlGreaterThanOrEqualTo(String value) {
            addCriterion("pay_return_url >=", value, "payReturnUrl");
            return (Criteria) this;
        }

        public Criteria andPayReturnUrlLessThan(String value) {
            addCriterion("pay_return_url <", value, "payReturnUrl");
            return (Criteria) this;
        }

        public Criteria andPayReturnUrlLessThanOrEqualTo(String value) {
            addCriterion("pay_return_url <=", value, "payReturnUrl");
            return (Criteria) this;
        }

        public Criteria andPayReturnUrlLike(String value) {
            addCriterion("pay_return_url like", value, "payReturnUrl");
            return (Criteria) this;
        }

        public Criteria andPayReturnUrlNotLike(String value) {
            addCriterion("pay_return_url not like", value, "payReturnUrl");
            return (Criteria) this;
        }

        public Criteria andPayReturnUrlIn(List<String> values) {
            addCriterion("pay_return_url in", values, "payReturnUrl");
            return (Criteria) this;
        }

        public Criteria andPayReturnUrlNotIn(List<String> values) {
            addCriterion("pay_return_url not in", values, "payReturnUrl");
            return (Criteria) this;
        }

        public Criteria andPayReturnUrlBetween(String value1, String value2) {
            addCriterion("pay_return_url between", value1, value2, "payReturnUrl");
            return (Criteria) this;
        }

        public Criteria andPayReturnUrlNotBetween(String value1, String value2) {
            addCriterion("pay_return_url not between", value1, value2, "payReturnUrl");
            return (Criteria) this;
        }

        public Criteria andPayRemarkIsNull() {
            addCriterion("pay_remark is null");
            return (Criteria) this;
        }

        public Criteria andPayRemarkIsNotNull() {
            addCriterion("pay_remark is not null");
            return (Criteria) this;
        }

        public Criteria andPayRemarkEqualTo(String value) {
            addCriterion("pay_remark =", value, "payRemark");
            return (Criteria) this;
        }

        public Criteria andPayRemarkNotEqualTo(String value) {
            addCriterion("pay_remark <>", value, "payRemark");
            return (Criteria) this;
        }

        public Criteria andPayRemarkGreaterThan(String value) {
            addCriterion("pay_remark >", value, "payRemark");
            return (Criteria) this;
        }

        public Criteria andPayRemarkGreaterThanOrEqualTo(String value) {
            addCriterion("pay_remark >=", value, "payRemark");
            return (Criteria) this;
        }

        public Criteria andPayRemarkLessThan(String value) {
            addCriterion("pay_remark <", value, "payRemark");
            return (Criteria) this;
        }

        public Criteria andPayRemarkLessThanOrEqualTo(String value) {
            addCriterion("pay_remark <=", value, "payRemark");
            return (Criteria) this;
        }

        public Criteria andPayRemarkLike(String value) {
            addCriterion("pay_remark like", value, "payRemark");
            return (Criteria) this;
        }

        public Criteria andPayRemarkNotLike(String value) {
            addCriterion("pay_remark not like", value, "payRemark");
            return (Criteria) this;
        }

        public Criteria andPayRemarkIn(List<String> values) {
            addCriterion("pay_remark in", values, "payRemark");
            return (Criteria) this;
        }

        public Criteria andPayRemarkNotIn(List<String> values) {
            addCriterion("pay_remark not in", values, "payRemark");
            return (Criteria) this;
        }

        public Criteria andPayRemarkBetween(String value1, String value2) {
            addCriterion("pay_remark between", value1, value2, "payRemark");
            return (Criteria) this;
        }

        public Criteria andPayRemarkNotBetween(String value1, String value2) {
            addCriterion("pay_remark not between", value1, value2, "payRemark");
            return (Criteria) this;
        }

        public Criteria andPayStrIsNull() {
            addCriterion("pay_str is null");
            return (Criteria) this;
        }

        public Criteria andPayStrIsNotNull() {
            addCriterion("pay_str is not null");
            return (Criteria) this;
        }

        public Criteria andPayStrEqualTo(String value) {
            addCriterion("pay_str =", value, "payStr");
            return (Criteria) this;
        }

        public Criteria andPayStrNotEqualTo(String value) {
            addCriterion("pay_str <>", value, "payStr");
            return (Criteria) this;
        }

        public Criteria andPayStrGreaterThan(String value) {
            addCriterion("pay_str >", value, "payStr");
            return (Criteria) this;
        }

        public Criteria andPayStrGreaterThanOrEqualTo(String value) {
            addCriterion("pay_str >=", value, "payStr");
            return (Criteria) this;
        }

        public Criteria andPayStrLessThan(String value) {
            addCriterion("pay_str <", value, "payStr");
            return (Criteria) this;
        }

        public Criteria andPayStrLessThanOrEqualTo(String value) {
            addCriterion("pay_str <=", value, "payStr");
            return (Criteria) this;
        }

        public Criteria andPayStrLike(String value) {
            addCriterion("pay_str like", value, "payStr");
            return (Criteria) this;
        }

        public Criteria andPayStrNotLike(String value) {
            addCriterion("pay_str not like", value, "payStr");
            return (Criteria) this;
        }

        public Criteria andPayStrIn(List<String> values) {
            addCriterion("pay_str in", values, "payStr");
            return (Criteria) this;
        }

        public Criteria andPayStrNotIn(List<String> values) {
            addCriterion("pay_str not in", values, "payStr");
            return (Criteria) this;
        }

        public Criteria andPayStrBetween(String value1, String value2) {
            addCriterion("pay_str between", value1, value2, "payStr");
            return (Criteria) this;
        }

        public Criteria andPayStrNotBetween(String value1, String value2) {
            addCriterion("pay_str not between", value1, value2, "payStr");
            return (Criteria) this;
        }

        public Criteria andOrderNumIsNull() {
            addCriterion("order_num is null");
            return (Criteria) this;
        }

        public Criteria andOrderNumIsNotNull() {
            addCriterion("order_num is not null");
            return (Criteria) this;
        }

        public Criteria andOrderNumEqualTo(String value) {
            addCriterion("order_num =", value, "orderNum");
            return (Criteria) this;
        }

        public Criteria andOrderNumNotEqualTo(String value) {
            addCriterion("order_num <>", value, "orderNum");
            return (Criteria) this;
        }

        public Criteria andOrderNumGreaterThan(String value) {
            addCriterion("order_num >", value, "orderNum");
            return (Criteria) this;
        }

        public Criteria andOrderNumGreaterThanOrEqualTo(String value) {
            addCriterion("order_num >=", value, "orderNum");
            return (Criteria) this;
        }

        public Criteria andOrderNumLessThan(String value) {
            addCriterion("order_num <", value, "orderNum");
            return (Criteria) this;
        }

        public Criteria andOrderNumLessThanOrEqualTo(String value) {
            addCriterion("order_num <=", value, "orderNum");
            return (Criteria) this;
        }

        public Criteria andOrderNumLike(String value) {
            addCriterion("order_num like", value, "orderNum");
            return (Criteria) this;
        }

        public Criteria andOrderNumNotLike(String value) {
            addCriterion("order_num not like", value, "orderNum");
            return (Criteria) this;
        }

        public Criteria andOrderNumIn(List<String> values) {
            addCriterion("order_num in", values, "orderNum");
            return (Criteria) this;
        }

        public Criteria andOrderNumNotIn(List<String> values) {
            addCriterion("order_num not in", values, "orderNum");
            return (Criteria) this;
        }

        public Criteria andOrderNumBetween(String value1, String value2) {
            addCriterion("order_num between", value1, value2, "orderNum");
            return (Criteria) this;
        }

        public Criteria andOrderNumNotBetween(String value1, String value2) {
            addCriterion("order_num not between", value1, value2, "orderNum");
            return (Criteria) this;
        }

        public Criteria andSuccessPayTimeIsNull() {
            addCriterion("success_pay_time is null");
            return (Criteria) this;
        }

        public Criteria andSuccessPayTimeIsNotNull() {
            addCriterion("success_pay_time is not null");
            return (Criteria) this;
        }

        public Criteria andSuccessPayTimeEqualTo(Integer value) {
            addCriterion("success_pay_time =", value, "successPayTime");
            return (Criteria) this;
        }

        public Criteria andSuccessPayTimeNotEqualTo(Integer value) {
            addCriterion("success_pay_time <>", value, "successPayTime");
            return (Criteria) this;
        }

        public Criteria andSuccessPayTimeGreaterThan(Integer value) {
            addCriterion("success_pay_time >", value, "successPayTime");
            return (Criteria) this;
        }

        public Criteria andSuccessPayTimeGreaterThanOrEqualTo(Integer value) {
            addCriterion("success_pay_time >=", value, "successPayTime");
            return (Criteria) this;
        }

        public Criteria andSuccessPayTimeLessThan(Integer value) {
            addCriterion("success_pay_time <", value, "successPayTime");
            return (Criteria) this;
        }

        public Criteria andSuccessPayTimeLessThanOrEqualTo(Integer value) {
            addCriterion("success_pay_time <=", value, "successPayTime");
            return (Criteria) this;
        }

        public Criteria andSuccessPayTimeIn(List<Integer> values) {
            addCriterion("success_pay_time in", values, "successPayTime");
            return (Criteria) this;
        }

        public Criteria andSuccessPayTimeNotIn(List<Integer> values) {
            addCriterion("success_pay_time not in", values, "successPayTime");
            return (Criteria) this;
        }

        public Criteria andSuccessPayTimeBetween(Integer value1, Integer value2) {
            addCriterion("success_pay_time between", value1, value2, "successPayTime");
            return (Criteria) this;
        }

        public Criteria andSuccessPayTimeNotBetween(Integer value1, Integer value2) {
            addCriterion("success_pay_time not between", value1, value2, "successPayTime");
            return (Criteria) this;
        }

        public Criteria andPayTotalIsNull() {
            addCriterion("pay_total is null");
            return (Criteria) this;
        }

        public Criteria andPayTotalIsNotNull() {
            addCriterion("pay_total is not null");
            return (Criteria) this;
        }

        public Criteria andPayTotalEqualTo(BigDecimal value) {
            addCriterion("pay_total =", value, "payTotal");
            return (Criteria) this;
        }

        public Criteria andPayTotalNotEqualTo(BigDecimal value) {
            addCriterion("pay_total <>", value, "payTotal");
            return (Criteria) this;
        }

        public Criteria andPayTotalGreaterThan(BigDecimal value) {
            addCriterion("pay_total >", value, "payTotal");
            return (Criteria) this;
        }

        public Criteria andPayTotalGreaterThanOrEqualTo(BigDecimal value) {
            addCriterion("pay_total >=", value, "payTotal");
            return (Criteria) this;
        }

        public Criteria andPayTotalLessThan(BigDecimal value) {
            addCriterion("pay_total <", value, "payTotal");
            return (Criteria) this;
        }

        public Criteria andPayTotalLessThanOrEqualTo(BigDecimal value) {
            addCriterion("pay_total <=", value, "payTotal");
            return (Criteria) this;
        }

        public Criteria andPayTotalIn(List<BigDecimal> values) {
            addCriterion("pay_total in", values, "payTotal");
            return (Criteria) this;
        }

        public Criteria andPayTotalNotIn(List<BigDecimal> values) {
            addCriterion("pay_total not in", values, "payTotal");
            return (Criteria) this;
        }

        public Criteria andPayTotalBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("pay_total between", value1, value2, "payTotal");
            return (Criteria) this;
        }

        public Criteria andPayTotalNotBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("pay_total not between", value1, value2, "payTotal");
            return (Criteria) this;
        }

        public Criteria andPayPlatformNameIsNull() {
            addCriterion("pay_platform_name is null");
            return (Criteria) this;
        }

        public Criteria andPayPlatformNameIsNotNull() {
            addCriterion("pay_platform_name is not null");
            return (Criteria) this;
        }

        public Criteria andPayPlatformNameEqualTo(String value) {
            addCriterion("pay_platform_name =", value, "payPlatformName");
            return (Criteria) this;
        }

        public Criteria andPayPlatformNameNotEqualTo(String value) {
            addCriterion("pay_platform_name <>", value, "payPlatformName");
            return (Criteria) this;
        }

        public Criteria andPayPlatformNameGreaterThan(String value) {
            addCriterion("pay_platform_name >", value, "payPlatformName");
            return (Criteria) this;
        }

        public Criteria andPayPlatformNameGreaterThanOrEqualTo(String value) {
            addCriterion("pay_platform_name >=", value, "payPlatformName");
            return (Criteria) this;
        }

        public Criteria andPayPlatformNameLessThan(String value) {
            addCriterion("pay_platform_name <", value, "payPlatformName");
            return (Criteria) this;
        }

        public Criteria andPayPlatformNameLessThanOrEqualTo(String value) {
            addCriterion("pay_platform_name <=", value, "payPlatformName");
            return (Criteria) this;
        }

        public Criteria andPayPlatformNameLike(String value) {
            addCriterion("pay_platform_name like", value, "payPlatformName");
            return (Criteria) this;
        }

        public Criteria andPayPlatformNameNotLike(String value) {
            addCriterion("pay_platform_name not like", value, "payPlatformName");
            return (Criteria) this;
        }

        public Criteria andPayPlatformNameIn(List<String> values) {
            addCriterion("pay_platform_name in", values, "payPlatformName");
            return (Criteria) this;
        }

        public Criteria andPayPlatformNameNotIn(List<String> values) {
            addCriterion("pay_platform_name not in", values, "payPlatformName");
            return (Criteria) this;
        }

        public Criteria andPayPlatformNameBetween(String value1, String value2) {
            addCriterion("pay_platform_name between", value1, value2, "payPlatformName");
            return (Criteria) this;
        }

        public Criteria andPayPlatformNameNotBetween(String value1, String value2) {
            addCriterion("pay_platform_name not between", value1, value2, "payPlatformName");
            return (Criteria) this;
        }

        public Criteria andPayProductIsNull() {
            addCriterion("pay_product is null");
            return (Criteria) this;
        }

        public Criteria andPayProductIsNotNull() {
            addCriterion("pay_product is not null");
            return (Criteria) this;
        }

        public Criteria andPayProductEqualTo(String value) {
            addCriterion("pay_product =", value, "payProduct");
            return (Criteria) this;
        }

        public Criteria andPayProductNotEqualTo(String value) {
            addCriterion("pay_product <>", value, "payProduct");
            return (Criteria) this;
        }

        public Criteria andPayProductGreaterThan(String value) {
            addCriterion("pay_product >", value, "payProduct");
            return (Criteria) this;
        }

        public Criteria andPayProductGreaterThanOrEqualTo(String value) {
            addCriterion("pay_product >=", value, "payProduct");
            return (Criteria) this;
        }

        public Criteria andPayProductLessThan(String value) {
            addCriterion("pay_product <", value, "payProduct");
            return (Criteria) this;
        }

        public Criteria andPayProductLessThanOrEqualTo(String value) {
            addCriterion("pay_product <=", value, "payProduct");
            return (Criteria) this;
        }

        public Criteria andPayProductLike(String value) {
            addCriterion("pay_product like", value, "payProduct");
            return (Criteria) this;
        }

        public Criteria andPayProductNotLike(String value) {
            addCriterion("pay_product not like", value, "payProduct");
            return (Criteria) this;
        }

        public Criteria andPayProductIn(List<String> values) {
            addCriterion("pay_product in", values, "payProduct");
            return (Criteria) this;
        }

        public Criteria andPayProductNotIn(List<String> values) {
            addCriterion("pay_product not in", values, "payProduct");
            return (Criteria) this;
        }

        public Criteria andPayProductBetween(String value1, String value2) {
            addCriterion("pay_product between", value1, value2, "payProduct");
            return (Criteria) this;
        }

        public Criteria andPayProductNotBetween(String value1, String value2) {
            addCriterion("pay_product not between", value1, value2, "payProduct");
            return (Criteria) this;
        }

        public Criteria andPayPlatformRoteIsNull() {
            addCriterion("pay_platform_rote is null");
            return (Criteria) this;
        }

        public Criteria andPayPlatformRoteIsNotNull() {
            addCriterion("pay_platform_rote is not null");
            return (Criteria) this;
        }

        public Criteria andPayPlatformRoteEqualTo(BigDecimal value) {
            addCriterion("pay_platform_rote =", value, "payPlatformRote");
            return (Criteria) this;
        }

        public Criteria andPayPlatformRoteNotEqualTo(BigDecimal value) {
            addCriterion("pay_platform_rote <>", value, "payPlatformRote");
            return (Criteria) this;
        }

        public Criteria andPayPlatformRoteGreaterThan(BigDecimal value) {
            addCriterion("pay_platform_rote >", value, "payPlatformRote");
            return (Criteria) this;
        }

        public Criteria andPayPlatformRoteGreaterThanOrEqualTo(BigDecimal value) {
            addCriterion("pay_platform_rote >=", value, "payPlatformRote");
            return (Criteria) this;
        }

        public Criteria andPayPlatformRoteLessThan(BigDecimal value) {
            addCriterion("pay_platform_rote <", value, "payPlatformRote");
            return (Criteria) this;
        }

        public Criteria andPayPlatformRoteLessThanOrEqualTo(BigDecimal value) {
            addCriterion("pay_platform_rote <=", value, "payPlatformRote");
            return (Criteria) this;
        }

        public Criteria andPayPlatformRoteIn(List<BigDecimal> values) {
            addCriterion("pay_platform_rote in", values, "payPlatformRote");
            return (Criteria) this;
        }

        public Criteria andPayPlatformRoteNotIn(List<BigDecimal> values) {
            addCriterion("pay_platform_rote not in", values, "payPlatformRote");
            return (Criteria) this;
        }

        public Criteria andPayPlatformRoteBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("pay_platform_rote between", value1, value2, "payPlatformRote");
            return (Criteria) this;
        }

        public Criteria andPayPlatformRoteNotBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("pay_platform_rote not between", value1, value2, "payPlatformRote");
            return (Criteria) this;
        }

        public Criteria andPayCompanyRoteIsNull() {
            addCriterion("pay_company_rote is null");
            return (Criteria) this;
        }

        public Criteria andPayCompanyRoteIsNotNull() {
            addCriterion("pay_company_rote is not null");
            return (Criteria) this;
        }

        public Criteria andPayCompanyRoteEqualTo(BigDecimal value) {
            addCriterion("pay_company_rote =", value, "payCompanyRote");
            return (Criteria) this;
        }

        public Criteria andPayCompanyRoteNotEqualTo(BigDecimal value) {
            addCriterion("pay_company_rote <>", value, "payCompanyRote");
            return (Criteria) this;
        }

        public Criteria andPayCompanyRoteGreaterThan(BigDecimal value) {
            addCriterion("pay_company_rote >", value, "payCompanyRote");
            return (Criteria) this;
        }

        public Criteria andPayCompanyRoteGreaterThanOrEqualTo(BigDecimal value) {
            addCriterion("pay_company_rote >=", value, "payCompanyRote");
            return (Criteria) this;
        }

        public Criteria andPayCompanyRoteLessThan(BigDecimal value) {
            addCriterion("pay_company_rote <", value, "payCompanyRote");
            return (Criteria) this;
        }

        public Criteria andPayCompanyRoteLessThanOrEqualTo(BigDecimal value) {
            addCriterion("pay_company_rote <=", value, "payCompanyRote");
            return (Criteria) this;
        }

        public Criteria andPayCompanyRoteIn(List<BigDecimal> values) {
            addCriterion("pay_company_rote in", values, "payCompanyRote");
            return (Criteria) this;
        }

        public Criteria andPayCompanyRoteNotIn(List<BigDecimal> values) {
            addCriterion("pay_company_rote not in", values, "payCompanyRote");
            return (Criteria) this;
        }

        public Criteria andPayCompanyRoteBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("pay_company_rote between", value1, value2, "payCompanyRote");
            return (Criteria) this;
        }

        public Criteria andPayCompanyRoteNotBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("pay_company_rote not between", value1, value2, "payCompanyRote");
            return (Criteria) this;
        }

        public Criteria andPaySellRoteIsNull() {
            addCriterion("pay_sell_rote is null");
            return (Criteria) this;
        }

        public Criteria andPaySellRoteIsNotNull() {
            addCriterion("pay_sell_rote is not null");
            return (Criteria) this;
        }

        public Criteria andPaySellRoteEqualTo(BigDecimal value) {
            addCriterion("pay_sell_rote =", value, "paySellRote");
            return (Criteria) this;
        }

        public Criteria andPaySellRoteNotEqualTo(BigDecimal value) {
            addCriterion("pay_sell_rote <>", value, "paySellRote");
            return (Criteria) this;
        }

        public Criteria andPaySellRoteGreaterThan(BigDecimal value) {
            addCriterion("pay_sell_rote >", value, "paySellRote");
            return (Criteria) this;
        }

        public Criteria andPaySellRoteGreaterThanOrEqualTo(BigDecimal value) {
            addCriterion("pay_sell_rote >=", value, "paySellRote");
            return (Criteria) this;
        }

        public Criteria andPaySellRoteLessThan(BigDecimal value) {
            addCriterion("pay_sell_rote <", value, "paySellRote");
            return (Criteria) this;
        }

        public Criteria andPaySellRoteLessThanOrEqualTo(BigDecimal value) {
            addCriterion("pay_sell_rote <=", value, "paySellRote");
            return (Criteria) this;
        }

        public Criteria andPaySellRoteIn(List<BigDecimal> values) {
            addCriterion("pay_sell_rote in", values, "paySellRote");
            return (Criteria) this;
        }

        public Criteria andPaySellRoteNotIn(List<BigDecimal> values) {
            addCriterion("pay_sell_rote not in", values, "paySellRote");
            return (Criteria) this;
        }

        public Criteria andPaySellRoteBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("pay_sell_rote between", value1, value2, "paySellRote");
            return (Criteria) this;
        }

        public Criteria andPaySellRoteNotBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("pay_sell_rote not between", value1, value2, "paySellRote");
            return (Criteria) this;
        }

        public Criteria andPayPlatformFeeIsNull() {
            addCriterion("pay_platform_fee is null");
            return (Criteria) this;
        }

        public Criteria andPayPlatformFeeIsNotNull() {
            addCriterion("pay_platform_fee is not null");
            return (Criteria) this;
        }

        public Criteria andPayPlatformFeeEqualTo(BigDecimal value) {
            addCriterion("pay_platform_fee =", value, "payPlatformFee");
            return (Criteria) this;
        }

        public Criteria andPayPlatformFeeNotEqualTo(BigDecimal value) {
            addCriterion("pay_platform_fee <>", value, "payPlatformFee");
            return (Criteria) this;
        }

        public Criteria andPayPlatformFeeGreaterThan(BigDecimal value) {
            addCriterion("pay_platform_fee >", value, "payPlatformFee");
            return (Criteria) this;
        }

        public Criteria andPayPlatformFeeGreaterThanOrEqualTo(BigDecimal value) {
            addCriterion("pay_platform_fee >=", value, "payPlatformFee");
            return (Criteria) this;
        }

        public Criteria andPayPlatformFeeLessThan(BigDecimal value) {
            addCriterion("pay_platform_fee <", value, "payPlatformFee");
            return (Criteria) this;
        }

        public Criteria andPayPlatformFeeLessThanOrEqualTo(BigDecimal value) {
            addCriterion("pay_platform_fee <=", value, "payPlatformFee");
            return (Criteria) this;
        }

        public Criteria andPayPlatformFeeIn(List<BigDecimal> values) {
            addCriterion("pay_platform_fee in", values, "payPlatformFee");
            return (Criteria) this;
        }

        public Criteria andPayPlatformFeeNotIn(List<BigDecimal> values) {
            addCriterion("pay_platform_fee not in", values, "payPlatformFee");
            return (Criteria) this;
        }

        public Criteria andPayPlatformFeeBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("pay_platform_fee between", value1, value2, "payPlatformFee");
            return (Criteria) this;
        }

        public Criteria andPayPlatformFeeNotBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("pay_platform_fee not between", value1, value2, "payPlatformFee");
            return (Criteria) this;
        }

        public Criteria andPayCompanyFeeIsNull() {
            addCriterion("pay_company_fee is null");
            return (Criteria) this;
        }

        public Criteria andPayCompanyFeeIsNotNull() {
            addCriterion("pay_company_fee is not null");
            return (Criteria) this;
        }

        public Criteria andPayCompanyFeeEqualTo(BigDecimal value) {
            addCriterion("pay_company_fee =", value, "payCompanyFee");
            return (Criteria) this;
        }

        public Criteria andPayCompanyFeeNotEqualTo(BigDecimal value) {
            addCriterion("pay_company_fee <>", value, "payCompanyFee");
            return (Criteria) this;
        }

        public Criteria andPayCompanyFeeGreaterThan(BigDecimal value) {
            addCriterion("pay_company_fee >", value, "payCompanyFee");
            return (Criteria) this;
        }

        public Criteria andPayCompanyFeeGreaterThanOrEqualTo(BigDecimal value) {
            addCriterion("pay_company_fee >=", value, "payCompanyFee");
            return (Criteria) this;
        }

        public Criteria andPayCompanyFeeLessThan(BigDecimal value) {
            addCriterion("pay_company_fee <", value, "payCompanyFee");
            return (Criteria) this;
        }

        public Criteria andPayCompanyFeeLessThanOrEqualTo(BigDecimal value) {
            addCriterion("pay_company_fee <=", value, "payCompanyFee");
            return (Criteria) this;
        }

        public Criteria andPayCompanyFeeIn(List<BigDecimal> values) {
            addCriterion("pay_company_fee in", values, "payCompanyFee");
            return (Criteria) this;
        }

        public Criteria andPayCompanyFeeNotIn(List<BigDecimal> values) {
            addCriterion("pay_company_fee not in", values, "payCompanyFee");
            return (Criteria) this;
        }

        public Criteria andPayCompanyFeeBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("pay_company_fee between", value1, value2, "payCompanyFee");
            return (Criteria) this;
        }

        public Criteria andPayCompanyFeeNotBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("pay_company_fee not between", value1, value2, "payCompanyFee");
            return (Criteria) this;
        }

        public Criteria andPaySellFeeIsNull() {
            addCriterion("pay_sell_fee is null");
            return (Criteria) this;
        }

        public Criteria andPaySellFeeIsNotNull() {
            addCriterion("pay_sell_fee is not null");
            return (Criteria) this;
        }

        public Criteria andPaySellFeeEqualTo(BigDecimal value) {
            addCriterion("pay_sell_fee =", value, "paySellFee");
            return (Criteria) this;
        }

        public Criteria andPaySellFeeNotEqualTo(BigDecimal value) {
            addCriterion("pay_sell_fee <>", value, "paySellFee");
            return (Criteria) this;
        }

        public Criteria andPaySellFeeGreaterThan(BigDecimal value) {
            addCriterion("pay_sell_fee >", value, "paySellFee");
            return (Criteria) this;
        }

        public Criteria andPaySellFeeGreaterThanOrEqualTo(BigDecimal value) {
            addCriterion("pay_sell_fee >=", value, "paySellFee");
            return (Criteria) this;
        }

        public Criteria andPaySellFeeLessThan(BigDecimal value) {
            addCriterion("pay_sell_fee <", value, "paySellFee");
            return (Criteria) this;
        }

        public Criteria andPaySellFeeLessThanOrEqualTo(BigDecimal value) {
            addCriterion("pay_sell_fee <=", value, "paySellFee");
            return (Criteria) this;
        }

        public Criteria andPaySellFeeIn(List<BigDecimal> values) {
            addCriterion("pay_sell_fee in", values, "paySellFee");
            return (Criteria) this;
        }

        public Criteria andPaySellFeeNotIn(List<BigDecimal> values) {
            addCriterion("pay_sell_fee not in", values, "paySellFee");
            return (Criteria) this;
        }

        public Criteria andPaySellFeeBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("pay_sell_fee between", value1, value2, "paySellFee");
            return (Criteria) this;
        }

        public Criteria andPaySellFeeNotBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("pay_sell_fee not between", value1, value2, "paySellFee");
            return (Criteria) this;
        }

        public Criteria andPayToMemberIsNull() {
            addCriterion("pay_to_member is null");
            return (Criteria) this;
        }

        public Criteria andPayToMemberIsNotNull() {
            addCriterion("pay_to_member is not null");
            return (Criteria) this;
        }

        public Criteria andPayToMemberEqualTo(BigDecimal value) {
            addCriterion("pay_to_member =", value, "payToMember");
            return (Criteria) this;
        }

        public Criteria andPayToMemberNotEqualTo(BigDecimal value) {
            addCriterion("pay_to_member <>", value, "payToMember");
            return (Criteria) this;
        }

        public Criteria andPayToMemberGreaterThan(BigDecimal value) {
            addCriterion("pay_to_member >", value, "payToMember");
            return (Criteria) this;
        }

        public Criteria andPayToMemberGreaterThanOrEqualTo(BigDecimal value) {
            addCriterion("pay_to_member >=", value, "payToMember");
            return (Criteria) this;
        }

        public Criteria andPayToMemberLessThan(BigDecimal value) {
            addCriterion("pay_to_member <", value, "payToMember");
            return (Criteria) this;
        }

        public Criteria andPayToMemberLessThanOrEqualTo(BigDecimal value) {
            addCriterion("pay_to_member <=", value, "payToMember");
            return (Criteria) this;
        }

        public Criteria andPayToMemberIn(List<BigDecimal> values) {
            addCriterion("pay_to_member in", values, "payToMember");
            return (Criteria) this;
        }

        public Criteria andPayToMemberNotIn(List<BigDecimal> values) {
            addCriterion("pay_to_member not in", values, "payToMember");
            return (Criteria) this;
        }

        public Criteria andPayToMemberBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("pay_to_member between", value1, value2, "payToMember");
            return (Criteria) this;
        }

        public Criteria andPayToMemberNotBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("pay_to_member not between", value1, value2, "payToMember");
            return (Criteria) this;
        }

        public Criteria andPayToBossIsNull() {
            addCriterion("pay_to_boss is null");
            return (Criteria) this;
        }

        public Criteria andPayToBossIsNotNull() {
            addCriterion("pay_to_boss is not null");
            return (Criteria) this;
        }

        public Criteria andPayToBossEqualTo(BigDecimal value) {
            addCriterion("pay_to_boss =", value, "payToBoss");
            return (Criteria) this;
        }

        public Criteria andPayToBossNotEqualTo(BigDecimal value) {
            addCriterion("pay_to_boss <>", value, "payToBoss");
            return (Criteria) this;
        }

        public Criteria andPayToBossGreaterThan(BigDecimal value) {
            addCriterion("pay_to_boss >", value, "payToBoss");
            return (Criteria) this;
        }

        public Criteria andPayToBossGreaterThanOrEqualTo(BigDecimal value) {
            addCriterion("pay_to_boss >=", value, "payToBoss");
            return (Criteria) this;
        }

        public Criteria andPayToBossLessThan(BigDecimal value) {
            addCriterion("pay_to_boss <", value, "payToBoss");
            return (Criteria) this;
        }

        public Criteria andPayToBossLessThanOrEqualTo(BigDecimal value) {
            addCriterion("pay_to_boss <=", value, "payToBoss");
            return (Criteria) this;
        }

        public Criteria andPayToBossIn(List<BigDecimal> values) {
            addCriterion("pay_to_boss in", values, "payToBoss");
            return (Criteria) this;
        }

        public Criteria andPayToBossNotIn(List<BigDecimal> values) {
            addCriterion("pay_to_boss not in", values, "payToBoss");
            return (Criteria) this;
        }

        public Criteria andPayToBossBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("pay_to_boss between", value1, value2, "payToBoss");
            return (Criteria) this;
        }

        public Criteria andPayToBossNotBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("pay_to_boss not between", value1, value2, "payToBoss");
            return (Criteria) this;
        }

        public Criteria andProfitIsNull() {
            addCriterion("profit is null");
            return (Criteria) this;
        }

        public Criteria andProfitIsNotNull() {
            addCriterion("profit is not null");
            return (Criteria) this;
        }

        public Criteria andProfitEqualTo(BigDecimal value) {
            addCriterion("profit =", value, "profit");
            return (Criteria) this;
        }

        public Criteria andProfitNotEqualTo(BigDecimal value) {
            addCriterion("profit <>", value, "profit");
            return (Criteria) this;
        }

        public Criteria andProfitGreaterThan(BigDecimal value) {
            addCriterion("profit >", value, "profit");
            return (Criteria) this;
        }

        public Criteria andProfitGreaterThanOrEqualTo(BigDecimal value) {
            addCriterion("profit >=", value, "profit");
            return (Criteria) this;
        }

        public Criteria andProfitLessThan(BigDecimal value) {
            addCriterion("profit <", value, "profit");
            return (Criteria) this;
        }

        public Criteria andProfitLessThanOrEqualTo(BigDecimal value) {
            addCriterion("profit <=", value, "profit");
            return (Criteria) this;
        }

        public Criteria andProfitIn(List<BigDecimal> values) {
            addCriterion("profit in", values, "profit");
            return (Criteria) this;
        }

        public Criteria andProfitNotIn(List<BigDecimal> values) {
            addCriterion("profit not in", values, "profit");
            return (Criteria) this;
        }

        public Criteria andProfitBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("profit between", value1, value2, "profit");
            return (Criteria) this;
        }

        public Criteria andProfitNotBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("profit not between", value1, value2, "profit");
            return (Criteria) this;
        }

        public Criteria andPrePayTimeIsNull() {
            addCriterion("pre_pay_time is null");
            return (Criteria) this;
        }

        public Criteria andPrePayTimeIsNotNull() {
            addCriterion("pre_pay_time is not null");
            return (Criteria) this;
        }

        public Criteria andPrePayTimeEqualTo(Integer value) {
            addCriterion("pre_pay_time =", value, "prePayTime");
            return (Criteria) this;
        }

        public Criteria andPrePayTimeNotEqualTo(Integer value) {
            addCriterion("pre_pay_time <>", value, "prePayTime");
            return (Criteria) this;
        }

        public Criteria andPrePayTimeGreaterThan(Integer value) {
            addCriterion("pre_pay_time >", value, "prePayTime");
            return (Criteria) this;
        }

        public Criteria andPrePayTimeGreaterThanOrEqualTo(Integer value) {
            addCriterion("pre_pay_time >=", value, "prePayTime");
            return (Criteria) this;
        }

        public Criteria andPrePayTimeLessThan(Integer value) {
            addCriterion("pre_pay_time <", value, "prePayTime");
            return (Criteria) this;
        }

        public Criteria andPrePayTimeLessThanOrEqualTo(Integer value) {
            addCriterion("pre_pay_time <=", value, "prePayTime");
            return (Criteria) this;
        }

        public Criteria andPrePayTimeIn(List<Integer> values) {
            addCriterion("pre_pay_time in", values, "prePayTime");
            return (Criteria) this;
        }

        public Criteria andPrePayTimeNotIn(List<Integer> values) {
            addCriterion("pre_pay_time not in", values, "prePayTime");
            return (Criteria) this;
        }

        public Criteria andPrePayTimeBetween(Integer value1, Integer value2) {
            addCriterion("pre_pay_time between", value1, value2, "prePayTime");
            return (Criteria) this;
        }

        public Criteria andPrePayTimeNotBetween(Integer value1, Integer value2) {
            addCriterion("pre_pay_time not between", value1, value2, "prePayTime");
            return (Criteria) this;
        }

        public Criteria andPayTimeIsNull() {
            addCriterion("pay_time is null");
            return (Criteria) this;
        }

        public Criteria andPayTimeIsNotNull() {
            addCriterion("pay_time is not null");
            return (Criteria) this;
        }

        public Criteria andPayTimeEqualTo(Integer value) {
            addCriterion("pay_time =", value, "payTime");
            return (Criteria) this;
        }

        public Criteria andPayTimeNotEqualTo(Integer value) {
            addCriterion("pay_time <>", value, "payTime");
            return (Criteria) this;
        }

        public Criteria andPayTimeGreaterThan(Integer value) {
            addCriterion("pay_time >", value, "payTime");
            return (Criteria) this;
        }

        public Criteria andPayTimeGreaterThanOrEqualTo(Integer value) {
            addCriterion("pay_time >=", value, "payTime");
            return (Criteria) this;
        }

        public Criteria andPayTimeLessThan(Integer value) {
            addCriterion("pay_time <", value, "payTime");
            return (Criteria) this;
        }

        public Criteria andPayTimeLessThanOrEqualTo(Integer value) {
            addCriterion("pay_time <=", value, "payTime");
            return (Criteria) this;
        }

        public Criteria andPayTimeIn(List<Integer> values) {
            addCriterion("pay_time in", values, "payTime");
            return (Criteria) this;
        }

        public Criteria andPayTimeNotIn(List<Integer> values) {
            addCriterion("pay_time not in", values, "payTime");
            return (Criteria) this;
        }

        public Criteria andPayTimeBetween(Integer value1, Integer value2) {
            addCriterion("pay_time between", value1, value2, "payTime");
            return (Criteria) this;
        }

        public Criteria andPayTimeNotBetween(Integer value1, Integer value2) {
            addCriterion("pay_time not between", value1, value2, "payTime");
            return (Criteria) this;
        }

        public Criteria andStatusIsNull() {
            addCriterion("status is null");
            return (Criteria) this;
        }

        public Criteria andStatusIsNotNull() {
            addCriterion("status is not null");
            return (Criteria) this;
        }

        public Criteria andStatusEqualTo(Integer value) {
            addCriterion("status =", value, "status");
            return (Criteria) this;
        }

        public Criteria andStatusNotEqualTo(Integer value) {
            addCriterion("status <>", value, "status");
            return (Criteria) this;
        }

        public Criteria andStatusGreaterThan(Integer value) {
            addCriterion("status >", value, "status");
            return (Criteria) this;
        }

        public Criteria andStatusGreaterThanOrEqualTo(Integer value) {
            addCriterion("status >=", value, "status");
            return (Criteria) this;
        }

        public Criteria andStatusLessThan(Integer value) {
            addCriterion("status <", value, "status");
            return (Criteria) this;
        }

        public Criteria andStatusLessThanOrEqualTo(Integer value) {
            addCriterion("status <=", value, "status");
            return (Criteria) this;
        }

        public Criteria andStatusIn(List<Integer> values) {
            addCriterion("status in", values, "status");
            return (Criteria) this;
        }

        public Criteria andStatusNotIn(List<Integer> values) {
            addCriterion("status not in", values, "status");
            return (Criteria) this;
        }

        public Criteria andStatusBetween(Integer value1, Integer value2) {
            addCriterion("status between", value1, value2, "status");
            return (Criteria) this;
        }

        public Criteria andStatusNotBetween(Integer value1, Integer value2) {
            addCriterion("status not between", value1, value2, "status");
            return (Criteria) this;
        }

        public Criteria andPayStateIsNull() {
            addCriterion("pay_state is null");
            return (Criteria) this;
        }

        public Criteria andPayStateIsNotNull() {
            addCriterion("pay_state is not null");
            return (Criteria) this;
        }

        public Criteria andPayStateEqualTo(Short value) {
            addCriterion("pay_state =", value, "payState");
            return (Criteria) this;
        }

        public Criteria andPayStateNotEqualTo(Short value) {
            addCriterion("pay_state <>", value, "payState");
            return (Criteria) this;
        }

        public Criteria andPayStateGreaterThan(Short value) {
            addCriterion("pay_state >", value, "payState");
            return (Criteria) this;
        }

        public Criteria andPayStateGreaterThanOrEqualTo(Short value) {
            addCriterion("pay_state >=", value, "payState");
            return (Criteria) this;
        }

        public Criteria andPayStateLessThan(Short value) {
            addCriterion("pay_state <", value, "payState");
            return (Criteria) this;
        }

        public Criteria andPayStateLessThanOrEqualTo(Short value) {
            addCriterion("pay_state <=", value, "payState");
            return (Criteria) this;
        }

        public Criteria andPayStateIn(List<Short> values) {
            addCriterion("pay_state in", values, "payState");
            return (Criteria) this;
        }

        public Criteria andPayStateNotIn(List<Short> values) {
            addCriterion("pay_state not in", values, "payState");
            return (Criteria) this;
        }

        public Criteria andPayStateBetween(Short value1, Short value2) {
            addCriterion("pay_state between", value1, value2, "payState");
            return (Criteria) this;
        }

        public Criteria andPayStateNotBetween(Short value1, Short value2) {
            addCriterion("pay_state not between", value1, value2, "payState");
            return (Criteria) this;
        }

        public Criteria andPayUserIsNull() {
            addCriterion("pay_user is null");
            return (Criteria) this;
        }

        public Criteria andPayUserIsNotNull() {
            addCriterion("pay_user is not null");
            return (Criteria) this;
        }

        public Criteria andPayUserEqualTo(String value) {
            addCriterion("pay_user =", value, "payUser");
            return (Criteria) this;
        }

        public Criteria andPayUserNotEqualTo(String value) {
            addCriterion("pay_user <>", value, "payUser");
            return (Criteria) this;
        }

        public Criteria andPayUserGreaterThan(String value) {
            addCriterion("pay_user >", value, "payUser");
            return (Criteria) this;
        }

        public Criteria andPayUserGreaterThanOrEqualTo(String value) {
            addCriterion("pay_user >=", value, "payUser");
            return (Criteria) this;
        }

        public Criteria andPayUserLessThan(String value) {
            addCriterion("pay_user <", value, "payUser");
            return (Criteria) this;
        }

        public Criteria andPayUserLessThanOrEqualTo(String value) {
            addCriterion("pay_user <=", value, "payUser");
            return (Criteria) this;
        }

        public Criteria andPayUserLike(String value) {
            addCriterion("pay_user like", value, "payUser");
            return (Criteria) this;
        }

        public Criteria andPayUserNotLike(String value) {
            addCriterion("pay_user not like", value, "payUser");
            return (Criteria) this;
        }

        public Criteria andPayUserIn(List<String> values) {
            addCriterion("pay_user in", values, "payUser");
            return (Criteria) this;
        }

        public Criteria andPayUserNotIn(List<String> values) {
            addCriterion("pay_user not in", values, "payUser");
            return (Criteria) this;
        }

        public Criteria andPayUserBetween(String value1, String value2) {
            addCriterion("pay_user between", value1, value2, "payUser");
            return (Criteria) this;
        }

        public Criteria andPayUserNotBetween(String value1, String value2) {
            addCriterion("pay_user not between", value1, value2, "payUser");
            return (Criteria) this;
        }

        public Criteria andPayUserCommissionIsNull() {
            addCriterion("pay_user_commission is null");
            return (Criteria) this;
        }

        public Criteria andPayUserCommissionIsNotNull() {
            addCriterion("pay_user_commission is not null");
            return (Criteria) this;
        }

        public Criteria andPayUserCommissionEqualTo(BigDecimal value) {
            addCriterion("pay_user_commission =", value, "payUserCommission");
            return (Criteria) this;
        }

        public Criteria andPayUserCommissionNotEqualTo(BigDecimal value) {
            addCriterion("pay_user_commission <>", value, "payUserCommission");
            return (Criteria) this;
        }

        public Criteria andPayUserCommissionGreaterThan(BigDecimal value) {
            addCriterion("pay_user_commission >", value, "payUserCommission");
            return (Criteria) this;
        }

        public Criteria andPayUserCommissionGreaterThanOrEqualTo(BigDecimal value) {
            addCriterion("pay_user_commission >=", value, "payUserCommission");
            return (Criteria) this;
        }

        public Criteria andPayUserCommissionLessThan(BigDecimal value) {
            addCriterion("pay_user_commission <", value, "payUserCommission");
            return (Criteria) this;
        }

        public Criteria andPayUserCommissionLessThanOrEqualTo(BigDecimal value) {
            addCriterion("pay_user_commission <=", value, "payUserCommission");
            return (Criteria) this;
        }

        public Criteria andPayUserCommissionIn(List<BigDecimal> values) {
            addCriterion("pay_user_commission in", values, "payUserCommission");
            return (Criteria) this;
        }

        public Criteria andPayUserCommissionNotIn(List<BigDecimal> values) {
            addCriterion("pay_user_commission not in", values, "payUserCommission");
            return (Criteria) this;
        }

        public Criteria andPayUserCommissionBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("pay_user_commission between", value1, value2, "payUserCommission");
            return (Criteria) this;
        }

        public Criteria andPayUserCommissionNotBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("pay_user_commission not between", value1, value2, "payUserCommission");
            return (Criteria) this;
        }
    }

    @entity.query.annotation.Tablename(value="orderlist")
    public static class Criteria extends GeneratedCriteria {

        protected Criteria() {
            super();
        }
    }

    @entity.query.annotation.Tablename(value="orderlist")
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