package entity.query.entites;

import java.util.ArrayList;
import java.util.List;

public class PlatformProfileExample {
    protected String orderByClause;

    protected boolean distinct;

    protected List<Criteria> oredCriteria;

    public PlatformProfileExample() {
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

    @entity.query.annotation.Tablename(value="platform_profile")
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

        public Criteria andIdEqualTo(Short value) {
            addCriterion("id =", value, "id");
            return (Criteria) this;
        }

        public Criteria andIdNotEqualTo(Short value) {
            addCriterion("id <>", value, "id");
            return (Criteria) this;
        }

        public Criteria andIdGreaterThan(Short value) {
            addCriterion("id >", value, "id");
            return (Criteria) this;
        }

        public Criteria andIdGreaterThanOrEqualTo(Short value) {
            addCriterion("id >=", value, "id");
            return (Criteria) this;
        }

        public Criteria andIdLessThan(Short value) {
            addCriterion("id <", value, "id");
            return (Criteria) this;
        }

        public Criteria andIdLessThanOrEqualTo(Short value) {
            addCriterion("id <=", value, "id");
            return (Criteria) this;
        }

        public Criteria andIdIn(List<Short> values) {
            addCriterion("id in", values, "id");
            return (Criteria) this;
        }

        public Criteria andIdNotIn(List<Short> values) {
            addCriterion("id not in", values, "id");
            return (Criteria) this;
        }

        public Criteria andIdBetween(Short value1, Short value2) {
            addCriterion("id between", value1, value2, "id");
            return (Criteria) this;
        }

        public Criteria andIdNotBetween(Short value1, Short value2) {
            addCriterion("id not between", value1, value2, "id");
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

        public Criteria andProductIdIsNull() {
            addCriterion("product_id is null");
            return (Criteria) this;
        }

        public Criteria andProductIdIsNotNull() {
            addCriterion("product_id is not null");
            return (Criteria) this;
        }

        public Criteria andProductIdEqualTo(Short value) {
            addCriterion("product_id =", value, "productId");
            return (Criteria) this;
        }

        public Criteria andProductIdNotEqualTo(Short value) {
            addCriterion("product_id <>", value, "productId");
            return (Criteria) this;
        }

        public Criteria andProductIdGreaterThan(Short value) {
            addCriterion("product_id >", value, "productId");
            return (Criteria) this;
        }

        public Criteria andProductIdGreaterThanOrEqualTo(Short value) {
            addCriterion("product_id >=", value, "productId");
            return (Criteria) this;
        }

        public Criteria andProductIdLessThan(Short value) {
            addCriterion("product_id <", value, "productId");
            return (Criteria) this;
        }

        public Criteria andProductIdLessThanOrEqualTo(Short value) {
            addCriterion("product_id <=", value, "productId");
            return (Criteria) this;
        }

        public Criteria andProductIdIn(List<Short> values) {
            addCriterion("product_id in", values, "productId");
            return (Criteria) this;
        }

        public Criteria andProductIdNotIn(List<Short> values) {
            addCriterion("product_id not in", values, "productId");
            return (Criteria) this;
        }

        public Criteria andProductIdBetween(Short value1, Short value2) {
            addCriterion("product_id between", value1, value2, "productId");
            return (Criteria) this;
        }

        public Criteria andProductIdNotBetween(Short value1, Short value2) {
            addCriterion("product_id not between", value1, value2, "productId");
            return (Criteria) this;
        }

        public Criteria andRoteIsNull() {
            addCriterion("rote is null");
            return (Criteria) this;
        }

        public Criteria andRoteIsNotNull() {
            addCriterion("rote is not null");
            return (Criteria) this;
        }

        public Criteria andRoteEqualTo(Float value) {
            addCriterion("rote =", value, "rote");
            return (Criteria) this;
        }

        public Criteria andRoteNotEqualTo(Float value) {
            addCriterion("rote <>", value, "rote");
            return (Criteria) this;
        }

        public Criteria andRoteGreaterThan(Float value) {
            addCriterion("rote >", value, "rote");
            return (Criteria) this;
        }

        public Criteria andRoteGreaterThanOrEqualTo(Float value) {
            addCriterion("rote >=", value, "rote");
            return (Criteria) this;
        }

        public Criteria andRoteLessThan(Float value) {
            addCriterion("rote <", value, "rote");
            return (Criteria) this;
        }

        public Criteria andRoteLessThanOrEqualTo(Float value) {
            addCriterion("rote <=", value, "rote");
            return (Criteria) this;
        }

        public Criteria andRoteIn(List<Float> values) {
            addCriterion("rote in", values, "rote");
            return (Criteria) this;
        }

        public Criteria andRoteNotIn(List<Float> values) {
            addCriterion("rote not in", values, "rote");
            return (Criteria) this;
        }

        public Criteria andRoteBetween(Float value1, Float value2) {
            addCriterion("rote between", value1, value2, "rote");
            return (Criteria) this;
        }

        public Criteria andRoteNotBetween(Float value1, Float value2) {
            addCriterion("rote not between", value1, value2, "rote");
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

        public Criteria andSellRoteEqualTo(Float value) {
            addCriterion("sell_rote =", value, "sellRote");
            return (Criteria) this;
        }

        public Criteria andSellRoteNotEqualTo(Float value) {
            addCriterion("sell_rote <>", value, "sellRote");
            return (Criteria) this;
        }

        public Criteria andSellRoteGreaterThan(Float value) {
            addCriterion("sell_rote >", value, "sellRote");
            return (Criteria) this;
        }

        public Criteria andSellRoteGreaterThanOrEqualTo(Float value) {
            addCriterion("sell_rote >=", value, "sellRote");
            return (Criteria) this;
        }

        public Criteria andSellRoteLessThan(Float value) {
            addCriterion("sell_rote <", value, "sellRote");
            return (Criteria) this;
        }

        public Criteria andSellRoteLessThanOrEqualTo(Float value) {
            addCriterion("sell_rote <=", value, "sellRote");
            return (Criteria) this;
        }

        public Criteria andSellRoteIn(List<Float> values) {
            addCriterion("sell_rote in", values, "sellRote");
            return (Criteria) this;
        }

        public Criteria andSellRoteNotIn(List<Float> values) {
            addCriterion("sell_rote not in", values, "sellRote");
            return (Criteria) this;
        }

        public Criteria andSellRoteBetween(Float value1, Float value2) {
            addCriterion("sell_rote between", value1, value2, "sellRote");
            return (Criteria) this;
        }

        public Criteria andSellRoteNotBetween(Float value1, Float value2) {
            addCriterion("sell_rote not between", value1, value2, "sellRote");
            return (Criteria) this;
        }

        public Criteria andIsRunIsNull() {
            addCriterion("is_run is null");
            return (Criteria) this;
        }

        public Criteria andIsRunIsNotNull() {
            addCriterion("is_run is not null");
            return (Criteria) this;
        }

        public Criteria andIsRunEqualTo(Short value) {
            addCriterion("is_run =", value, "isRun");
            return (Criteria) this;
        }

        public Criteria andIsRunNotEqualTo(Short value) {
            addCriterion("is_run <>", value, "isRun");
            return (Criteria) this;
        }

        public Criteria andIsRunGreaterThan(Short value) {
            addCriterion("is_run >", value, "isRun");
            return (Criteria) this;
        }

        public Criteria andIsRunGreaterThanOrEqualTo(Short value) {
            addCriterion("is_run >=", value, "isRun");
            return (Criteria) this;
        }

        public Criteria andIsRunLessThan(Short value) {
            addCriterion("is_run <", value, "isRun");
            return (Criteria) this;
        }

        public Criteria andIsRunLessThanOrEqualTo(Short value) {
            addCriterion("is_run <=", value, "isRun");
            return (Criteria) this;
        }

        public Criteria andIsRunIn(List<Short> values) {
            addCriterion("is_run in", values, "isRun");
            return (Criteria) this;
        }

        public Criteria andIsRunNotIn(List<Short> values) {
            addCriterion("is_run not in", values, "isRun");
            return (Criteria) this;
        }

        public Criteria andIsRunBetween(Short value1, Short value2) {
            addCriterion("is_run between", value1, value2, "isRun");
            return (Criteria) this;
        }

        public Criteria andIsRunNotBetween(Short value1, Short value2) {
            addCriterion("is_run not between", value1, value2, "isRun");
            return (Criteria) this;
        }
    }

    @entity.query.annotation.Tablename(value="platform_profile")
    public static class Criteria extends GeneratedCriteria {

        protected Criteria() {
            super();
        }
    }

    @entity.query.annotation.Tablename(value="platform_profile")
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