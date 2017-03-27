
            <div class="content">
                <p class="title">
                    <span class="gz-zlg">公告</span>
                    <span>通知</span>
                </p>
                <div class="xxwj scxx fbgz">
                    <form action="<?php echo site_url('user/deleteByIds'); ?>" method="post">
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
                                        <td style="width: 40px!important;"><input type="checkbox" class="should-check t" name="t_d[]" value="<?= $item['id'] ?>"/></td>
                                        <td><a href="<?php echo site_url('user/findById'); ?>/find_t/<?= $item['id'] ?>"><?= $item['title'] ?></a></td>
                                        <td><?= date('Y-m-d H:i:s',$item['addtime']) ?></td>
                                        <td><a href="<?php echo site_url('user/findById'); ?>/delete_t/<?= $item['id'] ?>">删除</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="acheck">
                            <input type="checkbox" class="allcheck"/>
                            <span>全选</span>
                            <label>
                                <span class="del" id="t_d"">删除</span>
                                <input type="submit" value=""/>
                            </label>
                        </div>

                    </form>

                </div>
                <div class="xxwj llg zlg">
                    <form action="<?php echo site_url('user/deleteByIds'); ?>" method="post">
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
                                        <td style="width: 40px!important;"><input type="checkbox" class="should-check g" name="g_d[]" value="<?= $item['id'] ?>"/></td>
                                        <td><a href="<?php echo site_url('user/findById'); ?>/find_g/<?= $item['id'] ?>"><?= $item['title'] ?></a></td>
                                        <td><?= date('Y-m-d H:i:s',$item['addtime']) ?></td>
                                        <td><a href="<?php echo site_url('user/findById'); ?>/delete_g/<?= $item['id'] ?>">删除</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="acheck">
                            <input type="checkbox" class="allcheck"/>
                            <span>全选</span>
                            <label>
                                <span class="del" id="g_d"">删除</span>
                                <input type="submit" value=""/>
                            </label>
                        </div>

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
    function delete_s(obj){
        console.log(obj);
        if(obj.id == 't_d'){
            var check = $("input:checkbox:checked.t");
        }else if(obj.id == 'g_d'){
            var check = $("input:checkbox:checked.g");
        }
        console.log(check);
        console.log(check.length);
        var temp = document.createElement("form");
        temp.action = URL;
        temp.method = "post";
        temp.style.display = "none";
        for (var x in PARAMS) {
        var opt = document.createElement("textarea");
        opt.name = x;
        opt.value = PARAMS[x];
        // alert(opt.name)
        temp.appendChild(opt);
        }
        document.body.appendChild(temp);
        temp.submit();
        return temp;
    }
</script>