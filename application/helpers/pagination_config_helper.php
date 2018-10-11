<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');


  function getConfig($url, $rowsCount) {
    $config["base_url"] = base_url() . $url;
    $config["total_rows"] = $rowsCount;
    $config["per_page"] = 9;
    $config["uri_segment"] = 3;
    // custom paging configuration
    $config['num_links'] = 2;
    $config['use_page_numbers'] = TRUE;
    $config['reuse_query_string'] = TRUE;

    $config['full_tag_open'] = '<div class="pagination flex-m flex-w p-t-26">';
    $config['full_tag_close'] = '</div>';

    $config['first_link'] = '<i class="fa fa-angle-double-left" aria-hidden="true"></i>';
    $config['first_tag_open'] = '<li class="item-pagination flex-c-m trans-0-4">';
    $config['first_tag_close'] = '</li>';

    $config['last_link'] = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';
    $config['last_tag_open'] = '<li class="item-pagination flex-c-m trans-0-4">';
    $config['last_tag_close'] = '</li>';

    $config['next_link'] = '<i class="fa fa-angle-right" aria-hidden="true"></i>';
    $config['next_tag_open'] = '<li class="item-pagination flex-c-m trans-0-4">';
    $config['next_tag_close'] = '</li>';

    $config['prev_link'] = '<i class="fa fa-angle-left" aria-hidden="true"></i>';
    $config['prev_tag_open'] = '<li class="item-pagination flex-c-m trans-0-4">';
    $config['prev_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="item-pagination flex-c-m trans-0-4 active-pagination">';
    $config['cur_tag_close'] = '</li>';

    $config['num_tag_open'] = '<li class="item-pagination flex-c-m trans-0-4">';
    $config['num_tag_close'] = '</li>';
    return $config;
  }

/* End of file dropdwon_helper.php */
/* Location: ./application/helper/dropdown_helper.php */
