<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/datatables/datatables.min.js"></script>
<script>
    const overlay = document.getElementById("overlay");
    const imgThumbnail = document.querySelectorAll('.img-thumbnail');
    for (let index = 0; index < imgThumbnail.length; index++) {
        const element = imgThumbnail[index];
        element.addEventListener('click',function () {
            overlay.style.display = "block";
            overlay.innerHTML = `
                <span class="overlay-close" onclick="overlayNone()">X</span>
                <img class="img-overlay" src="${this.src}">
            `;
        });
    }
    
    function overlayNone(){
        overlay.style.display = "none";
    }
</script>