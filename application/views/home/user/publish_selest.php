<link rel="stylesheet" href="/static/css/publish.css"/>

<section>
    <div class="position">
        <span>青岛零工在线</span>
        <span> > </span>
        <span>发布信息</span>
        <span> > </span>
        <span><?php echo $title;?></span>
    </div>
    <div class="main">
        <div class="middle">
            <div class="buzhou">
                <span class="step stress step1">选择分类</span>
                <span class="step b"> > </span>
                <span class="step step2">选择职业</span>
                <span class="step b"> > </span>
                <span class="step step3"> 填写信息 </span>
                <span class="step b"> > </span>
                <span class="step step4"> 完成发布 </span>
            </div>
        </div>
        <div class="classify">

            <ul>
                <?php
                //var_dump($hang);
                foreach ($hang as $k => $v){
                ?>
                <li><a href="/pub/selest/<?php echo $k.'/'.$this->uri->segment(4, 0);?>" <?php echo $k==$this->uri->segment(3, 0)?'class="active"':'';?>><?php echo $v;?></a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="type">
            <ul>
                <?php
                //var_dump($hang);
                foreach ($zhi as $k => $v){
                    ?>
                    <li><a href="/pub/<?php echo $url.'/'.$this->uri->segment(3, 0).'/'.$k;?>"><?php echo $v;?></a></li>
                <?php } ?>
            </ul>

        </div>
    </div>
</section>