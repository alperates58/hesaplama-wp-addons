function hcEsnafVergiHesapla() {
    const profit = parseFloat(document.getElementById('hc-ev-profit').value) || 0;
    const type = document.getElementById('hc-ev-type').value;

    let tax = 0;
    let status = "Vergiye Tabi Değil (Muaf)";

    if (type === 'real') {
        status = "Vergiye Tabi (Gerçek Usul)";
        // Simple progressive estimation
        if (profit <= 110000) tax = profit * 0.15;
        else if (profit <= 230000) tax = 16500 + (profit - 110000) * 0.20;
        else if (profit <= 580000) tax = 40500 + (profit - 230000) * 0.27;
        else tax = 135000 + (profit - 580000) * 0.35;
    } else {
        // Basit usul exemption
        tax = 0;
        status = "Vergi İstisnası Uygulandı (%100)";
    }

    document.getElementById('hc-ev-res-status').innerText = status;
    document.getElementById('hc-ev-res-tax').innerText = tax.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-esnaf-result').classList.add('visible');
}
