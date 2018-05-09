package entity.query.mybatis.map;

import entity.query.entites.Jdbank;
import entity.query.entites.JdbankExample;
import java.util.List;
import org.apache.ibatis.annotations.Param;

public interface JdbankMapper {
    int countByExample(JdbankExample example);

    int deleteByExample(JdbankExample example);

    int deleteByPrimaryKey(Short id);

    int insert(Jdbank record);

    int insertSelective(Jdbank record);

    List<Jdbank> selectByExample(JdbankExample example);

    Jdbank selectByPrimaryKey(Short id);

    int updateByExampleSelective(@Param("record") Jdbank record, @Param("example") JdbankExample example);

    int updateByExample(@Param("record") Jdbank record, @Param("example") JdbankExample example);

    int updateByPrimaryKeySelective(Jdbank record);

    int updateByPrimaryKey(Jdbank record);

    List<Jdbank> selectAll();
}