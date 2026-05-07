function hcGdHesapla() {
    const vNom = parseFloat(document.getElementById('hc-gd-volt').value);
    const current = parseFloat(document.getElementById('hc-gd-current').value);
    const length = parseFloat(document.getElementById('hc-gd-length').value);
    const section = parseFloat(document.getElementById('hc-gd-cross').value);
    const metal = document.querySelector('input[name="hc-gd-metal"]:checked').value;

    if (isNaN(vNom) || isNaN(current) || isNaN(length) || vNom <= 0) {
        alert('Lütfen tüm alanları doğru şekilde doldurun.');
        return;
    }

    // Öz direnç (ρ) ohm.mm2/m
    const rho = (metal === 'bakir') ? 0.0175 : 0.028;

    // ΔU = (2 * L * I * ρ) / S (Tek fazlı basit formül)
    const vDrop = (2 * length * current * rho) / section;
    const pDrop = (vDrop / vNom) * 100;
    const vFinal = vNom - vDrop;

    document.getElementById('hc-res-v-drop').innerText = vDrop.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' V';
    document.getElementById('hc-res-p-drop').innerText = '%' + pDrop.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-res-v-final').innerText = vFinal.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' V';

    const statusDiv = document.getElementById('hc-res-status');
    if (pDrop <= 3) {
        statusDiv.innerText = '✓ Uygun: Gerilim düşümü %3 sınırının altında.';
        statusDiv.className = 'hc-gd-status success';
    } else {
        statusDiv.innerText = '⚠ Dikkat: Gerilim düşümü %3 sınırını aşıyor! Daha kalın kesit kullanın.';
        statusDiv.className = 'hc-gd-status error';
    }

    document.getElementById('hc-gd-result').classList.add('visible');
    document.getElementById('hc-gd-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
