<div class="st-link">
    <div class="wm-1200">
        <div class="st-link-list">
            <dl>
                <dt>友情链接：</dt>
                <dd>
                    <?php require_once ("C:/phpstudy/WWW/taglib/flink.php");$flink_tag = new Taglib_Flink();if (method_exists($flink_tag, 'query')) {$data = $flink_tag->query(array('action'=>'query','typeid'=>$typeid,));}?>
                     <?php $n=1; if(is_array($data)) { foreach($data as $row) { ?>
                      <a href="<?php echo $row['url'];?>" target="_blank"><?php echo $row['title'];?></a>
                     <?php $n++;}unset($n); } ?>
                    
                </dd>
            </dl>
        </div>
    </div>
</div><!--友情链接-->