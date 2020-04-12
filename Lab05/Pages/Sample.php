<?php
    spl_autoload_register(function ($class_name) {
        include $class_name.'.php';
    });
    
    $title = "Page Generator";
    $content = "Content of the page";
    $year = 2020;
    $copyright = "©";
    print "<html>";
    $sample = new Page($title, $year, $copyright);
    $sample->addContent($content);
    print $sample->get();
    print "</html>";
?>
