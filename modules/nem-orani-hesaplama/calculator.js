function hcNemOraniHesapla() {
    const t = parseFloat(document.getElementById('hc-rh-temp').value);
    const td = parseFloat(document.getElementById('hc-rh-dew').value);

    if (isNaN(t) || isNaN(td)) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    if (td > t) {
        alert('Çiğ noktası hava sıcaklığından büyük olamaz.');
        return;
    }

    // Magnus formula for RH
    // RH = 100 * exp((17.625 * Td) / (243.04 + Td)) / exp((17.625 * T) / (243.04 + T))
    const rh = 100 * (Math.exp((17.625 * td) / (243.04 + td)) / Math.exp((17.625 * t) / (243.04 + t)));

    document.getElementById('hc-rh-res-total').innerText = rh.toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    document.getElementById('hc-rh-result').classList.add('visible');
}
