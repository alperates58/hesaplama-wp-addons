function hcYeastConvHesapla() {
    const origType = parseFloat(document.getElementById('hc-yeast-orig-type').value);
    const val = parseFloat(document.getElementById('hc-yeast-orig-val').value);

    if (isNaN(val) || val <= 0) {
        alert('Lütfen miktar giriniz.');
        return;
    }

    // Tüm mayaları instant maya birimine normalize et
    const instantBase = val / origType;

    const instant = instantBase * 1;
    const active = instantBase * 1.25;
    const fresh = instantBase * 3;

    document.getElementById('hc-yeast-conv-list').innerHTML = `
        <ul style="text-align:left;">
            <li><strong>Instant Maya:</strong> ${instant.toFixed(1)} g</li>
            <li><strong>Aktif Kuru Maya:</strong> ${active.toFixed(1)} g</li>
            <li><strong>Yaş Maya:</strong> ${fresh.toFixed(1)} g</li>
        </ul>
    `;
    
    document.getElementById('hc-yeast-conv-result').classList.add('visible');
}
