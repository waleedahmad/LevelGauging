<div class="sidebar">
    <ul class="nav-icons">
        <?php
            $svgs = [
                    'authorize'     =>      '<?xml version="1.0" encoding="utf-8"?>
                                            <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                            <svg version="1.1" class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 viewBox="0 0 29.2 39" enable-background="new 0 0 29.2 39" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path fill="#A4BE47" d="M25.1,39c-7,0-14,0-21,0c-0.1,0-0.1-0.1-0.2-0.1C1.6,38.4,0,36.4,0,34c0-4.1,0-8.1,0-12.2
                                                        c0-1.6,0.7-2.8,1.9-3.8c0.9-0.7,1.9-1,3-1c0-0.1,0-0.2,0-0.3c0-2.3,0-4.6,0-6.9c0-4.4,2.9-8.2,7.1-9.4C12.5,0.2,13,0.1,13.5,0
                                                        c0.7,0,1.4,0,2.1,0c0.1,0,0.2,0.1,0.2,0.1c4.8,0.6,8.4,4.8,8.4,9.6c0,2.3,0,4.6,0,7c0,0.1,0,0.3,0,0.4c2.9,0,4.9,2.5,4.9,5.1
                                                        c-0.1,4,0,8,0,12c0,2.1-1.4,4-3.4,4.6C25.6,38.8,25.3,38.9,25.1,39z M19.5,17c0-0.1,0-0.1,0-0.2c0-2.4,0-4.8,0-7.3
                                                        c0-2.6-2.2-4.7-4.8-4.7c-2.7,0-4.9,2.1-4.9,4.7c0,2.4,0,4.9,0,7.3c0,0,0,0.1,0,0.2C13,17,16.2,17,19.5,17z M13.1,31.4
                                                        c0,0.8,0,1.5,0,2.3c0,0,0,0.1,0,0.1c0,0.8,0.4,1.3,1.1,1.5c1,0.3,2-0.4,2-1.6c0-1.5,0-3.1,0-4.6c0-0.3,0.1-0.5,0.3-0.6
                                                        c0.8-0.6,1.2-1.4,1.2-2.4c0-1.4-1-2.7-2.4-3c-1.4-0.3-2.9,0.4-3.5,1.7c-0.6,1.3-0.3,2.8,0.9,3.7c0.2,0.2,0.3,0.4,0.3,0.6
                                                        C13,29.9,13.1,30.7,13.1,31.4z"/>
                                                </g>
                                            </g>
                                            </svg>',
                    'settings'      =>      '<?xml version="1.0" encoding="utf-8"?>
                                            <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                            <svg version="1.1" class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 viewBox="0 0 36.1 36" enable-background="new 0 0 36.1 36" xml:space="preserve">
                                            <g>
                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#A4BE47" d="M28.4,2.9c-0.8,0.8-1.6,1.5-2.3,2.3C26,5.4,25.8,5.8,25.9,6
                                                    C26,7,26.2,8.1,26.3,9.1c0.1,0.5,0.3,0.8,0.9,0.8c1,0.1,2,0.2,3,0.3c0.2,0,0.5-0.1,0.6-0.3c0.8-0.7,1.5-1.5,2.3-2.3
                                                    c0.4,1.1,0.3,2,0.1,2.9c-0.7,3.4-3.8,5.6-7.2,5.2c-0.3,0-0.6,0.2-0.8,0.4c-4.9,4.8-9.7,9.7-14.5,14.5c-1.7,1.7-4.3,1.6-5.7-0.3
                                                    c-1.1-1.5-1-3.5,0.4-4.9c2.8-2.8,5.7-5.7,8.5-8.5c2-2,3.9-4,5.9-5.9c0.4-0.4,0.5-0.8,0.5-1.4C19.8,5.4,24.3,1.7,28.4,2.9z M9.8,28
                                                    c0-0.9-0.8-1.7-1.7-1.7c-1,0-1.8,0.8-1.7,1.8c0,0.9,0.8,1.7,1.8,1.7C9,29.7,9.8,29,9.8,28z"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#A4BE47" d="M20.2,0.2c0,1.5,0,3,0,4.4c-0.2,0-0.4,0-0.6,0
                                                    c-8.7-1-16,6.3-15,15c0,0.2,0,0.5,0.1,0.7c0.5,1.1,0.1,1.9-0.8,2.6c-0.8,0.7-1.6,1.5-2.3,2.3c-2.3-4.6-2.4-12,1.9-17.8
                                                    C7.8,1.4,14.7-0.6,20.2,0.2z"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#A4BE47" d="M31.4,15.9c1.5,0,3,0,4.4,0c0.8,4.6-0.8,11.3-6.1,15.8
                                                    c-5.8,5-13.6,5.3-19,2.8c0.9-0.9,1.7-1.7,2.5-2.5c0.6-0.7,1.2-0.9,2.1-0.7c8.7,1.7,16.5-5.1,16.1-14C31.5,16.9,31.5,16.4,31.4,15.9
                                                    z"/>
                                            </g>
                                            </svg>'
                    ];
            $pages  =   [
                'authorize',
                'settings'
            ];
            $active     =   basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

            foreach($pages as $page){

                if($page == $active){
                    if(isset($user_email)){
                        echo "<a href='/users/".$user_email."/".$page."'><li class='active'>".$svgs[$page]."</li></a>";
                    }else{
                        echo "<a href='/users/".$page."'><li class='active'>".$svgs[$page]."</li></a>";
                    }

                }else{
                    if(isset($user_email)){
                        echo "<a href='/users/".$user_email."/".$page."'><li>".$svgs[$page]."</li></a>";
                    }else{
                        echo "<a href='/users/".$page."'><li>".$svgs[$page]."</li></a>";
                    }
                }
            }
         ?>
    </ul>
</div>
