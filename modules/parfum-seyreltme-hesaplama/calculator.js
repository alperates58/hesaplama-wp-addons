function hcPerfumeTypeChange() {
    const type = document.getElementById('hc-ps-type').value;
    document.getElementById('hc-ps-custom-row').style.display = type === 'custom' ? 'block' : 'none';
}

function hcParfümSeyreltmeHesapla() {
    const type = document.getElementById('hc-ps-type').value;
    const totalV = parseFloat(document.getElementById('hc-ps-total').value);
    let percent = 0;

    if (type === 'custom') {
        percent = parseFloat(document.getElementById('hc-ps-percent').value);
    } else {
        percent = parseFloat(type);
    }

    if (!totalV || !percent) return;

    const essenceV = totalV * (percent / 100);
    const alcoholV = totalV - essenceV;

    document.getElementById('hc-ps-stats').innerHTML = `
        🌸 <strong>Esans Miktarı:</strong> ${essenceV.toFixed(1)} mL<br>
        🧪 <strong>Alkol Miktarı:</strong> ${alcoholV.toFixed(1)} mL<br>
        <p style="font-size:0.85em; color:#666; margin-top:10px;">*Öneri: Alkol olarak %96'lık etil alkol ve az miktarda distile su kullanılması tavsiye edilir.</p>
    `;
    document.getElementById('hc-ps-result').classList.add('visible');
}
