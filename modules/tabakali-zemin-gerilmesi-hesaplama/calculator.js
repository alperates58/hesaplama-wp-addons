let soilLayerCount = 1;

function hcAddSoilLayer() {
    soilLayerCount++;
    const container = document.getElementById('hc-ls-layers');
    const div = document.createElement('div');
    div.className = 'hc-form-group hc-ls-layer';
    div.innerHTML = `
        <label>Katman ${soilLayerCount}: Kalınlık [m] | Birim Ağ. [kN/m³]</label>
        <div style="display:flex; gap:10px;">
            <input type="number" class="hc-ls-h" value="2">
            <input type="number" class="hc-ls-g" value="18">
        </div>
    `;
    container.appendChild(div);
}

function hcLayeredSoilHesapla() {
    const hInputs = document.querySelectorAll('.hc-ls-h');
    const gInputs = document.querySelectorAll('.hc-ls-g');
    
    let totalStress = 0;
    for (let i = 0; i < hInputs.length; i++) {
        const h = parseFloat(hInputs[i].value) || 0;
        const g = parseFloat(gInputs[i].value) || 0;
        totalStress += (h * g);
    }

    document.getElementById('hc-res-ls-val').innerText = totalStress.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kPa';
    document.getElementById('hc-layered-soil-result').classList.add('visible');
}
