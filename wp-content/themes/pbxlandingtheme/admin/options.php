<div class="wrap">
    <h1>Theme options</h1>
    
    <form method="POST" action="">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="options[tonelp_logo_url]">Logo Image Link</label>
                    </th>
                    <td>
                        <input 
                            name="options[tonelp_logo_url]" 
                            type="text" 
                            value="<?= get_option("tonelp_logo_url", "wp-content/themes/pbxlandingtheme/images/logo.png") ?>" 
                            class="large-text"
                        />
                    </td>
                </tr>
                                
                <tr>
                    <th scope="row">
                        <label for="options[tonelp_footer_main_text]">Footer Main Text</label>
                    </th>
                    <td>
                        <?php 
                            wp_editor(
                                stripcslashes(get_option("tonelp_footer_main_text", "")),
                                "tonelp_footer_main_text", 
                                [
                                    'textarea_name' => "options[tonelp_footer_main_text]",
                                    'editor_class' => "large-text"                                            
                                ]
                            )
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <th scope="row">
                        <label for="options[tonelp_footer_contact_us_text]">Footer "Contact Us" Text</label>
                    </th>
                    <td>
                        <?php 
                            wp_editor(
                                stripcslashes(get_option("tonelp_footer_contact_us_text", "")),
                                "tonelp_footer_contact_us_text", 
                                [
                                    'textarea_name' => "options[tonelp_footer_contact_us_text]",
                                    'editor_class' => "large-text"                                            
                                ]
                            )
                        ?>
                    </td>
                </tr>      
            </tbody>
        </table>
        
        <input type="submit" class="button-primary" value="Save Changes">
    </form>
</div>
