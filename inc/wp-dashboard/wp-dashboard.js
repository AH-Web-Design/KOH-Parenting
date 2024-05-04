const enabled = true;

if(enabled){
    const title = document.getElementById('title');
    const bodyInputs = document.querySelectorAll('.acf-field input');
    const bodyTextarea = document.querySelectorAll('.acf-field textarea');
    const submitContainer = document.getElementById('postbox-container-1');
    const wpHeadingInline = document.querySelector('.wp-heading-inline');
    const screenMeta = document.getElementById('screen-meta');
    const screenMetaLinks = document.getElementById('screen-meta-links');
    const pageTitleAction = document.querySelector('.page-title-action');
    const logs = document.getElementById('logs').querySelector('textarea');
    submitContainer.remove();
    title.remove();
    wpHeadingInline.remove();
    screenMeta.remove();
    screenMetaLinks.remove();
    pageTitleAction.remove();
    bodyInputs.forEach(input => {
        input.readOnly = true;
    });
    bodyTextarea.forEach(textarea => {
        textarea.readOnly = true;
    });
    
    logs.value = logs.value.replaceAll(`,`, `\r\n`);

}
