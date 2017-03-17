<style>
    section div.fenye a {
        padding: 0 5px;
        height: 35px;
        text-align: center;
        line-height: 35px;
        color: #333;
        font-size: 16px;
        margin: 0 5px;
        background-color: #ffffff;
        font-weight: bold;
        border: solid 1px #cccccc;
    }
</style>
<div class="content">
    <p class="title">
        <span class="gz-zlg">发布的工种</span>
        <span>招零工</span>
    </p>
    <p class="xz">
        <span class="xsxx">显示中的信息</span>
        <span>已删除的信息</span>
        <span>未显示的信息</span>
    </p>
    <div class="fbgz">
        <h1 class="zwsj">暂无数据!</h1>
        <div class="now">
            <form>
                <?php foreach ($gong as $k):?>
                <div class="demo">
                    <input type="checkbox" class="should-check"/>
                    <div class="right">
                        <p class="xxbh">
                            <span>信息编号：</span>
                            <span><?php echo $k['id']?></span>
                        </p>
                        <div class="jsh">
                            <?php $img=explode(',',$k['img']);$img=explode('.',$img[0])?>
                            <img src="/upload/<?php echo $k['pinyin']?>/lgxx/<?php echo $_SESSION['uid']?>/<?php echo $img[0]?>_150_100.jpg" alt=""/>
                            <div class="m">
                                <h1><?php echo $k['info1']?></h1>
                                <h2><?php echo $k['name'].'-'.$k['zhi_name'].'-'.$k['job_name']?></h2>
                                <h3>
                                    <span><?php echo date('Y-m-d',$k['addtime'])?></span>
                                    <span><?php echo date('h:m',$k['addtime'])?></span>
                                </h3>
                            </div>
                            <div class="r">
                                <a href="#">刷新</a>
                                <a href="#">修改</a>
                                <a href="#">下架</a>
                                <a href="#" class="delete">删除</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </form>
            <div class="fenye">
                <?php echo $page;?>
            </div>
        </div>
        <div class="deleted">
            <form action="">
                <div class="demo">
                    <input type="checkbox" class="should-check"/>
                    <div class="right">
                        <p class="xxbh">
                            <span>信息编号：</span>
                            <span>1111111111</span>
                        </p>
                        <div class="jsh">
                            <img src="/static/images/tp.png" alt=""/>
                            <div class="m">
                                <h1>悠悠家政，专业保姆月嫂、月嫂  高品质服务</h1>
                                <h2>青岛-家政服务-保姆/月嫂</h2>
                                <h3>
                                    <span>2017-01-19</span>
                                    <span>14:25</span>
                                </h3>
                            </div>
                            <div class="r">
                                <a href="#">恢复</a>
                                <a href="#">删除</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="acheck">
                    <input type="checkbox" class="allcheck"/>
                    <span>全选</span>
                    <span class="del">删除</span>
                </div>
            </form>
            <div class="fenye">
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">6</a>
                <a href="#">7</a>
                <a href="#">8</a>
                <a href="#">9</a>
                <a href="#">10</a>
                <a href="#">下一页</a>
            </div>
        </div>
        <div class="before">
            <form action="">
                <div class="demo">
                    <input type="checkbox" class="should-check"/>
                    <div class="right">
                        <p class="xxbh">
                            <span>信息编号：</span>
                            <span>1111111111</span>
                        </p>
                        <div class="jsh">
                            <img src="/static/images/tp.png" alt=""/>
                            <div class="m">
                                <h1>悠悠家政，专业保姆月嫂、月嫂  高品质服务</h1>
                                <h2>青岛-家政服务-保姆/月嫂</h2>
                                <h3>
                                    <span>2017-01-19</span>
                                    <span>14:25</span>
                                </h3>
                            </div>
                            <div class="r">
                                <a href="#">上架</a>
                                <a href="#">删除</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="acheck">
                    <input type="checkbox" class="allcheck"/>
                    <span>全选</span>
                    <span class="del">删除</span>
                </div>
            </form>
            <div class="fenye">
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">6</a>
                <a href="#">7</a>
                <a href="#">8</a>
                <a href="#">9</a>
                <a href="#">10</a>
                <a href="#">下一页</a>
            </div>
        </div>
    </div>
    <div class="zlg">
        <h1 class="zwsj">暂无数据!</h1>hahahahahah
        <div class="now">
            <form action="">
                <div class="demo">
                    <input type="checkbox" class="should-check"/>
                    <div class="right">
                        <p class="xxbh">
                            <span>信息编号：</span>
                            <span>1111111111</span>
                        </p>
                        <div class="jsh">
                            <img src="/static/images/tp.png" alt=""/>
                            <div class="m">
                                <h1>悠悠家政，专业保姆月嫂、月嫂  高品质服务</h1>
                                <h2>青岛-家政服务-保姆/月嫂</h2>
                                <h3>
                                    <span>2017-01-19</span>
                                    <span>14:25</span>
                                </h3>
                            </div>
                            <div class="r">
                                <a href="#">刷新</a>
                                <a href="#">修改</a>
                                <a href="#">下架</a>
                                <a href="#" class="delete">删除</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="demo">
                    <input type="checkbox"  class="should-check"/>
                    <div class="right">
                        <p class="xxbh">
                            <span>信息编号：</span>
                            <span>2222222222</span>
                        </p>
                        <div class="jsh">
                            <img src="/static/images/tp.png" alt=""/>
                            <div class="m">
                                <h1>悠悠家政，专业保姆月嫂、月嫂  高品质服务</h1>
                                <h2>青岛-家政服务-保姆/月嫂</h2>
                                <h3>
                                    <span>2017-01-19</span>
                                    <span>14:25</span>
                                </h3>
                            </div>
                            <div class="r">
                                <a href="#">刷新</a>
                                <a href="#">修改</a>
                                <a href="#">下架</a>
                                <a href="#" class="delete">删除</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="demo">
                    <input type="checkbox"  class="should-check"/>
                    <div class="right">
                        <p class="xxbh">
                            <span>信息编号：</span>
                            <span>33333333333</span>
                        </p>
                        <div class="jsh">
                            <img src="/static/images/tp.png" alt=""/>
                            <div class="m">
                                <h1>悠悠家政，专业保姆月嫂、月嫂  高品质服务</h1>
                                <h2>青岛-家政服务-保姆/月嫂</h2>
                                <h3>
                                    <span>2017-01-19</span>
                                    <span>14:25</span>
                                </h3>
                            </div>
                            <div class="r">
                                <a href="#">刷新</a>
                                <a href="#">修改</a>
                                <a href="#">下架</a>
                                <a href="#" class="delete">删除</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="acheck">
                    <input type="checkbox" class="allcheck"/>
                    <span>全选</span>
                    <span class="del">删除</span>
                </div>
            </form>

        </div>
    </div>

</div>