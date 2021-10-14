<?php
namespace LocalbrandingDe\PdfbobBundle\Module;
use  \Email;
use Contao\FrontendUser;
require_once 'typeset.sh.phar';

class PdfBobModule extends \Module
{
    /**
     * @var CsrfTokenManagerInterface
     */
    private $csrfTokenManager;
    
    /**
     * @var string
     */
    private $csrfTokenName;
    
    /**
     * @var string
     */
    protected $strTemplate = 'lb_pdfbob';
    
    /**
     * Displays a wildcard in the back end.
     *
     * @return string
     */
    public function generate()
    {
        
        if (TL_MODE == 'BE') {
            $template = new \BackendTemplate('be_wildcard');
            
            $template->wildcard = 'pdfbo';
            //$template->title = $this->headline;
            $template->title = "";
            $template->id = $this->id;
            $template->link = $this->name;
            $template->href = 'contao?do=themes&amp;table=tl_module&amp;act=edit&amp;id='.$this->id;
            
            return $template->parse();
        }
        
        return parent::generate();
    }

    
    /**
     * Generates the module.
     */
    protected function compile()
    {



        /** @var \PageModel $objPage */
        global $objPage;

        if (isset($_GET['action'])) {

            $type = $_GET['action'];
          
            if (method_exists($this, $type)) {
             
                $this->$type();
            }
        } else {
            
     
            $assets_path = '/assets';
            $bundle_path = '/bundles/pdfbob';
            $GLOBALS['TL_JAVASCRIPT'][] = $bundle_path .'/js/pdfbob_btn.js';
            


        }

    }
    private function pdfbutton_press()
    {
        
        $path= "/html/contao/files/theme_lb_team/test.pdf";
        $pdfname="test.pdf";
        $objTemplate = new \FrontendTemplate("Meldeschein");
        $user = FrontendUser::getInstance();
        $objTemplate->username = $user->username;
        $html =  $objTemplate->parse();
        
        $service = new  \Typesetsh\HtmlToPdf();
        $pdf = \Typesetsh\createPdf($html);
        $pdf->toFile($path);
        
        if(file_exists($path))
        {
            header('Content-type: application/pdf');
            header('Content-Disposition: attachment; filename="' . basename($path) . '"');
            header('Content-Transfer-Encoding: binary');
            header("Content-length:".filesize($path));
            readfile($path);
            
            
            
   
        }
        else
        {
            echo("no file found");
        }
        
        unlink($path);
        exit;
    }
}