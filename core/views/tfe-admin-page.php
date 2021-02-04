<?php

$fontClass = new Addtional_Thai_Fonts();
$fonts = $fontClass->get_fonts();
$user_fonts = get_option('tfe-fonts');

function check_selected($data){

    $user_fonts = get_option('tfe-fonts');

    if(isset($user_fonts) && is_array($user_fonts)){

      if(in_array($data, $user_fonts)) {

        echo 'selected';

      } 

    } 

  }

?>

<div class="tf-container">
        <div class="title">
            <h1>Thai Fonts For Elementor</h1>
        </div>
        <div class="form">
        <p>เลือกฟอนต์ที่ต้องการใช้ใน Elementor</p>
                                <form method="post" action="options.php">
                                <?php   settings_fields( 'tfe_settings' );
                                        do_settings_sections( 'tfe_settings' );?>
                                <div class="select-multiple">
                                            <select id="myMulti" name="tfe-fonts[]" multiple="multiple">
                                            <?php foreach ($fonts as $slug => $name) { ?>
                                            <option value="<?php echo $slug; ?>" <?php check_selected($slug); ?>><?php echo $name; ?></option>
                                            <?php } ?>
                                            </select>
                                            </div>
                                            <button type="submit" class="tf-button">Save Settings</button>
                                </form>
                            </div>
          <div class="tf-font-list">
            <p>ฟอนต์ที่ใช้งานอยู่ :</p>
            <ul>
            <?php if(!empty($user_fonts)){
              foreach ($user_fonts as $user_font){  ?>
              <li><?php echo $user_font; ?></li>
            <?php }} ?> 
            </ul>
        </div>
</div>


