<?php
/**
	 * Check if font is selected then echo "selected", else return nothing
	 *
	 * @access	public
	 * @since	1.0.0
	 *
	 * @return	void
	 */

	function check_selected_fonts($selected) { 

        $fonts = get_option('tfe-fonts');
        if ($fonts){
            if (in_array($selected , $fonts)) {
                echo "selected";
            } else { 
                return '';
            }
         }      
	}
?>
<div class="tf-container">
        <div class="title">
            <h1>Thai Fonts For Elementor</h1>
        </div>
        <div class="content">
                                <form method="post" action="options.php">
                                <?php   settings_fields( 'tfe_settings' );
                                        do_settings_sections( 'tfe_settings' );?>
                                <div class="select-multiple">
                                            <select name="tfe-fonts[]" multiple size="4">
                                                <option value="Noto-Sans-Thai" <?php check_selected_fonts("noto-sans-thai"); ?>>Noto Sans Thai</option>
                                                <option value="noto-serif-thai" <?php check_selected_fonts("noto-serif-thai"); ?>>Noto Serif Thai</option>
                                                <option value="moonjelly" <?php check_selected_fonts("moonjelly"); ?>>Moonjelly</option>
                                                <option value="ibm-plex-thai" <?php check_selected_fonts("ibm-plex-thai"); ?>>IBM Plex Thai</option>
                                                <option value="cs-prajad" <?php check_selected_fonts("cs-prajad"); ?>>CS Prajad</option>
                                                <option value="cs-chatthai-ui" <?php check_selected_fonts("cs-chatthai-ui"); ?>>CS Chatthai UI</option>
                                                <option value="cloud" <?php check_selected_fonts("cloud"); ?>>Cloud</option>
                                                <option value="boon" <?php check_selected_fonts("boon"); ?>>Boon</option>
                                                <option value="Anuphan" <?php check_selected_fonts("Anuphan"); ?>>Anuphan</option>
                                                <option value="Anakotmai" <?php check_selected_fonts("Anakotmai"); ?>>Anakotmai</option>
                                                <option value="Silpakorn" <?php check_selected_fonts("Silpakorn"); ?>>Silpakorn</option>
                                            </select>
                                            </div>
                                            <button type="submit" class="tf-button">Save Settings</button>
                                </form>
                            </div>
</div>

