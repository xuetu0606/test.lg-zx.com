
            <div class="content">
                <p class="title">
                    <span class="gz-zlg">公告</span>
                    <span>通知</span>
                </p>
                <div class="xxwj scxx fbgz">
                    <form action="">
                        <table>
                            <thead>
                            <tr>
                                <th style="width: 40px!important;"></th>
                                <th>标题</th>
                                <th>时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach($news_t as $item): ?>
                                    <tr>
                                        <td style="width: 40px!important;"><input type="checkbox"class="should-check"/></td>
                                        <td><a href="<?php echo site_url('user/findById'); ?>/find_t/<?= $item['id'] ?>"><?= $item['title'] ?></a></td>
                                        <td><?= date('Y-m-d H:i:s',$item['addtime']) ?></td>
                                        <td><a href="<?php echo site_url('user/findById'); ?>/delete_t/<?= $item['id'] ?>">删除</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- <div class="acheck">
                            <input type="checkbox" class="allcheck"/>
                            <span>全选</span>
                            <span class="del" onclick="delete(this);">删除</span>
                        </div> -->

                    </form>

                </div>
                <div class="xxwj llg zlg">
                    <form action="">
                        <table>
                            <thead>
                            <tr>
                                <th style="width: 40px!important;"></th>
                                <th>标题</th>
                                <th>时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach($news_g as $item): ?>
                                    <tr>
                                        <td style="width: 40px!important;"><input type="checkbox"class="should-check"/></td>
                                        <td><a href="<?php echo site_url('user/findById'); ?>/find_g/<?= $item['id'] ?>"><?= $item['title'] ?></a></td>
                                        <td><?= date('Y-m-d H:i:s',$item['addtime']) ?></td>
                                        <td><a href="<?php echo site_url('user/findById'); ?>/delete_g/<?= $item['id'] ?>">删除</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- <div class="acheck">
                            <input type="checkbox" class="allcheck"/>
                            <span>全选</span>
                            <span class="del" onclick="delete(this);">删除</span>
                        </div> -->

                    </form>
                </div>
                <div class="fenye xxwj scxx fbgz">
                    <?= $link_t ?>
                </div>
                <div class="fenye xxwj llg zlg">
                    <?= $link_g ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    function delete(obj){
        $('input.should-check')
    }
</script>