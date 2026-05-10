function hcVolumeGenericSwitch() {
    const shape = document.getElementById('hc-vg-shape').value;
    const container = document.getElementById('hc-vg-inputs');
    let html = "";

    if (shape === 'rect') {
        html = `
            <div class="hc-form-group">
                <label>Genişlik (m):</label>
                <input type="number" id="hc-vg-v1" step="0.01" placeholder="2.0">
            </div>
            <div class="hc-form-group">
                <label>Uzunluk (m):</label>
                <input type="number" id="hc-vg-v2" step="0.01" placeholder="3.0">
            </div>
            <div class="hc-form-group">
                <label>Yükseklik (m):</label>
                <input type="number" id="hc-vg-v3" step="0.01" placeholder="1.5">
            </div>
        `;
    } else if (shape === 'cyl') {
        html = `
            <div class="hc-form-group">
                <label>Yarıçap (m):</label>
                <input type="number" id="hc-vg-v1" step="0.01" placeholder="1.0">
            </div>
            <div class="hc-form-group">
                <label>Yükseklik (m):</label>
                <input type="number" id="hc-vg-v2" step="0.01" placeholder="2.0">
            </div>
        `;
    } else if (shape === 'sphere') {
        html = `
            <div class="hc-form-group">
                <label>Yarıçap (m):</label>
                <input type="number" id="hc-vg-v1" step="0.01" placeholder="1.0">
            </div>
        `;
    }

    container.innerHTML = html;
}

function hcVolumeGenericHesapla() {
    const shape = document.getElementById('hc-vg-shape').value;
    const v1 = parseFloat(document.getElementById('hc-vg-v1').value);
    const v2 = document.getElementById('hc-vg-v2') ? parseFloat(document.getElementById('hc-vg-v2').value) : 0;
    const v3 = document.getElementById('hc-vg-v3') ? parseFloat(document.getElementById('hc-vg-v3').value) : 0;

    if (!v1) { alert('Lütfen ölçüleri giriniz.'); return; }

    let vol = 0;
    if (shape === 'rect') vol = v1 * v2 * v3;
    else if (shape === 'cyl') vol = Math.PI * Math.pow(v1, 2) * v2;
    else if (shape === 'sphere') vol = (4 / 3) * Math.PI * Math.pow(v1, 3);

    const resVal = document.getElementById('hc-vg-res-val');
    resVal.innerText = vol.toLocaleString('tr-TR', { minimumFractionDigits: 3, maximumFractionDigits: 3 });

    document.getElementById('hc-volume-generic-result').classList.add('visible');
}
