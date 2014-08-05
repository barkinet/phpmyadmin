<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * phpMyAdmin designer general code
 *
 * @package PhpMyAdmin-Designer
 */

if (! defined('PHPMYADMIN')) {
    exit;
}

/**
 * Returns HTML for including some variable to be accessed by JavaScript
 *
 * @param array $script_tables        array on foreign key support for each table
 * @param array $script_contr         initialization data array
 * @param array $script_display_field display fields of each table
 * @param int   $display_page         page number of the selected page
 *
 * @return string html
 */
function PMA_getHtmlForJSFields(
    $script_tables, $script_contr, $script_display_field, $display_page
) {
    $cfgRelation = PMA_getRelationsParam();

    $html  = '<div id="script_server" class="hide">';
    $html .= htmlspecialchars($GLOBALS['server']);
    $html .= '</div>';
    $html .= '<div id="script_db" class="hide">';
    $html .= htmlspecialchars($_GET['db']);
    $html .= '</div>';
    $html .= '<div id="script_token" class="hide">';
    $html .= htmlspecialchars($_GET['token']);
    $html .= '</div>';
    $html .= '<div id="script_tables" class="hide">';
    $html .= htmlspecialchars(json_encode($script_tables));
    $html .= '</div>';
    $html .= '<div id="script_contr" class="hide">';
    $html .= htmlspecialchars(json_encode($script_contr));
    $html .= '</div>';
    $html .= '<div id="script_display_field" class="hide">';
    $html .= htmlspecialchars(json_encode($script_display_field));
    $html .= '</div>';
    $html .= '<div id="script_display_page" class="hide">';
    $html .= htmlspecialchars($display_page);
    $html .= '</div>';
    $html .= '<div id="pmd_tables_enabled" class="hide">';
    $html .= htmlspecialchars($cfgRelation['pdfwork']);
    $html .= '</div>';

    return $html;
}

/**
 * Returns HTML for the top menu bar of the designer page
 *
 * @param string $selected_page name of the selected page
 *
 * @return string html
 */
function PMA_getDesignerPageTopMenu($selected_page)
{
    $html  = '<div class="pmd_header" id="top_menu">';

    $html .= '<a href="#" onclick="Show_left_menu('
        . 'document.getElementById(\'key_Show_left_menu\')' . '); return false" ';
    $html .= 'class="M_butt first" target="_self">';
    $html .= '<img id="key_Show_left_menu" ';
    $html .= 'title="' . __('Show/Hide left menu') . '" alt="v" ';
    $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/downarrow2_m.png')
        . '" />';
    $html .= '</a>';

    $html .= '<a href="#" id="enterFullscreen" ';
    $html .= 'onclick="Enter_fullscreen(); return false" ';
    $html .= 'class="M_butt" target="_self">';
    $html .= '<img title="' . __('View in fullscreen') . '" alt="" ';
    $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/viewInFullscreen.png')
        . '" />';
    $html .= '</a>';

    $html .= '<a href="#" id="exitFullscreen" ';
    $html .= 'onclick="Exit_fullscreen(); return false" ';
    $html .= 'class="M_butt hide" target="_self">';
    $html .= '<img title="' . __('Exit fullscreen') . '" alt="" ';
    $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/exitFullscreen.png')
        . '" />';
    $html .= '</a>';

    $html .= '<img class="M_bord" alt="" ';
    $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/bord.png') . '" />';

    $html .= '<a href="#" onclick="New(); return false" ';
    $html .= 'class="M_butt" target="_self">';
    $html .= '<img title="' . __('New page') . '"alt="" ';
    $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/page_add.png')
        . '" />';
    $html .= '</a>';

    $html .= '<a href="#" onclick="Edit_pages(); return false" ';
    $html .= 'class="M_butt ajax" target="_self">';
    $html .= '<img title="' . __('Open page') . '" alt="" ';
    $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/page_edit.png')
        . '" />';
    $html .= '</a>';

    $html .= '<a href="#" onclick="Save3(); return false" ';
    $html .= 'class="M_butt" target="_self">';
    $html .= '<img title="' . __('Save position') . '" alt="" ';
    $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/save.png') . '" />';
    $html .= '</a>';

    $html .= '<a href="#" onclick="Save_as(); return false" ';
    $html .= 'class="M_butt ajax" target="_self">';
    $html .= '<img title="' . __('Save positions as') . '" alt="" ';
    $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/save_as.png')
        . '" />';
    $html .= '</a>';

    $html .= '<a href="#" onclick="Delete_pages(); return false" ';
    $html .= 'class="M_butt ajax" target="_self">';
    $html .= '<img title="' . __('Delete pages') . '" alt="" ';
    $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/page_delete.png')
        . '" />';
    $html .= '</a>';

    $html .= '<img class="M_bord" alt="" ';
    $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/bord.png') . '" />';

    $html .= '<a href="#" onclick="Start_table_new(); return false" ';
    $html .= 'class="M_butt" target="_self">';
    $html .= '<img title="' . __('Create table') . '" alt="" ';
    $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/table.png') . '" />';
    $html .= '</a>';

    $html .= '<a href="#" onclick="Start_relation(); return false" class="M_butt" ';
    $html .= 'id="rel_button" target="_self">';
    $html .= '<img title="' . __('Create relation') . '" alt="" ';
    $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/relation.png')
        . '" />';
    $html .= '</a>';

    $html .= '<a href="#" onclick="Start_display_field(); return false" ';
    $html .= 'class="M_butt" id="display_field_button" target="_self">';
    $html .= '<img title="' . __('Choose column to display') . '" alt="" ';
    $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/display_field.png')
        . '" />';
    $html .= '</a>';

    $html .= '<a href="#" onclick="location.reload(); return false" class="M_butt" ';
    $html .= 'target="_self">';
    $html .= '<img title="' . __('Reload') . '" alt="" ';
    $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/reload.png') . '" />';
    $html .= '</a>';

    $html .= '<a href="' . PMA_Util::getDocuLink('faq', 'faq6-31') . '" ';
    $html .= 'target="documentation" class="M_butt" target="_self">';
    $html .= '<img title="' . __('Help') . '" alt="" ';
    $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/help.png') . '" />';
    $html .= '</a>';

    $html .= '<img class="M_bord" alt="" ';
    $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/bord.png') . '" />';

    $html .= '<a href="#" onclick="Angular_direct(); return false" ';
    $html .= 'class="M_butt" id="angular_direct_button" target="_self">';
    $html .= '<img alt="" ';
    $html .= 'title="' . __('Angular links') . ' / ' . __('Direct links') . '" ';
    $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/ang_direct.png')
        . '" />';
    $html .= '</a>';

    $html .= '<a href="#" onclick="Grid(); return false" class="M_butt" ';
    $html .= 'id="grid_button" target="_self">';
    $html .= '<img title="' . __('Snap to grid') . '>" alt="" ';
    $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/grid.png') . '" />';
    $html .= '</a>';

    $html .= '<img class="M_bord" alt="" ';
    $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/bord.png') . '" />';

    $html .= '<a href="#" onclick="Small_tab_all('
        . 'document.getElementById("key_SB_all")); return false" ';
    $html .= 'class="M_butt" target="_self">';
    $html .= '<img id="key_SB_all" title="' . __('Small/Big All') . '" alt="v" ';
    $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/downarrow1.png')
        . '" />';
    $html .= '</a>';

    $html .= '<a href="#" onclick="Small_tab_invert(); return false" ';
    $html .= 'class="M_butt" target="_self" >';
    $html .= '<img title="' . __('Toggle small/big') . '" alt="key" ';
    $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/bottom.png')
        . '" />';
    $html .= '</a>';

    $html .= '<a href="#" onclick="Relation_lines_invert(); return false"';
    $html .= 'class="M_butt" target="_self" >';
    $html .= '<img title="' . __('Toggle relation lines') . '" alt="key" ';
    $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/toggle_lines.png')
        . '" />';
    $html .= '</a>';

    $html .= '<img class="M_bord" alt="" ';
    $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/bord.png') . '" />';
    $html .= '<span id="page_name">' . htmlspecialchars($selected_page) . '</span>';
    $html .= '<img class="M_bord" alt="" ';
    $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/bord.png') . '" />';

    $html .= '<a href="#" onclick="Export_pages(); return false" ';
    $html .= 'class="M_butt" target="_self" >';
    $html .= '<img title="' . __('Export schema') . '" alt="key" ';
    $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/export.png') . '" />';
    $html .= '</a>';

    $html .= '<img class="M_bord" alt="" ';
    $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/bord.png') . '" />';

    if (isset($_REQUEST['query'])) {
        $html .= '<a href="#" onclick="build_query(\'SQL Query on Database\', 0)" ';
        $html .= 'onmousedown="return false;" class="M_butt" target="_self">';
        $html .= '<img alt="key" width="20" height="20" ';
        $html .= 'title="' .  __('Build Query') . '" ';
        $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/query_builder.png')
            . '" />';
        $html .= '</a>';
    }

    $html .= '<a href="#" onclick="Top_menu_right('
        . 'document.getElementById("key_Left_Right")); return false" ';
    $html .= 'class="M_butt last" target="_self">';
    $html .= '<img id="key_Left_Right" alt=">" title="' . __('Move Menu') . '"';
    $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/2rightarrow_m.png')
        . '" />';
    $html .= '</a>';

    $html .= '</div>';

    return $html;
}

