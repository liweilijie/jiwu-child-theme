<?php
$pdf_url = get_field('price_guide_pdf');
if (!empty($pdf_url)) :
?>
<div class="property-address-wrap property-section-wrap" id="property-address-wrap">
	<div class="block-wrap">
		<div class="block-title-wrap d-flex justify-content-between align-items-center">
    <h2 class="title"><?php echo esc_html(__('Price Guide Document', 'houzez-child')); ?></h2>
			<a class="btn btn-primary btn-slim" href="<?php echo esc_url($pdf_url); ?>" target="_blank"><i class="houzez-icon icon-accounting-document mr-1"></i> <?php echo esc_html(__('Open Price Document', 'houzez-child' )); ?></a>
		</div><!-- block-title-wrap -->
	</div><!-- block-wrap -->
</div><!-- property-address-wrap -->

<?php endif; ?>
