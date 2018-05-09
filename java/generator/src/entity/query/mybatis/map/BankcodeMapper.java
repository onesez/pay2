package entity.query.mybatis.map;

import entity.query.entites.Bankcode;
import entity.query.entites.BankcodeExample;
import java.util.List;
import org.apache.ibatis.annotations.Param;

public interface BankcodeMapper {
    int countByExample(BankcodeExample example);

    int deleteByExample(BankcodeExample example);

    int deleteByPrimaryKey(Short id);

    int insert(Bankcode record);

    int insertSelective(Bankcode record);

    List<Bankcode> selectByExample(BankcodeExample example);

    Bankcode selectByPrimaryKey(Short id);

    int updateByExampleSelective(@Param("record") Bankcode record, @Param("example") BankcodeExample example);

    int updateByExample(@Param("record") Bankcode record, @Param("example") BankcodeExample example);

    int updateByPrimaryKeySelective(Bankcode record);

    int updateByPrimaryKey(Bankcode record);

    List<Bankcode> selectAll();
}