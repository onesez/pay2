package entity.query.mybatis.map;

import entity.query.entites.Rate;
import entity.query.entites.RateExample;
import java.util.List;
import org.apache.ibatis.annotations.Param;

public interface RateMapper {
    int countByExample(RateExample example);

    int deleteByExample(RateExample example);

    int deleteByPrimaryKey(Integer id);

    int insert(Rate record);

    int insertSelective(Rate record);

    List<Rate> selectByExample(RateExample example);

    Rate selectByPrimaryKey(Integer id);

    int updateByExampleSelective(@Param("record") Rate record, @Param("example") RateExample example);

    int updateByExample(@Param("record") Rate record, @Param("example") RateExample example);

    int updateByPrimaryKeySelective(Rate record);

    int updateByPrimaryKey(Rate record);

    List<Rate> selectAll();
}