function hcRhombusSwitch() {
    const type = document.getElementById('hc-rh-type').value;
    const container = document.getElementById('hc-rh-inputs');
    let html = "";

    if (type === 'diag') {
        html = `
            <div class="hc-form-group">
                <label>1. Köşegen Uzunluğu (cm):</label>
                <input type="number" id="hc-rh-v1" placeholder="10">
            </div>
            <div class="hc-form-group">
                <label>2. Köşegen Uzunluğu (cm):</label>
                <input type="number" id="hc-rh-v2" placeholder="12">
            </div>
        `;
    } else {
        html = `
            <div class="hc-form-group">
                <label>Taban Uzunluğu (cm):</label>
                <input type="number" id="hc-rh-v1" placeholder="8">
            </div>
            <div class="hc-form-group">
                <label>Yükseklik (cm):</label>
                <input type="number" id="hc-rh-v2" placeholder="6">
            </div>
        `;
    }
    container.innerHTML = html;
}

function hcRhombusAreaHesapla() {
    const type = document.getElementById('hc-rh-type').value;
    const v1 = parseFloat(document.getElementById('hc-rh-v1').value);
    const v2 = parseFloat(document.getElementById('hc-rh-v2').value);

    if (!v1 || !v2) {
        alert('Lütfen değerleri giriniz.');
        return;
    }

    let area = 0;
    if (type === 'diag') {
        area = (v1 * v2) / 2;
    } else {
        area = v1 * v2;
    }

    document.getElementById('hc-rh-res-val').innerText = area.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-rhombus-result').classList.add('visible');
}
