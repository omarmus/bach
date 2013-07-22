<?php 
function btn_edit($uri)
{
    $uri = site_url($uri);
    return anchor('#', '<img src="'.site_url('img/glyphicons/glyphicons_150_edit.png').'">', array(
        'onclick' => "edit('{$uri}', event)", 'class' => 'btn btn-mini'
    ));
}

function btn_permissions($uri)
{
	$uri = site_url($uri);
	return anchor('#', '<img src="'.site_url('img/glyphicons/glyphicons_203_lock.png').'">', array(
		'onclick' => "edit('{$uri}', event)", 'class' => 'btn btn-mini'
	));
}

function btn_delete($uri)
{
	return anchor($uri, '<i class="icon-remove"></i>', array(
		'onclick' => "return confirm('You are about to delete a record. This cannot be undone. Are you sure?')")
	);
}

function add_meta_title($string)
{
    $CI =& get_instance();
    $CI->data['meta_title'] = e($string) . ' - ' . $CI->data['meta_title'];
}

function e($string)
{
    return htmlentities($string);
}

function is_ajax()
{
    $CI =& get_instance();
    if (!$CI->input->is_ajax_request()) {
        show_404();
    }
}

//Main menu pages
function get_menu($array, $child = FALSE)
{
    $CI =& get_instance();
    $str = '';

    if (count($array)) {
        $str .= $child == FALSE ? '<ul class="nav">' . PHP_EOL : '<ul class="dropdown-menu">' . PHP_EOL;

        foreach ($array as $item) {

            $active = $CI->uri->segment(2) == $item['Slug'] ? TRUE : FALSE;
            if (isset($item['children']) && count($item['children'])) {
                $str .= $active ? '<li class="dropdown active">' : '<li class="dropdown">';
                $str .= '<a class="dropdown-toggle" data-toggle="dropdown" href="#">' . $item['Title'];
                $str .= '<b class="caret"></b></a>' . PHP_EOL;
                $str .= get_menu($item['children'], TRUE);
            } else {
                $str .= $active ? '<li class="active">' : '<li>';
                $str .= '<a href="' . site_url('admin/'.$item['Slug']) . '">' .$item['Title'] . '</a>';
            }

            $str .= '</li>' . PHP_EOL;
        }

        $str .= '</ul>' . PHP_EOL;      
    }

    return $str;
} 

//Upload File for Ajax
function upload_file($opts = array())
{
    $CI =& get_instance();
    $CI->load->model('files_m');

    $idFile = 0;
    $status = "";
    $msg = "";

    $file_element_name = isset($opts['field']) ? $opts['field'] : 'file';
    $config['upload_path'] = isset($opts['path']) ? $opts['path'] : './static/files/';
    $config['allowed_types'] = isset($opts['types']) ? $opts['types'] : 'gif|jpg|png|doc|txt';
    $config['max_size']  = isset($opts['max_size']) ? $opts['max_size'] : 1024 * 8;
    $config['encrypt_name'] = isset($opts['encrypt']) ? $opts['encrypt'] : TRUE;

    $CI->load->library('upload', $config);

    if (!$CI->upload->do_upload($file_element_name)) {
        $status = 'error';
        $msg = $CI->upload->display_errors('', '');
    } else {
        $data = $CI->upload->data();

        // Exist field 'Title'
        if (isset($opts['Title'])) {
            $data['Title'] = $opts['Title'];
        }

        //Create file in SysFiles
        $idFile = $CI->files_m->save($data);
        if($idFile) {
            $status = "success";
            $msg = "File successfully uploaded";
        } else {
            unlink($data['full_path']);
            $status = "error";
            $msg = "Something went wrong when saving the file, please try again.";
        }
    }
    @unlink($_FILES[$file_element_name]);

    //Convert to json in controller
    return array('status' => $status, 'msg' => $msg, 'id_file' => $idFile);
}