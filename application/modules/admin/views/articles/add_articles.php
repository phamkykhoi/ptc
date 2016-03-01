<script type="text/javascript">
		$(document).ready(function(e) {
			$("#ok").click(function(){
	            name = $("#news_title").val();
              news_rewrite = $('#news_rewrite').val();
				
				if(name == ''){
					alert("Vui lòng nhập tiêu đề tin !");
					$("#news_title").focus();
					return false;
				}
        if(news_rewrite == ''){
          alert("Vui lòng nhập URL Rewrite !");
          $("#news_rewrite").focus();
          return false;
        }
			})
        });
    </script>
    
<div class="paddings">
  <form action="<?php echo base_url()."admin/articles/add" ; ?>" method="post" enctype="multipart/form-data" name="account_form">
	<style type="text/css">
		#tb-article-form {}
		#tb-article-form .row-header { font-weight:bold; font-size:18px; color:#06C;}

	</style>
    <br />
    <table width="100%" id="tb-article-form" cellpadding="3" cellspacing="3">
      <tbody>
        <tr class="row-header">
        	<div style="text-align:center;color:#f00;"><?php if(isset($error)) { echo "<p>".$error."</p>"; } ?></div>
          <td colspan="2">Thông tin cơ bản</td>
        </tr>
        <tr>
          <td style="width:200px; padding-right:8px; vertical-align:top"><dt>
              <label>Ảnh</label>
            </dt>
            <dd>
              <div style="width:120px; height:70px; border:1px solid #CCC; padding-top:40px; text-align:center;color:#CCC">
              	Chưa có ảnh
              </div>
              Cập nhật ảnh<br />
              <input type="file" name="news_images" id="thum_file" size="15" />
              <p style="font-size:14px; color:#F00"><b>Chú ý:</b> Bạn có thể chọn nhiều ảnh cùng 1 lúc. Chấp nhận các file ảnh: gif, jpg, png</p><br />
              <p style="font-size:14px; color:#F00">Nên để kích thước ảnh 250 x 250 thì chất lượng ảnh sản phẩm sẽ đẹp </p>
            </dd>
            </td>
            <td>
              <dt class="top">
                <label for="custom_collection_title">Ngôn ngữ</label>
                <span style="font-weight:normal; color:#CC0000"></span>
              </dt>
              <dd>
                <select name="news_lang" id="">
                  <option value="1">Tiếng việt</option>
                  <option value="2">Tiếng anh</option>
                </select>
              </dd>
          <dt>
              <label for="custom_collection_title">Danh mục</label>
              <span style="font-weight:normal; color:#CC0000"></span></dt>
            <dd>
              <select name="cago_id" id="">
              	<?php 
					if(isset($list_cago) && $list_cago != NULL){
						foreach($list_cago as $cago){
							echo "<option value='".$cago['cago_id']."'>".$cago['cago_name']."</option>";
						}
					}
				?>
              </select>
            </dd>
            <dt>
              <label>Tiêu đề</label>
            </dt>
            <dd>
              <input id="news_title" type="text" name="news_title" class="name-title" value="" size="70">
            </dd>
            <dt>
              <label>URL Rewrite</label>
            </dt>
            <dd>
              <input id="news_rewrite" type="text" name="news_rewrite" class="name-rewrite" value="" size="70">
            </dd>
            <!--<dt><label>Link Index</label></dt>
                   <dd><input  type="text" name="url_index" value="" size="70"></dd>   -->
            
            <dt>
              <label>Link tham khảo (link web ngoài nếu có)</label>
            </dt>
            <dd>
              <input type="text" name="news_external" value="" size="70" id="news_external">
            </dd>
            <dt>
              <label>Tóm tắt chính</label>
            </dt>
            <dd>
              <textarea name="news_info" id="news_info" style="width:500px" cols="50" rows="8" onkeydown="show_length(this.value)"></textarea>
              <span id="show_length"></span></dd>

          </td>
        </tr>
        <tr class="row-header">
          <td colspan="2"> Mô tả chi tiết (nếu có) </td>
        </tr>
        <tr>
          <td valign="top">
            <br />
            <div id="article_media_holder">
			<style type="text/css">
				a.preview_media{
				position:relative; /*this is the key*/
				z-index:24;}
				a.preview_media:hover{z-index:25; cursor:pointer}
				a.preview_media span{display: none}
				a.preview_media:hover span{
				display:block;
				position:absolute;
				top:-120px; left:50px; width:auto;
				text-align: center}
			</style>
            </div></td>
          <td>
          <!-- <textarea name="content" id="rich_text" cols="60" rows="18" aria-hidden="true" style="display: none;"> </textarea> -->
          
          <?php 
				$fck = new FCKeditor('news_full');
				$fck->BasePath = sBASEPATH;
				//$fck->Value  = $get['news_full'];
				$fck->Width  = '100%';
				$fck->Height = 500;
				$fck->Create();
			?>
            
            </td>
        </tr>
        <!-- <tr>
          <td align="right">Thứ tự :</td>
          <td><input type="text" size="10" name="ordering" value="0">
            (* số cao xếp trước) </td>
        </tr> -->
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr class="row-header">
          <td colspan="2">Dùng cho SEO</td>
        </tr>
        <tr>
          <td style="padding-bottom: 5px;" align="right">Meta Keywords : &nbsp;</td>
          <td style="padding-bottom: 5px;"><input type="text" size="60" name="news_key" value="" id="news_key"></td>
        </tr>
        <tr>
          <td align="right">Meta Description : &nbsp;</td>
          <td><textarea cols="60" rows="6" name="news_des" id="news_des"></textarea></td>
        </tr>
        <!--<tr>
    	<td align="right">Url Follow : &nbsp;</td>
        <td><input type="checkbox" name="allow_se_index" value="1" checked /> Do-follow <span class="note"> (* bỏ chọn sẽ gắn thên rel='nofollow' vào link bài )</span></td>
    </tr>-->
        <tr>
          <td colspan="2"><div class="group-actions">
              <input type="hidden" name="action" value="update">
              <input type="hidden" name="l" value="">
              <input class="btn" id="ok" name="ok" type="submit" value="Thêm mới &gt;&gt;">
              hoặc <a href="">Hủy bỏ</a> </div></td>
        </tr>
      </tbody>
    </table>
    
  </form>
</div>
<style type="text/css">
  #tb-article-form select { padding: 5px; }
  input[type='text'] {
    padding: 5px;
  }
  textarea {
    width: 750px;
  }
</style>
