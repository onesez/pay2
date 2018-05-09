package entity.query.mybatis.map;

import entity.query.entites.PlatformProfile;
import entity.query.entites.PlatformProfileExample;
import java.util.List;
import org.apache.ibatis.annotations.Param;

public interface PlatformProfileMapper {
    int countByExample(PlatformProfileExample example);

    int deleteByExample(PlatformProfileExample example);

    int deleteByPrimaryKey(Short id);

    int insert(PlatformProfile record);

    int insertSelective(PlatformProfile record);

    List<PlatformProfile> selectByExample(PlatformProfileExample example);

    PlatformProfile selectByPrimaryKey(Short id);

    int updateByExampleSelective(@Param("record") PlatformProfile record, @Param("example") PlatformProfileExample example);

    int updateByExample(@Param("record") PlatformProfile record, @Param("example") PlatformProfileExample example);

    int updateByPrimaryKeySelective(PlatformProfile record);

    int updateByPrimaryKey(PlatformProfile record);

    List<PlatformProfile> selectAll();
}