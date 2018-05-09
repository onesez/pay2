package entity.query.mybatis.map;

import entity.query.entites.Random;
import entity.query.entites.RandomExample;
import java.util.List;
import org.apache.ibatis.annotations.Param;

public interface RandomMapper {
    int countByExample(RandomExample example);

    int deleteByExample(RandomExample example);

    int deleteByPrimaryKey(Integer id);

    int insert(Random record);

    int insertSelective(Random record);

    List<Random> selectByExample(RandomExample example);

    Random selectByPrimaryKey(Integer id);

    int updateByExampleSelective(@Param("record") Random record, @Param("example") RandomExample example);

    int updateByExample(@Param("record") Random record, @Param("example") RandomExample example);

    int updateByPrimaryKeySelective(Random record);

    int updateByPrimaryKey(Random record);

    List<Random> selectAll();
}