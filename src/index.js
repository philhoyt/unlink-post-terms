import { __ } from '@wordpress/i18n';
import { addFilter } from '@wordpress/hooks';
import { createHigherOrderComponent } from '@wordpress/compose';
import { InspectorControls } from '@wordpress/block-editor';
import { ToggleControl, PanelBody } from '@wordpress/components';

// Add a custom attribute to the post-terms block.
const addUnlinkTermsAttribute = ( settings, name ) => {
	if ( name !== 'core/post-terms' ) {
		return settings;
	}

	return {
		...settings,
		attributes: {
			...settings.attributes,
			unlinkTerms: {
				type: 'boolean',
				default: false,
			},
		},
	};
};
addFilter(
	'blocks.registerBlockType',
	'unlink-post-terms/post-terms',
	addUnlinkTermsAttribute
);

// Add a toggle control to the block inspector.
const withUnlinkToggleControl = createHigherOrderComponent( ( BlockEdit ) => {
	return ( props ) => {
		const { attributes, setAttributes, name } = props;
		if ( name !== 'core/post-terms' ) {
			return <BlockEdit { ...props } />;
		}

		const { unlinkTerms } = attributes;

		return (
			<>
				<BlockEdit { ...props } />
				<InspectorControls>
					<PanelBody
						title={ __( 'Unlink Terms', 'unlink-post-terms' ) }
					>
						<ToggleControl
							label={ __(
								'Remove links from terms',
								'unlink-post-terms'
							) }
							checked={ unlinkTerms }
							onChange={ () =>
								setAttributes( { unlinkTerms: ! unlinkTerms } )
							}
						/>
					</PanelBody>
				</InspectorControls>
			</>
		);
	};
}, 'withUnlinkToggleControl' );
addFilter(
	'editor.BlockEdit',
	'unlink-post-terms/post-terms',
	withUnlinkToggleControl
);
