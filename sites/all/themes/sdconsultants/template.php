<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dominicmilburn
 * Date: 11/06/13
 * Time: 12:49 PM
 * To change this template use File | Settings | File Templates.
 */

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

function sdconsultants_field__field_case_study_pdf__case_study($variables)
{
    $files = $variables['items'];

    $file = $files[0]['#file'];

    $url = file_create_url($file->uri);

    // Set options as per anchor format described at
    // http://microformats.org/wiki/file-format-examples
    $options = array(
        'attributes' => array(
            'type' => $file->filemime . '; length=' . $file->filesize,
            'class' => 'case-study-file',
        ),
    );

    // Use the description as the link text if available.
    if (empty($file->description)) {
        $link_text = $file->filename;
    }
    else {
        $link_text = $file->description;
        $options['attributes']['title'] = check_plain($file->filename);
    }
    $link = l($link_text, $url, $options);
    return $link;
}

function sdconsultants_aggregator_block_item($variables)
{
    $news_item = $variables['item'];

    $title = '<h3>'.$news_item->title.'</h3>';

    $options = array('attributes' =>array('target'=>'_blank'));

    $link = l('more',$news_item->link,$options);


    $html = '<div class="news">'.$title.$link.'</div>';

    return $html;
}