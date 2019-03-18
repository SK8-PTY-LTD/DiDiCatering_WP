<form method="post">
	<!-- START TOPUP RULES-->
	<label for="topup_rules"><?php _e( 'Top-up Rules', 'woocommerce-account-funds' ); ?></label>
	<p>
		If one-time top-up amount greater than or equal to <br/>
		<span style="padding-left:20px;"><strong>A$500</strong>, your account will upgrade to <strong>Sliver Member</strong> and have <strong>5%</strong> discount for further purchases.</span><br/>
		<span style="padding-left:20px;"><strong>A$2000</strong>, your account will upgrade to <strong>Golden Member</strong> and have <strong>10%</strong> discount for further purchases.</span><br/>
		<span style="padding-left:20px;"><strong>A$5000</strong>, your account will upgrade to <strong>Platinum Member</strong> and have <strong>15%</strong> discount for further purchases.</span>
	</p>
	<!-- END TOPUP RULES-->
	<label for="topup_amount"><?php _e( 'Top-up Account Funds', 'woocommerce-account-funds' ); ?></label>
	<p class="form-row form-row-first">
		<input type="number" class="input-text" name="topup_amount" id="topup_amount" step="0.01" value="<?php echo esc_attr( $min_topup ); ?>" min="<?php echo esc_attr( $min_topup ); ?>" max="<?php echo esc_attr( $max_topup ); ?>" />
		<?php if ( $min_topup || $max_topup ) : ?>
		<span class="description">
			<?php
			printf(
				'%s%s%s',
				$min_topup ? sprintf( __( 'Minimum: <strong>%s</strong>.', 'woocommerce-account-funds' ), wc_price( $min_topup ) ) : '',
				$min_topup && $max_topup ? ' ' : '',
				$max_topup ? sprintf( __( 'Maximum: <strong>%s</strong>.', 'woocommerce-account-funds' ), wc_price( $max_topup ) ) : ''
			);
			?>
		</span>
		<?php endif; ?>
	</p>
	<p class="form-row">
		<input type="hidden" name="wc_account_funds_topup" value="true" />
		<input type="submit" class="top-up-button" style="border-color: #c33332;
														background: none;
														color: #c33332;
														font-size: 14px;
														line-height: 22px;
														border: 1px solid #c33332;
														border-radius: 2px;
														padding: 7px 30px;" value="<?php _e( 'Top-up', 'woocommerce-account-funds' ); ?>" />
	</p>
	<?php wp_nonce_field( 'account-funds-topup' ); ?>
</form>
