<?php  
  $roles = $this->session->userdata['roles'];
?>
<div class="paddings">
  <?php if($roles && $roles['customer']['add']): ?>
      <div id="action-links">
        <ul>
          <li id="add-prod"><a href="<?php echo base_url()."admin/customer/add" ?>">Thêm mới khách hàng</a></li>
        </ul>
      </div>
  <?php endif; ?>

  <table border="1" bordercolor="#CCCCCC" id="tb_padding" style="width:100%">
    <tbody>
      <tr style="background-color:#EEE; font-weight:bold;">
        <td width="5%" style="text-align:center;">STT</td>
        <td width="15%">Họ tên</td>
        <td width="20%">Email</td>
        <td width="10%">Quyền</td>
        <td width="11%">Thời gian tạo</td>
        <td width="13%">Đăng nhập lần cuối</td>
        <td width="10%">IP đăng nhập</td>
        <?php if($roles && $roles['customer']['edit']): ?>
            <td width="9%">Sửa</td>
        <?php endif; ?>

        <?php if($roles && $roles['customer']['del']): ?>
            <td width="7%">Xóa</td>
        <?php endif; ?>
      </tr>
      <?php
        if(isset($list_cus) && $list_cus != NULL){
            $stt = 0;
            foreach($list_cus as $value){
                $stt++;
      ?>
          <tr id="row_<?php echo $value['cus_id']; ?>" onMouseOver="this.className='row-hover'" onMouseOut="this.className=''" id="row_1" class="">
            <td style="text-align:center;"><?php echo $stt; ?></td>
            <td><?php echo $value['cus_fullname']; ?></td>
            <td><?php echo $value['cus_email']; ?></td>
            <td><?php if($value['cus_level'] == 1){echo "<span style='color:red'>Admin</span>";}else{echo "Member";}?></td>
            <td><?php echo $value['cus_date']; ?></td>
            <td><?php if($value['cus_lastlogin'] == NULL){echo "Chưa bao giờ";}else{echo $value['cus_lastlogin']; }?></td>
            <td><?php echo $value['cus_ip']; ?></td>
            <?php if($roles && $roles['customer']['edit']): ?>
                <td>
                    <a href="<?php echo base_url()."admin/customer/update/".$value['cus_id'].""; ?>">Sửa lại</a>
                </td>
            <?php endif; ?>

            <?php if($roles && $roles['customer']['del']): ?>
                <td>
                    <a href=''>Xóa</a>    
                </td>
            <?php endif; ?>
          </tr>
      <?php
            }
        }
      ?>
    </tbody>
  </table>
  <br />
  <div id="pagination"><?php  echo $this->pagination->create_links();?></div>
  
<script type="text/javascript">
    $(document).ready(function(e) {
        $(".status_active").live("click",function(){
            val = $(this).attr("name");
            rel = $(this).attr("rel");
            type = "bachnx";
            if(val == 1){
                $(this).css("background-color","#FFB800").html("Chưa kích hoạt");
                $(this).attr("name","0");
            }else{
                $(this).css("background","none").html("Hạ xuống");
                $(this).attr("name","1");
            }
            $.ajax({
                "url"   : "<?php echo base_url()."admin/customer/update_status"; ?>",
                "type"  : "post",
                "data"  : "val="+val+"&rel="+rel+"&type="+type,
                "async" : "false",
                success : function(result_active){
                    //$(".status_cago_active").html(result_active);
                }
            });
        });
    });
        
    
    function del_cus(id) {
        if(confirm("Bạn chắc chắn muốn xóa bỏ người dùng này ?")){
            $.post("<?php echo base_url()."admin/customer/del"; ?>", {action: "del_cus", id : id}, function(data) { $("#row_"+id).fadeOut();
            } );
        }
    }
</script>
  
 </div>