/**
 * Returns HTML for the canvas element
 *
 * @return string html
 */
function PMA_getHTMLCanvas()
{
    $html  = '<div id="osn_tab">';
    $html .= '<canvas class="pmd" id="canvas" width="100" height="100" ';
    $html .= 'onclick="Canvas_click(this)"></canvas>';
    $html .= '</div>';

    return $html;
}

/**
 * Return HTML for the table list
 *
 * @param array $tab_pos      table positions
 * @param int   $display_page page number of the selected page
 *
 * @return string html
 */
function PMA_getHTMLTableList($tab_pos, $display_page)
{
    $html  = '<div id="layer_menu" style="display:none;">';

    $html .= '<div class="center" style="padding-top:5px;">';

    $html .= '<a href="#" class="M_butt" target="_self" ';
    $html .= 'onclick="Hide_tab_all(document.getElementById(\'key_HS_all\')); ';
    $html .= 'return false">';
    $html .= '<img title="' . __('Hide/Show all') . '" alt="v" id="key_HS_all" ';
    $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/downarrow1.png')
    . '" />';
    $html .= '</a>';

    $html .= '<a href="#" class="M_butt" target="_self" ';
    $html .= 'onclick="No_have_constr(document.getElementById(\'key_HS\')); ';
    $html .= 'return false">';
    $html .= '<img alt="v" id="key_HS" ';
    $html .= 'title="' . __('Hide/Show Tables with no relation') . '"';
    $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/downarrow2.png')
    . '" />';
    $html .= '</a>';

    $html .= '</div>';

    $html .= '<div id="id_scroll_tab" class="scroll_tab">';

    $html .= '<table width="100%" style="padding-left: 3px;">';

    $name_cnt = count($GLOBALS['PMD']['TABLE_NAME']);
    for ($i = 0; $i < $name_cnt; $i++) {

        $html .= '<tr>';

        $html .= '<td title="' . __('Structure') . '" width="1px" ';
        $html .= 'onmouseover="this.className=\'L_butt2_2\'" ';
        $html .= 'onmouseout="this.className=\'L_butt2_1\'" class="L_butt2_1">';
        $html .= '<img onclick="Start_tab_upd(\'';
        $html .= $GLOBALS['PMD_URL']["TABLE_NAME_SMALL"][$i] . '\');" alt="" ';
        $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/exec.png')
            . '"/>';
        $html .= '</td>';

        $html .= '<td width="1px">';
        $html .= '<input onclick="VisibleTab(this,\'';
        $html .= $GLOBALS['PMD_URL']["TABLE_NAME"][$i] . '\')" ';
        $html .= 'title="' . __('Hide') . '" ';
        $html .= 'id="check_vis_' . $GLOBALS['PMD_URL']["TABLE_NAME"][$i] . '" ';
        $html .= 'style="margin:0px;" type="checkbox" ';
        $html .= 'value="' . $GLOBALS['PMD_URL']["TABLE_NAME"][$i] . '"';

        if ((isset($tab_pos[$GLOBALS['PMD']["TABLE_NAME"][$i]])
            && $tab_pos[$GLOBALS['PMD']["TABLE_NAME"][$i]]["H"])
            || $display_page == -1
        ) {
            $html .= 'checked="checked"';
        }
        $html .= '/></td>';

        $html .= '<td class="pmd_Tabs" ';
        $html .= 'onmouseover="this.className=\'pmd_Tabs2\'" ';
        $html .= 'onmouseout="this.className=\'pmd_Tabs\'" ';
        $html .= 'onclick="Select_tab(\'';
        $html .= $GLOBALS['PMD_URL']["TABLE_NAME"][$i] . '\');">';
        $html .= $GLOBALS['PMD_OUT']["TABLE_NAME"][$i];
        $html .= '</td>';

        $html .= '</tr>';
    }

    $html .= '</table>';
    $html .= '</div>'; // end id_scroll_tab

    $html .= '<div class="center">' . __('Number of tables:') . ' ' . $name_cnt . '</div>';
    $html .= '<div class="floatright">';
    $html .= '<div id="layer_menu_sizer" onmousedown="layer_menu_cur_click=1"></div>';
    $html .= '</div>';

    $html .= '</div>'; // end layer_menu

    return $html;
}

