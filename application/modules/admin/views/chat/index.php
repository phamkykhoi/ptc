
<script type="text/javascript" src="<?php echo base_url('public/admin/jquery-1.8.3.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/admin/chat.js') ?>"></script>
<link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url('public/admin/chat.css') ?>" />
<link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url('public/admin/screen.css') ?>" /> 
<!--[if lte IE 7]> <link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url('public/admin/screen_ie.css') ?>" /> <![endif]--> 
<table cellpadding="5" id="tb_padding" border="1" bordercolor="#CCCCCC" style="border-collapse:collapse;">
    <tbody>
      <tr class="bachnx_tab_td">
        <td style="text-align:center;">STT</td>
        <td width="100%">Tên Khách hàng</td>
      </tr>

    <?php 
    if(isset($listOfUsers)) { 
        foreach($listOfUsers->result() as $res) { 
            if ($res->user_id != $this->session->userdata('user_id')) {
    ?> 
        <tr>
            <td><?php echo $res->user_id; ?></td>
            <td>
                <a href="javascript:void(0)" onClick="javascript:chatWith('<?php echo $res->user_name; ?>');">
                <?php echo $res->user_name; ?> </a> 
            </td>
        </tr>

<?php }}} ?>

</tbody>
</table>