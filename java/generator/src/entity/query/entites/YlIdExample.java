package entity.query.entites;

import java.util.ArrayList;
import java.util.List;

public class YlIdExample {
    protected String orderByClause;

    protected boolean distinct;

    protected List<Criteria> oredCriteria;

    public YlIdExample() {
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

    @entity.query.annotation.Tablename(value="yl_id")
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

        public Criteria andYlIdIsNull() {
            addCriterion("yl_id is null");
            return (Criteria) this;
        }

        public Criteria andYlIdIsNotNull() {
            addCriterion("yl_id is not null");
            return (Criteria) this;
        }

        public Criteria andYlIdEqualTo(String value) {
            addCriterion("yl_id =", value, "ylId");
            return (Criteria) this;
        }

        public Criteria andYlIdNotEqualTo(String value) {
            addCriterion("yl_id <>", value, "ylId");
            return (Criteria) this;
        }

        public Criteria andYlIdGreaterThan(String value) {
            addCriterion("yl_id >", value, "ylId");
            return (Criteria) this;
        }

        public Criteria andYlIdGreaterThanOrEqualTo(String value) {
            addCriterion("yl_id >=", value, "ylId");
            return (Criteria) this;
        }

        public Criteria andYlIdLessThan(String value) {
            addCriterion("yl_id <", value, "ylId");
            return (Criteria) this;
        }

        public Criteria andYlIdLessThanOrEqualTo(String value) {
            addCriterion("yl_id <=", value, "ylId");
            return (Criteria) this;
        }

        public Criteria andYlIdLike(String value) {
            addCriterion("yl_id like", value, "ylId");
            return (Criteria) this;
        }

        public Criteria andYlIdNotLike(String value) {
            addCriterion("yl_id not like", value, "ylId");
            return (Criteria) this;
        }

        public Criteria andYlIdIn(List<String> values) {
            addCriterion("yl_id in", values, "ylId");
            return (Criteria) this;
        }

        public Criteria andYlIdNotIn(List<String> values) {
            addCriterion("yl_id not in", values, "ylId");
            return (Criteria) this;
        }

        public Criteria andYlIdBetween(String value1, String value2) {
            addCriterion("yl_id between", value1, value2, "ylId");
            return (Criteria) this;
        }

        public Criteria andYlIdNotBetween(String value1, String value2) {
            addCriterion("yl_id not between", value1, value2, "ylId");
            return (Criteria) this;
        }

        public Criteria andYlKeyIsNull() {
            addCriterion("yl_key is null");
            return (Criteria) this;
        }

        public Criteria andYlKeyIsNotNull() {
            addCriterion("yl_key is not null");
            return (Criteria) this;
        }

        public Criteria andYlKeyEqualTo(String value) {
            addCriterion("yl_key =", value, "ylKey");
            return (Criteria) this;
        }

        public Criteria andYlKeyNotEqualTo(String value) {
            addCriterion("yl_key <>", value, "ylKey");
            return (Criteria) this;
        }

        public Criteria andYlKeyGreaterThan(String value) {
            addCriterion("yl_key >", value, "ylKey");
            return (Criteria) this;
        }

        public Criteria andYlKeyGreaterThanOrEqualTo(String value) {
            addCriterion("yl_key >=", value, "ylKey");
            return (Criteria) this;
        }

        public Criteria andYlKeyLessThan(String value) {
            addCriterion("yl_key <", value, "ylKey");
            return (Criteria) this;
        }

        public Criteria andYlKeyLessThanOrEqualTo(String value) {
            addCriterion("yl_key <=", value, "ylKey");
            return (Criteria) this;
        }

        public Criteria andYlKeyLike(String value) {
            addCriterion("yl_key like", value, "ylKey");
            return (Criteria) this;
        }

        public Criteria andYlKeyNotLike(String value) {
            addCriterion("yl_key not like", value, "ylKey");
            return (Criteria) this;
        }

        public Criteria andYlKeyIn(List<String> values) {
            addCriterion("yl_key in", values, "ylKey");
            return (Criteria) this;
        }

        public Criteria andYlKeyNotIn(List<String> values) {
            addCriterion("yl_key not in", values, "ylKey");
            return (Criteria) this;
        }

        public Criteria andYlKeyBetween(String value1, String value2) {
            addCriterion("yl_key between", value1, value2, "ylKey");
            return (Criteria) this;
        }

        public Criteria andYlKeyNotBetween(String value1, String value2) {
            addCriterion("yl_key not between", value1, value2, "ylKey");
            return (Criteria) this;
        }

        public Criteria andYlRandomIsNull() {
            addCriterion("yl_random is null");
            return (Criteria) this;
        }

        public Criteria andYlRandomIsNotNull() {
            addCriterion("yl_random is not null");
            return (Criteria) this;
        }

        public Criteria andYlRandomEqualTo(String value) {
            addCriterion("yl_random =", value, "ylRandom");
            return (Criteria) this;
        }

        public Criteria andYlRandomNotEqualTo(String value) {
            addCriterion("yl_random <>", value, "ylRandom");
            return (Criteria) this;
        }

        public Criteria andYlRandomGreaterThan(String value) {
            addCriterion("yl_random >", value, "ylRandom");
            return (Criteria) this;
        }

        public Criteria andYlRandomGreaterThanOrEqualTo(String value) {
            addCriterion("yl_random >=", value, "ylRandom");
            return (Criteria) this;
        }

        public Criteria andYlRandomLessThan(String value) {
            addCriterion("yl_random <", value, "ylRandom");
            return (Criteria) this;
        }

        public Criteria andYlRandomLessThanOrEqualTo(String value) {
            addCriterion("yl_random <=", value, "ylRandom");
            return (Criteria) this;
        }

        public Criteria andYlRandomLike(String value) {
            addCriterion("yl_random like", value, "ylRandom");
            return (Criteria) this;
        }

        public Criteria andYlRandomNotLike(String value) {
            addCriterion("yl_random not like", value, "ylRandom");
            return (Criteria) this;
        }

        public Criteria andYlRandomIn(List<String> values) {
            addCriterion("yl_random in", values, "ylRandom");
            return (Criteria) this;
        }

        public Criteria andYlRandomNotIn(List<String> values) {
            addCriterion("yl_random not in", values, "ylRandom");
            return (Criteria) this;
        }

        public Criteria andYlRandomBetween(String value1, String value2) {
            addCriterion("yl_random between", value1, value2, "ylRandom");
            return (Criteria) this;
        }

        public Criteria andYlRandomNotBetween(String value1, String value2) {
            addCriterion("yl_random not between", value1, value2, "ylRandom");
            return (Criteria) this;
        }

        public Criteria andYlUseIsNull() {
            addCriterion("yl_use is null");
            return (Criteria) this;
        }

        public Criteria andYlUseIsNotNull() {
            addCriterion("yl_use is not null");
            return (Criteria) this;
        }

        public Criteria andYlUseEqualTo(Short value) {
            addCriterion("yl_use =", value, "ylUse");
            return (Criteria) this;
        }

        public Criteria andYlUseNotEqualTo(Short value) {
            addCriterion("yl_use <>", value, "ylUse");
            return (Criteria) this;
        }

        public Criteria andYlUseGreaterThan(Short value) {
            addCriterion("yl_use >", value, "ylUse");
            return (Criteria) this;
        }

        public Criteria andYlUseGreaterThanOrEqualTo(Short value) {
            addCriterion("yl_use >=", value, "ylUse");
            return (Criteria) this;
        }

        public Criteria andYlUseLessThan(Short value) {
            addCriterion("yl_use <", value, "ylUse");
            return (Criteria) this;
        }

        public Criteria andYlUseLessThanOrEqualTo(Short value) {
            addCriterion("yl_use <=", value, "ylUse");
            return (Criteria) this;
        }

        public Criteria andYlUseIn(List<Short> values) {
            addCriterion("yl_use in", values, "ylUse");
            return (Criteria) this;
        }

        public Criteria andYlUseNotIn(List<Short> values) {
            addCriterion("yl_use not in", values, "ylUse");
            return (Criteria) this;
        }

        public Criteria andYlUseBetween(Short value1, Short value2) {
            addCriterion("yl_use between", value1, value2, "ylUse");
            return (Criteria) this;
        }

        public Criteria andYlUseNotBetween(Short value1, Short value2) {
            addCriterion("yl_use not between", value1, value2, "ylUse");
            return (Criteria) this;
        }

        public Criteria andYlTypeIsNull() {
            addCriterion("yl_type is null");
            return (Criteria) this;
        }

        public Criteria andYlTypeIsNotNull() {
            addCriterion("yl_type is not null");
            return (Criteria) this;
        }

        public Criteria andYlTypeEqualTo(String value) {
            addCriterion("yl_type =", value, "ylType");
            return (Criteria) this;
        }

        public Criteria andYlTypeNotEqualTo(String value) {
            addCriterion("yl_type <>", value, "ylType");
            return (Criteria) this;
        }

        public Criteria andYlTypeGreaterThan(String value) {
            addCriterion("yl_type >", value, "ylType");
            return (Criteria) this;
        }

        public Criteria andYlTypeGreaterThanOrEqualTo(String value) {
            addCriterion("yl_type >=", value, "ylType");
            return (Criteria) this;
        }

        public Criteria andYlTypeLessThan(String value) {
            addCriterion("yl_type <", value, "ylType");
            return (Criteria) this;
        }

        public Criteria andYlTypeLessThanOrEqualTo(String value) {
            addCriterion("yl_type <=", value, "ylType");
            return (Criteria) this;
        }

        public Criteria andYlTypeLike(String value) {
            addCriterion("yl_type like", value, "ylType");
            return (Criteria) this;
        }

        public Criteria andYlTypeNotLike(String value) {
            addCriterion("yl_type not like", value, "ylType");
            return (Criteria) this;
        }

        public Criteria andYlTypeIn(List<String> values) {
            addCriterion("yl_type in", values, "ylType");
            return (Criteria) this;
        }

        public Criteria andYlTypeNotIn(List<String> values) {
            addCriterion("yl_type not in", values, "ylType");
            return (Criteria) this;
        }

        public Criteria andYlTypeBetween(String value1, String value2) {
            addCriterion("yl_type between", value1, value2, "ylType");
            return (Criteria) this;
        }

        public Criteria andYlTypeNotBetween(String value1, String value2) {
            addCriterion("yl_type not between", value1, value2, "ylType");
            return (Criteria) this;
        }
    }

    @entity.query.annotation.Tablename(value="yl_id")
    public static class Criteria extends GeneratedCriteria {

        protected Criteria() {
            super();
        }
    }

    @entity.query.annotation.Tablename(value="yl_id")
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