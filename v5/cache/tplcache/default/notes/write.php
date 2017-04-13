<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>写游记-<?php echo $webname;?></title>
    <?php echo Common::css('youji.css,base.css,extend.css');?>
    <?php echo Common::js('jquery.min.js,base.js,common.js,jquery.upload.js');?>
</head>
<body>
  <?php echo Request::factory("pub/header")->execute()->body(); ?>
  <div class="big">
  <div class="wm-1200">
    
    <div class="top_yj_fb">
        <span>发表新游记</span>
        <!--<a href="#">发表游记</a>-->
      </div>
      
    </div>
  </div>
  <form id="savefrm" method="post">
    <div class="fb_top_bg" id="banner_litpic" style=" background:url(<?php if(empty($info['bannerpic'])) { ?>/res/images/fb_top_bg.jpg<?php } else { ?><?php echo $info['bannerpic'];?><?php } ?>
) center no-repeat">
  <div class="tj_gg_box upbtn" data-type="banner">
    <i></i>
    <strong>添加游记顶部图</strong>
      <span>图片尺寸建议1920px*420px</span>
    </div>
    <div class="tj_yj_tit">
    <input style="width: 1000px;" type="text" id="title" name="title" class="write" maxlength="40" max="40" placeholder="这里添加游记标题" value="<?php echo $info['title'];?>" />
      <span  id="title_notes" data="最长40个字">最长40个字</span>
    </div>
  </div>
  
    <div class="big bgcolor_f5">
  <div class="wm-1200">
    
    <div class="pic_txt_box">
      <div class="pic_con">
        <img src="<?php if(empty($info['litpic'])) { ?><?php echo Common::img();?><?php } else { ?><?php echo $info['litpic'];?><?php } ?>
" width="310" height="218" id="cover_litpic" />
          <span class="add_pic"><a href="javascript:;" class="upbtn" data-type="cover">添加封面</a></span>
        </div>
        <div class="txt_con">
          <span class="yht"></span>
          <textarea name="description" id="description" class="write" cols="" rows="" max="140"><?php echo $info['description'];?></textarea>
          <span class="yhb"></span>
          <p id="description_notes" data="最多140个字">最多140个字</p>
        </div>
      </div>
      
      <div class="edit_box">
      <h3>编辑正文</h3>
        <div class="edit_con" style="padding:0" id="myEditor">
            <?php echo Common::get_editor("content",$info['content'],1200,380,'Line');?>
        </div>
        <a href="javascript:;" id="save_btn">发表游记</a>
      </div>
      <input type="hidden" id="banner" name="banner" value="<?php echo $info['bannerpic'];?>"/>
      <input type="hidden" id="cover" name="cover" value="<?php echo $info['litpic'];?>"/>
      <input type="hidden" autocomplete="off" id="noteid" name="noteid" value="<?php echo $info['id'];?>"/>
      <input type="hidden" name="frmcode" value="<?php echo $frmcode;?>"/>
    </div>
  </div>
  </form>
  
 <?php echo Request::factory("pub/footer")->execute()->body(); ?>
 <?php echo Common::js('layer/layer.js',0);?>
<script>
    $(function(){
        $(".uptop").click(function(){
            $(this).parent().find('input').trigger('click');
        })
        //上传图片
        $(".upbtn").click(function(){
            var type = $(this).attr('data-type');
            upload(type);
        })
        //保存游记
        $("#save_btn").click(function(){
            var title=$('#title').val();
            if(title==''){
                layer.msg('<?php echo __("notes_title_not_empty");?>', {icon:5,time:1000});
                return;
            }
            var desc=$('#description').val();
            if(desc==''){
                layer.msg('<?php echo __("notes_description_not_empty");?>',{icon:5,time:1000});
                return;
            }
            var banner = $("#banner").val();
            if(banner==''){
                layer.msg('<?php echo __("notes_banner_not_empty");?>', {icon:5,time:1000});
                return;
            }
            var cover = $("#cover").val();
            if(cover==''){
                layer.msg('<?php echo __("notes_cover_not_empty");?>', {icon:5,time:1000});
                return;
            }
            var content = $('#myEditor').find('#ueditor_0').contents().find("body").html();
            var temp=content;
            if(temp.replace(/<[^>]+>/g,"")==''){
                layer.msg('<?php echo __("notes_content_not_empty");?>', {icon:5,time:1000});
                return;
            }
            var frmdata = $("#savefrm").serialize();
            var SITEURL = "<?php echo URL::SITE();?>";
            var loadingbox = null;
            $.ajax({
                type:'POST',
                url:SITEURL+'notes/ajax_save',
                dataType:'json',
                data:frmdata,
                beforeSend:function(){
                    loadingbox = layer.load();
                },
                success:function(data){
                    layer.close(loadingbox);
                    if(data.status){
                        layer.msg('<?php echo __("save_success");?>', {icon:6,time:1000});
                        if(data.noteid){
                            $("#noteid").val(data.noteid);
                        }
                    }else{
                        layer.msg('<?php echo __("save_failure");?>', {icon:6,time:1000});
                    }
                }
            })
        })
        //上传模板
        function upload(type){
            // 上传方法
            $.upload({
                // 上传地址
                url: SITEURL+'notes/ajax_upload_picture',
                // 文件域名字
                fileName: 'filedata',
                fileType: 'png,jpg,jpeg,gif',
                // 其他表单数据
                params: {},
                // 上传之前回调,return true表示可继续上传
                onSend: function() {
                    return true;
                },
                // 上传之后回调
                onComplate: function(data) {
                    var data = $.parseJSON(data);
                    //如果上传成功
                    if(data.status){
                        if(type == 'banner')
                        {
                            $("#banner_litpic").css({'background':'url('+data.litpic+') center no-repeat','backgroundSize':'100%'});
                            $("#banner").val(data.litpic);
                        }
                        else if(type == 'cover')
                        {
                            $("#cover_litpic").attr('src',data.litpic);
                            $("#cover").val(data.litpic);
                        }
                    }
                }
            });
        }
        //限制输入
        $('.write').keyup(function(){
            var val=$(this).val();
            var len=val.length;
            var max=$(this).attr('max');
            var id=$(this).attr('id');
            if(max>len){
                $('#'+id+'_notes').html('你还可再输入'+(max-len)+'个字');
            }else{
                $(this).val(val.slice(0, max));
                $('#'+id+'_notes').html($('#'+id+'_notes').attr('data'));
            }
        });
    });
</script>
</body>
</html>
