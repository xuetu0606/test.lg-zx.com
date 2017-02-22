<link rel="stylesheet" href="/static/css/lgb/title.css">
<link rel="stylesheet" href="/static/css/publish/personal.publish.css">

<section>
    <p class="title2">
        <a href="javascript:history.back(-1);" ><</a>
        <span>零工币充值</span>
    </p>
    <?php echo form_open('pay','style="margin: 3rem 0"'); ?>
        <div>
            <span>充值金额</span>
            <input type="text" name="fee" style="width: 5rem;"/><span style="width:4rem;">元</span>
            <span class="red" style="width: 9rem;">&#40;1元=1个零工币&#41;</span>
        </div>
        <div>
            <span>支付平台</span>
            <select name="paymethod">
                <option value="01">微信支付</option>
                <option value="02">支付宝</option>
            </select>
            <?php echo validation_errors()?validation_errors():$payError;?>
        </div>
        <div>
            <input type="submit" value="购买"/>
        </div>
    </form>
</section>
<style>
    body section form div select{
        width: 7rem;
    }
</style>