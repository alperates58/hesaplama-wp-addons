function hcPhHesapla() {
    const h_conc = parseFloat(document.getElementById('hc-ph-h-conc').value);

    if (isNaN(h_conc) || h_conc <= 0) {
        alert('Lütfen geçerli bir konsantrasyon girin (Pozitif olmalıdır).');
        return;
    }

    // pH = -log10[H+]
    const ph = -Math.log10(h_conc);
    const poh = 14 - ph;

    document.getElementById('hc-ph-res-ph').innerText = ph.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-ph-res-poh').innerText = poh.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    const type = document.getElementById('hc-ph-type');
    if (ph < 6.5) {
        type.innerText = "Asidik Çözelti";
        type.style.color = "#e74c3c";
    } else if (ph > 7.5) {
        type.innerText = "Bazik Çözelti";
        type.style.color = "#3498db";
    } else {
        type.innerText = "Nötr Çözelti";
        type.style.color = "#2ecc71";
    }

    document.getElementById('hc-ph-result').classList.add('visible');
}
