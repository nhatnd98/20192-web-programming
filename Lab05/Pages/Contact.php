<?php
    spl_autoload_register(function ($class_name) {
        include $class_name.'.php';
    });
    
    $title = "Contact";
    $content = "<h1>Contact Info</h1>"
             . "<p><strong>Phone Number:</strong> 0974755580</p>"
             . "<p><strong>Email:</strong> nhat.nd163040@sis.hust.edu.vn</p>"
             . "<p><strong>Address:</strong> Hung Xuan, Hung Nguyen, Nghe An</p>";
    $year = 2020;
    $copyright = "©";
    print "<html>";
    $contact = new Page($title, $year, $copyright);
    $contact->addContent($content);
    print $contact->get();
    print "</html>";
?>
