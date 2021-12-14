<?php
/**
 * 메인페이지 슬라이더 - onepage
 * 이미지, 유튜브동영상 삽입 가능 - 모바일에서는 대체 이미지로 출력됩니다.
 * 
 */
if (!defined('_GNUBOARD_')) {
    exit;
}
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/slider_onepage.css">', 0);

?>
<!-- 
    #########################################################################################################
    # Main Slider - 원페이지용
    #########################################################################################################
-->
<section id='slider' class="slider <?php echo $theme_config['ask_sub_theme_name'] ?>" data-slideout-ignore>
    <!-- Swiper -->
    <div class="swiper-container slider-inner slider-default">
        <div class="swiper-wrapper">
            <!-- 슬라이더 1 -->
            <div class="swiper-slide" data-swiper-autoplay="4000" style='background-image:url(<?php echo G5_THEME_URL . "/img/sl-portfolio1.jpg" ?>);'>
                <div class="container">
                    <div class='slider-catpion'>
                        <h2 class="ani-text bigtext">CREATIVE<br/>DESIGN</h2>
                        <p class="ani-text-subtext">
                            완벽한 웹사이트를 만드는 방법.<br/>
                            100% 반응형 웹사이트를 위한 테마 ASKTHEME 입니다.
                        </p>
                        <a href="#webpage-links" class="slide-more-btn ani-text-subtext delay-2">More Information</a>
                    </div>
                </div>
            </div>
            <!-- 슬라이더 2 -->
            <div class="swiper-slide" data-swiper-autoplay="4000" style='background-image:url(<?php echo G5_THEME_URL . "/img/slider2.jpg" ?>);'>
                <div class="container">
                    <div class='slider-catpion'>
                        <h2 class="ani-text bigtext">MOBILE FIRST<br/> Web Design</h2>
                        <p class="ani-text-subtext">
                            PC 및 모바일에서 사용가능한 반응형 웹사이트 템플릿
                        </p>
                        <a href="#webpage-links" class="slide-more-btn ani-text-subtext delay-2">More Information</a>
                    </div>
                </div>
            </div>
            <!-- 슬라이더 3 -->
            <div class="swiper-slide" data-swiper-autoplay="4000" style='background-image:url(<?php echo G5_THEME_URL . "/img/slider3.jpg" ?>);'>
                <div class="container">
                    <div class='slider-catpion black-font'>
                        <h2 class="ani-text bigtext">BOOTSTRAP 4</h2>
                        <p class="ani-text-subtext">
                            Bootstrap 4 적용으로 빠르고 손쉬운 사이트 제작
                        </p>
                        <a href="#webpage-links" class="slide-more-btn ani-text-subtext delay-2">More Information</a>
                    </div>
                </div>
            </div>
            <!-- 슬라이더 4 -->
            <div class="swiper-slide" data-swiper-autoplay="4000" style='background-image:url(<?php echo G5_THEME_URL . "/img/slider7.jpg" ?>);'>
                <div class="container">
                    <!-- 텍스트 검은색은 black-font class 설정 -->
                    <div class='slider-catpion black-font'>
                        <h2 class="ani-text bigtext">INNOVATION</h2>
                        <p class="ani-text-subtext">
                            웹사이트 제작의 지름길 ASKTHEME
                        </p>
                        <a href="#webpage-links" class="slide-more-btn ani-text-subtext delay-2">More Information</a>
                    </div>
                </div>
            </div>

        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next">

        </div>
        <div class="swiper-button-prev">

        </div>
    </div>
