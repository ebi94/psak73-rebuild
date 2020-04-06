<section>
    <?php $id_kontrak = '1';?>
    <input type="hidden" id="urlpdf">
<div id="<?php echo $id_kontrak?>-pdf" class=" pdfobject-container">
    <embed id="pdfobject" class="pdfobject" src="assets/pdf/6caa04b7cfb9864988bcfcc8fcb364ae.pdf" type="application/pdf" style="overflow: auto; width: 100%; height: 1900px;">
    </embed>
</div>
</section>
<!-- insert just before the closing body tag </body> -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.1.1/pdfobject.js'></script>
<script>
var options = {
    pdfOpenParams: { scrollbar: '1', toolbar: '1', statusbar: '1', navpanes: '1' }
};

// var showurl = $('embed #pdfobject').attr('src');

// PDFObject.embed(showurl, "<?php //echo $id_kontrak?>-pdf", option);
</script>