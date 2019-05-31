<?php // Template Name: Online Training ?>
<?php
get_header();
?>

<div class="jumbo-box full-size light-blue">
	<div class="container">
		<div class="row align-row vertical-align-row">
			<div class="col-sm-7 text-wrapper">
				<p class="partnerships-text">
		Altough our documentation explains the system in detail, sometimes you might not have the time to go through everything or you might have done it already, but still have unanswered questions. Our online sessions go through our documentation and demonstrate each bit on a demo system for you to understand how the system works.
				</p>
                <p class="partnerships-text">
			Sessions are delivered by seasoned GRC professionals with intimate knowledge of eramba using top notch conferencing solutions.
                </p>
			</div>
			<div class="col-sm-5 text-center img-wrapper full-size">
				<img src="<?php echo do_shortcode('[img]'); ?>blackboard.png" alt="">
			</div>
		</div>
	</div>
</div>
<div class="container">
    <h2 class="margin-top-40">
        <strong>Schedule</strong>
    </h2>
    <p style="font-size: 14px; line-height: 26px">
	Use the contact form below to let us know which training sessions you would like to attend. We'll invoice you and once your payment has cleared you will receive the calendar invites.
    </p>
	<br>

    <?php
    $args = array(
        'post_type' => 'eramba_trainings',
        'orderby' => 'date',
        'order' => 'ASC',
        'post_status' => 'publish',
        'posts_per_page' => -1
    );

    $wp_query = new WP_Query($args);
    $index = 1;
    if ($wp_query->have_posts()) : ?>

        <table id="trainings-table" class="table margin-bottom-40">
            <thead>
                <th style="width: 30%"><?php echo __('Course', 'eramba') ?></th>
                <th style="width: 40%"><?php echo __('Description', 'eramba') ?></th>
                <th style="width: 10%"><?php echo __('Slots', 'eramba') ?></th>
                <th style="width: 10%"><?php echo __('Date', 'eramba') ?></th>
                <th style="width: 10%"><?php echo __('Price', 'eramba') ?></th>
            </thead>
            <tbody>

            <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

                <tr>
                    <td><a href="#<?php echo rwmb_meta('ERAMBA_url');?>"><?php the_title(); ?></a></td>
                    <td><?php the_content(); ?></td>
                    <td><?php echo rwmb_meta('ERAMBA_slots') ?></td>
                    <td><?php echo rwmb_meta('ERAMBA_date'); ?></td>
                    <td><b><?php echo rwmb_meta('ERAMBA_price') ?>&nbsp;&euro;</b></td>
                </tr>

                <?php $index++; ?>
            <?php endwhile; ?>

            </tbody>
        </table>

    <?php else : ?>

        <?php echo e_alert(__('Currently there is no scheduled training', 'eramba')); ?>

    <?php endif; ?>
</div>

<div class="text-center margin-bottom-40">
    <a id="contact-redirect" href="<?php echo get_page_link(BUGS_PAGE_ID); ?>" class="btn btn-danger btn-lg btn-wide">Contact us</a>
</div>
<hr>
<div class="container">
    <h3 id="controls-policies-risk" class="text-center margin-top-20">
        <strong>Risk Management Trainings</strong>
    </h3>
    <h4 class="doc-subtitle text-center margin-bottom-40">
		<span>We'll explain how we use eramba to manage a Risk Management practice</span>
	</h4>

    <div class="row align-row margin-bottom-40">
        <div class="col-sm-4">
			<div class="doc-box doc-box-alt doc-box-partnerships align-col">
				<div class="doc-box-img">
					<img src="<?php echo do_shortcode('[img]'); ?>/doc/controls.png" alt="">
				</div>
				<div class="doc-box-content">
					<h4>Day 1 - Controls & Audits <br>(120 min)</h4>
					<p>
		We start off with a 2 hour training on Controls, the key mitigation element in risk management. We'll address control design, testing methodologies, filters and reports.
                    </p>
				</div>
			</div>
		</div>

        <div class="col-sm-4">
            <div class="doc-box doc-box-alt doc-box-partnerships align-col">
                <div class="doc-box-img">
                    <img src="<?php echo do_shortcode('[img]'); ?>/doc/document.png" alt="">
                </div>
                <div class="doc-box-content">
			<h4>Day 2 - Policy Management<br>(120 min)</h4>
                    <p>
		Policies are used to mitigate risk and define action plans to execute if the worst happens. We'll explain in this 2 hours training how to design, upload, review and report on policies.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="doc-box doc-box-alt doc-box-partnerships align-col">
                <div class="doc-box-img">
                    <img src="<?php echo do_shortcode('[img]'); ?>/doc/risk.png" alt="">
                </div>
                <div class="doc-box-content">
			<h4>Day 3 - Risk Management<br>(120 min)</h4>
                    <p>
		We'll show how risk settings work (classification, thresholds, appetite, Etc) and use the different risk calculation methods available on the system. Together we'll create a risk from scratch and define reports.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <h3 id="controls-policies-compliance" class="text-center margin-top-20">
        <strong>Compliance Management</strong>
    </h3>

    <h4 class="doc-subtitle text-center margin-bottom-40">
        <span>We'll explain how we use eramba to diligently demonstrate compliance status with PCI, ISO, Etc</span>
    </h4>

    <div class="row align-row margin-bottom-40">
        <div class="col-sm-4">
			<div class="doc-box doc-box-alt doc-box-partnerships align-col">
				<div class="doc-box-img">
					<img src="<?php echo do_shortcode('[img]'); ?>/doc/controls.png" alt="">
				</div>
				<div class="doc-box-content">
			<h4>Day 1 - Controls & Audits <br>(120 min)</h4>
					<p>
                       We start off with a 2 hour training on Controls, the key mitigation element in compliance. We'll address control design, testing methodologies, filters and reports.
                    </p>
				</div>
			</div>
		</div>

        <div class="col-sm-4">
            <div class="doc-box doc-box-alt doc-box-partnerships align-col">
                <div class="doc-box-img">
                    <img src="<?php echo do_shortcode('[img]'); ?>/doc/document.png" alt="">
                </div>
                <div class="doc-box-content">
			<h4>Day 2 - Policy Management<br>(120 min)</h4>
                    <p>
		Policies are used to mitigate compliance requirements and provide governance to internal controls. We'll explain in this 2 hours training how to design, upload, review and report on policies.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="doc-box doc-box-alt doc-box-partnerships align-col">
                <div class="doc-box-img">
                    <img src="<?php echo do_shortcode('[img]'); ?>/doc/calendar.png" alt="">
                </div>
                <div class="doc-box-content">
			<h4>Day 3 - Compliance Management<br>(120 min)</h4>
                    <p>
		We'll show you the way we address any compliance requirement, how we upload or create our own packages, design controls and policies and link them to Compliance Requirements.
                    </p>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    $(function(){
        function alignCols() {
            $('.align-row').each(function() {
                var height = 0;
                $(this).find('.align-col').each(function() {
                    if ($(this).height() > height) {
                        height = $(this).height();
                    }
                });
                $(this).find('.align-col').height(height);
            });
        }

        $(window).on("load", function($) {
            alignCols();
        });

    });
</script>
<?php get_footer(); ?>
