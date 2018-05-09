package entity.query.mybatis.map;

import entity.query.entites.Closelist;
import entity.query.entites.CloselistExample;
import java.util.List;
import org.apache.ibatis.annotations.Param;

public interface CloselistMapper {
    int countByExample(CloselistExample example);

    int deleteByExample(CloselistExample example);

    int deleteByPrimaryKey(Integer id);

    int insert(Closelist record);

    int insertSelective(Closelist record);

    List<Closelist> selectByExample(CloselistExample example);

    Closelist selectByPrimaryKey(Integer id);

    int updateByExampleSelective(@Param("record") Closelist record, @Param("example") CloselistExample example);

    int updateByExample(@Param("record") Closelist record, @Param("example") CloselistExample example);

    int updateByPrimaryKeySelective(Closelist record);

    int updateByPrimaryKey(Closelist record);

    List<Closelist> selectAll();
}