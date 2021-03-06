<?php
if (!defined('_GNUBOARD_')) {
	exit;
}
/**
 * 해더 메뉴 - 기본
 */
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/header_default.css">', 0);
?>
<!-- 헤더 시작 theme > asktheme_b3 > _template > header > header_default.php -->
<header id="header" class="header header_default head-wrapper">
	<div id="basic-header-wrap" class="basic-primary-header">
		<!-- 상단 회원 메뉴 -->		
		<div class="container-fluid pc-sub-menu slideup_hide">
			<div class="row">
				<div class="container">
					<div class="row justify-content-end pc-sub-wrap">
						<!--
						<div class="pc-sub-nav">
							<?php if ($is_member) { ?>
								<?php if ($is_admin || auth_idcheck() == true) { ?>
									<div class="ps-item">
										<a href="<?php echo G5_ADMIN_URL ?>"><i class="fa fa-cog" aria-hidden="true"></i>
                                            <span>관리자</span></a>
									</div>
								<?php } ?>
								<div class="ps-item">
									<a href="<?php echo G5_BBS_URL ?>/memo.php" target="_blank" id="ol_after_memo" class="win_memo">
                                        <span class="sound_only">안 읽은 </span>
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i> <span>쪽지</span>
                                        <?php if ($_ASKTHEME->get_notread_memo($member['mb_id'])) { ?>
                                            <span class="badge badge-primary badge-pill"><?php echo $_ASKTHEME->get_notread_memo($member['mb_id']); ?></span>
                                        <?php } ?>
                                    </a>
								</div>
								<div class="ps-item">
									<a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">
                                        <i class="fa fa-user-circle-o" aria-hidden="true"></i> <span>정보</span>수정</a>
								</div>
								<div class="ps-item">
									<a href="<?php echo G5_BBS_URL ?>/logout.php"><i class="fa fa-lock" aria-hidden="true"></i> 로그아웃</a>
								</div>
							<?php } else { ?>
								<div class="ps-item">
									<a href="<?php echo G5_BBS_URL ?>/register.php"><i class="fa fa-user-plus" aria-hidden="true"></i>
                                        <span>회원</span>가입</a>
								</div>
								<div class="ps-item">
									<a href="<?php echo G5_BBS_URL ?>/login.php"><i class="fa fa-unlock-alt" aria-hidden="true"></i> 로그인</a>
								</div>
							<?php } ?>
							<div class="ps-item">
								<a href="<?php echo G5_BBS_URL ?>/new.php"><i class="fa fa-bell" aria-hidden="true"></i> 새글</a>
							</div>
						</div>
							-->
					</div>
				</div>
			</div>
		
		</div>
		<div class="container pc-main-menu">
			<style type="text/css">
				.header.header_default .mobile-member-trigger{display:none}.header.header_default .mobile-member-trigger button{font-size:1.5rem;display:block;color:#f8f9fa;background:transparent;border:none}.header.header_default .mobile-member-trigger button:focus{outline:none}.header.header_default .mobile-menu-trigger{display:block;position:absolute;top:50%;margin-top:-8px;left:15px}
			</style>
			<!--로고시작 -->
			<div id="logo">
				<!-- PC LOGO -->
				<a href="<?php echo G5_URL ?>" class="site-logo"><img src="<?php echo G5_THEME_URL ?>/img/logo-white.png" class="logo-white" alt="Logo"></a>
				<!-- Mobile LOGO-->
				<a href="<?php echo G5_URL ?>" class="site-logo-mobile"><img src="<?php echo G5_THEME_URL ?>/img/logo-white.png" alt="Logo" class="logo-white"></a>
			</div>
			<!--//로고끝 -->
			
			<!-- 모바일 회원메뉴버튼 -->
			<div class="mobile-member-trigger">
				<button type="button" class="navbar-toggle collapsed js-offcanvas-btn-right js-offcanvas-trigger" id="open-member-menu" data-offcanvas-trigger="off-canvas-right-push">
                    <span class="hiraku-open-btn-line"></span>
                </button>
			</div>
			<!--// 모바일 회원메뉴버튼끝 -->

			<!-- 메인상단메뉴 -->
			<nav style="display:none;" id="basic-primary-menu" class="basic-home-menu" aria-labelledby="basic-main-menu" styel="overflow:hidden;">
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

		</div>
		<!--//PC 메인 메뉴-->
	</div>
</header>
<!--//헤더끝 -->
<script>
	$(function() {
		var menuTrigger = 100;
		var controller = new ScrollMagic.Controller();
		new ScrollMagic.Scene({
				offset: menuTrigger
			})
			.setClassToggle("#header", "add-background")
			.addTo(controller);
		new ScrollMagic.Scene({
				offset: 300
			})
			.setClassToggle(".pc-sub-menu", "slideup_close")
			.addTo(controller);

		// Smooth scrolling
		$('.nav-link.parent_menu')
			.click(function(event) {
				var thisUrl = $.attr(this, 'href');
				var hash = thisUrl.substring(thisUrl.indexOf('#') + 1);
				if (window.location.hash) {
					$('html, body')
						.animate({
							scrollTop: $('#' + hash)
								.offset()
								.top
						}, 300);
					event.preventDefault();
				}
			});
	});

</script>
