// Credit: http://qnimate.com/adding-buttons-to-wordpress-visual-editor/
(function () {
	tinymce.PluginManager.add('wdm_mce_dropmenu', function (editor, url) {
		editor.addButton('wdm_mce_dropmenu', {
			text: 'Preset Blockquote',
			icon: false,
			type: 'menubutton',
			menu: [
				{
					text: 'Starting quotemark',
					onclick: function () {
						editor.insertContent('[blockquote float="none" width="100%" style="start"]Quote content.[source]Name of person.[/source][/blockquote]');
					}
				},
				{
					text: 'Ending quotemark',
					onclick: function () {
						editor.insertContent('[blockquote float="none" width="100%" style="end"]Quote content.[source]Name of person.[/source][/blockquote]');
					}
				}
			]
		});
	});
})();