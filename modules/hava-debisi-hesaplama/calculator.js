function hcAirflowSwitch() {
    const type = document.getElementById('hc-af-type').value;
    const container = document.getElementById('hc-af-inputs');
    let html = "";

    if (type === 'rect') {
        html = `
            <div class="hc-form-group">
                <label>Genişlik (mm):</label>
                <input type="number" id="hc-af-v1" placeholder="400">
            </div>
            <div class="hc-form-group">
                <label>Yükseklik (mm):</label>
                <input type="number" id="hc-af-v2" placeholder="300">
            </div>
        `;
    } else {
        html = `
            <div class="hc-form-group">
                <label>Çap (mm):</label>
                <input type="number" id="hc-af-v1" placeholder="300">
            </div>
        `;
    }
    container.innerHTML = html;
}

function hcAirflowCalcHesapla() {
    const type = document.getElementById('hc-af-type').value;
    const velocity = parseFloat(document.getElementById('hc-af-vel').value);
    const v1 = parseFloat(document.getElementById('hc-af-v1').value);
    const v2 = document.getElementById('hc-af-v2') ? parseFloat(document.getElementById('hc-af-v2').value) : 0;

    if (!velocity || !v1) { alert('Lütfen ölçüleri giriniz.'); return; }

    let area = 0;
    if (type === 'rect') {
        area = (v1 / 1000) * (v2 / 1000);
    } else {
        area = Math.PI * Math.pow((v1 / 1000) / 2, 2);
    }

    // Flow = Area * Velocity * 3600 (to get m3/h)
    const flow = area * velocity * 3600;

    const resVal = document.getElementById('hc-af-res-val');
    resVal.innerText = Math.round(flow).toLocaleString('tr-TR');

    document.getElementById('hc-airflow-result').classList.add('visible');
}
