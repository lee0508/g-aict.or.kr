<?php
if (!defined('_GNUBOARD_')) {
    exit;
}
//왼쪽메뉴가 있는 테마사용시 = theme.config.php에서 설정
if ($theme_config['use_aside'] == true) {
    include_once(G5_THEME_PATH . '/tail_aside.php');
    return;
}
if (_INDEX_ !== true) {
    ?>
    <!-- 서브페이지 및 그누보드 페이지용 -->

<?php } ?>

<!-- } 콘텐츠 끝 -->
</div><!-- //#container -->
</div>
<!--//#contents_wrapper -->

<!-- 하단 시작 { -->
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-2 tail-login-wrap">
                <a href="<?php echo G5_URL ?>" class="tail-logo"><img src="<?php echo G5_THEME_URL ?>/img/logo.png" alt="Logo"></a>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-7 tail-menu-wrap">
                <ul class="tail-menu">
                    <li class="d-inline-block"><a href="<?php echo G5_THEME_URL; ?>/at_introduce.php">협회소개</a></li>
                    <li class="d-inline-block"><a href="<?php echo ask_get_pretty_url('content', 'privacy'); ?>">개인정보처리방침</a></li>
                    <li class="d-inline-block"><a href="<?php echo ask_get_pretty_url('content', 'provision'); ?>">서비스이용약관</a></li>
                </ul>
                <div class="tail-contents" style="width: 800px;">
                    <!--ASKTHEME는 HTML5, CSS3, 그누보드5 기반 반응형 비즈니스 테마입니다.-->
                    <ul class='breadcrumb'>
                        <!-- <li class='breadcrumb-item'><span>협회명</span> : (사)글로벌 인공지능협회</li> -->
                        <!-- <li class='breadcrumb-item'><span>사업자등록번호</span> : 000-00-00000 </li> -->
                        <!-- <li class='breadcrumb-item'><span>통신판매업신고</span> : 제100-서울00-0000호</li> -->
                    </ul>
                    <ul class='breadcrumb' style=" margin:0;padding:0;justify-content: flex-start; flex-wrap:nowrap; ">
                        <li class='breadcrumb-item'>(사)글로벌 인공지능협회</li>
                        <li class='breadcrumb-item'> 02-890-6890</li>
                        <li class='breadcrumb-item'>서울특별시 영등포구 국회대로72길 5, 6층 602호</li>
                        
                        <!-- <li class='breadcrumb-item'><span>개인정보책임자</span> : 책임자 (mail@email.com)</li> -->
                    </ul>
                    Copyright &copy; <b>g-aict.or.kr.</b> All rights reserved.
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
                <ul class="social-bookmark">
                    <li>
                        <a href="https://twitter.com/?lang=ko" target="_blank" class="icon-twitter"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/" target="_blank" class="icon-facebook"><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="https://plus.google.com/" target="_blank" class="icon-google"><i class="fa fa-google-plus-official fa-2x" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/?hl=ko&amp;gl=KR" target="_blank" class="icon-youtube"><i class="fa fa-youtube fa-2x" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="https://section.blog.naver.com/BlogHome.nhn" target="_blank" class="icon-blog"><i class="fa fa-rss fa-2x" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="/theme/asktheme_b3/contact_us.php" class="icon-contactus"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

</div><!-- #contents-wrap -->
<!-- } 하단 끝 -->

<div id="gotop">
    <a href="#top"><i class="fa fa-arrow-up"></i></a>
</div>

<?php
/* # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
 * 모바일 왼쪽 메뉴
 * _mobile_menu.php , _mobile_menu_v2.php, _mobile_menu_v3.php 3종류
 * # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # */
include_once(G5_THEME_PATH . '/_mobile_menu_v3.php');

/**
 * # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # 
 * 모바일 회원 메뉴 - 오른쪽
 * # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # 
 */
include_once(G5_THEME_PATH . '/_mobile_member_menu.php');
?>


<!--
############################
# 검색
############################
-->
<div class="modal fade search-modal-wrap search-modal" tabindex="-1" role="dialog" aria-labelledby="searchmodalbox" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title">Search</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-search-box d-flex justify-content-center">
                <!-- 검색 -->
                <legend class="sr-only">사이트 내 전체검색</legend>
                <form name="fsearchbox" method="get" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);">
                    <div class="input-group">
                        <input type="hidden" name="sfl" value="wr_subject||wr_content">
                        <input type="hidden" name="sop" value="and">
                        <label for="sch_stx" class="sr-only">검색어<strong class="sr-only"> 필수</strong></label>
                        <input type="text" name="stx" id="sch_stx" class="modal-search-field" maxlength="20" placeholder="검색어 입력">
                        <div class='input-group-btn'>
                            <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include_once(G5_THEME_PATH . "/tail.sub.php");