/**
 * Get HTML to display tables on designer page
 *
 * @param array $tab_pos                  tables positions
 * @param int   $display_page             page number of the selected page
 * @param array $tab_column               table column info
 * @param array $tables_all_keys          all indices
 * @param array $tables_pk_or_unique_keys unique or primary indices
 *
 * @return string html
 */
function PMA_getDatabaseTables(
    $tab_pos, $display_page, $tab_column, $tables_all_keys, $tables_pk_or_unique_keys
) {
    $html  = '';
    for ($i = 0; $i < count($GLOBALS['PMD']["TABLE_NAME"]); $i++) {
        $t_n = $GLOBALS['PMD']["TABLE_NAME"][$i];
        $t_n_url = $GLOBALS['PMD_URL']["TABLE_NAME"][$i];

        $html .= '<input name="t_x[' . $t_n_url . ']" type="hidden" id="t_x_'
            . $t_n_url . '_" />';
        $html .= '<input name="t_y[' . $t_n_url . ']" type="hidden" id="t_y_'
            . $t_n_url . '_" />';
        $html .= '<input name="t_v[' . $t_n_url . ']" type="hidden" id="t_v_'
            . $t_n_url . '_" />';
        $html .= '<input name="t_h[' . $t_n_url . ']" type="hidden" id="t_h_'
            . $t_n_url . '_" />';

        $html .= '<table id="' . $t_n_url . '" cellpadding="0" cellspacing="0" ';
        $html .= 'class="pmd_tab" style="position:absolute;';
        $html .= 'left:';
        $html .= (isset($tab_pos[$t_n]) ? $tab_pos[$t_n]["X"] : rand(20, 700)) . 'px;';
        $html .= 'top:';
        $html .= (isset($tab_pos[$t_n]) ? $tab_pos[$t_n]["Y"] : rand(20, 550)) . 'px;';
        $html .= 'display:';
        $html .= (isset($tab_pos[$t_n]) || $display_page == -1) ? 'block;' : 'none;';
        $html .= 'z-index: 1;">';

        $html .= '<thead>';
        $html .= '<tr>';

        if (isset($_REQUEST['query'])) {
            $html .= '<td class="select_all">';
            $html .= '<input type="checkbox" style="margin: 0px;" ';
            $html .= 'value="select_all_' . htmlspecialchars($t_n_url) . '" ';
            $html .= 'id="select_all_' . htmlspecialchars($t_n_url) . '" ';
            $html .= 'title="select all" ';
            $html .= 'onclick="Select_all(\'' . htmlspecialchars($t_n_url) . '\',';
            $html .= '\'' . htmlspecialchars($GLOBALS['PMD_OUT']["OWNER"][$i]) . '\'';
            $html .= ')">';
            $html .= '</td>';
        }

        $html .= '<td class="small_tab" ';
        $html .= 'id="id_hide_tbody_' . $t_n_url . '" ';
        $html .= 'onmouseover="this.className=\'small_tab2\';" ';
        $html .= 'onmouseout="this.className=\'small_tab\';" ';
        $html .= 'onclick="Small_tab(' . $t_n_url . ', 1)">';

        // no space alloawd here, between tags and content !!!
        // JavaScript function does require this
        if (! isset($tab_pos[$t_n]) || ! empty($tab_pos[$t_n]["V"])) {
            $html .= 'v';
        } else {
            $html .= '&gt;';
        }

        $html .= '</td>';

        $html .= '<td class="small_tab_pref" ';
        $html .= 'onmouseover="this.className=\'small_tab_pref2\';" ';
        $html .= 'onmouseout="this.className=\'small_tab_pref\';" ';
        $html .= 'onclick="Start_tab_upd('
            . $GLOBALS['PMD_URL']["TABLE_NAME_SMALL"][$i] . ');">';
        $html .= '<img alt="" ';
        $html .= 'src="' . $_SESSION['PMA_Theme']->getImgPath('pmd/exec_small.png')
            . '" />';
        $html .= '</td>';

        $html .= '<td id="id_zag_' . $t_n_url . '" class="tab_zag nowrap" ';
        $html .= 'onmousedown="cur_click=document.getElementById(\''
            . $t_n_url . '\');" ';
        $html .= 'onmouseover="Table_onover(\''
            . $t_n_url . '\',0,' . (isset($_REQUEST['query']) ? 1 : 0 ) . ')" ';
        $html .= 'onmouseout="Table_onover(\''
            . $t_n_url . '\',1,' . (isset($_REQUEST['query']) ? 1 : 0 ) . ')">';
        $html .= '<span class="owner">';
        $html .= $GLOBALS['PMD_OUT']["OWNER"][$i] . '.';
        $html .= '</span>';
        $html .= $GLOBALS['PMD_OUT']["TABLE_NAME_SMALL"][$i];
        $html .= '</td>';

        if (isset($_REQUEST['query'])) {
            $html .= '<td class="tab_zag" ';
            $html .= 'id="id_zag_' . htmlspecialchars($t_n_url) . '_2" ';
            $html .= 'onmouseover="Table_onover(\''
                . htmlspecialchars($t_n_url) . '\',0,1)" ';
            $html .= 'onmousedown="cur_click=document.getElementById(\''
                . htmlspecialchars($t_n_url) . '\');" ';
            $html .= 'onmouseout="Table_onover(\''
                . htmlspecialchars($t_n_url) . '\',1,1)">';
        }

        $html .= '</tr>';
        $html .= '</thead>';

        $html .= '<tbody id="id_tbody_' . $t_n_url . '" ';
        if (isset($tab_pos[$t_n]) && empty($tab_pos[$t_n]["V"])) {
            $html .= 'style="display: none;"';
        }
        $html .= '>';
        $display_field = PMA_getDisplayField(
            $_GET['db'],
            $GLOBALS['PMD']["TABLE_NAME_SMALL"][$i]
        );
        for (
            $j = 0, $id_cnt = count($tab_column[$t_n]["COLUMN_ID"]);
            $j < $id_cnt;
            $j++
        ) {
            $html .= '<tr id="id_tr_'
                . $GLOBALS['PMD_URL']["TABLE_NAME_SMALL"][$i] . '.'
                . urlencode($tab_column[$t_n]["COLUMN_NAME"][$j]) . '" ';

            if ($display_field == $tab_column[$t_n]["COLUMN_NAME"][$j]) {
                $html .= 'class="tab_field_3" ';
            } else {
                $html .= 'class="tab_field" ';
            }

            $html .= 'onmouseover="old_class = this.className; ';
            $html .= 'this.className = \'tab_field_2\';" ';
            $html .= 'onmouseout="this.className = old_class;" ';
            $html .= 'onmousedown="Click_field(';
            $html .= '\'' . $GLOBALS['PMD_URL']["TABLE_NAME_SMALL"][$i] . '\',';
            $html .= '\'' . urlencode($tab_column[$t_n]["COLUMN_NAME"][$j]) . '\',';

            $tmpColumn = $t_n . "." . $tab_column[$t_n]["COLUMN_NAME"][$j];

            if (!PMA_Util::isForeignKeySupported($GLOBALS['PMD']['TABLE_TYPE'][$i])) {
                $html .= (isset($tables_pk_or_unique_keys[$tmpColumn]) ? 1 : 0);
            } else {
                // if foreign keys are supported, it's not necessary that the
                // index is a primary key
                $html .= (isset($tables_all_keys[$tmpColumn]) ? 1 : 0);
            }
            $html .= ')"';
            $html .= '>';

            if (isset($_REQUEST['query'])) {
                $html .= '<td class="select_all">';
                $html .= '<input value="' . htmlspecialchars($t_n_url)
                    . urlencode($tab_column[$t_n]["COLUMN_NAME"][$j]) . '"';
                $html .= 'type="checkbox" id="select_' . htmlspecialchars($t_n_url)
                    . '._' . urlencode($tab_column[$t_n]["COLUMN_NAME"][$j]) . '" ';
                $html .= 'style="margin: 0px;" title="select_'
                    . urlencode($tab_column[$t_n]["COLUMN_NAME"][$j]) . '" ';
                $html .= 'onclick="store_column(\''
                    . urlencode($GLOBALS['PMD_OUT']["TABLE_NAME_SMALL"][$i]) . '\',\''
                    . htmlspecialchars($GLOBALS['PMD_OUT']["OWNER"][$i]) . '\',\''
                    . urlencode($tab_column[$t_n]["COLUMN_NAME"][$j]) . '\')"></td>';
            }

            $html .= '<td width="10px" colspan="3"';
            $html .= 'id="' . $t_n_url . '.'
                . urlencode($tab_column[$t_n]["COLUMN_NAME"][$j]) . '">';
            $html .= '<div class="nowrap">';

            if (isset($tables_pk_or_unique_keys[$t_n . "." . $tab_column[$t_n]["COLUMN_NAME"][$j]])) {

                $html .= '<img src="' . $_SESSION['PMA_Theme']->getImgPath()
                    . 'pmd/FieldKey_small.png" alt="*" />';

            } else {

                $html .= '<img src="' . $_SESSION['PMA_Theme']->getImgPath()
                    . 'pmd/Field_small';

                if (strstr($tab_column[$t_n]["TYPE"][$j], 'char')
                    || strstr($tab_column[$t_n]["TYPE"][$j], 'text')
                ) {
                    $html .= '_char';
                } elseif (strstr($tab_column[$t_n]["TYPE"][$j], 'int')
                    || strstr($tab_column[$t_n]["TYPE"][$j], 'float')
                    || strstr($tab_column[$t_n]["TYPE"][$j], 'double')
                    || strstr($tab_column[$t_n]["TYPE"][$j], 'decimal')
                ) {
                    $html .= '_int';
                } elseif (strstr($tab_column[$t_n]["TYPE"][$j], 'date')
                    || strstr($tab_column[$t_n]["TYPE"][$j], 'time')
                    || strstr($tab_column[$t_n]["TYPE"][$j], 'year')
                ) {
                    $html .= '_date';
                }

                $html .= '.png" alt="*" />';
            }

            $html .= htmlspecialchars(
                $tab_column[$t_n]["COLUMN_NAME"][$j] . " : "
                . $tab_column[$t_n]["TYPE"][$j],
                ENT_QUOTES
            );
            $html .= "</div>\n</td>\n";

            if (isset($_REQUEST['query'])) {
                $html .= '<td class="small_tab_pref" ';
                $html .= 'onmouseover="this.className=\'small_tab_pref2\';" ';
                $html .= 'onmouseout="this.className=\'small_tab_pref\';" ';
                $html .= 'onclick="Click_option(\'pmd_optionse\',\''
                    . urlencode($tab_column[$t_n]["COLUMN_NAME"][$j]) . '\',\''
                    . $GLOBALS['PMD_OUT']["TABLE_NAME_SMALL"][$i] . '\')" >';
                $html .=  '<img src="'
                    . $_SESSION['PMA_Theme']->getImgPath('pmd/exec_small.png')
                    . '" title="options" alt="" /></td> ';
            }
            $html .= "</tr>";
        }
        $html .= "</tbody>";
        $html .= "</table>";
    }

    return $html;
}

