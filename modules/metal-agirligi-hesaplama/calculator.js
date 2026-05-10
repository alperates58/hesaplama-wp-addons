function hcMetalGenericSwitch() {
    const type = document.getElementById('hc-mg-type').value;
    const container = document.getElementById('hc-mg-inputs');
    let html = "";

    if (type === 'pipe') {
        html = `
            <div class="hc-form-group">
                <label>Dış Çap (mm):</label>
                <input type="number" id="hc-mg-v1" placeholder="60">
            </div>
            <div class="hc-form-group">
                <label>Et Kalınlığı (mm):</label>
                <input type="number" id="hc-mg-v2" placeholder="3">
            </div>
        `;
    } else if (type === 'rect') {
        html = `
            <div class="hc-form-group">
                <label>Genişlik (mm):</label>
                <input type="number" id="hc-mg-v1" placeholder="40">
            </div>
            <div class="hc-form-group">
                <label>Yükseklik (mm):</label>
                <input type="number" id="hc-mg-v2" placeholder="40">
            </div>
            <div class="hc-form-group">
                <label>Et Kalınlığı (mm):</label>
                <input type="number" id="hc-mg-v3" placeholder="2">
            </div>
        `;
    } else if (type === 'solid') {
        html = `
            <div class="hc-form-group">
                <label>Çap (mm):</label>
                <input type="number" id="hc-mg-v1" placeholder="20">
            </div>
        `;
    }
    container.innerHTML = html;
}

function hcMetalGenericHesapla() {
    const type = document.getElementById('hc-mg-type').value;
    const len = parseFloat(document.getElementById('hc-mg-len').value);
    const v1 = parseFloat(document.getElementById('hc-mg-v1').value);
    const v2 = document.getElementById('hc-mg-v2') ? parseFloat(document.getElementById('hc-mg-v2').value) : 0;
    const v3 = document.getElementById('hc-mg-v3') ? parseFloat(document.getElementById('hc-mg-v3').value) : 0;

    if (!len || !v1) { alert('Lütfen tüm ölçüleri giriniz.'); return; }

    let weightPerMeter = 0;
    const steelDensity = 0.00785; // kg/mm2 per meter

    if (type === 'pipe') {
        // (D - t) * t * 0.02466 (Standard formula for steel pipe)
        weightPerMeter = (v1 - v2) * v2 * 0.02466;
    } else if (type === 'rect') {
        // ((W+H)*2 / 3.14 - t) * t * 0.02466 approx or direct:
        // Area = (W*H) - (W-2t)*(H-2t)
        const area = (v1 * v2) - ((v1 - 2 * v3) * (v2 - 2 * v3));
        weightPerMeter = area * 0.00785;
    } else if (type === 'solid') {
        // (D^2) * 0.00617
        weightPerMeter = (v1 * v1) * 0.00617;
    }

    const totalWeight = weightPerMeter * len;
    const resVal = document.getElementById('hc-mg-res-val');
    resVal.innerText = totalWeight.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    document.getElementById('hc-metal-generic-result').classList.add('visible');
}
