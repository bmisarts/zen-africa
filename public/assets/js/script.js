var up_photo = document.getElementById('up_photo');
var sh_photo = document.getElementById('sh_photo');
up_photo.onchange = evt => {
    const [file] = up_photo.files
    if (file) {
        sh_photo.src = URL.createObjectURL(file)
    }
}