/**
 * Returns HTML for the new relations panel.
 *
 * @return string html
 */
function PMA_getNewRelationPanel()
{
    $html  = '<table id="layer_new_relation" style="display:none;" ';
    $html .= 'width="5%" cellpadding="0" cellspacing="0">';
    $html .= '<tbody>';
    $html .= '<tr>';
    $html .= '<td class="frams1" width="10px"></td>';
    $html .= '<td class="frams5" width="99%" ></td>';
    $html .= '<td class="frams2" width="10px"><div class="bor"></div></td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td class="frams8"></td>';
    $html .= '<td class="input_tab">';
    $html .= '<table width="168" class="center" cellpadding="2" cellspacing="0">';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<td colspan="2" class="center nowrap">';
    $html .= '<strong>' . __('Create relation') . '</strong>';
    $html .= '</td>';
    $html .= '</tr>';
    $html .= '</thead>';
    $html .= '<tbody id="foreign_relation">';
    $html .= '<tr>';
    $html .= '<td colspan="2" class="center nowrap"><strong>FOREIGN KEY</strong>';
    $html .= '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td width="58" class="nowrap">on delete</td>';
    $html .= '<td width="102"><select name="on_delete" id="on_delete">';
    $html .= '<option value="nix" selected="selected">--</option>';
    $html .= '<option value="CASCADE">CASCADE</option>';
    $html .= '<option value="SET NULL">SET NULL</option>';
    $html .= '<option value="NO ACTION">NO ACTION</option>';
    $html .= '<option value="RESTRICT">RESTRICT</option>';
    $html .= '</select>';
    $html .= '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td class="nowrap">on update</td>';
    $html .= '<td><select name="on_update" id="on_update">';
    $html .= '<option value="nix" selected="selected">--</option>';
    $html .= '<option value="CASCADE">CASCADE</option>';
    $html .= '<option value="SET NULL">SET NULL</option>';
    $html .= '<option value="NO ACTION">NO ACTION</option>';
    $html .= '<option value="RESTRICT">RESTRICT</option>';
    $html .= '</select>';
    $html .= '</td>';
    $html .= '</tr>';
    $html .= '</tbody>';
    $html .= '<tbody>';
    $html .= '<tr>';
    $html .= '<td colspan="2" class="center nowrap">';
    $html .= '<input type="button" class="butt" name="Button" ';
    $html .= 'value="' . __('OK') . '" onclick="New_relation()" />';
    $html .= '<input type="button" class="butt" name="Button" ';
    $html .= 'value="' . __('Cancel') . '" ';
    $html .= 'onclick="document.getElementById(\'layer_new_relation\').style.display = \'none\';" />';
    $html .= '</td>';
    $html .= '</tr>';
    $html .= '</tbody>';
    $html .= '</table>';
    $html .= '</td>';
    $html .= '<td class="frams6"></td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td class="frams4"><div class="bor"></div></td>';
    $html .= '<td class="frams7"></td>';
    $html .= '<td class="frams3"></td>';
    $html .= '</tr>';
    $html .= '</tbody>';
    $html .= '</table>';

    return $html;
}

