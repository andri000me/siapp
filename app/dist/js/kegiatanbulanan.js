var shortcut = document.kegiatanbulanan;
jQuery(document).ready(function() {
    // hide panelForm1
    jQuery('#panelForm1').hide();
    // add button
    jQuery('#btn-add-kegiatan-bulanan').click(function() {
        jQuery('#bookform_input')[0].reset();
        jQuery('#panelForm1').show(500);
        jQuery('#panelForm2').hide(500);
        jQuery('#act').val('add_kegiatan_bulanan');
        $('#id_kegiatan_bulanan').prop('readonly', false);
    });
    // cancel button
    jQuery('#btn-cancel').click(function() {
        jQuery('#bookform_input')[0].reset();
        jQuery('#panelForm1').hide(500);
        jQuery('#panelForm2').show(500);
        jQuery('#act').val('');
        jQuery('#next-form').val('');
    });
});