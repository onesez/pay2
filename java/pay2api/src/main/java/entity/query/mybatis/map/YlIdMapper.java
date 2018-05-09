package entity.query.mybatis.map;

import entity.query.entites.YlId;
import entity.query.entites.YlIdExample;
import java.util.List;
import org.apache.ibatis.annotations.Param;

public interface YlIdMapper {
    int countByExample(YlIdExample example);

    int deleteByExample(YlIdExample example);

    int deleteByPrimaryKey(Short id);

    int insert(YlId record);

    int insertSelective(YlId record);

    List<YlId> selectByExample(YlIdExample example);

    YlId selectByPrimaryKey(Short id);

    int updateByExampleSelective(@Param("record") YlId record, @Param("example") YlIdExample example);

    int updateByExample(@Param("record") YlId record, @Param("example") YlIdExample example);

    int updateByPrimaryKeySelective(YlId record);

    int updateByPrimaryKey(YlId record);

    List<YlId> selectAll();
}