(function(){
  function log(...args){ 
    try { console.log('[anuncio-preview]', ...args); } catch(e) {} 
  }

  // Renderiza as miniaturas das imagens
  function renderPreviewFiles(files, previewEl) {
    previewEl.innerHTML = '';
    if (!files || files.length === 0) {
      log('no files to preview');
      return;
    }

    Array.from(files).forEach(function(file, index) {
      if (file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function(e) {
          const card = document.createElement('div');
          card.className = 'preview-image-item';
          
          const img = document.createElement('img');
          img.src = e.target.result;
          img.alt = file.name || 'image';
          card.appendChild(img);

          // Botão para remover
          const removeBtn = document.createElement('button');
          removeBtn.type = 'button';
          removeBtn.className = 'preview-image-remove';
          removeBtn.textContent = '×';
          removeBtn.setAttribute('data-index', index);
          removeBtn.addEventListener('click', function(e) {
            e.preventDefault();
            handleRemoveImage(index, inputEl);
          });
          card.appendChild(removeBtn);

          previewEl.appendChild(card);
        };
        reader.readAsDataURL(file);
      }
    });
  }

  // Remove uma imagem da lista
  function handleRemoveImage(index, inputEl) {
    try {
      const dataTransfer = new DataTransfer();
      Array.from(inputEl.files).forEach((f, i) => {
        if (i !== index) {
          dataTransfer.items.add(f);
        }
      });
      inputEl.files = dataTransfer.files;
      handleChange({ target: inputEl });
      log('image removed at index', index);
    } catch(err) {
      console.error('[anuncio-preview] remove error', err);
    }
  }

  // Localiza o input e o preview por vários selectors
  function findElements() {
    var selectors = [
      '#image-upload',
      '#input-fotos',
      'input[type=file][id^="image"]',
      'input[type=file][name*="imageFiles"]',
      'input[type=file][name*="imagens"]',
      'input[type=file]'
    ];

    var inputEl = null;
    for (var s of selectors) {
      var el = document.querySelector(s);
      if (el && el.type === 'file') {
        inputEl = el;
        log('found input by selector', s);
        break;
      }
    }

    var previewEl = document.getElementById('preview-images') || 
                    document.getElementById('preview') ||
                    document.getElementById('existing-preview') ||
                    document.querySelector('.preview-grid') ||
                    document.querySelector('.preview-images-grid');

    log('previewEl found?', !!previewEl);

    return { inputEl: inputEl, previewEl: previewEl };
  }

  var inputEl; // variável global para usar em outros handlers

  // Attacher o listener com suporte a drag & drop
  function attach() {
    var els = findElements();
    if (!els.inputEl) {
      log('input NOT found yet. Retrying in 200ms...');
      setTimeout(attach, 200);
      return;
    }

    inputEl = els.inputEl; // guardar na variável global

    if (!els.previewEl) {
      els.previewEl = document.createElement('div');
      els.previewEl.id = 'preview-images';
      els.previewEl.className = 'preview-images-grid';
      els.inputEl.parentNode.appendChild(els.previewEl);
      log('created preview element dynamically');
    }

    // Remover listeners anteriores
    els.inputEl.removeEventListener('change', handleChange, false);
    els.inputEl.addEventListener('change', handleChange, false);
    log('listener attached to input', els.inputEl);

    // Adicionar drag & drop
    var fileUploadArea = document.querySelector('.file-upload-area');
    if (fileUploadArea) {
      fileUploadArea.removeEventListener('click', handleClickUpload);
      fileUploadArea.removeEventListener('dragover', handleDragOver);
      fileUploadArea.removeEventListener('dragleave', handleDragLeave);
      fileUploadArea.removeEventListener('drop', handleDrop);

      fileUploadArea.addEventListener('click', handleClickUpload);
      fileUploadArea.addEventListener('dragover', handleDragOver);
      fileUploadArea.addEventListener('dragleave', handleDragLeave);
      fileUploadArea.addEventListener('drop', handleDrop);
      log('drag & drop attached');
    }
  }

  // Handler para click no upload
  function handleClickUpload(e) {
    if (inputEl) {
      inputEl.click();
    }
  }

  // Handler para dragover
  function handleDragOver(e) {
    e.preventDefault();
    e.stopPropagation();
    this.style.backgroundColor = '#ede8e3';
    this.style.borderColor = '#b49d7e';
  }

  // Handler para dragleave
  function handleDragLeave(e) {
    e.preventDefault();
    e.stopPropagation();
    this.style.backgroundColor = '#fafafa';
    this.style.borderColor = '#b49d7e';
  }

  // Handler para drop
  function handleDrop(e) {
    e.preventDefault();
    e.stopPropagation();
    this.style.backgroundColor = '#fafafa';
    this.style.borderColor = '#b49d7e';

    if (inputEl && e.dataTransfer.files) {
      inputEl.files = e.dataTransfer.files;
      handleChange({ target: inputEl });
      log('files dropped', e.dataTransfer.files.length);
    }
  }

  // Handler para mudança no input
  function handleChange(event) {
    try {
      var input = event.target;
      var files = input.files;
      var previewEl = document.getElementById('preview-images') || 
                      document.getElementById('preview') || 
                      document.querySelector('.preview-images-grid');
      
      if (!previewEl) {
        log('preview element missing inside handler - creating');
        previewEl = document.createElement('div');
        previewEl.id = 'preview-images';
        previewEl.className = 'preview-images-grid';
        input.parentNode.appendChild(previewEl);
      }
      
      renderPreviewFiles(files, previewEl);
      log('preview updated with', files.length, 'files');
    } catch(err) {
      console.error('[anuncio-preview] handler error', err);
    }
  }

  // Espera DOM ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', attach);
  } else {
    attach();
  }
})();