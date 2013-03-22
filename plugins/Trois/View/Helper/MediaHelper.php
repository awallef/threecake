<?php

App::uses('AppHelper', 'View/Helper');

class MediaHelper extends AppHelper {

    public $helpers = array('Html');

    public function input($model, $field) {
        $html = '';

        $html .= $this->Html->tag('a', 'Upload', array(
            'href' => $this->Html->url(array(
                'controller' => 'Mediafiles',
                'action' => 'foreignupload',
                'admin' => true,
                'plugin' => 'trois',
                $model,
                $field,
                $this->request->data[$model]['id']
            )),
            'class' => 'btn btn-primary'
                ));

        $html .= $this->Html->tag('a', 'Edit', array(
            'href' => $this->Html->url(array(
                'controller' => 'MediaLinks',
                'action' => 'foreignsort',
                'admin' => true,
                'plugin' => 'trois',
                $model,
                $field,
                $this->request->data[$model]['id']
            )),
            'class' => 'btn btn-primary'
                ));

        return $html;
    }

    public function processUrl($src, $vars) {
        return $this->Html->url('/image.php?image='.$this->Html->url('/app/webroot/').$src).$vars;
    }
    
    public function thumb($params) {
        return $this->Html->url(array('controller' => 'image',  'action' => 'view', 'plugin' => 'trois', 'admin' => false)) .'?'. http_build_query($params);
    }
    
    public function hasImagePreview($type ) {
        return ( $type == 'image/jpeg' ) || ( $type == 'image/png' ) || ( $type == 'embed/youtube' ) || ( $type == 'embed/vimeo' );
    }

    public function fluidVideo($media) {
        $embed = $media['Mediafile']['embed'];

        $pattern = "/height=\"[0-9]*\"/";
        $embed = preg_replace($pattern, "height='100%'", $embed);
        $pattern = "/width=\"[0-9]*\"/";
        $embed = preg_replace($pattern, "width='100%'", $embed);

        $html = '<div style="position:relative;width: 100%; height:62%; display:inline-block;">
			<div style="*height: 62%;margin-top: 62%;"></div>
		    <div style="position: absolute;top:0;left:0;bottom:0;right:0;">' . $embed . '</div>
		</div>';

        return $html;
    }

}
