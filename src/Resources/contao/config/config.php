<?php


$GLOBALS['TL_HOOKS']['processFormData'][] = array(\LocalbrandingDe\PdfbobBundle\EventListener\FormDataListener::class, '__invoke');

if ('BE' === TL_MODE) {

        $GLOBALS['TL_CSS'][] = '/bundles/branding/css/backend_svg.css';
    
}