/**
 * Returns HTML for the relations delete panel
 *
 * @return string html
 */
function PMA_getDeleteRelationPanel()
{
    $html  = '<table id="layer_upd_relation" style="display:none;" ';
    $html .= 'width="5%" cellpadding="0" cellspacing="0">';
    $html .= '<tbody>';
    $html .= '<tr>';
    $html .= '<td class="frams1" width="10px"></td>';
    $html .= '<td class="frams5" width="99%"></td>';
    $html .= '<td class="frams2" width="10px"><div class="bor"></div></td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td class="frams8"></td>';
    $html .= '<td class="input_tab">';
    $html .= '<table width="100%" class="center" cellpadding="2" cellspacing="0">';
    $html .= '<tr>';
    $html .= '<td colspan="3" class="center nowrap">';
    $html .= '<strong>' . __('Delete relation') . '</strong>';
    $html .= '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td colspan="3" class="center nowrap">';
    $html .= '<input name="Button" type="button" class="butt" ';
    $html .= 'onclick="Upd_relation()" value="' . __('Delete') . '" />';
    $html .= '<input type="button" class="butt" name="Button" ';
    $html .= 'value="' . __('Cancel') . '" ';
    $html .= 'onclick="document.getElementById(\'layer_upd_relation\').style.display = \'none\'; Re_load();" />';
    $html .= '</td>';
    $html .= '</tr>';
    $html .= '</table></td>';
    $html .= '<td class="frams6"></td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td class="frams4"><div class="bor"></div></td>';
    $html .= '<td class="frams7"></td>';
    $html .= '<td class="frams3"></td>';
    $html .= '</tr>';
    $html .= '</tbody>';
    $html .= '</table>';

    return $html;
}

/**
 * Returns HTML for the options panel
 *
 * @return string html
 */
