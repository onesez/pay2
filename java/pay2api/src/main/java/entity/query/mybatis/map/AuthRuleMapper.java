package entity.query.mybatis.map;

import entity.query.entites.AuthRule;
import entity.query.entites.AuthRuleExample;
import java.util.List;
import org.apache.ibatis.annotations.Param;

public interface AuthRuleMapper {
    int countByExample(AuthRuleExample example);

    int deleteByExample(AuthRuleExample example);

    int deleteByPrimaryKey(Integer id);

    int insert(AuthRule record);

    int insertSelective(AuthRule record);

    List<AuthRule> selectByExample(AuthRuleExample example);

    AuthRule selectByPrimaryKey(Integer id);

    int updateByExampleSelective(@Param("record") AuthRule record, @Param("example") AuthRuleExample example);

    int updateByExample(@Param("record") AuthRule record, @Param("example") AuthRuleExample example);

    int updateByPrimaryKeySelective(AuthRule record);

    int updateByPrimaryKey(AuthRule record);

    List<AuthRule> selectAll();
}