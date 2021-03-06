<?php
/*
 * ASKTHEME 기본 최신글 2
 */
if (!defined('_GNUBOARD_')) {
    exit;
}
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/latest.css">', 0);
?>
<!-- <?php echo $bo_subject; ?> 최신글 시작 { -->
<div class="latest-default-wrap2">
    <div class="border border-gray">
        <div class='latest-equal-item'>
            <div class="latest-title"><a href="<?php echo ask_get_pretty_board_url($bo_table);?>"><?php echo $bo_subject; ?></a></div>
            <ul class="latest-content">
                <?php for ($i = 0; $i < count($list); $i++) { ?>
                    <li>
                        <?php
                        //echo $list[$i]['icon_reply']." ";
                        echo "<a href=\"" . $list[$i]['href'] . "\">";
                        if ($list[$i]['is_notice']) {
                            echo "<i class=\"fa fa-caret-right\" aria-hidden=\"true\"></i> <strong>" . $list[$i]['subject'] . "</strong>";
                        } else {
                            echo '<i class="fa fa-caret-right" aria-hidden="true"></i> ' . $list[$i]['subject'];
                        }
                        // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
                        // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

                        if (isset($list[$i]['icon_new'])) {
                            echo " " . $list[$i]['icon_new'];
                        }
                        if (isset($list[$i]['icon_hot'])) {
                            echo " " . $list[$i]['icon_hot'];
                        }
                        if (isset($list[$i]['icon_file'])) {
                            echo " " . $list[$i]['icon_file'];
                        }
                        if (isset($list[$i]['icon_link'])) {
                            echo " " . $list[$i]['icon_link'];
                        }
                        if (isset($list[$i]['icon_secret'])) {
                            echo " " . $list[$i]['icon_secret'];
                        }
                        echo "</a>";
                        ?>
                        <div class="write-info">
                            <?php
                            if ($list[$i]['comment_cnt']) {
                                echo "<span class='badge badge-light'><i class='fa fa-commenting-o' aria-hidden='true'></i> " . $list[$i]['comment_cnt'] . "</span>";
                            }
                            echo "<span class='date badge badge-light'>" . substr($list[$i]['datetime'], 5) . "</span>";
                            ?>
                        </div>
                    </li>
                <?php } ?>
                <?php if (count($list) == 0) { ?>
                    <li class="empty-latest-article">게시물이 없습니다.</li>
                    <?php } ?>
            </ul>
        </div>
    </div>
</div>
<!-- } <?php echo $bo_subject; ?> 최신글 끝 -->