</section>
<!-- 메인상단메뉴 -->
<nav id="basic-primary-menu" class="basic-home-menu" aria-labelledby="basic-main-menu" styel="overflow:hidden;">
    <ul class="basic-main-menu basic-home-nav" style="display:block;padding:0;">
        <?php
        //모바일일 경우 모바일 메뉴만 출력
        if (is_mobile() == true) {
            $menu_query = " me_mobile_use = '1' ";
        } else {
            $menu_query = " me_use = '1' ";
        }

        $sql = " select * from {$g5['menu_table']} where {$menu_query} and length(me_code) = '2' order by me_order, me_id ";
        $result = sql_query($sql, false);
        $gnb_zindex = 999; // gnb_1dli z-index 값 설정용
        for ($i = 0; $row = sql_fetch_array($result); $i++) {
            ?>
            <li class="basic-nav-parent" style="padding:0;">
                <a href="<?php echo ask_short_url_clean($row['me_link']); ?>" target="_<?php echo $row['me_target']; ?>" data-target="#sub-id-<?php echo $i ?>" class="nav-link parent_menu nav-links">
                <span><?php echo $row['me_name'] ?></span>
            </a>
                <?php
                    $sql2 = " select * from {$g5['menu_table']} where {$menu_query} and length(me_code) = '4' and substring(me_code, 1, 2) = '{$row['me_code']}' order by me_order, me_id ";
                    $result2 = sql_query($sql2);
                    $submenu = '';
                    for ($k = 0; $row2 = sql_fetch_array($result2); $k++) {
                        if ($k == 0) {
                            $submenu .= '<ul  class="sub-menu navi-child" id="sub-id-' . $k . '">' . PHP_EOL;
                        }

                        $submenu .= "<li class='sub-list'><a style='display:inline-block;width: 180px;' href='" . ask_short_url_clean($row2['me_link']) . "' target='_{$row2['me_target']}'>{$row2['me_name']}</a></li>";
                    }

                    if ($k > 0) {
                        $submenu .= '</ul>' . PHP_EOL;
                    }
                    echo $submenu;
                    ?>
            </li>
        <?php
        }

        if ($i == 0) {
            ?>
            <li class='basic-nav-parent'>
                <?php if ($is_admin) { ?>
                    <a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php" class="parent_menu nav-links">관리자모드 &gt; 환경설정 &gt; 메뉴설정에서 설정하실 수 있습니다.</a>
                <?php } ?>
            </li>
        <?php } ?>

        <!-- 회원메뉴 -->
        <li class="basic-nav-parent">
            <a href='#top_member_menu' class='parent_menu nav-links icontype'><i class='fa fa-user' aria-hidden='true'></i></a>
            <ul class="sub-menu navi-child pc-member-menu">
                <li>
                    <a href="<?php echo G5_URL ?>"><i class="fa fa-home" aria-hidden="true"></i> HOME</a>
                </li>
                <?php if ($is_member) { ?>
                    <?php if ($is_admin || auth_idcheck() == true) { ?>
                        <li>
                            <a href="<?php echo G5_ADMIN_URL ?>"><i class="fa fa-cog" aria-hidden="true"></i>
                                <span>관리자</span></a></li>
                    <?php } ?>
                    <li>
                        <a href="<?php echo G5_BBS_URL ?>/memo.php" target="_blank" id="ol_after_memo" class="win_memo">
                            <span class="sound_only">안 읽은 </span>
                            <i class="fa fa-envelope-o" aria-hidden="true"></i> <span>쪽지</span>
                            <?php if ($_ASKTHEME->get_notread_memo($member['mb_id'])) { ?>
                                <span class="badge badge-primary badge-pill"><?php echo $_ASKTHEME->get_notread_memo($member['mb_id']); ?></span>
                            <?php } ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo G5_BBS_URL ?>/point.php" target="_blank" id="ol_after_pt" class="win_point">
                            <i class="fa fa-money" aria-hidden="true"></i> <span>포인트</span>
                            <?php echo $_ASKTHEME->get_member_point(); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo G5_BBS_URL ?>/scrap.php" target="_blank" id="ol_after_scrap" class="win_scrap"><i class="fa fa-bookmark-o" aria-hidden="true"></i>
                            <span>스크랩</span></a>
                    </li>
                    <li>
                        <a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i> <span>정보</span>수정</a>
                    </li>
                    <li>
                        <a href="<?php echo G5_BBS_URL ?>/logout.php"><i class="fa fa-lock" aria-hidden="true"></i> 로그아웃</a>
                    </li>
                <?php } else { ?>
                    <li>
                        <a href="<?php echo G5_BBS_URL ?>/register.php"><i class="fa fa-user-plus" aria-hidden="true"></i>
                            <span>회원</span>가입</a></li>
                    <li>
                        <a href="<?php echo G5_BBS_URL ?>/login.php"><i class="fa fa-unlock-alt" aria-hidden="true"></i> 로그인</a>
                    </li>
                <?php } ?>
                <li>
                    <a href="<?php echo G5_BBS_URL ?>/faq.php"><i class="fa fa-question-circle-o" aria-hidden="true"></i>
                        <span>FAQ</span></a></li>
                <li>
                    <a href="<?php echo G5_BBS_URL ?>/qalist.php"><i class="fa fa-question" aria-hidden="true"></i>
                        <span>1:1문의</span></a></li>
                <li>
                    <a href="<?php echo G5_BBS_URL ?>/current_connect.php"><i class="fa fa-plug" aria-hidden="true"></i> 접속자 <?php echo $connect_now; ?>
                    </a></li>
                <li>
                    <a href="<?php echo G5_BBS_URL ?>/new.php"><i class="fa fa-bell" aria-hidden="true"></i> 새글</a>
                </li>
            </ul>
        </li>
        <!--//회원메뉴끝 -->
        <!-- 검색아이콘 -->
        <li class="basic-nav-parent">
            <a href='#top_search' class='parent_menu nav-links icontype' data-toggle="modal" data-target=".search-modal"><i class='fa fa-search' aria-hidden='true'></i></a>
        </li>
        <!-- //검색아이콘끝 -->
    </ul>

