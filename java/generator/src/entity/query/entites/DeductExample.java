package entity.query.entites;

import java.util.ArrayList;
import java.util.List;

public class DeductExample {
    protected String orderByClause;

    protected boolean distinct;

    protected List<Criteria> oredCriteria;

    public DeductExample() {
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

    @entity.query.annotation.Tablename(value="deduct")
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

        public Criteria andAmountIsNull() {
            addCriterion("amount is null");
            return (Criteria) this;
        }

        public Criteria andAmountIsNotNull() {
            addCriterion("amount is not null");
            return (Criteria) this;
        }

        public Criteria andAmountEqualTo(String value) {
            addCriterion("amount =", value, "amount");
            return (Criteria) this;
        }

        public Criteria andAmountNotEqualTo(String value) {
            addCriterion("amount <>", value, "amount");
            return (Criteria) this;
        }

        public Criteria andAmountGreaterThan(String value) {
            addCriterion("amount >", value, "amount");
            return (Criteria) this;
        }

        public Criteria andAmountGreaterThanOrEqualTo(String value) {
            addCriterion("amount >=", value, "amount");
            return (Criteria) this;
        }

        public Criteria andAmountLessThan(String value) {
            addCriterion("amount <", value, "amount");
            return (Criteria) this;
        }

        public Criteria andAmountLessThanOrEqualTo(String value) {
            addCriterion("amount <=", value, "amount");
            return (Criteria) this;
        }

        public Criteria andAmountLike(String value) {
            addCriterion("amount like", value, "amount");
            return (Criteria) this;
        }

        public Criteria andAmountNotLike(String value) {
            addCriterion("amount not like", value, "amount");
            return (Criteria) this;
        }

        public Criteria andAmountIn(List<String> values) {
            addCriterion("amount in", values, "amount");
            return (Criteria) this;
        }

        public Criteria andAmountNotIn(List<String> values) {
            addCriterion("amount not in", values, "amount");
            return (Criteria) this;
        }

        public Criteria andAmountBetween(String value1, String value2) {
            addCriterion("amount between", value1, value2, "amount");
            return (Criteria) this;
        }

        public Criteria andAmountNotBetween(String value1, String value2) {
            addCriterion("amount not between", value1, value2, "amount");
            return (Criteria) this;
        }

        public Criteria andPaymentNameIsNull() {
            addCriterion("payment_name is null");
            return (Criteria) this;
        }

        public Criteria andPaymentNameIsNotNull() {
            addCriterion("payment_name is not null");
            return (Criteria) this;
        }

        public Criteria andPaymentNameEqualTo(String value) {
            addCriterion("payment_name =", value, "paymentName");
            return (Criteria) this;
        }

        public Criteria andPaymentNameNotEqualTo(String value) {
            addCriterion("payment_name <>", value, "paymentName");
            return (Criteria) this;
        }

        public Criteria andPaymentNameGreaterThan(String value) {
            addCriterion("payment_name >", value, "paymentName");
            return (Criteria) this;
        }

        public Criteria andPaymentNameGreaterThanOrEqualTo(String value) {
            addCriterion("payment_name >=", value, "paymentName");
            return (Criteria) this;
        }

        public Criteria andPaymentNameLessThan(String value) {
            addCriterion("payment_name <", value, "paymentName");
            return (Criteria) this;
        }

        public Criteria andPaymentNameLessThanOrEqualTo(String value) {
            addCriterion("payment_name <=", value, "paymentName");
            return (Criteria) this;
        }

        public Criteria andPaymentNameLike(String value) {
            addCriterion("payment_name like", value, "paymentName");
            return (Criteria) this;
        }

        public Criteria andPaymentNameNotLike(String value) {
            addCriterion("payment_name not like", value, "paymentName");
            return (Criteria) this;
        }

        public Criteria andPaymentNameIn(List<String> values) {
            addCriterion("payment_name in", values, "paymentName");
            return (Criteria) this;
        }

        public Criteria andPaymentNameNotIn(List<String> values) {
            addCriterion("payment_name not in", values, "paymentName");
            return (Criteria) this;
        }

        public Criteria andPaymentNameBetween(String value1, String value2) {
            addCriterion("payment_name between", value1, value2, "paymentName");
            return (Criteria) this;
        }

        public Criteria andPaymentNameNotBetween(String value1, String value2) {
            addCriterion("payment_name not between", value1, value2, "paymentName");
            return (Criteria) this;
        }

        public Criteria andPaymentMobileIsNull() {
            addCriterion("payment_mobile is null");
            return (Criteria) this;
        }

        public Criteria andPaymentMobileIsNotNull() {
            addCriterion("payment_mobile is not null");
            return (Criteria) this;
        }

        public Criteria andPaymentMobileEqualTo(String value) {
            addCriterion("payment_mobile =", value, "paymentMobile");
            return (Criteria) this;
        }

        public Criteria andPaymentMobileNotEqualTo(String value) {
            addCriterion("payment_mobile <>", value, "paymentMobile");
            return (Criteria) this;
        }

        public Criteria andPaymentMobileGreaterThan(String value) {
            addCriterion("payment_mobile >", value, "paymentMobile");
            return (Criteria) this;
        }

        public Criteria andPaymentMobileGreaterThanOrEqualTo(String value) {
            addCriterion("payment_mobile >=", value, "paymentMobile");
            return (Criteria) this;
        }

        public Criteria andPaymentMobileLessThan(String value) {
            addCriterion("payment_mobile <", value, "paymentMobile");
            return (Criteria) this;
        }

        public Criteria andPaymentMobileLessThanOrEqualTo(String value) {
            addCriterion("payment_mobile <=", value, "paymentMobile");
            return (Criteria) this;
        }

        public Criteria andPaymentMobileLike(String value) {
            addCriterion("payment_mobile like", value, "paymentMobile");
            return (Criteria) this;
        }

        public Criteria andPaymentMobileNotLike(String value) {
            addCriterion("payment_mobile not like", value, "paymentMobile");
            return (Criteria) this;
        }

        public Criteria andPaymentMobileIn(List<String> values) {
            addCriterion("payment_mobile in", values, "paymentMobile");
            return (Criteria) this;
        }

        public Criteria andPaymentMobileNotIn(List<String> values) {
            addCriterion("payment_mobile not in", values, "paymentMobile");
            return (Criteria) this;
        }

        public Criteria andPaymentMobileBetween(String value1, String value2) {
            addCriterion("payment_mobile between", value1, value2, "paymentMobile");
            return (Criteria) this;
        }

        public Criteria andPaymentMobileNotBetween(String value1, String value2) {
            addCriterion("payment_mobile not between", value1, value2, "paymentMobile");
            return (Criteria) this;
        }

        public Criteria andPaymentIdCardIsNull() {
            addCriterion("payment_id_card is null");
            return (Criteria) this;
        }

        public Criteria andPaymentIdCardIsNotNull() {
            addCriterion("payment_id_card is not null");
            return (Criteria) this;
        }

        public Criteria andPaymentIdCardEqualTo(String value) {
            addCriterion("payment_id_card =", value, "paymentIdCard");
            return (Criteria) this;
        }

        public Criteria andPaymentIdCardNotEqualTo(String value) {
            addCriterion("payment_id_card <>", value, "paymentIdCard");
            return (Criteria) this;
        }

        public Criteria andPaymentIdCardGreaterThan(String value) {
            addCriterion("payment_id_card >", value, "paymentIdCard");
            return (Criteria) this;
        }

        public Criteria andPaymentIdCardGreaterThanOrEqualTo(String value) {
            addCriterion("payment_id_card >=", value, "paymentIdCard");
            return (Criteria) this;
        }

        public Criteria andPaymentIdCardLessThan(String value) {
            addCriterion("payment_id_card <", value, "paymentIdCard");
            return (Criteria) this;
        }

        public Criteria andPaymentIdCardLessThanOrEqualTo(String value) {
            addCriterion("payment_id_card <=", value, "paymentIdCard");
            return (Criteria) this;
        }

        public Criteria andPaymentIdCardLike(String value) {
            addCriterion("payment_id_card like", value, "paymentIdCard");
            return (Criteria) this;
        }

        public Criteria andPaymentIdCardNotLike(String value) {
            addCriterion("payment_id_card not like", value, "paymentIdCard");
            return (Criteria) this;
        }

        public Criteria andPaymentIdCardIn(List<String> values) {
            addCriterion("payment_id_card in", values, "paymentIdCard");
            return (Criteria) this;
        }

        public Criteria andPaymentIdCardNotIn(List<String> values) {
            addCriterion("payment_id_card not in", values, "paymentIdCard");
            return (Criteria) this;
        }

        public Criteria andPaymentIdCardBetween(String value1, String value2) {
            addCriterion("payment_id_card between", value1, value2, "paymentIdCard");
            return (Criteria) this;
        }

        public Criteria andPaymentIdCardNotBetween(String value1, String value2) {
            addCriterion("payment_id_card not between", value1, value2, "paymentIdCard");
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

        public Criteria andDescriptionIsNull() {
            addCriterion("description is null");
            return (Criteria) this;
        }

        public Criteria andDescriptionIsNotNull() {
            addCriterion("description is not null");
            return (Criteria) this;
        }

        public Criteria andDescriptionEqualTo(String value) {
            addCriterion("description =", value, "description");
            return (Criteria) this;
        }

        public Criteria andDescriptionNotEqualTo(String value) {
            addCriterion("description <>", value, "description");
            return (Criteria) this;
        }

        public Criteria andDescriptionGreaterThan(String value) {
            addCriterion("description >", value, "description");
            return (Criteria) this;
        }

        public Criteria andDescriptionGreaterThanOrEqualTo(String value) {
            addCriterion("description >=", value, "description");
            return (Criteria) this;
        }

        public Criteria andDescriptionLessThan(String value) {
            addCriterion("description <", value, "description");
            return (Criteria) this;
        }

        public Criteria andDescriptionLessThanOrEqualTo(String value) {
            addCriterion("description <=", value, "description");
            return (Criteria) this;
        }

        public Criteria andDescriptionLike(String value) {
            addCriterion("description like", value, "description");
            return (Criteria) this;
        }

        public Criteria andDescriptionNotLike(String value) {
            addCriterion("description not like", value, "description");
            return (Criteria) this;
        }

        public Criteria andDescriptionIn(List<String> values) {
            addCriterion("description in", values, "description");
            return (Criteria) this;
        }

        public Criteria andDescriptionNotIn(List<String> values) {
            addCriterion("description not in", values, "description");
            return (Criteria) this;
        }

        public Criteria andDescriptionBetween(String value1, String value2) {
            addCriterion("description between", value1, value2, "description");
            return (Criteria) this;
        }

        public Criteria andDescriptionNotBetween(String value1, String value2) {
            addCriterion("description not between", value1, value2, "description");
            return (Criteria) this;
        }

        public Criteria andActionTimeIsNull() {
            addCriterion("action_time is null");
            return (Criteria) this;
        }

        public Criteria andActionTimeIsNotNull() {
            addCriterion("action_time is not null");
            return (Criteria) this;
        }

        public Criteria andActionTimeEqualTo(Integer value) {
            addCriterion("action_time =", value, "actionTime");
            return (Criteria) this;
        }

        public Criteria andActionTimeNotEqualTo(Integer value) {
            addCriterion("action_time <>", value, "actionTime");
            return (Criteria) this;
        }

        public Criteria andActionTimeGreaterThan(Integer value) {
            addCriterion("action_time >", value, "actionTime");
            return (Criteria) this;
        }

        public Criteria andActionTimeGreaterThanOrEqualTo(Integer value) {
            addCriterion("action_time >=", value, "actionTime");
            return (Criteria) this;
        }

        public Criteria andActionTimeLessThan(Integer value) {
            addCriterion("action_time <", value, "actionTime");
            return (Criteria) this;
        }

        public Criteria andActionTimeLessThanOrEqualTo(Integer value) {
            addCriterion("action_time <=", value, "actionTime");
            return (Criteria) this;
        }

        public Criteria andActionTimeIn(List<Integer> values) {
            addCriterion("action_time in", values, "actionTime");
            return (Criteria) this;
        }

        public Criteria andActionTimeNotIn(List<Integer> values) {
            addCriterion("action_time not in", values, "actionTime");
            return (Criteria) this;
        }

        public Criteria andActionTimeBetween(Integer value1, Integer value2) {
            addCriterion("action_time between", value1, value2, "actionTime");
            return (Criteria) this;
        }

        public Criteria andActionTimeNotBetween(Integer value1, Integer value2) {
            addCriterion("action_time not between", value1, value2, "actionTime");
            return (Criteria) this;
        }

        public Criteria andCloseStateIsNull() {
            addCriterion("close_state is null");
            return (Criteria) this;
        }

        public Criteria andCloseStateIsNotNull() {
            addCriterion("close_state is not null");
            return (Criteria) this;
        }

        public Criteria andCloseStateEqualTo(String value) {
            addCriterion("close_state =", value, "closeState");
            return (Criteria) this;
        }

        public Criteria andCloseStateNotEqualTo(String value) {
            addCriterion("close_state <>", value, "closeState");
            return (Criteria) this;
        }

        public Criteria andCloseStateGreaterThan(String value) {
            addCriterion("close_state >", value, "closeState");
            return (Criteria) this;
        }

        public Criteria andCloseStateGreaterThanOrEqualTo(String value) {
            addCriterion("close_state >=", value, "closeState");
            return (Criteria) this;
        }

        public Criteria andCloseStateLessThan(String value) {
            addCriterion("close_state <", value, "closeState");
            return (Criteria) this;
        }

        public Criteria andCloseStateLessThanOrEqualTo(String value) {
            addCriterion("close_state <=", value, "closeState");
            return (Criteria) this;
        }

        public Criteria andCloseStateLike(String value) {
            addCriterion("close_state like", value, "closeState");
            return (Criteria) this;
        }

        public Criteria andCloseStateNotLike(String value) {
            addCriterion("close_state not like", value, "closeState");
            return (Criteria) this;
        }

        public Criteria andCloseStateIn(List<String> values) {
            addCriterion("close_state in", values, "closeState");
            return (Criteria) this;
        }

        public Criteria andCloseStateNotIn(List<String> values) {
            addCriterion("close_state not in", values, "closeState");
            return (Criteria) this;
        }

        public Criteria andCloseStateBetween(String value1, String value2) {
            addCriterion("close_state between", value1, value2, "closeState");
            return (Criteria) this;
        }

        public Criteria andCloseStateNotBetween(String value1, String value2) {
            addCriterion("close_state not between", value1, value2, "closeState");
            return (Criteria) this;
        }

        public Criteria andCloseAmountIsNull() {
            addCriterion("close_amount is null");
            return (Criteria) this;
        }

        public Criteria andCloseAmountIsNotNull() {
            addCriterion("close_amount is not null");
            return (Criteria) this;
        }

        public Criteria andCloseAmountEqualTo(Float value) {
            addCriterion("close_amount =", value, "closeAmount");
            return (Criteria) this;
        }

        public Criteria andCloseAmountNotEqualTo(Float value) {
            addCriterion("close_amount <>", value, "closeAmount");
            return (Criteria) this;
        }

        public Criteria andCloseAmountGreaterThan(Float value) {
            addCriterion("close_amount >", value, "closeAmount");
            return (Criteria) this;
        }

        public Criteria andCloseAmountGreaterThanOrEqualTo(Float value) {
            addCriterion("close_amount >=", value, "closeAmount");
            return (Criteria) this;
        }

        public Criteria andCloseAmountLessThan(Float value) {
            addCriterion("close_amount <", value, "closeAmount");
            return (Criteria) this;
        }

        public Criteria andCloseAmountLessThanOrEqualTo(Float value) {
            addCriterion("close_amount <=", value, "closeAmount");
            return (Criteria) this;
        }

        public Criteria andCloseAmountIn(List<Float> values) {
            addCriterion("close_amount in", values, "closeAmount");
            return (Criteria) this;
        }

        public Criteria andCloseAmountNotIn(List<Float> values) {
            addCriterion("close_amount not in", values, "closeAmount");
            return (Criteria) this;
        }

        public Criteria andCloseAmountBetween(Float value1, Float value2) {
            addCriterion("close_amount between", value1, value2, "closeAmount");
            return (Criteria) this;
        }

        public Criteria andCloseAmountNotBetween(Float value1, Float value2) {
            addCriterion("close_amount not between", value1, value2, "closeAmount");
            return (Criteria) this;
        }

        public Criteria andPreCloseTimeIsNull() {
            addCriterion("pre_close_time is null");
            return (Criteria) this;
        }

        public Criteria andPreCloseTimeIsNotNull() {
            addCriterion("pre_close_time is not null");
            return (Criteria) this;
        }

        public Criteria andPreCloseTimeEqualTo(Integer value) {
            addCriterion("pre_close_time =", value, "preCloseTime");
            return (Criteria) this;
        }

        public Criteria andPreCloseTimeNotEqualTo(Integer value) {
            addCriterion("pre_close_time <>", value, "preCloseTime");
            return (Criteria) this;
        }

        public Criteria andPreCloseTimeGreaterThan(Integer value) {
            addCriterion("pre_close_time >", value, "preCloseTime");
            return (Criteria) this;
        }

        public Criteria andPreCloseTimeGreaterThanOrEqualTo(Integer value) {
            addCriterion("pre_close_time >=", value, "preCloseTime");
            return (Criteria) this;
        }

        public Criteria andPreCloseTimeLessThan(Integer value) {
            addCriterion("pre_close_time <", value, "preCloseTime");
            return (Criteria) this;
        }

        public Criteria andPreCloseTimeLessThanOrEqualTo(Integer value) {
            addCriterion("pre_close_time <=", value, "preCloseTime");
            return (Criteria) this;
        }

        public Criteria andPreCloseTimeIn(List<Integer> values) {
            addCriterion("pre_close_time in", values, "preCloseTime");
            return (Criteria) this;
        }

        public Criteria andPreCloseTimeNotIn(List<Integer> values) {
            addCriterion("pre_close_time not in", values, "preCloseTime");
            return (Criteria) this;
        }

        public Criteria andPreCloseTimeBetween(Integer value1, Integer value2) {
            addCriterion("pre_close_time between", value1, value2, "preCloseTime");
            return (Criteria) this;
        }

        public Criteria andPreCloseTimeNotBetween(Integer value1, Integer value2) {
            addCriterion("pre_close_time not between", value1, value2, "preCloseTime");
            return (Criteria) this;
        }

        public Criteria andCloseTimeIsNull() {
            addCriterion("close_time is null");
            return (Criteria) this;
        }

        public Criteria andCloseTimeIsNotNull() {
            addCriterion("close_time is not null");
            return (Criteria) this;
        }

        public Criteria andCloseTimeEqualTo(Integer value) {
            addCriterion("close_time =", value, "closeTime");
            return (Criteria) this;
        }

        public Criteria andCloseTimeNotEqualTo(Integer value) {
            addCriterion("close_time <>", value, "closeTime");
            return (Criteria) this;
        }

        public Criteria andCloseTimeGreaterThan(Integer value) {
            addCriterion("close_time >", value, "closeTime");
            return (Criteria) this;
        }

        public Criteria andCloseTimeGreaterThanOrEqualTo(Integer value) {
            addCriterion("close_time >=", value, "closeTime");
            return (Criteria) this;
        }

        public Criteria andCloseTimeLessThan(Integer value) {
            addCriterion("close_time <", value, "closeTime");
            return (Criteria) this;
        }

        public Criteria andCloseTimeLessThanOrEqualTo(Integer value) {
            addCriterion("close_time <=", value, "closeTime");
            return (Criteria) this;
        }

        public Criteria andCloseTimeIn(List<Integer> values) {
            addCriterion("close_time in", values, "closeTime");
            return (Criteria) this;
        }

        public Criteria andCloseTimeNotIn(List<Integer> values) {
            addCriterion("close_time not in", values, "closeTime");
            return (Criteria) this;
        }

        public Criteria andCloseTimeBetween(Integer value1, Integer value2) {
            addCriterion("close_time between", value1, value2, "closeTime");
            return (Criteria) this;
        }

        public Criteria andCloseTimeNotBetween(Integer value1, Integer value2) {
            addCriterion("close_time not between", value1, value2, "closeTime");
            return (Criteria) this;
        }

        public Criteria andDeductorIdIsNull() {
            addCriterion("deductor_id is null");
            return (Criteria) this;
        }

        public Criteria andDeductorIdIsNotNull() {
            addCriterion("deductor_id is not null");
            return (Criteria) this;
        }

        public Criteria andDeductorIdEqualTo(Short value) {
            addCriterion("deductor_id =", value, "deductorId");
            return (Criteria) this;
        }

        public Criteria andDeductorIdNotEqualTo(Short value) {
            addCriterion("deductor_id <>", value, "deductorId");
            return (Criteria) this;
        }

        public Criteria andDeductorIdGreaterThan(Short value) {
            addCriterion("deductor_id >", value, "deductorId");
            return (Criteria) this;
        }

        public Criteria andDeductorIdGreaterThanOrEqualTo(Short value) {
            addCriterion("deductor_id >=", value, "deductorId");
            return (Criteria) this;
        }

        public Criteria andDeductorIdLessThan(Short value) {
            addCriterion("deductor_id <", value, "deductorId");
            return (Criteria) this;
        }

        public Criteria andDeductorIdLessThanOrEqualTo(Short value) {
            addCriterion("deductor_id <=", value, "deductorId");
            return (Criteria) this;
        }

        public Criteria andDeductorIdIn(List<Short> values) {
            addCriterion("deductor_id in", values, "deductorId");
            return (Criteria) this;
        }

        public Criteria andDeductorIdNotIn(List<Short> values) {
            addCriterion("deductor_id not in", values, "deductorId");
            return (Criteria) this;
        }

        public Criteria andDeductorIdBetween(Short value1, Short value2) {
            addCriterion("deductor_id between", value1, value2, "deductorId");
            return (Criteria) this;
        }

        public Criteria andDeductorIdNotBetween(Short value1, Short value2) {
            addCriterion("deductor_id not between", value1, value2, "deductorId");
            return (Criteria) this;
        }

        public Criteria andDeductorNameIsNull() {
            addCriterion("deductor_name is null");
            return (Criteria) this;
        }

        public Criteria andDeductorNameIsNotNull() {
            addCriterion("deductor_name is not null");
            return (Criteria) this;
        }

        public Criteria andDeductorNameEqualTo(String value) {
            addCriterion("deductor_name =", value, "deductorName");
            return (Criteria) this;
        }

        public Criteria andDeductorNameNotEqualTo(String value) {
            addCriterion("deductor_name <>", value, "deductorName");
            return (Criteria) this;
        }

        public Criteria andDeductorNameGreaterThan(String value) {
            addCriterion("deductor_name >", value, "deductorName");
            return (Criteria) this;
        }

        public Criteria andDeductorNameGreaterThanOrEqualTo(String value) {
            addCriterion("deductor_name >=", value, "deductorName");
            return (Criteria) this;
        }

        public Criteria andDeductorNameLessThan(String value) {
            addCriterion("deductor_name <", value, "deductorName");
            return (Criteria) this;
        }

        public Criteria andDeductorNameLessThanOrEqualTo(String value) {
            addCriterion("deductor_name <=", value, "deductorName");
            return (Criteria) this;
        }

        public Criteria andDeductorNameLike(String value) {
            addCriterion("deductor_name like", value, "deductorName");
            return (Criteria) this;
        }

        public Criteria andDeductorNameNotLike(String value) {
            addCriterion("deductor_name not like", value, "deductorName");
            return (Criteria) this;
        }

        public Criteria andDeductorNameIn(List<String> values) {
            addCriterion("deductor_name in", values, "deductorName");
            return (Criteria) this;
        }

        public Criteria andDeductorNameNotIn(List<String> values) {
            addCriterion("deductor_name not in", values, "deductorName");
            return (Criteria) this;
        }

        public Criteria andDeductorNameBetween(String value1, String value2) {
            addCriterion("deductor_name between", value1, value2, "deductorName");
            return (Criteria) this;
        }

        public Criteria andDeductorNameNotBetween(String value1, String value2) {
            addCriterion("deductor_name not between", value1, value2, "deductorName");
            return (Criteria) this;
        }
    }

    @entity.query.annotation.Tablename(value="deduct")
    public static class Criteria extends GeneratedCriteria {

        protected Criteria() {
            super();
        }
    }

    @entity.query.annotation.Tablename(value="deduct")
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