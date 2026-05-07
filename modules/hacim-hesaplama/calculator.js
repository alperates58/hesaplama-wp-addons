function hcUpdateHacimFields() {
    const shape = document.getElementById('hc-shape-select').value;
    const container = document.getElementById('hc-hacim-fields');
    let html = '';

    if (shape === 'kup') {
        html = `<div class="hc-form-group"><label>Kenar Uzunluğu (a)</label><input type="number" id="hc-dim-a" placeholder="cm"></div>`;
    } else if (shape === 'kure') {
        html = `<div class="hc-form-group"><label>Yarıçap (r)</label><input type="number" id="hc-dim-r" placeholder="cm"></div>`;
    } else if (shape === 'silindir' || shape === 'koni') {
        html = `
            <div class="hc-form-grid">
                <div class="hc-form-group"><label>Yarıçap (r)</label><input type="number" id="hc-dim-r" placeholder="cm"></div>
                <div class="hc-form-group"><label>Yükseklik (h)</label><input type="number" id="hc-dim-h" placeholder="cm"></div>
            </div>`;
    }

    container.innerHTML = html;
    document.getElementById('hc-hacim-result').classList.remove('visible');
}

function hcHacimHesapla() {
    const shape = document.getElementById('hc-shape-select').value;
    let volume = 0;

    if (shape === 'kup') {
        const a = parseFloat(document.getElementById('hc-dim-a').value);
        if (isNaN(a)) { alert('Lütfen kenar uzunluğunu giriniz.'); return; }
        volume = Math.pow(a, 3);
    } else if (shape === 'kure') {
        const r = parseFloat(document.getElementById('hc-dim-r').value);
        if (isNaN(r)) { alert('Lütfen yarıçapı giriniz.'); return; }
        volume = (4/3) * Math.PI * Math.pow(r, 3);
    } else if (shape === 'silindir') {
        const r = parseFloat(document.getElementById('hc-dim-r').value);
        const h = parseFloat(document.getElementById('hc-dim-h').value);
        if (isNaN(r) || isNaN(h)) { alert('Lütfen tüm boyutları giriniz.'); return; }
        volume = Math.PI * Math.pow(r, 2) * h;
    } else if (shape === 'koni') {
        const r = parseFloat(document.getElementById('hc-dim-r').value);
        const h = parseFloat(document.getElementById('hc-dim-h').value);
        if (isNaN(r) || isNaN(h)) { alert('Lütfen tüm boyutları giriniz.'); return; }
        volume = (1/3) * Math.PI * Math.pow(r, 2) * h;
    }

    document.getElementById('hc-res-hacim-val').innerText = volume.toLocaleString('tr-TR', { 
        maximumFractionDigits: 2 
    });

    document.getElementById('hc-hacim-result').classList.add('visible');
    document.getElementById('hc-hacim-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}

// İlk açılışta alanları yükle
document.addEventListener('DOMContentLoaded', hcUpdateHacimFields);
// WP ortamında bazen DOMContentLoaded kaçabilir
if (document.readyState !== 'loading') hcUpdateHacimFields();
