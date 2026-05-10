function hcObpHesapla() {
    const not = parseFloat(document.getElementById('hc-obp-not').value);

    if (isNaN(not) || not < 0 || not > 100) {
        alert('Lütfen 0 ile 100 arasında geçerli bir diploma notu giriniz.');
        return;
    }

    // OBP = Diploma Notu * 5
    // Katkı = OBP * 0.12
    const obp = not * 5;
    const katki = obp * 0.12;

    document.getElementById('hc-obp-val').innerText = obp.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-obp-katki').innerText = katki.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Puan';
    document.getElementById('hc-obp-result').classList.add('visible');
}
