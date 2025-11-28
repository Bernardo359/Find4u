(function(){
  function log(...args){ try{ console.log('[anuncio-preview]', ...args); }catch(e){} }

  // A função que cria as miniaturas
  function renderPreviewFiles(files, previewEl){
    previewEl.innerHTML = '';
    if(!files || files.length === 0){
      log('no files to preview');
      return;
    }
    Array.from(files).forEach(function(file){
      const reader = new FileReader();
      reader.onload = function(e){
        const card = document.createElement('div');
        card.className = 'preview-card';
        const img = document.createElement('img');
        img.src = e.target.result;
        img.alt = file.name || 'image';
        card.appendChild(img);
        previewEl.appendChild(card);
      };
      reader.readAsDataURL(file);
    });
  }

  // Tenta localizar o input e o preview por vários selectors
  function findElements(){
    var selectors = [
      '#image-upload',        // teu id antigo
      '#input-fotos',         // outros exemplos que sugerimos
      'input[type=file][id^=\"image\"]',
      'input[type=file][name*=\"imageFiles\"]',
      'input[type=file][name*=\"imagens\"]',
      'input[type=file]'
    ];

    var inputEl = null;
    for(var s of selectors){
      var el = document.querySelector(s);
      if(el && el.type === 'file'){
        inputEl = el;
        log('found input by selector', s);
        break;
      }
    }

    // preview element: tenta vários IDs
    var previewEl = document.getElementById('preview') || 
                    document.getElementById('preview-images') ||
                    document.getElementById('existing-preview') ||
                    document.querySelector('.preview-grid') ||
                    document.querySelector('#preview');

    log('previewEl found?', !!previewEl);

    return { inputEl: inputEl, previewEl: previewEl };
  }

  // Attach listener safely (works if element added later too)
  function attach(){
    var els = findElements();
    if(!els.inputEl){
      log('input NOT found yet. Retrying in 200ms...');
      // tenta novamente algumas vezes (útil se form é gerado dinamicamente)
      setTimeout(attach, 200);
      return;
    }
    if(!els.previewEl){
      // se não existe preview, cria uma div após o input
      els.previewEl = document.createElement('div');
      els.previewEl.id = 'preview-images';
      els.previewEl.className = 'preview-grid';
      els.inputEl.parentNode.appendChild(els.previewEl);
      log('created preview element dynamically');
    }

    // Remove listeners anteriores (evitar duplicação)
    els.inputEl.removeEventListener('change', handleChange, false);
    els.inputEl.addEventListener('change', handleChange, false);
    log('listener attached to input', els.inputEl);
  }

  function handleChange(event){
    try{
      var input = event.target;
      var files = input.files;
      var previewEl = document.getElementById('preview-images') || document.getElementById('preview') || document.querySelector('.preview-grid');
      if(!previewEl){
        log('preview element missing inside handler - creating');
        previewEl = document.createElement('div');
        previewEl.id = 'preview-images';
        previewEl.className = 'preview-grid';
        input.parentNode.appendChild(previewEl);
      }
      renderPreviewFiles(files, previewEl);
    }catch(err){
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