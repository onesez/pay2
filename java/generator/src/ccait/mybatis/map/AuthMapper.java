package ccait.mybatis.map;

import ccait.entity.Auth;
import ccait.entity.AuthExample;
import java.util.List;
import org.apache.ibatis.annotations.Param;

public interface AuthMapper {
    /**
     *
     * @mbggenerated
     */
    int countByExample(AuthExample example);

    /**
     *
     * @mbggenerated
     */
    int deleteByExample(AuthExample example);

    /**
     *
     * @mbggenerated
     */
    int deleteByPrimaryKey(Integer userId);

    /**
     *
     * @mbggenerated
     */
    int insert(Auth record);

    /**
     *
     * @mbggenerated
     */
    int insertSelective(Auth record);

    /**
     *
     * @mbggenerated
     */
    List<Auth> selectByExample(AuthExample example);

    /**
     *
     * @mbggenerated
     */
    Auth selectByPrimaryKey(Integer userId);

    /**
     *
     * @mbggenerated
     */
    int updateByExampleSelective(@Param("record") Auth record, @Param("example") AuthExample example);

    /**
     *
     * @mbggenerated
     */
    int updateByExample(@Param("record") Auth record, @Param("example") AuthExample example);

    /**
     *
     * @mbggenerated
     */
    int updateByPrimaryKeySelective(Auth record);

    /**
     *
     * @mbggenerated
     */
    int updateByPrimaryKey(Auth record);

    /**
     *
     * @mbggenerated
     */
    List<Auth> selectAll();
}