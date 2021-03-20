<?php
namespace template;

use lib\FewPHP;
use lib\FewString;

include('template/basicTemplate.php');

class TemplateHandle {
    
    public static function applyContentZone(){
        $requestPath = FewPHP::getRequestPath();
        $phpFile = $_SERVER['DOCUMENT_ROOT']."/content".$requestPath;
        if(is_dir($phpFile)){
            if(FewString::endsWith($requestPath, "/") && $requestPath != "/"){//This is double path; Not good! | $requestPath != "/" is index page
               FewPHP::redirectPage('/');
               exit;
            }
            $phpFile .= "/index.php";
        }
        else{
            if(FewString::endsWith($requestPath, "/index") || FewString::endsWith($requestPath, "/home")){//Protected from access direct index
               FewPHP::redirectPage('/');
               exit;
            }
            $phpFile .= ".php";
        }
        if ($requestPath == "/"){
            include("content/home.php");
        } else if(file_exists($phpFile)){
            include($phpFile);
        } else{
            include("template/404Template.php");
        }
    }
    
    public static function printTitle($title){
        echo '<title>'.$title.' | MVSK</title>';
    }
    
    public static function printTitleTopic($title, $subtitle) {
        echo '<section class="section section-header pt-5 pb-3 bg-primary text-white mb-4 mb-lg-6">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-8 text-center">
                        <h1 class="display-2 mb-3">'.$title.'</h1>
                        <p class="lead">'.$subtitle.'</p>        
                    </div>
                </div>
            </div>
        </section>';
    }
    
}