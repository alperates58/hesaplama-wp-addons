function hcIkiTarihDetayHesapla() {
    const d1Val = document.getElementById('hc-itd-date1').value;
    const d2Val = document.getElementById('hc-itd-date2').value;

    if (!d1Val || !d2Val) { alert('Lütfen tarihleri seçin.'); return; }

    const d1 = new Date(d1Val);
    const d2 = new Date(d2Val);
    
    const diffTime = Math.abs(d2 - d1);
    const totalDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    
    const years = Math.floor(totalDays / 365);
    const months = Math.floor(totalDays / 30.44);
    const weeks = Math.floor(totalDays / 7);

    let html = `
        <div><strong>Toplam Gün:</strong> ${totalDays.toLocaleString('tr-TR')} gün</div>
        <div><strong>Yaklaşık Hafta:</strong> ${weeks.toLocaleString('tr-TR')} hafta</div>
        <div><strong>Yaklaşık Ay:</strong> ${months.toLocaleString('tr-TR')} ay</div>
        <div><strong>Yaklaşık Yıl:</strong> ${years.toLocaleString('tr-TR')} yıl</div>
    `;

    document.getElementById('hc-itd-val').innerHTML = html;
    document.getElementById('hc-itd-result').classList.add('visible');
}