function PMA_getOptionsPanel()
{
    $html  = '<table id="pmd_optionse" style="display:none;" ';
    $html .= 'width="5%" cellpadding="0" cellspacing="0">';
    $html .= '<tbody>';

    $html .= '<tr>';
    $html .= '<td class="frams1" width="10px"></td>';
    $html .= '<td class="frams5" width="99%" ></td>';
    $html .= '<td class="frams2" width="10px"><div class="bor"></div></td>';
    $html .= '</tr>';

    $html .= '<tr>';
    $html .= '<td class="frams8"></td>';
    $html .= '<td class="input_tab">';
    $html .= '<table width="168" class="center" cellpadding="2" cellspacing="0">';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<td colspan="2" rowspan="2" id="option_col_name" ';
    $html .= 'class="center nowrap">';
    $html .= '</td>';
    $html .= '</tr>';
    $html .= '</thead>';
    $html .= '<tbody id="where">';
    $html .= '<tr><td class="center nowrap"><b>WHERE</b></td></tr>';
    $html .= '<tr>';
    $html .= '<td width="58" class="nowrap">' . __('Relation operator') . '</td>';
    $html .= '<td width="102"><select name="rel_opt" id="rel_opt">';
    $html .= '<option value="--" selected="selected"> -- </option>';
    $html .= '<option value="="> = </option>';
    $html .= '<option value="&gt;"> &gt; </option>';
    $html .= '<option value="&lt;"> &lt; </option>';
    $html .= '<option value="&gt;="> &gt;= </option>';
    $html .= '<option value="&lt;="> &lt;= </option>';
    $html .= '<option value="NOT"> NOT </option>';
    $html .= '<option value="IN"> IN </option>';
    $html .= '<option value="EXCEPT">' . __('Except') . '</option>';
    $html .= '<option value="NOT IN"> NOT IN </option>';
    $html .= '</select>';
    $html .= '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td class="nowrap">' . __('Value') . '<br />' . __('subquery');
    $html .= '</td>';
    $html .= '<td><textarea id="Query" value="" cols="18"></textarea>';
    $html .= '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td class="center nowrap"><b>' . __('Rename to') . '</b></td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td width="58" class="nowrap">' . __('New name') . '</td>';
    $html .= '<td width="102"><input type="text" value="" id="new_name"/></td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td class="center nowrap"><b>' . __('Aggregate') . '</b></td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td width="58" class="nowrap">' . __('Operator') . '</td>';
    $html .= '<td width="102"><select name="operator" id="operator">';
    $html .= '<option value="---" selected="selected">---</option>';
    $html .= '<option value="sum" > SUM </option>';
    $html .= '<option value="min"> MIN </option>';
    $html .= '<option value="max"> MAX </option>';
    $html .= '<option value="avg"> AVG </option>';
    $html .= '<option value="count"> COUNT </option>';
    $html .= '</select>';
    $html .= '</td></tr>';
    $html .= '<tr>';
    $html .= '<td width="58" class="center nowrap"><b>GROUP BY</b></td>';
    $html .= '<td><input type="checkbox" value="groupby" id="groupby"/></td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td width="58" class="center nowrap"><b>ORDER BY</b></td>';
    $html .= '<td><input type="checkbox" value="orderby" id="orderby"/></td>';
    $html .= '</tr>';
    $html .= '<tr><td class="center nowrap"><b>HAVING</b></td></tr>';
    $html .= '<tr>';
    $html .= '<td width="58" class="nowrap">' . __('Operator') . '</td>';
    $html .= '<td width="102"><select name="h_operator" id="h_operator">';
    $html .= '<option value="---" selected="selected">---</option>';
    $html .= '<option value="None" >' . __('None') . '</option>';
    $html .= '<option value="sum" > SUM </option>';
    $html .= '<option value="min"> MIN </option>';
    $html .= '<option value="max"> MAX </option>';
    $html .= '<option value="avg"> AVG </option>';
    $html .= '<option value="count"> COUNT </option>';
    $html .= '</select>';
    $html .= '</td></tr>';
    $html .= '<tr>';
    $html .= '<td width="58" class="nowrap">' . __('Relation operator') . '</td>';
    $html .= '<td width="102"><select name="h_rel_opt" id="h_rel_opt">';
    $html .= '<option value="--" selected="selected"> -- </option>';
    $html .= '<option value="="> = </option>';
    $html .= '<option value="&gt;"> &gt; </option>';
    $html .= '<option value="&lt;"> &lt; </option>';
    $html .= '<option value="&gt;="> &gt;= </option>';
    $html .= '<option value="&lt;="> &lt;= </option>';
    $html .= '<option value="NOT"> NOT </option>';
    $html .= '<option value="IN"> IN </option>';
    $html .= '<option value="EXCEPT">' . __('Except') . '</option>';
    $html .= '<option value="NOT IN"> NOT IN </option>';
    $html .= '</select>';
    $html .= '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td width="58" class="nowrap">';
    $html .=  __('Value') . '<br/>';
    $html .=  __('subquery');
    $html .= '</td>';
    $html .= '<td width="102">';
    $html .= '<textarea id="having" value="" cols="18"></textarea>';
    $html .= '</td>';
    $html .= '</tr>';
    $html .= '</tbody>';
    $html .= '<tbody>';
    $html .= '<tr>';
    $html .= '<td colspan="2" class="center nowrap">';
    $html .= '<input type="button" class="butt" name="Button" ';
    $html .= 'value="' . __('OK') . '" onclick="add_object()" />';
    $html .= '<input type="button" class="butt" name="Button" ';
    $html .= 'value="' . __('Cancel') . '" ';
    $html .= 'onclick="Close_option()" />';
    $html .= '</td>';
    $html .= '</tr>';
    $html .= '</tbody>';
    $html .= '</table>';
    $html .= '</td>';
    $html .= '<td class="frams6"></td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td class="frams4"><div class="bor"></div></td>';
    $html .= '<td class="frams7"></td>';
    $html .= '<td class="frams3"></td>';
    $html .= '</tr>';
    $html .= '</tbody>';
    $html .= '</table>';

    return $html;
}

/**
 * Get HTML for the 'rename to' panel
 *
 * @return string html
 */
function PMA_getRenameToPanel()
{
    $html  = '<table id="query_rename_to" style="display:none;" ';
    $html .= 'width="5%" cellpadding="0" cellspacing="0">';
    $html .= '<tbody>';

    $html .= '<tr>';
    $html .= '<td class="frams1" width="10px"></td>';
    $html .= '<td class="frams5" width="99%" ></td>';
    $html .= '<td class="frams2" width="10px"><div class="bor"></div></td>';
    $html .= '</tr>';

    $html .= '<tr>';
    $html .= '<td class="frams8"></td>';
    $html .= '<td class="input_tab">';
    $html .= '<table width="168" class="center" cellpadding="2" cellspacing="0">';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<td colspan="2" class="center nowrap">';
    $html .= '<strong>' . __('Rename to') . '</strong>';
    $html .= '</td>';
    $html .= '</tr>';
    $html .= '</thead>';
    $html .= '<tbody id="rename_to">';
    $html .= '<tr>';
    $html .= '<td width="58" class="nowrap">' . __('New name') . '</td>';
    $html .= '<td width="102">';
    $html .= '<input type="text" value="" id="e_rename"/>';
    $html .= '</td>';
    $html .= '</tr>';
    $html .= '</tbody>';
    $html .= '<tbody>';
    $html .= '<tr>';
    $html .= '<td colspan="2" class="center nowrap">';
    $html .= '<input type="button" class="butt" name="Button" ';
    $html .= 'value="' . __('OK') . '" onclick="edit(\'Rename\')" />';
    $html .= '<input type="button" class="butt" name="Button" ';
    $html .= 'value="' . __('Cancel') . '" ';
    $html .= 'onclick="document.getElementById(\'query_rename_to\').style.display = \'none\';" />';
    $html .= '</td>';
    $html .= '</tr>';
    $html .= '</tbody>';
    $html .= '</table>';
    $html .= '</td>';
    $html .= '<td class="frams6"></td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td class="frams4"><div class="bor"></div></td>';
    $html .= '<td class="frams7"></td>';
    $html .= '<td class="frams3"></td>';
    $html .= '</tr>';
    $html .= '</tbody>';
    $html .= '</table>';

    return $html;
}

