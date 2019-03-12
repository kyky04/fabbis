<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $breadcrumb = ["Home" => "#"];
    private $perms = "";
    private $link = "";
    private $title = "Title";
    private $subtitle = " ";
    private $tableStruct = [];
    private $modalSize = "mini";
    private $data = [];

    public function setBreadcrumb($value=[])
    {
        $this->breadcrumb = $value;
    }

    public function pushBreadCrumb($value=[])
    {
        $this->breadcrumb = array_merge($this->breadcrumb, $value);
    }

    public function getBreadcrumb()
    {
        return $this->breadcrumb;
    }

    public function setTableStruct($value=[])
    {
    	$this->tableStruct = $value;
    }

    public function getTableStruct()
    {
    	return $this->tableStruct;
    }

    public function setTitle($value="")
    {
    	$this->title = $value;
    }

    public function getTitle()
    {
    	return $this->title;
    }

    public function setSubtitle($value="")
    {
    	$this->subtitle = $value;
    }

    public function getSubtitle()
    {
    	return $this->subtitle;
    }

    public function setLink($value="")
    {
        $this->link = $value;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function setPerms($value="")
    {
        $this->perms = $value;
    }

    public function getPerms()
    {
        return $this->perms;
    }

    public function setModalSize($value="mini")
    {
        $this->modalSize = $value;
    }

    public function getModalSize()
    {
        return $this->modalSize;
    }

    public function setData($value=[])
    {
    	$this->data = $value;
    }

    public function getData()
    {
    	return $this->data;
    }

    public function render($view, $additional=[])
    {
        $data = array_merge([
    		'breadcrumb' => $this->breadcrumb,
    		'title'		 => $this->title,
            'subtitle'   => $this->subtitle,
            'pageUrl'    => $this->link,
            'pagePerms'  => $this->perms,
            'modalSize'  => $this->modalSize,
    		'tableStruct'=> $this->tableStruct,
            'mockup'     => true
    	], $this->data);

		return view($view, array_merge($data, $additional));
    }
    
    public function makeButton($params = [])
    {
        $settings = [
            'class'    => 'blue',
            'label'    => 'Button',
            'tooltip'  => '',
            'target'   => url('/'),
            'disabled' => '',
        ];

        $btn   = '';
        $datas = '';
        $attrs = '';

        if (isset($params['datas'])) {
            foreach ($params['datas'] as $k => $v) {
                $datas .= " data-{$k}=\"{$v}\"";
            }
        }

        if (isset($params['attributes'])) {
            foreach ($params['attributes'] as $k => $v) {
                $attrs .= " {$k}=\"{$v}\"";
            }
        }

        switch ($params['type']) {
            case "delete":
                $settings['class']   = 'red icon delete';
                $settings['label']   = '<i class="trash icon"></i>';
                $settings['tooltip'] = 'Hapus Data';
                $settings['disabled'] = ($this->perms != '' && !auth()->user()->can($this->perms.'-delete')) ? ' disabled' : '';
                
                $params  = array_merge($settings, $params);
                $extends = " data-content='{$params['tooltip']}' data-id='{$params['id']}'";

                $btn = "<button type='button' {$datas}{$attrs}{$extends} class='ui mini {$params['class']} button' {$params['disabled']}>{$params['label']}</button>\n";
                break;
            case "edit":
                $settings['class']   = 'orange icon edit';
                $settings['label']   = '<i class="edit icon"></i>';
                $settings['tooltip'] = 'Ubah Data';
                $settings['disabled'] = ($this->perms != '' && !auth()->user()->can($this->perms.'-edit')) ? ' disabled' : '';
                
                $params  = array_merge($settings, $params);
                $extends = " data-content='{$params['tooltip']}' data-id='{$params['id']}'";

                $btn = "<button type='button' {$datas}{$attrs}{$extends} class='ui mini {$params['class']} button' {$params['disabled']}>{$params['label']}</button>\n";
                break;
            case "modal":
                $settings['class']   = 'orange icon edit';
                $settings['label']   = '<i class="edit icon"></i>';
                $settings['tooltip'] = 'Ubah Data';
                
                $params  = array_merge($settings, $params);
                $extends = " data-content='{$params['tooltip']}' data-id='{$params['id']}'";

                $btn = "<button type='button' {$datas}{$attrs}{$extends} class='ui mini {$params['class']} button' {$params['disabled']}>{$params['label']}</button>\n";
                break;
            case "modal_user":
                $settings['class']   = "green icon user";
                $settings['label']   = '<i class="user icon"></i><i class="plus icon"></i>';
                $settings['tooltip'] = 'Buat Users';
                
                $params  = array_merge($settings, $params);
                $extends = " data-content='{$params['tooltip']}' data-id='{$params['id']}'";

                $btn = "<button type='button' {$datas}{$attrs}{$extends} class='ui mini {$params['class']} button' {$params['disabled']}>{$params['label']}</button>\n";
                break;
            case "url":
            default:
                $settings['class']   = 'blue icon';
                $settings['label']   = '<i class="eye icon"></i>';
                
                $params  = array_merge($settings, $params);
                $extends = '';
                if($params['tooltip'] != '')
                {
                    $extends = " data-content='{$params['tooltip']}'";
                }

                $btn = "<a href='{$params['target']}' {$datas}{$attrs}{$extends} class='ui mini {$params['class']} button' {$params['disabled']}>{$params['label']}</a>\n";
        }

        return $btn;
    }
}
