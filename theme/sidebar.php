<?php 

$monthly_archives = wp_get_archives(
    $args = array(
        'type' => 'monthly',
        'show_post_count' => true,
        'before' => '',
        'after' => ',',
        'echo' => 0,
    ));
$monthly_archives = explode(',', $monthly_archives); 
array_pop($monthly_archives);

$yearly_archives = wp_get_archives(
    $args = array(
        'type' => 'yearly',
        'format' => 'custom',
        'before' => '',
        'after' => ',',
        'echo' => 0,
    ));
$yearly_archives = explode(',', $yearly_archives);
array_pop($yearly_archives); 
?>
<div class="sidebar-new">
    <div class="title">
        <p>月間アーカイブ</p>
    </div>
    <div class="list-group">
        <?php foreach ($yearly_archives as $y) { ?>        
            <?php $the_year = substr($y, -8, 4) ?>
            <div class="group <?php echo (!empty($year) && $year == $the_year) ? "active" : ""; ?>">
                <div class="above">
                    <p><?php echo $y ?>年</p>
                    <span></span>
                </div>
                <ul class="below" style="<?php echo (!empty($year) && $year == $the_year) ? "display: block;" : ""; ?>">
                    <?php foreach ($monthly_archives as $month) { ?>
                        <?php $pos = strpos($month, $the_year); ?>
                        <?php if ($pos !== false) { ?>
                            <?php echo $month; ?>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
    </div>
</div>