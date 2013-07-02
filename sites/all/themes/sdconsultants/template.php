<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dominicmilburn
 * Date: 11/06/13
 * Time: 12:49 PM
 * To change this template use File | Settings | File Templates.
 */

function sdconsultants_links__system_main_menu($variables) {
        $html = "<ul>\n";
        foreach ($variables['links'] as $link) {

            $nav_item = $link['link'];
            $sub_nav_item = $link['below'];

            $html .= "<li>".l($nav_item['title'], $nav_item['href'], $nav_item)."</li>";

            if (count($sub_nav_item) >= 1)
            {
                $html .= '<ul class="sub-nav">';

                foreach ($sub_nav_item as $item)
                {
                    $html .= "<li>".l($item['link']['title'], $item['link']['href'], $item['link'])."</li>";
                }
                $html .= "</ul>";

            }

        }
        $html .= "  </ul>\n";

        return $html;
    }

function sdconsultants_field__field_related_case_studies($variables)
{
    $case_studies = $variables['element']['#items'];
    $html ='';
    foreach($case_studies as $study)
    {
        $node = node_load($study['target_id']);
        $id =  field_get_items('node', $node, 'field_case_study_category', $node->language);
        $category = taxonomy_term_load($id[0]['tid']);

        $safe_name = strtolower(str_replace(' ', '-',$category->name));

        $html .= '<a href="'.$GLOBALS['base_root'].'/filtered-case-studies/'.$safe_name.'/'.$node->nid.'"/>'.$node->title.'</a><br/>';

    }
    return $html;
}