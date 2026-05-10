function hcAreaGenericSwitch() {
    const shape = document.getElementById('hc-ag-shape').value;
    const container = document.getElementById('hc-ag-inputs');
    let html = "";

    if (shape === 'rect') {
        html = `
            <div class="hc-form-group">
                <label>Genişlik (m):</label>
                <input type="number" id="hc-ag-v1" step="0.01" placeholder="5.0">
            </div>
            <div class="hc-form-group">
                <label>Uzunluk (m):</label>
                <input type="number" id="hc-ag-v2" step="0.01" placeholder="4.0">
            </div>
        `;
    } else if (shape === 'tri') {
        html = `
            <div class="hc-form-group">
                <label>Taban (m):</label>
                <input type="number" id="hc-ag-v1" step="0.01" placeholder="6.0">
            </div>
            <div class="hc-form-group">
                <label>Yükseklik (m):</label>
                <input type="number" id="hc-ag-v2" step="0.01" placeholder="3.0">
            </div>
        `;
    } else if (shape === 'circle') {
        html = `
            <div class="hc-form-group">
                <label>Yarıçap (m):</label>
                <input type="number" id="hc-ag-v1" step="0.01" placeholder="2.5">
            </div>
        `;
    }

    container.innerHTML = html;
}

function hcAreaGenericHesapla() {
    const shape = document.getElementById('hc-ag-shape').value;
    const v1 = parseFloat(document.getElementById('hc-ag-v1').value);
    const v2 = document.getElementById('hc-ag-v2') ? parseFloat(document.getElementById('hc-ag-v2').value) : 0;

    if (!v1 && shape !== 'circle') { alert('Lütfen ölçüleri giriniz.'); return; }
    if (shape === 'circle' && !v1) { alert('Lütfen yarıçapı giriniz.'); return; }

    let area = 0;
    if (shape === 'rect') area = v1 * v2;
    else if (shape === 'tri') area = (v1 * v2) / 2;
    else if (shape === 'circle') area = Math.PI * Math.pow(v1, 2);

    const resVal = document.getElementById('hc-ag-res-val');
    resVal.innerText = area.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    document.getElementById('hc-area-generic-result').classList.add('visible');
}
