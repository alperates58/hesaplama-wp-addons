function hcDPUHesapla() {
    const defects = parseFloat(document.getElementById('hc-dpu-defects').value);
    const units = parseFloat(document.getElementById('hc-dpu-units').value);

    if (isNaN(defects) || isNaN(units) || units <= 0) {
        alert('Lütfen geçerli değerler girin (Birim sayısı 0\'dan büyük olmalıdır).');
        return;
    }

    const dpu = defects / units;
    
    document.getElementById('hc-res-dpu-val').innerText = dpu.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 6 });
    document.getElementById('hc-birim-basina-hata-dpu-hesaplama-result').classList.add('visible');
}
