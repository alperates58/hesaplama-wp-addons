function hcEDDAdvancedHesapla() {
    const lmpVal = document.getElementById('hc-ea-lmp').value;
    const cycle = parseInt(document.getElementById('hc-ea-cycle').value);

    if (!lmpVal) {
        alert('Lütfen son adet tarihinizi seçin.');
        return;
    }

    const lmp = new Date(lmpVal);
    
    // Adjusted Naegele's: EDD = LMP + 280 days + (Cycle - 28)
    const adjDays = 280 + (cycle - 28);
    const edd = new Date(lmp.getTime() + (adjDays * 24 * 60 * 60 * 1000));

    // Conception ~ LMP + 14 + (Cycle - 28)
    const conception = new Date(lmp.getTime() + ((14 + (cycle - 28)) * 24 * 60 * 60 * 1000));

    document.getElementById('hc-ea-value').innerText = edd.toLocaleDateString('tr-TR', { day: 'numeric', month: 'long', year: 'numeric' });
    
    document.getElementById('hc-ea-info').innerHTML = `
        <p><b>Tahmini Gebe Kalma Tarihi:</b> ${conception.toLocaleDateString('tr-TR')}</p>
        <p><b>Burcu:</b> ${getBurc(edd)}</p>
    `;

    document.getElementById('hc-tahmini-dogum-result').classList.add('visible');
}

function getBurc(d) {
    const month = d.getMonth() + 1;
    const day = d.getDate();
    if ((month == 1 && day >= 20) || (month == 2 && day <= 18)) return "Kova";
    if ((month == 2 && day >= 19) || (month == 3 && day <= 20)) return "Balık";
    if ((month == 3 && day >= 21) || (month == 4 && day <= 19)) return "Koç";
    if ((month == 4 && day >= 20) || (month == 5 && day <= 20)) return "Boğa";
    if ((month == 5 && day >= 21) || (month == 6 && day <= 20)) return "İkizler";
    if ((month == 6 && day >= 21) || (month == 7 && day <= 22)) return "Yengeç";
    if ((month == 7 && day >= 23) || (month == 8 && day <= 22)) return "Aslan";
    if ((month == 8 && day >= 23) || (month == 9 && day <= 22)) return "Başak";
    if ((month == 9 && day >= 23) || (month == 10 && day <= 22)) return "Terazi";
    if ((month == 10 && day >= 23) || (month == 11 && day <= 21)) return "Akrep";
    if ((month == 11 && day >= 22) || (month == 12 && day <= 21)) return "Yay";
    return "Oğlak";
}
