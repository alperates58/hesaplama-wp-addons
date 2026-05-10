function hcHacimSwitch() {
    const shape = document.getElementById('hc-hm-shape').value;
    const container = document.getElementById('hc-hm-inputs');
    let html = "";

    if (shape === 'cube') {
        html = `
            <div class="hc-form-group"><label>Genişlik:</label><input type="number" id="hc-hm-v1" step="0.1"></div>
            <div class="hc-form-group"><label>Uzunluk:</label><input type="number" id="hc-hm-v2" step="0.1"></div>
            <div class="hc-form-group"><label>Yükseklik:</label><input type="number" id="hc-hm-v3" step="0.1"></div>
        `;
    } else if (shape === 'cyl') {
        html = `
            <div class="hc-form-group"><label>Yarıçap (r):</label><input type="number" id="hc-hm-v1" step="0.1"></div>
            <div class="hc-form-group"><label>Yükseklik (h):</label><input type="number" id="hc-hm-v2" step="0.1"></div>
        `;
    } else {
        html = `
            <div class="hc-form-group"><label>Yarıçap (r):</label><input type="number" id="hc-hm-v1" step="0.1"></div>
        `;
    }
    container.innerHTML = html;
}

function hcHacimMathHesapla() {
    const shape = document.getElementById('hc-hm-shape').value;
    const v1 = parseFloat(document.getElementById('hc-hm-v1').value);
    const v2 = document.getElementById('hc-hm-v2') ? parseFloat(document.getElementById('hc-hm-v2').value) : 0;
    const v3 = document.getElementById('hc-hm-v3') ? parseFloat(document.getElementById('hc-hm-v3').value) : 0;

    if (!v1) { alert('Lütfen ölçüleri giriniz.'); return; }

    let volume = 0;
    if (shape === 'cube') volume = v1 * v2 * v3;
    else if (shape === 'cyl') volume = Math.PI * Math.pow(v1, 2) * v2;
    else volume = (4 / 3) * Math.PI * Math.pow(v1, 3);

    document.getElementById('hc-hm-res-val').innerText = volume.toLocaleString('tr-TR', { maximumFractionDigits: 3 });
    document.getElementById('hc-hacim-result').classList.add('visible');
}