</nav>
<!--//메인상단메뉴끝 -->
<script type="text/javascript">
    $(function () {
        ///메인슬라이더 설정
        var swiper_default = new Swiper('.slider-default', {
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            paginationClickable: true,
            effect: 'fade', //fade, slide, flip, coverflow
            flipEffect: {
                rotate: 30,
                slideShadows: false
            },
            speed: 1000,
            autoplay: {
                delay: 10000,
                disableOnInteraction: false
            }
        });
        /*
         * 마우스 오버시 자동플레이 멈춤
         $(".slider-default").hover(function () {
         swiper_default.autoplay.stop();
         }, function () {
         swiper_default.autoplay.start();
         });
         * 
         */
        var nowHeight = $(window).height();

        //슬라이더 텍스트 애니메이션
        $('.swiper-slide-active .ani-text').addClass('fade-in-up animate');
        $('.swiper-slide-active .ani-text-subtext').addClass('fade-in-up animate-subtext');

        swiper_default.on('slideChangeTransitionStart', function () {
            $('.swiper-slide:not(.swiper-slide-active) .ani-text').removeClass('fade-in-up animate').addClass('animate-stop');
            $('.swiper-slide:not(.swiper-slide-active) .ani-text-subtext').removeClass('fade-in-up animate-subtext').addClass('animate-stop');
            $('.swiper-slide-active .ani-text').removeClass('animate-stop').addClass('fade-in-up animate');
            $('.swiper-slide-active .ani-text-subtext').removeClass('animate-stop').addClass('fade-in-up animate-subtext');
        });
        swiper_default.on('touchEnd', function () {
            $('.swiper-slide:not(.swiper-slide-active) .ani-text').removeClass('fade-in-up animate').addClass('animate-stop');
            $('.swiper-slide:not(.swiper-slide-active) .ani-text-subtext').removeClass('fade-in-up animate-subtext').addClass('animate-stop');
            $('.swiper-slide-active .ani-text').removeClass('animate-stop').addClass('fade-in-up animate');
            $('.swiper-slide-active .ani-text-subtext').removeClass('animate-stop').addClass('fade-in-up animate-subtext');
        });
    });
</script>