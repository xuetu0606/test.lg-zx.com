
            <div class="content">
                <p class="title">
                    <span class="gz-zlg">收藏的信息</span>
                    <span>浏览过的信息</span>
                </p>
                <div class="scxx fbgz">
                    <table>
                        <thead>
                        <tr>
                            <th>标题</th>
                            <th>收藏时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($keeps as $item): ?>
                                <tr>
                                    <td><?= $item['title'] ?></td>
                                    <td><?= date('Y-m-d H:i:s',$item['addtime']) ?></td>
                                    <td><a href="<?= site_url('user/') ?>">取消收藏</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="llg zlg">
                    <table>
                        <thead>
                        <tr>
                            <th>标题</th>
                            <th>浏览时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>优优家政专业的月嫂服务,优优家政专业的月嫂服务,优优家政专业的月嫂服务.优优家政专业的月嫂服务优优家政专业的月嫂服务</td>
                            <td>2017-01-19 13:00</td>
                            <td><a href="#">加入收藏</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="fenye">
                    <a href="#">1</a>
                    <a href="#">10</a>
                    <a href="#">下一页</a>
                </div>
            </div>
        </div>
    </div>
</section> 