/**
 * Returns HTML for the 'having' panel
 *
 * @return string html
 */
function PMA_getHavingQueuryPanel()
{
    $html  = '<table id="query_having" style="display:none;" ';
    $html .= 'width="5%" cellpadding="0" cellspacing="0">';
    $html .= '<tbody>';
    $html .= '<tr>';
    $html .= '<td class="frams1" width="10px"></td>';
    $html .= '<td class="frams5" width="99%" ></td>';
    $html .= '<td class="frams2" width="10px"><div class="bor"></div></td>';
    $html .= '</tr>';

    $html .= '<tr>';
    $html .= '<td class="frams8"></td>';
    $html .= '<td class="input_tab">';
    $html .= '<table width="168" class="center" cellpadding="2" cellspacing="0">';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<td colspan="2" class="center nowrap"><strong>HAVING</strong></td>';
    $html .= '</tr>';
    $html .= '</thead>';
    $html .= '<tbody id="rename_to">';
    $html .= '<tr>';
    $html .= '<td width="58" class="nowrap">' . __('Operator') . '</td>';
    $html .= '<td width="102"><select name="hoperator" id="hoperator">';
    $html .= '<option value="---" selected="selected">---</option>';
    $html .= '<option value="None" > None </option>';
    $html .= '<option value="sum" > SUM </option>';
    $html .= '<option value="min"> MIN </option>';
    $html .= '<option value="max"> MAX </option>';
    $html .= '<option value="avg"> AVG </option>';
    $html .= '<option value="count"> COUNT </option>';
    $html .= '</select>';
    $html .= '</td></tr>';
    $html .= '<tr>';
    $html .= '<tr>';
    $html .= '<td width="58" class="nowrap">' . __('Operator') . '</td>';
    $html .= '<td width="102"><select name="hrel_opt" id="hrel_opt">';
    $html .= '<option value="--" selected="selected"> -- </option>';
    $html .= '<option value="="> = </option>';
    $html .= '<option value="&gt;"> &gt; </option>';
    $html .= '<option value="&lt;"> &lt; </option>';
    $html .= '<option value="&gt;="> &gt;= </option>';
    $html .= '<option value="&lt;="> &lt;= </option>';
    $html .= '<option value="NOT"> NOT </option>';
    $html .= '<option value="IN"> IN </option>';
    $html .= '<option value="EXCEPT">' . __('Except') . '</option>';
    $html .= '<option value="NOT IN"> NOT IN </option>';
    $html .= '</select>';
    $html .= '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td class="nowrap">' . __('Value') . ' <br />' . __('subquery');
    $html .= '</td>';
    $html .= '<td><textarea id="hQuery" value="" cols="18"></textarea>';
    $html .= '</td>';
    $html .= '</tr>';
    $html .= '</tbody>';
    $html .= '<tbody>';
    $html .= '<tr>';
    $html .= '<td colspan="2" class="center nowrap">';
    $html .= '<input type="button" class="butt" name="Button" ';
    $html .= 'value="' . __('OK') . '" onclick="edit(\'Having\')" />';
    $html .= '<input type="button" class="butt" name="Button" ';
    $html .= 'value="' . __('Cancel') . '" ';
    $html .= 'onclick="document.getElementById(\'query_having\').style.display = \'none\';" />';
    $html .= '</td>';
    $html .= '</tr>';
    $html .= '</tbody>';
    $html .= '</table>';
    $html .= '</td>';
    $html .= '<td class="frams6"></td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td class="frams4"><div class="bor"></div></td>';
    $html .= '<td class="frams7"></td>';
    $html .= '<td class="frams3"></td>';
    $html .= '</tr>';
    $html .= '</tbody>';
    $html .= '</table>';

    return $html;
}

/**
 * Returns HTML for the 'aggregate' panel
 *
 * @return string html
 */
function PMA_getAggregateQueuryPanel()
{
    $html  = '<table id="query_Aggregate" style="display:none;"';
    $html .= 'width="5%" cellpadding="0" cellspacing="0">';
    $html .= '<tbody>';

    $html .= '<tr>';
    $html .= '<td class="frams1" width="10px"></td>';
    $html .= '<td class="frams5" width="99%" ></td>';
    $html .= '<td class="frams2" width="10px"><div class="bor"></div></td>';
    $html .= '</tr>';

    $html .= '<tr>';
    $html .= '<td class="frams8"></td>';
    $html .= '<td class="input_tab">';
    $html .= '<table width="168" class="center" cellpadding="2" cellspacing="0">';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<td colspan="2" class="center nowrap">';
    $html .= '<strong>' . __('Aggregate') . '</strong>';
    $html .= '</td>';
    $html .= '</tr>';
    $html .= '</thead>';
    $html .= '<tbody>';
    $html .= '<tr>';
    $html .= '<td width="58" class="nowrap">' . __('Operator') . '</td>';
    $html .= '<td width="102">';
    $html .= '<select name="operator" id="e_operator">';
    $html .= '<option value="---" selected="selected">---</option>';
    $html .= '<option value="sum" > SUM </option>';
    $html .= '<option value="min"> MIN </option>';
    $html .= '<option value="max"> MAX </option>';
    $html .= '<option value="avg"> AVG </option>';
    $html .= '<option value="avg"> COUNT </option>';
    $html .= '</select>';
    $html .= '</td></tr>';
    $html .= '</tbody>';
    $html .= '<tbody>';
    $html .= '<tr>';
    $html .= '<td colspan="2" class="center nowrap">';
    $html .= '<input type="button" class="butt" name="Button" ';
    $html .= 'value="' . __('OK') . '" onclick="edit(\'Aggregate\')" />';
    $html .= '<input type="button" class="butt" name="Button"';
    $html .= 'value="' . __('Cancel') . '" ';
    $html .= 'onclick="document.getElementById(\'query_Aggregate\').style.display = \'none\';" />';
    $html .= '</td>';
    $html .= '</tr>';
    $html .= '</tbody>';
    $html .= '</table>';
    $html .= '</td>';
    $html .= '<td class="frams6"></td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td class="frams4"><div class="bor"></div></td>';
    $html .= '<td class="frams7"></td>';
    $html .= '<td class="frams3"></td>';
    $html .= '</tr>';
    $html .= '</tbody>';
    $html .= '</table>';

    return $html;
}

