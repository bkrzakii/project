document.addEventListener('DOMContentLoaded', function () {
    const MAX_IMAGES = 10;
  
    const input = document.querySelector('#file-upload');
    const previewContainer = document.querySelector('.preview-container');
    const imageUploadDiv = document.querySelector('.image-upload');
    const uploadBox = document.querySelector('.upload-box');
  
    // ✅ Click on .image-upload or .upload-box
    document.addEventListener('click', function (e) {
      if (e.target.closest('.image-upload') || e.target.closest('.upload-box')) {
        input.click();
      }
    });
  
    // ✅ Handle file change
    input.addEventListener('change', function () {
      const existingImages = previewContainer.querySelectorAll('.preview-image').length;
      const newFiles = Array.from(input.files);
  
      if (existingImages + newFiles.length > MAX_IMAGES) {
        alert(`You can upload up to ${MAX_IMAGES} images in total.`);
        return;
      }
  
      newFiles.forEach(file => {
        if (!file.type.startsWith("image/")) return;
  
        const reader = new FileReader();
        reader.onload = function (e) {
          const wrapper = document.createElement('div');
          wrapper.style.position = 'relative';
          wrapper.style.display = 'inline-block';
  
          const img = document.createElement("img");
          img.src = e.target.result;
          img.classList.add('preview-image');
          img.style.maxWidth = "120px";
          img.style.borderRadius = "8px";
          img.style.margin = "5px";
  
          const deleteBtn = document.createElement('span');
          deleteBtn.textContent = '×';
          deleteBtn.style.position = 'absolute';
          deleteBtn.style.top = '0px';
          deleteBtn.style.right = '5px';
          deleteBtn.style.cursor = 'pointer';
          deleteBtn.style.color = 'red';
          deleteBtn.style.fontSize = '20px';
  
          deleteBtn.addEventListener('click', function () {
            wrapper.remove();
  
            const totalImages = previewContainer.querySelectorAll('.preview-image').length;
            if (totalImages < MAX_IMAGES) {
              uploadBox.style.display = 'flex';
            }
            if (totalImages === 0) {
              imageUploadDiv.style.display = 'flex';
              uploadBox.style.display = 'none';
            }
          });
  
          wrapper.appendChild(img);
          wrapper.appendChild(deleteBtn);
          previewContainer.appendChild(wrapper);
  
          // UI updates
          imageUploadDiv.style.display = 'none';
          uploadBox.style.display = 'flex';
  
          const totalImages = previewContainer.querySelectorAll('.preview-image').length;
          if (totalImages >= MAX_IMAGES) {
            uploadBox.style.display = 'none';
          }
        };
        reader.readAsDataURL(file);
      });
    });
  });
  