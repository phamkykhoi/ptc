<div class="paddings">
  <form action="<?php echo base_url()."admin/news_category/update/".$get['cago_id'].""; ?>" method="post" enctype="multipart/form-data">
    <div class="group">
      <div class="group-fields">
        <dl>
          <dd>
            <input type="hidden" name="type" value="article">
          </dd>
          <dt class="top">
            <label for="custom_collection_title">Ngôn ngữ</label>
          </dt>
          <dd>
            <select name="cago_lang" id="">
              <option value="1" <?php echo $get['cago_lang'] == '1' ? 'selected' : '' ?>>Tiếng việt</option>
              <option value="2" <?php echo $get['cago_lang'] == '2' ? 'selected' : '' ?>>Tiếng anh</option>
            </select>
          </dd>
          <dt>
            <label for="custom_collection_title">Tên danh mục</label>
          </dt>
          <dd>
            <input type="text" size="80" name="cago_name" id="name" value="<?php echo $get['cago_name']; ?>">
          </dd>
          <dt>
            <label for="custom_collection_title">URL Rewrite</label>
          </dt>
          <dd>
            <input type="text" class="name-rewrite" size="80" name="cago_rewrite" id="name" value="<?php echo $get['cago_rewrite']; ?>">
          </dd>
          <dt>
            <label for="custom_collection_body_html">Tóm tắt</label>
            <span class="note">(nếu có)</span></dt>
          <dd style="margin-bottom: 0"> 
            <!-- editor -->
            <textarea name="cago_info" cols="60" rows="8" id="cago_info"><?php echo $get['cago_info']; ?></textarea>
            <!-- editor --> 
          </dd>
          <dt>
            <label for="custom_collection_body_html">Mô tả chi tiết</label>
            <span class="note">(nếu có)</span></dt>
          <dd style="margin-bottom: 0"> 
            <!-- editor -->
            <!-- <textarea name="description" cols="60" rows="8" id="rich_text" aria-hidden="true" style="display: none;"></textarea> -->
            <?php 
				$fck = new FCKeditor('cago_full');
				$fck->BasePath = sBASEPATH;
				$fck->Value  = $get['cago_full'];
				$fck->Width  = '100%';
				$fck->Height = 500;
				$fck->Create();
			?> 
            <!-- editor --> 
          </dd>

          <dt>
            <label>Thứ tự xuất hiện</label>
          </dt>
          <dd>
            <input type="text" size="10" name="cago_order" id="cago_order" value="<?php echo $get['cago_order']; ?>">
            (cao xếp trước)</dd>
          <dt>
            <label>Dùng cho SEO</label>
          </dt>
          <dd>
            <table>
              <tbody>
                <tr>
                  <td style="padding-bottom:5px;">Meta Keyword</td>
                  <td style="padding-bottom:5px;"><input type="text" size="50" name="cago_key" value="<?php echo $get['cago_key']; ?>" id="cago_key"></td>
                </tr>
                
                <tr>
                  <td>Meta Description</td>
                  <td><textarea cols="45" rows="6" name="cago_des" id="cago_des"><?php echo $get['cago_des']; ?></textarea>
                    <br />
                  <span class="note"> * nếu để trống sẽ dùng tóm tắt danh mục</span></td>
                </tr>
              </tbody>
            </table>
          </dd>
        </dl>
      </div>
      <!-- .group-fields -->
      <div class="group-actions">
        <input type="hidden" name="create" value="yes">
        <input type="hidden" name="l" value="">
        <input class="btn" id="ok" name="ok" type="submit" value="Cập nhật">
        hoặc <a href="">Hủy bỏ</a> </div>
      <!-- .group-actions --> 
    </div>
  </form>
</div>
<style type="text/css">
  textarea, input[type='text'] {
    width: 750px;
    padding: 5px;
  }
  select {
    padding: 5px;
  }
</style>