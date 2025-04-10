
document.getElementById("file-upload").addEventListener("change", function() {
    const fileName = this.files[0] ? this.files[0].name : "Upload business verification document";
    document.getElementById("file-name").textContent = fileName;
});

const input = document.getElementById('file-upload');
const previewContainer = document.getElementById('preview-container');
const uploadBox = document.getElementById('upload-box');
const imageUploadDiv = document.querySelector('.image-upload');
const MAX_IMAGES = 10;
let uploadedImages = [];

input.addEventListener('change', function () {
    const newFiles = Array.from(this.files);

    // snippet li bghiti ndkhl
    if (this.files.length > 0) {
    imageUploadDiv.style.display = 'none';
    }

    if (uploadedImages.length + newFiles.length > MAX_IMAGES) {
    alert(`You can upload up to ${MAX_IMAGES} images in total.`);
    input.value = "";
    return;
    }

    newFiles.forEach(file => {
    if (!file.type.startsWith("image/")) return;

    uploadedImages.push(file);

    const reader = new FileReader();
    reader.onload = function (e) {
        const img = document.createElement("img");
        img.src = e.target.result;
        img.style.maxWidth = "120px";
        img.style.borderRadius = "8px";
        previewContainer.appendChild(img);
    };
    reader.readAsDataURL(file);
    });

    input.value = ""; // reset input

    if (uploadedImages.length >= MAX_IMAGES) {
    uploadBox.style.display = 'none';
    }
});
