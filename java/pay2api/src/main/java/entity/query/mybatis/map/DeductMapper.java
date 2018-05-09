package entity.query.mybatis.map;

import entity.query.entites.Deduct;
import entity.query.entites.DeductExample;
import java.util.List;
import org.apache.ibatis.annotations.Param;

public interface DeductMapper {
    int countByExample(DeductExample example);

    int deleteByExample(DeductExample example);

    int deleteByPrimaryKey(Short id);

    int insert(Deduct record);

    int insertSelective(Deduct record);

    List<Deduct> selectByExample(DeductExample example);

    Deduct selectByPrimaryKey(Short id);

    int updateByExampleSelective(@Param("record") Deduct record, @Param("example") DeductExample example);

    int updateByExample(@Param("record") Deduct record, @Param("example") DeductExample example);

    int updateByPrimaryKeySelective(Deduct record);

    int updateByPrimaryKey(Deduct record);

    List<Deduct> selectAll();
}