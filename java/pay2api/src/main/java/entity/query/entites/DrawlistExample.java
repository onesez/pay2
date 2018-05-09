package entity.query.entites;

import java.math.BigDecimal;
import java.util.ArrayList;
import java.util.List;

public class DrawlistExample {
    protected String orderByClause;

    protected boolean distinct;

    protected List<Criteria> oredCriteria;

    public DrawlistExample() {
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

    @entity.query.annotation.Tablename(value="drawlist")
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

        public Criteria andAddtimeIsNull() {
            addCriterion("addtime is null");
            return (Criteria) this;
        }

        public Criteria andAddtimeIsNotNull() {
            addCriterion("addtime is not null");
            return (Criteria) this;
        }

        public Criteria andAddtimeEqualTo(Integer value) {
            addCriterion("addtime =", value, "addtime");
            return (Criteria) this;
        }

        public Criteria andAddtimeNotEqualTo(Integer value) {
            addCriterion("addtime <>", value, "addtime");
            return (Criteria) this;
        }

        public Criteria andAddtimeGreaterThan(Integer value) {
            addCriterion("addtime >", value, "addtime");
            return (Criteria) this;
        }

        public Criteria andAddtimeGreaterThanOrEqualTo(Integer value) {
            addCriterion("addtime >=", value, "addtime");
            return (Criteria) this;
        }

        public Criteria andAddtimeLessThan(Integer value) {
            addCriterion("addtime <", value, "addtime");
            return (Criteria) this;
        }

        public Criteria andAddtimeLessThanOrEqualTo(Integer value) {
            addCriterion("addtime <=", value, "addtime");
            return (Criteria) this;
        }

        public Criteria andAddtimeIn(List<Integer> values) {
            addCriterion("addtime in", values, "addtime");
            return (Criteria) this;
        }

        public Criteria andAddtimeNotIn(List<Integer> values) {
            addCriterion("addtime not in", values, "addtime");
            return (Criteria) this;
        }

        public Criteria andAddtimeBetween(Integer value1, Integer value2) {
            addCriterion("addtime between", value1, value2, "addtime");
            return (Criteria) this;
        }

        public Criteria andAddtimeNotBetween(Integer value1, Integer value2) {
            addCriterion("addtime not between", value1, value2, "addtime");
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

        public Criteria andUserNameIsNull() {
            addCriterion("user_name is null");
            return (Criteria) this;
        }

        public Criteria andUserNameIsNotNull() {
            addCriterion("user_name is not null");
            return (Criteria) this;
        }

        public Criteria andUserNameEqualTo(String value) {
            addCriterion("user_name =", value, "userName");
            return (Criteria) this;
        }

        public Criteria andUserNameNotEqualTo(String value) {
            addCriterion("user_name <>", value, "userName");
            return (Criteria) this;
        }

        public Criteria andUserNameGreaterThan(String value) {
            addCriterion("user_name >", value, "userName");
            return (Criteria) this;
        }

        public Criteria andUserNameGreaterThanOrEqualTo(String value) {
            addCriterion("user_name >=", value, "userName");
            return (Criteria) this;
        }

        public Criteria andUserNameLessThan(String value) {
            addCriterion("user_name <", value, "userName");
            return (Criteria) this;
        }

        public Criteria andUserNameLessThanOrEqualTo(String value) {
            addCriterion("user_name <=", value, "userName");
            return (Criteria) this;
        }

        public Criteria andUserNameLike(String value) {
            addCriterion("user_name like", value, "userName");
            return (Criteria) this;
        }

        public Criteria andUserNameNotLike(String value) {
            addCriterion("user_name not like", value, "userName");
            return (Criteria) this;
        }

        public Criteria andUserNameIn(List<String> values) {
            addCriterion("user_name in", values, "userName");
            return (Criteria) this;
        }

        public Criteria andUserNameNotIn(List<String> values) {
            addCriterion("user_name not in", values, "userName");
            return (Criteria) this;
        }

        public Criteria andUserNameBetween(String value1, String value2) {
            addCriterion("user_name between", value1, value2, "userName");
            return (Criteria) this;
        }

        public Criteria andUserNameNotBetween(String value1, String value2) {
            addCriterion("user_name not between", value1, value2, "userName");
            return (Criteria) this;
        }

        public Criteria andMobileIsNull() {
            addCriterion("mobile is null");
            return (Criteria) this;
        }

        public Criteria andMobileIsNotNull() {
            addCriterion("mobile is not null");
            return (Criteria) this;
        }

        public Criteria andMobileEqualTo(String value) {
            addCriterion("mobile =", value, "mobile");
            return (Criteria) this;
        }

        public Criteria andMobileNotEqualTo(String value) {
            addCriterion("mobile <>", value, "mobile");
            return (Criteria) this;
        }

        public Criteria andMobileGreaterThan(String value) {
            addCriterion("mobile >", value, "mobile");
            return (Criteria) this;
        }

        public Criteria andMobileGreaterThanOrEqualTo(String value) {
            addCriterion("mobile >=", value, "mobile");
            return (Criteria) this;
        }

        public Criteria andMobileLessThan(String value) {
            addCriterion("mobile <", value, "mobile");
            return (Criteria) this;
        }

        public Criteria andMobileLessThanOrEqualTo(String value) {
            addCriterion("mobile <=", value, "mobile");
            return (Criteria) this;
        }

        public Criteria andMobileLike(String value) {
            addCriterion("mobile like", value, "mobile");
            return (Criteria) this;
        }

        public Criteria andMobileNotLike(String value) {
            addCriterion("mobile not like", value, "mobile");
            return (Criteria) this;
        }

        public Criteria andMobileIn(List<String> values) {
            addCriterion("mobile in", values, "mobile");
            return (Criteria) this;
        }

        public Criteria andMobileNotIn(List<String> values) {
            addCriterion("mobile not in", values, "mobile");
            return (Criteria) this;
        }

        public Criteria andMobileBetween(String value1, String value2) {
            addCriterion("mobile between", value1, value2, "mobile");
            return (Criteria) this;
        }

        public Criteria andMobileNotBetween(String value1, String value2) {
            addCriterion("mobile not between", value1, value2, "mobile");
            return (Criteria) this;
        }

        public Criteria andBankAccountIsNull() {
            addCriterion("bank_account is null");
            return (Criteria) this;
        }

        public Criteria andBankAccountIsNotNull() {
            addCriterion("bank_account is not null");
            return (Criteria) this;
        }

        public Criteria andBankAccountEqualTo(String value) {
            addCriterion("bank_account =", value, "bankAccount");
            return (Criteria) this;
        }

        public Criteria andBankAccountNotEqualTo(String value) {
            addCriterion("bank_account <>", value, "bankAccount");
            return (Criteria) this;
        }

        public Criteria andBankAccountGreaterThan(String value) {
            addCriterion("bank_account >", value, "bankAccount");
            return (Criteria) this;
        }

        public Criteria andBankAccountGreaterThanOrEqualTo(String value) {
            addCriterion("bank_account >=", value, "bankAccount");
            return (Criteria) this;
        }

        public Criteria andBankAccountLessThan(String value) {
            addCriterion("bank_account <", value, "bankAccount");
            return (Criteria) this;
        }

        public Criteria andBankAccountLessThanOrEqualTo(String value) {
            addCriterion("bank_account <=", value, "bankAccount");
            return (Criteria) this;
        }

        public Criteria andBankAccountLike(String value) {
            addCriterion("bank_account like", value, "bankAccount");
            return (Criteria) this;
        }

        public Criteria andBankAccountNotLike(String value) {
            addCriterion("bank_account not like", value, "bankAccount");
            return (Criteria) this;
        }

        public Criteria andBankAccountIn(List<String> values) {
            addCriterion("bank_account in", values, "bankAccount");
            return (Criteria) this;
        }

        public Criteria andBankAccountNotIn(List<String> values) {
            addCriterion("bank_account not in", values, "bankAccount");
            return (Criteria) this;
        }

        public Criteria andBankAccountBetween(String value1, String value2) {
            addCriterion("bank_account between", value1, value2, "bankAccount");
            return (Criteria) this;
        }

        public Criteria andBankAccountNotBetween(String value1, String value2) {
            addCriterion("bank_account not between", value1, value2, "bankAccount");
            return (Criteria) this;
        }

        public Criteria andBankIsNull() {
            addCriterion("bank is null");
            return (Criteria) this;
        }

        public Criteria andBankIsNotNull() {
            addCriterion("bank is not null");
            return (Criteria) this;
        }

        public Criteria andBankEqualTo(String value) {
            addCriterion("bank =", value, "bank");
            return (Criteria) this;
        }

        public Criteria andBankNotEqualTo(String value) {
            addCriterion("bank <>", value, "bank");
            return (Criteria) this;
        }

        public Criteria andBankGreaterThan(String value) {
            addCriterion("bank >", value, "bank");
            return (Criteria) this;
        }

        public Criteria andBankGreaterThanOrEqualTo(String value) {
            addCriterion("bank >=", value, "bank");
            return (Criteria) this;
        }

        public Criteria andBankLessThan(String value) {
            addCriterion("bank <", value, "bank");
            return (Criteria) this;
        }

        public Criteria andBankLessThanOrEqualTo(String value) {
            addCriterion("bank <=", value, "bank");
            return (Criteria) this;
        }

        public Criteria andBankLike(String value) {
            addCriterion("bank like", value, "bank");
            return (Criteria) this;
        }

        public Criteria andBankNotLike(String value) {
            addCriterion("bank not like", value, "bank");
            return (Criteria) this;
        }

        public Criteria andBankIn(List<String> values) {
            addCriterion("bank in", values, "bank");
            return (Criteria) this;
        }

        public Criteria andBankNotIn(List<String> values) {
            addCriterion("bank not in", values, "bank");
            return (Criteria) this;
        }

        public Criteria andBankBetween(String value1, String value2) {
            addCriterion("bank between", value1, value2, "bank");
            return (Criteria) this;
        }

        public Criteria andBankNotBetween(String value1, String value2) {
            addCriterion("bank not between", value1, value2, "bank");
            return (Criteria) this;
        }

        public Criteria andBankCardNumIsNull() {
            addCriterion("bank_card_num is null");
            return (Criteria) this;
        }

        public Criteria andBankCardNumIsNotNull() {
            addCriterion("bank_card_num is not null");
            return (Criteria) this;
        }

        public Criteria andBankCardNumEqualTo(String value) {
            addCriterion("bank_card_num =", value, "bankCardNum");
            return (Criteria) this;
        }

        public Criteria andBankCardNumNotEqualTo(String value) {
            addCriterion("bank_card_num <>", value, "bankCardNum");
            return (Criteria) this;
        }

        public Criteria andBankCardNumGreaterThan(String value) {
            addCriterion("bank_card_num >", value, "bankCardNum");
            return (Criteria) this;
        }

        public Criteria andBankCardNumGreaterThanOrEqualTo(String value) {
            addCriterion("bank_card_num >=", value, "bankCardNum");
            return (Criteria) this;
        }

        public Criteria andBankCardNumLessThan(String value) {
            addCriterion("bank_card_num <", value, "bankCardNum");
            return (Criteria) this;
        }

        public Criteria andBankCardNumLessThanOrEqualTo(String value) {
            addCriterion("bank_card_num <=", value, "bankCardNum");
            return (Criteria) this;
        }

        public Criteria andBankCardNumLike(String value) {
            addCriterion("bank_card_num like", value, "bankCardNum");
            return (Criteria) this;
        }

        public Criteria andBankCardNumNotLike(String value) {
            addCriterion("bank_card_num not like", value, "bankCardNum");
            return (Criteria) this;
        }

        public Criteria andBankCardNumIn(List<String> values) {
            addCriterion("bank_card_num in", values, "bankCardNum");
            return (Criteria) this;
        }

        public Criteria andBankCardNumNotIn(List<String> values) {
            addCriterion("bank_card_num not in", values, "bankCardNum");
            return (Criteria) this;
        }

        public Criteria andBankCardNumBetween(String value1, String value2) {
            addCriterion("bank_card_num between", value1, value2, "bankCardNum");
            return (Criteria) this;
        }

        public Criteria andBankCardNumNotBetween(String value1, String value2) {
            addCriterion("bank_card_num not between", value1, value2, "bankCardNum");
            return (Criteria) this;
        }

        public Criteria andAmountIsNull() {
            addCriterion("amount is null");
            return (Criteria) this;
        }

        public Criteria andAmountIsNotNull() {
            addCriterion("amount is not null");
            return (Criteria) this;
        }

        public Criteria andAmountEqualTo(BigDecimal value) {
            addCriterion("amount =", value, "amount");
            return (Criteria) this;
        }

        public Criteria andAmountNotEqualTo(BigDecimal value) {
            addCriterion("amount <>", value, "amount");
            return (Criteria) this;
        }

        public Criteria andAmountGreaterThan(BigDecimal value) {
            addCriterion("amount >", value, "amount");
            return (Criteria) this;
        }

        public Criteria andAmountGreaterThanOrEqualTo(BigDecimal value) {
            addCriterion("amount >=", value, "amount");
            return (Criteria) this;
        }

        public Criteria andAmountLessThan(BigDecimal value) {
            addCriterion("amount <", value, "amount");
            return (Criteria) this;
        }

        public Criteria andAmountLessThanOrEqualTo(BigDecimal value) {
            addCriterion("amount <=", value, "amount");
            return (Criteria) this;
        }

        public Criteria andAmountIn(List<BigDecimal> values) {
            addCriterion("amount in", values, "amount");
            return (Criteria) this;
        }

        public Criteria andAmountNotIn(List<BigDecimal> values) {
            addCriterion("amount not in", values, "amount");
            return (Criteria) this;
        }

        public Criteria andAmountBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("amount between", value1, value2, "amount");
            return (Criteria) this;
        }

        public Criteria andAmountNotBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("amount not between", value1, value2, "amount");
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

        public Criteria andStatusEqualTo(String value) {
            addCriterion("status =", value, "status");
            return (Criteria) this;
        }

        public Criteria andStatusNotEqualTo(String value) {
            addCriterion("status <>", value, "status");
            return (Criteria) this;
        }

        public Criteria andStatusGreaterThan(String value) {
            addCriterion("status >", value, "status");
            return (Criteria) this;
        }

        public Criteria andStatusGreaterThanOrEqualTo(String value) {
            addCriterion("status >=", value, "status");
            return (Criteria) this;
        }

        public Criteria andStatusLessThan(String value) {
            addCriterion("status <", value, "status");
            return (Criteria) this;
        }

        public Criteria andStatusLessThanOrEqualTo(String value) {
            addCriterion("status <=", value, "status");
            return (Criteria) this;
        }

        public Criteria andStatusLike(String value) {
            addCriterion("status like", value, "status");
            return (Criteria) this;
        }

        public Criteria andStatusNotLike(String value) {
            addCriterion("status not like", value, "status");
            return (Criteria) this;
        }

        public Criteria andStatusIn(List<String> values) {
            addCriterion("status in", values, "status");
            return (Criteria) this;
        }

        public Criteria andStatusNotIn(List<String> values) {
            addCriterion("status not in", values, "status");
            return (Criteria) this;
        }

        public Criteria andStatusBetween(String value1, String value2) {
            addCriterion("status between", value1, value2, "status");
            return (Criteria) this;
        }

        public Criteria andStatusNotBetween(String value1, String value2) {
            addCriterion("status not between", value1, value2, "status");
            return (Criteria) this;
        }

        public Criteria andReasonIsNull() {
            addCriterion("reason is null");
            return (Criteria) this;
        }

        public Criteria andReasonIsNotNull() {
            addCriterion("reason is not null");
            return (Criteria) this;
        }

        public Criteria andReasonEqualTo(String value) {
            addCriterion("reason =", value, "reason");
            return (Criteria) this;
        }

        public Criteria andReasonNotEqualTo(String value) {
            addCriterion("reason <>", value, "reason");
            return (Criteria) this;
        }

        public Criteria andReasonGreaterThan(String value) {
            addCriterion("reason >", value, "reason");
            return (Criteria) this;
        }

        public Criteria andReasonGreaterThanOrEqualTo(String value) {
            addCriterion("reason >=", value, "reason");
            return (Criteria) this;
        }

        public Criteria andReasonLessThan(String value) {
            addCriterion("reason <", value, "reason");
            return (Criteria) this;
        }

        public Criteria andReasonLessThanOrEqualTo(String value) {
            addCriterion("reason <=", value, "reason");
            return (Criteria) this;
        }

        public Criteria andReasonLike(String value) {
            addCriterion("reason like", value, "reason");
            return (Criteria) this;
        }

        public Criteria andReasonNotLike(String value) {
            addCriterion("reason not like", value, "reason");
            return (Criteria) this;
        }

        public Criteria andReasonIn(List<String> values) {
            addCriterion("reason in", values, "reason");
            return (Criteria) this;
        }

        public Criteria andReasonNotIn(List<String> values) {
            addCriterion("reason not in", values, "reason");
            return (Criteria) this;
        }

        public Criteria andReasonBetween(String value1, String value2) {
            addCriterion("reason between", value1, value2, "reason");
            return (Criteria) this;
        }

        public Criteria andReasonNotBetween(String value1, String value2) {
            addCriterion("reason not between", value1, value2, "reason");
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

        public Criteria andBatchOrderNumIsNull() {
            addCriterion("batch_order_num is null");
            return (Criteria) this;
        }

        public Criteria andBatchOrderNumIsNotNull() {
            addCriterion("batch_order_num is not null");
            return (Criteria) this;
        }

        public Criteria andBatchOrderNumEqualTo(String value) {
            addCriterion("batch_order_num =", value, "batchOrderNum");
            return (Criteria) this;
        }

        public Criteria andBatchOrderNumNotEqualTo(String value) {
            addCriterion("batch_order_num <>", value, "batchOrderNum");
            return (Criteria) this;
        }

        public Criteria andBatchOrderNumGreaterThan(String value) {
            addCriterion("batch_order_num >", value, "batchOrderNum");
            return (Criteria) this;
        }

        public Criteria andBatchOrderNumGreaterThanOrEqualTo(String value) {
            addCriterion("batch_order_num >=", value, "batchOrderNum");
            return (Criteria) this;
        }

        public Criteria andBatchOrderNumLessThan(String value) {
            addCriterion("batch_order_num <", value, "batchOrderNum");
            return (Criteria) this;
        }

        public Criteria andBatchOrderNumLessThanOrEqualTo(String value) {
            addCriterion("batch_order_num <=", value, "batchOrderNum");
            return (Criteria) this;
        }

        public Criteria andBatchOrderNumLike(String value) {
            addCriterion("batch_order_num like", value, "batchOrderNum");
            return (Criteria) this;
        }

        public Criteria andBatchOrderNumNotLike(String value) {
            addCriterion("batch_order_num not like", value, "batchOrderNum");
            return (Criteria) this;
        }

        public Criteria andBatchOrderNumIn(List<String> values) {
            addCriterion("batch_order_num in", values, "batchOrderNum");
            return (Criteria) this;
        }

        public Criteria andBatchOrderNumNotIn(List<String> values) {
            addCriterion("batch_order_num not in", values, "batchOrderNum");
            return (Criteria) this;
        }

        public Criteria andBatchOrderNumBetween(String value1, String value2) {
            addCriterion("batch_order_num between", value1, value2, "batchOrderNum");
            return (Criteria) this;
        }

        public Criteria andBatchOrderNumNotBetween(String value1, String value2) {
            addCriterion("batch_order_num not between", value1, value2, "batchOrderNum");
            return (Criteria) this;
        }

        public Criteria andOrderIdIsNull() {
            addCriterion("order_id is null");
            return (Criteria) this;
        }

        public Criteria andOrderIdIsNotNull() {
            addCriterion("order_id is not null");
            return (Criteria) this;
        }

        public Criteria andOrderIdEqualTo(Integer value) {
            addCriterion("order_id =", value, "orderId");
            return (Criteria) this;
        }

        public Criteria andOrderIdNotEqualTo(Integer value) {
            addCriterion("order_id <>", value, "orderId");
            return (Criteria) this;
        }

        public Criteria andOrderIdGreaterThan(Integer value) {
            addCriterion("order_id >", value, "orderId");
            return (Criteria) this;
        }

        public Criteria andOrderIdGreaterThanOrEqualTo(Integer value) {
            addCriterion("order_id >=", value, "orderId");
            return (Criteria) this;
        }

        public Criteria andOrderIdLessThan(Integer value) {
            addCriterion("order_id <", value, "orderId");
            return (Criteria) this;
        }

        public Criteria andOrderIdLessThanOrEqualTo(Integer value) {
            addCriterion("order_id <=", value, "orderId");
            return (Criteria) this;
        }

        public Criteria andOrderIdIn(List<Integer> values) {
            addCriterion("order_id in", values, "orderId");
            return (Criteria) this;
        }

        public Criteria andOrderIdNotIn(List<Integer> values) {
            addCriterion("order_id not in", values, "orderId");
            return (Criteria) this;
        }

        public Criteria andOrderIdBetween(Integer value1, Integer value2) {
            addCriterion("order_id between", value1, value2, "orderId");
            return (Criteria) this;
        }

        public Criteria andOrderIdNotBetween(Integer value1, Integer value2) {
            addCriterion("order_id not between", value1, value2, "orderId");
            return (Criteria) this;
        }

        public Criteria andPlatformOrderNumIsNull() {
            addCriterion("platform_order_num is null");
            return (Criteria) this;
        }

        public Criteria andPlatformOrderNumIsNotNull() {
            addCriterion("platform_order_num is not null");
            return (Criteria) this;
        }

        public Criteria andPlatformOrderNumEqualTo(String value) {
            addCriterion("platform_order_num =", value, "platformOrderNum");
            return (Criteria) this;
        }

        public Criteria andPlatformOrderNumNotEqualTo(String value) {
            addCriterion("platform_order_num <>", value, "platformOrderNum");
            return (Criteria) this;
        }

        public Criteria andPlatformOrderNumGreaterThan(String value) {
            addCriterion("platform_order_num >", value, "platformOrderNum");
            return (Criteria) this;
        }

        public Criteria andPlatformOrderNumGreaterThanOrEqualTo(String value) {
            addCriterion("platform_order_num >=", value, "platformOrderNum");
            return (Criteria) this;
        }

        public Criteria andPlatformOrderNumLessThan(String value) {
            addCriterion("platform_order_num <", value, "platformOrderNum");
            return (Criteria) this;
        }

        public Criteria andPlatformOrderNumLessThanOrEqualTo(String value) {
            addCriterion("platform_order_num <=", value, "platformOrderNum");
            return (Criteria) this;
        }

        public Criteria andPlatformOrderNumLike(String value) {
            addCriterion("platform_order_num like", value, "platformOrderNum");
            return (Criteria) this;
        }

        public Criteria andPlatformOrderNumNotLike(String value) {
            addCriterion("platform_order_num not like", value, "platformOrderNum");
            return (Criteria) this;
        }

        public Criteria andPlatformOrderNumIn(List<String> values) {
            addCriterion("platform_order_num in", values, "platformOrderNum");
            return (Criteria) this;
        }

        public Criteria andPlatformOrderNumNotIn(List<String> values) {
            addCriterion("platform_order_num not in", values, "platformOrderNum");
            return (Criteria) this;
        }

        public Criteria andPlatformOrderNumBetween(String value1, String value2) {
            addCriterion("platform_order_num between", value1, value2, "platformOrderNum");
            return (Criteria) this;
        }

        public Criteria andPlatformOrderNumNotBetween(String value1, String value2) {
            addCriterion("platform_order_num not between", value1, value2, "platformOrderNum");
            return (Criteria) this;
        }

        public Criteria andPlatformIsNull() {
            addCriterion("platform is null");
            return (Criteria) this;
        }

        public Criteria andPlatformIsNotNull() {
            addCriterion("platform is not null");
            return (Criteria) this;
        }

        public Criteria andPlatformEqualTo(String value) {
            addCriterion("platform =", value, "platform");
            return (Criteria) this;
        }

        public Criteria andPlatformNotEqualTo(String value) {
            addCriterion("platform <>", value, "platform");
            return (Criteria) this;
        }

        public Criteria andPlatformGreaterThan(String value) {
            addCriterion("platform >", value, "platform");
            return (Criteria) this;
        }

        public Criteria andPlatformGreaterThanOrEqualTo(String value) {
            addCriterion("platform >=", value, "platform");
            return (Criteria) this;
        }

        public Criteria andPlatformLessThan(String value) {
            addCriterion("platform <", value, "platform");
            return (Criteria) this;
        }

        public Criteria andPlatformLessThanOrEqualTo(String value) {
            addCriterion("platform <=", value, "platform");
            return (Criteria) this;
        }

        public Criteria andPlatformLike(String value) {
            addCriterion("platform like", value, "platform");
            return (Criteria) this;
        }

        public Criteria andPlatformNotLike(String value) {
            addCriterion("platform not like", value, "platform");
            return (Criteria) this;
        }

        public Criteria andPlatformIn(List<String> values) {
            addCriterion("platform in", values, "platform");
            return (Criteria) this;
        }

        public Criteria andPlatformNotIn(List<String> values) {
            addCriterion("platform not in", values, "platform");
            return (Criteria) this;
        }

        public Criteria andPlatformBetween(String value1, String value2) {
            addCriterion("platform between", value1, value2, "platform");
            return (Criteria) this;
        }

        public Criteria andPlatformNotBetween(String value1, String value2) {
            addCriterion("platform not between", value1, value2, "platform");
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

        public Criteria andSuccessStateIsNull() {
            addCriterion("success_state is null");
            return (Criteria) this;
        }

        public Criteria andSuccessStateIsNotNull() {
            addCriterion("success_state is not null");
            return (Criteria) this;
        }

        public Criteria andSuccessStateEqualTo(String value) {
            addCriterion("success_state =", value, "successState");
            return (Criteria) this;
        }

        public Criteria andSuccessStateNotEqualTo(String value) {
            addCriterion("success_state <>", value, "successState");
            return (Criteria) this;
        }

        public Criteria andSuccessStateGreaterThan(String value) {
            addCriterion("success_state >", value, "successState");
            return (Criteria) this;
        }

        public Criteria andSuccessStateGreaterThanOrEqualTo(String value) {
            addCriterion("success_state >=", value, "successState");
            return (Criteria) this;
        }

        public Criteria andSuccessStateLessThan(String value) {
            addCriterion("success_state <", value, "successState");
            return (Criteria) this;
        }

        public Criteria andSuccessStateLessThanOrEqualTo(String value) {
            addCriterion("success_state <=", value, "successState");
            return (Criteria) this;
        }

        public Criteria andSuccessStateLike(String value) {
            addCriterion("success_state like", value, "successState");
            return (Criteria) this;
        }

        public Criteria andSuccessStateNotLike(String value) {
            addCriterion("success_state not like", value, "successState");
            return (Criteria) this;
        }

        public Criteria andSuccessStateIn(List<String> values) {
            addCriterion("success_state in", values, "successState");
            return (Criteria) this;
        }

        public Criteria andSuccessStateNotIn(List<String> values) {
            addCriterion("success_state not in", values, "successState");
            return (Criteria) this;
        }

        public Criteria andSuccessStateBetween(String value1, String value2) {
            addCriterion("success_state between", value1, value2, "successState");
            return (Criteria) this;
        }

        public Criteria andSuccessStateNotBetween(String value1, String value2) {
            addCriterion("success_state not between", value1, value2, "successState");
            return (Criteria) this;
        }

        public Criteria andSuccessResultIsNull() {
            addCriterion("success_result is null");
            return (Criteria) this;
        }

        public Criteria andSuccessResultIsNotNull() {
            addCriterion("success_result is not null");
            return (Criteria) this;
        }

        public Criteria andSuccessResultEqualTo(String value) {
            addCriterion("success_result =", value, "successResult");
            return (Criteria) this;
        }

        public Criteria andSuccessResultNotEqualTo(String value) {
            addCriterion("success_result <>", value, "successResult");
            return (Criteria) this;
        }

        public Criteria andSuccessResultGreaterThan(String value) {
            addCriterion("success_result >", value, "successResult");
            return (Criteria) this;
        }

        public Criteria andSuccessResultGreaterThanOrEqualTo(String value) {
            addCriterion("success_result >=", value, "successResult");
            return (Criteria) this;
        }

        public Criteria andSuccessResultLessThan(String value) {
            addCriterion("success_result <", value, "successResult");
            return (Criteria) this;
        }

        public Criteria andSuccessResultLessThanOrEqualTo(String value) {
            addCriterion("success_result <=", value, "successResult");
            return (Criteria) this;
        }

        public Criteria andSuccessResultLike(String value) {
            addCriterion("success_result like", value, "successResult");
            return (Criteria) this;
        }

        public Criteria andSuccessResultNotLike(String value) {
            addCriterion("success_result not like", value, "successResult");
            return (Criteria) this;
        }

        public Criteria andSuccessResultIn(List<String> values) {
            addCriterion("success_result in", values, "successResult");
            return (Criteria) this;
        }

        public Criteria andSuccessResultNotIn(List<String> values) {
            addCriterion("success_result not in", values, "successResult");
            return (Criteria) this;
        }

        public Criteria andSuccessResultBetween(String value1, String value2) {
            addCriterion("success_result between", value1, value2, "successResult");
            return (Criteria) this;
        }

        public Criteria andSuccessResultNotBetween(String value1, String value2) {
            addCriterion("success_result not between", value1, value2, "successResult");
            return (Criteria) this;
        }

        public Criteria andFailStateIsNull() {
            addCriterion("fail_state is null");
            return (Criteria) this;
        }

        public Criteria andFailStateIsNotNull() {
            addCriterion("fail_state is not null");
            return (Criteria) this;
        }

        public Criteria andFailStateEqualTo(Short value) {
            addCriterion("fail_state =", value, "failState");
            return (Criteria) this;
        }

        public Criteria andFailStateNotEqualTo(Short value) {
            addCriterion("fail_state <>", value, "failState");
            return (Criteria) this;
        }

        public Criteria andFailStateGreaterThan(Short value) {
            addCriterion("fail_state >", value, "failState");
            return (Criteria) this;
        }

        public Criteria andFailStateGreaterThanOrEqualTo(Short value) {
            addCriterion("fail_state >=", value, "failState");
            return (Criteria) this;
        }

        public Criteria andFailStateLessThan(Short value) {
            addCriterion("fail_state <", value, "failState");
            return (Criteria) this;
        }

        public Criteria andFailStateLessThanOrEqualTo(Short value) {
            addCriterion("fail_state <=", value, "failState");
            return (Criteria) this;
        }

        public Criteria andFailStateIn(List<Short> values) {
            addCriterion("fail_state in", values, "failState");
            return (Criteria) this;
        }

        public Criteria andFailStateNotIn(List<Short> values) {
            addCriterion("fail_state not in", values, "failState");
            return (Criteria) this;
        }

        public Criteria andFailStateBetween(Short value1, Short value2) {
            addCriterion("fail_state between", value1, value2, "failState");
            return (Criteria) this;
        }

        public Criteria andFailStateNotBetween(Short value1, Short value2) {
            addCriterion("fail_state not between", value1, value2, "failState");
            return (Criteria) this;
        }

        public Criteria andFailAmountIsNull() {
            addCriterion("fail_amount is null");
            return (Criteria) this;
        }

        public Criteria andFailAmountIsNotNull() {
            addCriterion("fail_amount is not null");
            return (Criteria) this;
        }

        public Criteria andFailAmountEqualTo(BigDecimal value) {
            addCriterion("fail_amount =", value, "failAmount");
            return (Criteria) this;
        }

        public Criteria andFailAmountNotEqualTo(BigDecimal value) {
            addCriterion("fail_amount <>", value, "failAmount");
            return (Criteria) this;
        }

        public Criteria andFailAmountGreaterThan(BigDecimal value) {
            addCriterion("fail_amount >", value, "failAmount");
            return (Criteria) this;
        }

        public Criteria andFailAmountGreaterThanOrEqualTo(BigDecimal value) {
            addCriterion("fail_amount >=", value, "failAmount");
            return (Criteria) this;
        }

        public Criteria andFailAmountLessThan(BigDecimal value) {
            addCriterion("fail_amount <", value, "failAmount");
            return (Criteria) this;
        }

        public Criteria andFailAmountLessThanOrEqualTo(BigDecimal value) {
            addCriterion("fail_amount <=", value, "failAmount");
            return (Criteria) this;
        }

        public Criteria andFailAmountIn(List<BigDecimal> values) {
            addCriterion("fail_amount in", values, "failAmount");
            return (Criteria) this;
        }

        public Criteria andFailAmountNotIn(List<BigDecimal> values) {
            addCriterion("fail_amount not in", values, "failAmount");
            return (Criteria) this;
        }

        public Criteria andFailAmountBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("fail_amount between", value1, value2, "failAmount");
            return (Criteria) this;
        }

        public Criteria andFailAmountNotBetween(BigDecimal value1, BigDecimal value2) {
            addCriterion("fail_amount not between", value1, value2, "failAmount");
            return (Criteria) this;
        }

        public Criteria andRemarkIsNull() {
            addCriterion("remark is null");
            return (Criteria) this;
        }

        public Criteria andRemarkIsNotNull() {
            addCriterion("remark is not null");
            return (Criteria) this;
        }

        public Criteria andRemarkEqualTo(String value) {
            addCriterion("remark =", value, "remark");
            return (Criteria) this;
        }

        public Criteria andRemarkNotEqualTo(String value) {
            addCriterion("remark <>", value, "remark");
            return (Criteria) this;
        }

        public Criteria andRemarkGreaterThan(String value) {
            addCriterion("remark >", value, "remark");
            return (Criteria) this;
        }

        public Criteria andRemarkGreaterThanOrEqualTo(String value) {
            addCriterion("remark >=", value, "remark");
            return (Criteria) this;
        }

        public Criteria andRemarkLessThan(String value) {
            addCriterion("remark <", value, "remark");
            return (Criteria) this;
        }

        public Criteria andRemarkLessThanOrEqualTo(String value) {
            addCriterion("remark <=", value, "remark");
            return (Criteria) this;
        }

        public Criteria andRemarkLike(String value) {
            addCriterion("remark like", value, "remark");
            return (Criteria) this;
        }

        public Criteria andRemarkNotLike(String value) {
            addCriterion("remark not like", value, "remark");
            return (Criteria) this;
        }

        public Criteria andRemarkIn(List<String> values) {
            addCriterion("remark in", values, "remark");
            return (Criteria) this;
        }

        public Criteria andRemarkNotIn(List<String> values) {
            addCriterion("remark not in", values, "remark");
            return (Criteria) this;
        }

        public Criteria andRemarkBetween(String value1, String value2) {
            addCriterion("remark between", value1, value2, "remark");
            return (Criteria) this;
        }

        public Criteria andRemarkNotBetween(String value1, String value2) {
            addCriterion("remark not between", value1, value2, "remark");
            return (Criteria) this;
        }
    }

    @entity.query.annotation.Tablename(value="drawlist")
    public static class Criteria extends GeneratedCriteria {

        protected Criteria() {
            super();
        }
    }

    @entity.query.annotation.Tablename(value="drawlist")
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