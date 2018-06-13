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
						editor.insertContent('[blockquote style="start"][/blockquote]');
					}
				},
				{
					text: 'Ending quotemark',
					onclick: function () {
						editor.insertContent('[blockquote style="end"][/blockquote]');
					}
				}
			]
		});
	});
})();