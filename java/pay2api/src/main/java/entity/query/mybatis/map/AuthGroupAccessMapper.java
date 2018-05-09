package entity.query.mybatis.map;

import entity.query.entites.AuthGroupAccess;
import entity.query.entites.AuthGroupAccessExample;
import java.util.List;
import org.apache.ibatis.annotations.Param;

public interface AuthGroupAccessMapper {
    int countByExample(AuthGroupAccessExample example);

    int deleteByExample(AuthGroupAccessExample example);

    int insert(AuthGroupAccess record);

    int insertSelective(AuthGroupAccess record);

    List<AuthGroupAccess> selectByExample(AuthGroupAccessExample example);

    int updateByExampleSelective(@Param("record") AuthGroupAccess record, @Param("example") AuthGroupAccessExample example);

    int updateByExample(@Param("record") AuthGroupAccess record, @Param("example") AuthGroupAccessExample example);
}