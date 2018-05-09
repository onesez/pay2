package entity.query.mybatis.map;

import entity.query.entites.OrderUser;
import entity.query.entites.OrderUserExample;
import java.util.List;
import org.apache.ibatis.annotations.Param;

public interface OrderUserMapper {
    int countByExample(OrderUserExample example);

    int deleteByExample(OrderUserExample example);

    int deleteByPrimaryKey(Integer id);

    int insert(OrderUser record);

    int insertSelective(OrderUser record);

    List<OrderUser> selectByExample(OrderUserExample example);

    OrderUser selectByPrimaryKey(Integer id);

    int updateByExampleSelective(@Param("record") OrderUser record, @Param("example") OrderUserExample example);

    int updateByExample(@Param("record") OrderUser record, @Param("example") OrderUserExample example);

    int updateByPrimaryKeySelective(OrderUser record);

    int updateByPrimaryKey(OrderUser record);

    List<OrderUser> selectAll();
}