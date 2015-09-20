<?php
		$trigger = ( !empty( $option['trigger'] ) ) ? ' data-trigger="true" data-trigger-type="select"' : '';
		$triggable = ( !empty( $option['triggable'] ) ) ? ' data-triggable="' . $option['triggable'] . '" class="cx-opts-triggable hide-if-js"' : '';
?>
<tr<?php echo $trigger, $triggable; ?>>
	<th scope="row"><label for="cx-opts-field-<?php echo $option['id']; ?>"><?php echo $option['name']; ?></label></th>
	<td>
		<select name="<?php echo $option['id']; ?>" id="cx-opts-field-<?php echo $option['id']; ?>" class="cx-opts-select">
			<?php
				foreach ( $option['options'] as $value => $label ) {
					$selected = ( $settings[$option['id']] == $value ) ? ' selected="selected"' : '';
					?>
					<option value="<?php echo $value; ?>"<?php echo $selected; ?>><?php echo $label; ?></option>
					<?php
				}
			?>
		</select>
		
		<!-- BUTTON -->
		<?php if( !empty( $option['btn'] ) ): ?>
			<button id="cx-opts-btn-<?php echo $option['id']; ?>" class="button"><?php echo $option['btn']; ?></button>
		<?php endif; ?>
	
		<span class="description"><?php echo $option['desc']; ?></span>
	</td>
</tr>