<?php 
function btn_edit($uri)
{
    $uri = site_url($uri);
    return anchor('#', '<span class="glyphicon glyphicon-edit"></span>', array(
        'onclick' => "edit('{$uri}', event)", 'class' => 'btn btn-default'
    ));
}

function btn_permissions($uri)
{
	$uri = site_url($uri);
	return anchor('#', '<span class="glyphicon glyphicon-lock"></span>', array(
		'onclick' => "edit('{$uri}', event)", 'class' => 'btn btn-default'
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
        $str .= $child == FALSE ? '<ul class="nav navbar-nav">' . PHP_EOL : ('<ul class="dropdown-menu">' . PHP_EOL );

        foreach ($array as $item) {
            $active = $CI->uri->segment(2) == $item['Slug'] ? TRUE : FALSE;
            if (isset($item['children']) && count($item['children'])) {
                $submenu = $item['Type'] != "module" ? 'dropdown-submenu' : 'dropdown';
                $active = $active ? ' active' : '';
                $str .= '<li class="'. $submenu . $active . '">';
                $str .= '<a class="dropdown-toggle" data-toggle="dropdown" href="#">' . $item['Title'];
                $str .= ($item['Type'] != "module" ? '' : '<b class="caret"></b>') . '</a>' . PHP_EOL;
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
function upload_file($options = null)
{
    $CI =& get_instance();
    $CI->load->model('file_m', 'file');

    $file = array('IdFile' => 0, 'Filename' => '');
    $status = "";
    $msg = "";

    $file_element_name = isset($options['field']) ? $options['field'] : 'file';

    $config = array(
        'upload_path' => './files/', 
        'allowed_types' => 'gif|jpg|png|doc|txt', 
        'max_size' => 1024 * 8, 
        'encrypt_name' => TRUE
    );

    if ($options) {
        $config = array_merge($config, $options);
    }
    $CI->load->library('upload', $config);

    if (!$CI->upload->do_upload($file_element_name)) {
        $status = 'error';
        $msg = $CI->upload->display_errors('', '');
    } else {
        $data = $CI->upload->data();

        if (isset($options['thumbnail']) && $options['thumbnail']) {

            $config_thumb['image_library'] = 'gd2';
            $config_thumb['source_image'] = $config['upload_path'] . $data['file_name'];
            $config_thumb['create_thumb'] = TRUE;
            $config_thumb['maintain_ratio'] = TRUE;
            $config_thumb['width'] = 75;
            $config_thumb['height'] = 50;

            $CI->load->library('image_lib', $config_thumb);
            if ( ! $CI->image_lib->resize() ) {
                $status = 'error';
                $msg = $CI->image_lib->display_errors('', '');
            }
        }

        // Exist field 'Title'
        !isset($options['Title']) || $data['Title'] = $options['Title'];

        // Create file in SysFiles
        $file = $CI->file->save($data, NULL, TRUE)->toArray();
        if($file) {
            $status = 'success';
            $msg = "File successfully uploaded";
        } else {
            unlink($data['full_path']);
            $status = 'error';
            $msg = "Something went wrong when saving the file, please try again.";
        }
    }
    @unlink($_FILES[$file_element_name]);

    //Convert to json in controller
    return array('status' => $status, 'msg' => $msg, 'id_file' => $file['IdFile'], 'filename' => $file['Filename']);
}

// Send mail
function send_mail($options = null)
{
    $CI =& get_instance();
    $CI->load->library('email');

    $data = array(
        'from' => 'info@bach.com', 
        'name'=> 'Bach', 
        'to' => 'alguien@ejemplo.com', 
        'subject' => 'Sin asunto', 
        'message' => '',
        'mailtype' => 'html'
    );

    if ($options) {
        $data = array_merge($data, $options);
    }

    $CI->email->set_mailtype($data['mailtype']);

    if (isset($options['smtp']) && $options['smtp']) {
        $CI->email->set_smtp_host('');
        $CI->email->set_smtp_user('');
        $CI->email->set_smtp_pass('');
        $CI->email->set_smtp_port(25);
    }

    if (isset($options['clear']) && $options['clear']) {
        $CI->email->clear(isset($options['clear_adjunt']) && $options['clear_adjunt']);
    }

    $CI->email->from($data['from'], $data['name']);
    $CI->email->to($data['to']);
    $CI->email->subject($data['subject']);
    $CI->email->message($data['message']);

    if (isset($options['cc'])) {
        $CI->email->cc($options['cc']);
    }

    if (isset($options['bcc'])) {
        $CI->email->bcc($options['bcc']);
    }

    if (isset($options['attach'])) {
        if (!is_array($options['attach'])) {
            $options['attach'] = array($options['attach']);
        }
        foreach ($options['attach'] as $attach) {
            $CI->email->attach( getcwd() . $attach );
        }
    }

    if (isset($options['debug']) && $options['debug']) {
        $CI->email->send();
        echo $CI->email->print_debugger();
    } else {
        return $CI->email->send();
    }   
}