/**
 * Returns HTML for the 'where' panel
 *
 * @return string html
 */
function PMA_getWhereQueuryPanel()
{
    $html  = '<table id="query_where" style="display:none;"';
    $html .= 'width="5%" cellpadding="0" cellspacing="0">';
    $html .= '<tbody>';

    $html .= '<tr>';
    $html .= '<td class="frams1" width="10px"></td>';
    $html .= '<td class="frams5" width="99%" ></td>';
    $html .= '<td class="frams2" width="10px"><div class="bor"></div></td>';
    $html .= '</tr>';

    $html .= '<tr>';
    $html .= '<td class="frams8"></td>';
    $html .= '<td class="input_tab">';
    $html .= '<table width="168" class="center" cellpadding="2" cellspacing="0">';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<td colspan="2" class="center nowrap"><strong>WHERE</strong></td>';
    $html .= '</tr>';
    $html .= '</thead>';
    $html .= '<tbody id="rename_to">';
    $html .= '<tr>';
    $html .= '<td width="58" class="nowrap">' . __('Operator') . '</td>';
    $html .= '<td width="102"><select name="erel_opt" id="erel_opt">';
    $html .= '<option value="--" selected="selected"> -- </option>';
    $html .= '<option value="=" > = </option>';
    $html .= '<option value="&gt;"> &gt; </option>';
    $html .= '<option value="&lt;"> &lt; </option>';
    $html .= '<option value="&gt;="> &gt;= </option>';
    $html .= '<option value="&lt;="> &lt;= </option>';
    $html .= '<option value="NOT"> NOT </option>';
    $html .= '<option value="IN"> IN </option>';
    $html .= '<option value="EXCEPT">' . __('Except') . '</option>';
    $html .= '<option value="NOT IN"> NOT IN </option>';
    $html .= '</select>';
    $html .= '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td class="nowrap">' . __('Value') . '<br />' . __('subquery');
    $html .= '</td>';
    $html .= '<td><textarea id="eQuery" value="" cols="18"></textarea>';
    $html .= '</td>';
    $html .= '</tr>';
    $html .= '</tbody>';
    $html .= '<tbody>';
    $html .= '<tr>';
    $html .= '<td colspan="2" class="center nowrap">';
    $html .= '<input type="button" class="butt" name="Button" ';
    $html .= 'value="' . __('OK') . '" onclick="edit(\'Where\')" />';
    $html .= '<input type="button" class="butt" name="Button" ';
    $html .= 'value="' . __('Cancel') . '" ';
    $html .= 'onclick="document.getElementById(\'query_where\').style.display = \'none\'" />';
    $html .= '</td>';
    $html .= '</tr>';

    $html .= '</tbody>';
    $html .= '</table>';
    $html .= '</td>';
    $html .= '<td class="frams6"></td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td class="frams4"><div class="bor"></div></td>';
    $html .= '<td class="frams7"></td>';
    $html .= '<td class="frams3"></td>';
    $html .= '</tr>';
    $html .= '</tbody>';
    $html .= '</table>';

    return $html;
}

/**
 * Returns HTML for the query details panel
 *
 * @return string html
 */
function PMA_getQueuryDetails()
{
    $html  = '<div class="panel">';
    $html .= '<div style="clear:both;"></div>';
    $html .= '<div id="ab"></div>';
    $html .= '<div style="clear:both;"></div>';
    $html .= '</div>';
    $html .= '<a class="trigger" href="#">' . __('Active options') . '</a>';
    $html .= '<div id="filter"></div>';
    $html .= '<div id="box">';
    $html .= '<span id="boxtitle"></span>';
    $html .= '<form method="post" action="db_qbe.php">';
    $html .= '<textarea cols="80" name="sql_query" id="textSqlquery"'
        . ' rows="15"></textarea><div id="tblfooter">';
    $html .= '  <input type="submit" name="submit_sql" class="btn" />';
    $html .= '  <input type="button" name="cancel" value="'
        . __('Cancel') . '" onclick="closebox()" class="btn" />';
    $html .= PMA_URL_getHiddenInputs($_GET['db']);
    $html .= '</div></p>';
    $html .= '</form></div>';

    return $html;
}

/**
 * Returne HTML to fetch some images eagerly.
 *
 * @return string html
 */
function PMA_getCacheImages()
{
    $html  = '<img src="';
    $html .= $_SESSION['PMA_Theme']->getImgPath('pmd/2leftarrow_m.png');
    $html .= '" width="0" height="0" alt="" />';
    $html .= '<img src="';
    $html .= $_SESSION['PMA_Theme']->getImgPath('pmd/rightarrow1.png');
    $html .= '" width="0" height="0" alt="" />';
    $html .= '<img src="';
    $html .= $_SESSION['PMA_Theme']->getImgPath('pmd/rightarrow2.png');
    $html .= '" width="0" height="0" alt="" />';
    $html .= '<img src="';
    $html .= $_SESSION['PMA_Theme']->getImgPath('pmd/uparrow2_m.png');
    $html .= '" width="0" height="0" alt="" />';
    $html .= '<div id="PMA_disable_floating_menubar"></div>';

    return $html;
}
 ?>