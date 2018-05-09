package entity.query.mybatis.map;

import entity.query.entites.Drawlist;
import entity.query.entites.DrawlistExample;
import java.util.List;
import org.apache.ibatis.annotations.Param;

public interface DrawlistMapper {
    int countByExample(DrawlistExample example);

    int deleteByExample(DrawlistExample example);

    int deleteByPrimaryKey(Integer id);

    int insert(Drawlist record);

    int insertSelective(Drawlist record);

    List<Drawlist> selectByExample(DrawlistExample example);

    Drawlist selectByPrimaryKey(Integer id);

    int updateByExampleSelective(@Param("record") Drawlist record, @Param("example") DrawlistExample example);

    int updateByExample(@Param("record") Drawlist record, @Param("example") DrawlistExample example);

    int updateByPrimaryKeySelective(Drawlist record);

    int updateByPrimaryKey(Drawlist record);

    List<Drawlist> selectAll();
}